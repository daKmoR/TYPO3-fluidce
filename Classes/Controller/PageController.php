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
class Tx_Fluidce_Controller_PageController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * pageRepository
	 *
	 * @var Tx_Fluidce_Domain_Repository_PageRepository
	 */
	protected $pageRepository;

	/**
	 * injectPageRepository
	 *
	 * @param Tx_Fluidce_Domain_Repository_PageRepository $pageRepository
	 * @return void
	 */
	public function injectPageRepository(Tx_Fluidce_Domain_Repository_PageRepository $pageRepository) {
		$this->pageRepository = $pageRepository;
	}

	/**
	 * action show
	 *
	 * @param Tx_Fluidce_Domain_Model_Page $page
	 * @return void
	 */
	public function showAction(Tx_Fluidce_Domain_Model_Page $page) {
		$this->view->assign('page', $page);
	}

	/**
	 * @return string
	 */
	public function listAction() {
		return 'list the page now :p';
		// $this->view->assign('content', $content);
	}

}
?>