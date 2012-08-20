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
class Tx_Fluidce_Domain_Model_Content extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var integer
	 */
	protected $hidden;

	/**
	 * @var Tx_Fluidce_Domain_Model_Page
	 */
	protected $page;

	/**
	 * @var integer
	 */
	protected $colPos;

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
	 * @return integer $hidden
	 */
	public function getHidden() {
		return $this->hidden;
	}

	/**
	 * @param integer $hidden
	 * @return void
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}

	/**
	 * @return Tx_Fluidce_Domain_Model_Page $page
	 */
	public function getPage() {
		return $this->page;
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Page $page
	 * @return void
	 */
	public function setPage(Tx_Fluidce_Domain_Model_Page $page) {
		$this->page = $page;
	}

	/**
	 * @param int $colPos
	 */
	public function setColPos($colPos) {
		$this->colPos = $colPos;
	}

	/**
	 * @return int
	 */
	public function getColPos() {
		return $this->colPos;
	}

	/**
	 * @param Tx_Fluidce_Domain_Model_Content $after
	 */
	public function moveAfter(Tx_Fluidce_Domain_Model_Content $after) {
		$cmd['tt_content'][$this->getUid()]['move'] = $after->getUid() * -1;
		$tce = t3lib_div::makeInstance('t3lib_TCEmain');
		$tce->stripslashes_values = 0;
		$tce->start(array(), $cmd);
		$tce->process_cmdmap();
	}

}