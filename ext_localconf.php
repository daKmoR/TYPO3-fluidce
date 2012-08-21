<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Content',
	array(
		'Content' => 'list, show, update, move, updateText, deleteText',
		'Page' => 'update, move, delete',
	),
	// non-cacheable actions
	array(
		'Page' => 'update, move, delete',
		'Content' => 'update, updateText, move, deleteText',
	)
);