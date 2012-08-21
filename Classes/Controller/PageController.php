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
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;

	/**
	 * @param Tx_Extbase_Persistence_Manager $persistenceManager
	 * @return void
	 */
	public function injectPersistenceManager(Tx_Extbase_Persistence_Manager $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}

	/**
	 * @var Tx_Extbase_Service_CacheService
	 */
	protected $cacheService;

	/**
	 * @param Tx_Extbase_Service_CacheService $cacheService
	 * @return void
	 */
	public function injectCacheService(Tx_Extbase_Service_CacheService $cacheService) {
		$this->cacheService = $cacheService;
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Page $page
	 * @return void
	 */
	public function updateAction(Tx_Fluidce_Domain_Model_Page $page) {
		$this->pageRepository->update($page);
		$this->redirectToUri('index.php?id=' . $page->getUid());

//		$this->persistenceManager->persistAll();
//		$this->cacheService->clearPageCache($page->getUid());
//
//		$uriBuilder = $this->controllerContext->getUriBuilder();
//		$uri = $uriBuilder
//			->reset()
//			->setTargetPageUid($page->getUid())
//			->build();
	}

	/**
	 * @param array $pageUids
	 */
	public function	moveAction($pageUids) {
		$page = $this->pageRepository->findByUid($pageUids['pageUid']);
		$moveAfterPage = $this->pageRepository->findByUid($pageUids['moveAfterUid']);
		$page->moveAfter($moveAfterPage);
		$this->redirectToUri('index.php?id=' . $page->getUid());
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Page $page
	 * @return string
	 */
	public function deleteAction(Tx_Fluidce_Domain_Model_Page $page) {
		$this->pageRepository->remove($page);
		//$this->redirectToUri('index.php?id=' . '1');
	}

}