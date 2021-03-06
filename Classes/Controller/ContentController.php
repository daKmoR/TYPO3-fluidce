<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Thomas Allmer <thomas.allmer@webteam.at>, WEBTEAM GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package fluidce
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Fluidce_Controller_ContentController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Fluidce_Domain_Repository_PageRepository
	 */
	protected $pageRepository;

	/**
	 * @param Tx_Fluidce_Domain_Repository_PageRepository $pageRepository
	 * @return void
	 */
	public function injectPageRepository(Tx_Fluidce_Domain_Repository_PageRepository $pageRepository) {
		$this->pageRepository = $pageRepository;
	}

	/**
	 * @var Tx_Fluidce_Domain_Repository_ContentRepository
	 */
	protected $contentRepository;

	/**
	 * @param Tx_Fluidce_Domain_Repository_ContentRepository $contentRepository
	 * @return void
	 */
	public function injectContentRepository(Tx_Fluidce_Domain_Repository_ContentRepository $contentRepository) {
		$this->contentRepository = $contentRepository;
	}

	/**
	 * @var Tx_Fluidce_Domain_Repository_TextRepository
	 */
	protected $textRepository;

	/**
	 * @param Tx_Fluidce_Domain_Repository_TextRepository $textRepository
	 * @return void
	 */
	public function injectTextRepository(Tx_Fluidce_Domain_Repository_TextRepository $textRepository) {
		$this->textRepository = $textRepository;
	}

	/**
	 * @return string
	 */
	public function listAction() {
		$currentUid = $GLOBALS['TSFE']->id;
		$page = $this->pageRepository->findByUid($currentUid);
		$this->settings['colPos'] = intval($this->settings['colPos']);
		$contents = $this->settings['colPos'] >= 0 ? $page->getContentsForColPos($this->settings['colPos']) : $page->getContents();
		$this->view->assign('page', $page);

		$contentsString = '';
		foreach ($contents as $content) {
			$contentClass = get_class($content);
			if ($this->settings[$contentClass]) {
				$templatePathAndFilename = $this->settings[$contentClass];
				$this->view->setTemplatePathAndFilename($templatePathAndFilename);
				$this->view->assign('content', $content);
				$contentsString .= $this->view->render();
			}
			if ($contentClass === 'Tx_Fluidce_Domain_Model_Plugin') {
				$contentsString .= $content->execute();
			}
		}
		return $contentsString;
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Content $content
	 * @return void
	 */
	public function showAction(Tx_Fluidce_Domain_Model_Content $content) {
		$this->view->assign('content', $content);
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Content $content
	 * @return void
	 */
	public function updateAction(Tx_Fluidce_Domain_Model_Content $content) {
		$this->contentRepository->update($content);
		$this->redirect('list');
	}

	/**
	 * @param array $contentUids
	 */
	public function	moveAction($contentUids) {
		$content = $this->contentRepository->findByUid($contentUids['contentUid']);
		$moveAfterContent = $this->contentRepository->findByUid($contentUids['moveAfterUid']);
		$content->moveAfter($moveAfterContent);
		$this->redirect('list');
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Text $text
	 * @return void
	 */
	public function updateTextAction(Tx_Fluidce_Domain_Model_Text $text) {
		$parsehtml = t3lib_div::makeInstance('t3lib_parsehtml_proc');
		$parsehtml->init('tt_content:bodytext', $text->getPid());

		$options = array();
		$options['rte_transform']['parameters']['mode'] = 'ts_css';

		$parsedText = $parsehtml->RTE_transform($text->getText(), $options, 'db');
		$text->setText($parsedText);

		$this->textRepository->update($text);
		$this->redirect('list');
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Text $text
	 * @return void
	 */
	public function deleteTextAction(Tx_Fluidce_Domain_Model_Text $text) {
		$this->textRepository->remove($text);
		$this->redirect('list');
	}

}