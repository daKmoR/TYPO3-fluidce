<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Content',
	'show content'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fluid Content Elements');

$TCA['pages']['columns']['contents'] = array(
	'exclude' => 0,
	'label' => 'Contents',
	'config' => array(
		'type' => 'inline',
		'foreign_table' => 'tt_content',
		'foreign_field' => 'pid'
	),
);

$TCA['pages']['columns']['children'] = array(
	'exclude' => 0,
	'label' => 'Children',
	'config' => array(
		'type' => 'inline',
		'foreign_table' => 'pages',
		'foreign_field' => 'pid'
	),
);