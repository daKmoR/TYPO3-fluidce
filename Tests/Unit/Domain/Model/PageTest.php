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
	public function getParentReturnsInitialValueForObjectStorageContainingTx_Fluidce_Domain_Model_Page() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getParent()
		);
	}

	/**
	 * @test
	 */
	public function setParentForObjectStorageContainingTx_Fluidce_Domain_Model_PageSetsParent() { 
		$parent = new Tx_Fluidce_Domain_Model_Page();
		$objectStorageHoldingExactlyOneParent = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneParent->attach($parent);
		$this->fixture->setParent($objectStorageHoldingExactlyOneParent);

		$this->assertSame(
			$objectStorageHoldingExactlyOneParent,
			$this->fixture->getParent()
		);
	}
	
	/**
	 * @test
	 */
	public function addParentToObjectStorageHoldingParent() {
		$parent = new Tx_Fluidce_Domain_Model_Page();
		$objectStorageHoldingExactlyOneParent = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneParent->attach($parent);
		$this->fixture->addParent($parent);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneParent,
			$this->fixture->getParent()
		);
	}

	/**
	 * @test
	 */
	public function removeParentFromObjectStorageHoldingParent() {
		$parent = new Tx_Fluidce_Domain_Model_Page();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($parent);
		$localObjectStorage->detach($parent);
		$this->fixture->addParent($parent);
		$this->fixture->removeParent($parent);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getParent()
		);
	}
	
	/**
	 * @test
	 */
	public function getSubPagesReturnsInitialValueForTx_Fluidce_Domain_Model_Page() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getSubPages()
		);
	}

	/**
	 * @test
	 */
	public function setSubPagesForTx_Fluidce_Domain_Model_PageSetsSubPages() { 
		$dummyObject = new Tx_Fluidce_Domain_Model_Page();
		$this->fixture->setSubPages($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getSubPages()
		);
	}
	
}
?>