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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Fluidce_Domain_Model_Page.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Fluid Content Elements
 *
 * @author Thomas Allmer <thomas.allmer@webteam.at>
 */
class Tx_Fluidce_Domain_Model_PageTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Fluidce_Domain_Model_Page
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Fluidce_Domain_Model_Page();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}

	/**
	 * @test
	 */
	public function getNavigationTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNavigationTitleForStringSetsNavigationTitle() {
		$this->fixture->setNavigationTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNavigationTitle()
		);
	}

	/**
	 * @test
	 */
	public function getLayoutReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->fixture->getLayout()
		);
	}

	/**
	 * @test
	 */
	public function setLayoutForIntegerSetsLayout() {
		$this->fixture->setLayout(12);

		$this->assertSame(
			12,
			$this->fixture->getLayout()
		);
	}

	/**
	 * @test
	 */
	public function getHideInMenuReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->fixture->getHideInMenu()
		);
	}

	/**
	 * @test
	 */
	public function setHideInMenuForIntegerSetsHideInMenu() {
		$this->fixture->setHideInMenu(12);

		$this->assertSame(
			12,
			$this->fixture->getHideInMenu()
		);
	}

	/**
	 * @test
	 */
	public function getParentReturnsInitialValueForTx_Fluidce_Domain_Model_Page() {
		$this->assertEquals(
			NULL,
			$this->fixture->getParent()
		);
	}

	/**
	 * @test
	 */
	public function setParentForTx_Fluidce_Domain_Model_PageSetsParent() {
		$dummyObject = new Tx_Fluidce_Domain_Model_Page();
		$this->fixture->setParent($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getParent()
		);
	}

	/**
	 * @test
	 */
	public function getSubPagesReturnsInitialValueForObjectStorageContainingTx_Fluidce_Domain_Model_Page() {
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getChildren()
		);
	}

	/**
	 * @test
	 */
	public function setSubPagesForObjectStorageContainingTx_Fluidce_Domain_Model_PageSetsSubPages() {
		$subPage = new Tx_Fluidce_Domain_Model_Page();
		$objectStorageHoldingExactlyOneSubPages = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSubPages->attach($subPage);
		$this->fixture->setChildren($objectStorageHoldingExactlyOneSubPages);

		$this->assertSame(
			$objectStorageHoldingExactlyOneSubPages,
			$this->fixture->getChildren()
		);
	}

	/**
	 * @test
	 */
	public function addSubPageToObjectStorageHoldingSubPages() {
		$subPage = new Tx_Fluidce_Domain_Model_Page();
		$objectStorageHoldingExactlyOneSubPage = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSubPage->attach($subPage);
		$this->fixture->addSubPage($subPage);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneSubPage,
			$this->fixture->getChildren()
		);
	}

	/**
	 * @test
	 */
	public function removeSubPageFromObjectStorageHoldingSubPages() {
		$subPage = new Tx_Fluidce_Domain_Model_Page();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($subPage);
		$localObjectStorage->detach($subPage);
		$this->fixture->addSubPage($subPage);
		$this->fixture->removeSubPage($subPage);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getChildren()
		);
	}

	/**
	 * @test
	 */
	public function getContentsReturnsInitialValueForObjectStorageContainingTx_Fluidce_Domain_Model_Content() {
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getContents()
		);
	}

	/**
	 * @test
	 */
	public function setContentsForObjectStorageContainingTx_Fluidce_Domain_Model_ContentSetsContents() {
		$content = new Tx_Fluidce_Domain_Model_Content();
		$objectStorageHoldingExactlyOneContents = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneContents->attach($content);
		$this->fixture->setContents($objectStorageHoldingExactlyOneContents);

		$this->assertSame(
			$objectStorageHoldingExactlyOneContents,
			$this->fixture->getContents()
		);
	}

	/**
	 * @test
	 */
	public function addContentToObjectStorageHoldingContents() {
		$content = new Tx_Fluidce_Domain_Model_Content();
		$objectStorageHoldingExactlyOneContent = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneContent->attach($content);
		$this->fixture->addContent($content);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneContent,
			$this->fixture->getContents()
		);
	}

	/**
	 * @test
	 */
	public function removeContentFromObjectStorageHoldingContents() {
		$content = new Tx_Fluidce_Domain_Model_Content();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($content);
		$localObjectStorage->detach($content);
		$this->fixture->addContent($content);
		$this->fixture->removeContent($content);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getContents()
		);
	}

}
?>