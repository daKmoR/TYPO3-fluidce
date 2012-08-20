<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Content',
	array(
		'Content' => 'list, show, update, move, updateText, deleteText',
		'Page' => 'list, show',
	),
	// non-cacheable actions
	array(
		'Page' => '',
		'Content' => 'update, updateText, move, deleteText',
	)
);

?>