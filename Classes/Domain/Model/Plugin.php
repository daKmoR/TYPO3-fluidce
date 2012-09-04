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
class Tx_Fluidce_Domain_Model_Plugin extends Tx_Fluidce_Domain_Model_Content {

	/**
	 * @var Tx_Extbase_Object_ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @param Tx_Extbase_Object_ObjectManagerInterface $objectManager
	 */
	public function injectObjectManager(Tx_Extbase_Object_ObjectManagerInterface $objectManager) {
		$this->objectManager = $objectManager;
	}

	/**
	 * Executes an extbase extension
	 *
	 * @return string
	 */
	public function execute() {
		$bootstrap = $this->objectManager->create('Tx_Extbase_Core_Bootstrap');
		$configuration = array(
			'extensionName' => $this->getExtensionName(),
			'pluginName' => $this->getPluginName()
		);
		return $bootstrap->run('', $configuration);
	}

	/**
	 * @return string
	 */
	public function getExtensionName() {
		$split = explode('_', $this->getType());
		return t3lib_div::underscoredToUpperCamelCase($split[0]);
	}

	/**
	 * @return string
	 */
	public function getPluginName() {
		$split = explode('_', $this->getType());
		return t3lib_div::underscoredToUpperCamelCase($split[1]);
	}

	/**
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

}