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
class Tx_Fluidce_Domain_Model_Page extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $navigationTitle;

	/**
	 * @var integer
	 */
	protected $layout;

	/**
	 * @var integer
	 */
	protected $hideInMenu;

	/**
	 * @var Tx_Fluidce_Domain_Model_Page
	 */
	protected $parent;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Fluidce_Domain_Model_Page>
	 */
	protected $subPages;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Fluidce_Domain_Model_Content>
	 */
	protected $contents;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->subPages = new Tx_Extbase_Persistence_ObjectStorage();
		$this->contents = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string $navigationTitle
	 */
	public function getNavigationTitle() {
		return $this->navigationTitle;
	}

	/**
	 * @param string $navigationTitle
	 * @return void
	 */
	public function setNavigationTitle($navigationTitle) {
		$this->navigationTitle = $navigationTitle;
	}

	/**
	 * @return integer $layout
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * @param integer $layout
	 * @return void
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}

	/**
	 * @return integer $hideInMenu
	 */
	public function getHideInMenu() {
		return $this->hideInMenu;
	}

	/**
	 * @param integer $hideInMenu
	 * @return void
	 */
	public function setHideInMenu($hideInMenu) {
		$this->hideInMenu = $hideInMenu;
	}

	/**
	 * @return Tx_Fluidce_Domain_Model_Page $parent
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Page $parent
	 * @return void
	 */
	public function setParent(Tx_Fluidce_Domain_Model_Page $parent) {
		$this->parent = $parent;
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Page $subPage
	 * @return void
	 */
	public function addSubPage(Tx_Fluidce_Domain_Model_Page $subPage) {
		$this->subPages->attach($subPage);
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Page $subPageToRemove The Page to be removed
	 * @return void
	 */
	public function removeSubPage(Tx_Fluidce_Domain_Model_Page $subPageToRemove) {
		$this->subPages->detach($subPageToRemove);
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Fluidce_Domain_Model_Page> $subPages
	 */
	public function getSubPages() {
		return $this->subPages;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Fluidce_Domain_Model_Page> $subPages
	 * @return void
	 */
	public function setSubPages(Tx_Extbase_Persistence_ObjectStorage $subPages) {
		$this->subPages = $subPages;
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Content $content
	 * @return void
	 */
	public function addContent(Tx_Fluidce_Domain_Model_Content $content) {
		$this->contents->attach($content);
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Content $contentToRemove The Content to be removed
	 * @return void
	 */
	public function removeContent(Tx_Fluidce_Domain_Model_Content $contentToRemove) {
		$this->contents->detach($contentToRemove);
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Fluidce_Domain_Model_Content> $contents
	 */
	public function getContents() {
		return $this->contents;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Fluidce_Domain_Model_Content> $contents
	 * @return void
	 */
	public function setContents(Tx_Extbase_Persistence_ObjectStorage $contents) {
		$this->contents = $contents;
	}

}