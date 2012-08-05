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

/*
$TCA['pages']['columns']['contents'] = array(
	'exclude' => 0,
	'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.name',
	'config' => array(
		'type' => 'input',
		'size' => 30,
		'eval' => 'trim'
	),
);

/*
$tmp_fluidce_columns = array(

	'name' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.name',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'navigation_title' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.navigation_title',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'layout' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.layout',
		'config' => array(
			'type' => 'input',
			'size' => 4,
			'eval' => 'int'
		),
	),
	'hide_in_menu' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.hide_in_menu',
		'config' => array(
			'type' => 'input',
			'size' => 4,
			'eval' => 'int'
		),
	),
	'parent' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.parent',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'pages',
			'minitems' => 0,
			'maxitems' => 1,
		),
	),
	'sub_pages' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.sub_pages',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'pages',
			'foreign_field' => 'page1',
			'maxitems'      => 9999,
			'appearance' => array(
				'collapseAll' => 0,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'showAllLocalizationLink' => 1
			),
		),
	),
	'contents' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.contents',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tt_content',
			'foreign_field' => 'page',
			'maxitems'      => 9999,
			'appearance' => array(
				'collapseAll' => 0,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'showAllLocalizationLink' => 1
			),
		),
	),
);

$tmp_fluidce_columns['page1'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);


$tmp_fluidce_columns = array(
	'parent' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page.parent',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'pages',
			'minitems' => 0,
			'maxitems' => 1,
		),
	),
);


t3lib_extMgm::addTCAcolumns('pages',$tmp_fluidce_columns);


$TCA['pages']['columns'][$TCA['pages']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:pages.tx_extbase_type.Tx_Fluidce_Page','Tx_Fluidce_Page');


$TCA['pages']['types']['Tx_Fluidce_Page']['showitem'] = $TCA['pages']['types']['1']['showitem'];
$TCA['pages']['types']['Tx_Fluidce_Page']['showitem'] .= ',--div--;LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_page,';
$TCA['pages']['types']['Tx_Fluidce_Page']['showitem'] .= 'name, navigation_title, layout, hide_in_menu, parent, sub_pages, contents';

$tmp_fluidce_columns = array(

	'name' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_content.name',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'hidden' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_content.hidden',
		'config' => array(
			'type' => 'input',
			'size' => 4,
			'eval' => 'int'
		),
	),
	'page' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_content.page',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'pages',
			'minitems' => 0,
			'maxitems' => 1,
		),
	),
);

$tmp_fluidce_columns['page'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);

t3lib_extMgm::addTCAcolumns('tt_content',$tmp_fluidce_columns);

$TCA['tt_content']['columns'][$TCA['tt_content']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tt_content.tx_extbase_type.Tx_Fluidce_Content','Tx_Fluidce_Content');

$TCA['tt_content']['types']['Tx_Fluidce_Content']['showitem'] = $TCA['tt_content']['types']['1']['showitem'];
$TCA['tt_content']['types']['Tx_Fluidce_Content']['showitem'] .= ',--div--;LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_content,';
$TCA['tt_content']['types']['Tx_Fluidce_Content']['showitem'] .= 'name, hidden, page';

$tmp_fluidce_columns = array(

	'text' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_text.text',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim',
			'wizards' => array(
				'RTE' => array(
					'icon' => 'wizard_rte2.gif',
					'notNewRecords'=> 1,
					'RTEonly' => 1,
					'script' => 'wizard_rte.php',
					'title' => 'LLL:EXT:cms/locallang_ttc.:bodytext.W.RTE',
					'type' => 'script'
				)
			)
		),
		'defaultExtras' => 'richtext[]',
	),
);

t3lib_extMgm::addTCAcolumns('tt_content',$tmp_fluidce_columns);

$TCA['tt_content']['columns'][$TCA['tt_content']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tt_content.tx_extbase_type.Tx_Fluidce_Text','Tx_Fluidce_Text');

$TCA['tt_content']['types']['Tx_Fluidce_Text']['showitem'] = $TCA['tt_content']['types']['1']['showitem'];
$TCA['tt_content']['types']['Tx_Fluidce_Text']['showitem'] .= ',--div--;LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_text,';
$TCA['tt_content']['types']['Tx_Fluidce_Text']['showitem'] .= 'text';

$tmp_fluidce_columns = array(

	'image' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_image.image',
		'config' => array(
			'type' => 'group',
			'internal_type' => 'file',
			'uploadfolder' => 'uploads/tx_fluidce',
			'show_thumbs' => 1,
			'size' => 5,
			'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
			'disallowed' => '',
		),
	),
);

t3lib_extMgm::addTCAcolumns('tt_content',$tmp_fluidce_columns);

$TCA['tt_content']['columns'][$TCA['tt_content']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tt_content.tx_extbase_type.Tx_Fluidce_Image','Tx_Fluidce_Image');

$TCA['tt_content']['types']['Tx_Fluidce_Image']['showitem'] = $TCA['tt_content']['types']['1']['showitem'];
$TCA['tt_content']['types']['Tx_Fluidce_Image']['showitem'] .= ',--div--;LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_image,';
$TCA['tt_content']['types']['Tx_Fluidce_Image']['showitem'] .= 'image';

$tmp_fluidce_columns = array(

	'text' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_textandimage.text',
		'config' => array(
			'type' => 'text',
			'cols' => 40,
			'rows' => 15,
			'eval' => 'trim',
			'wizards' => array(
				'RTE' => array(
					'icon' => 'wizard_rte2.gif',
					'notNewRecords'=> 1,
					'RTEonly' => 1,
					'script' => 'wizard_rte.php',
					'title' => 'LLL:EXT:cms/locallang_ttc.:bodytext.W.RTE',
					'type' => 'script'
				)
			)
		),
		'defaultExtras' => 'richtext[]',
	),
	'image' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_textandimage.image',
		'config' => array(
			'type' => 'group',
			'internal_type' => 'file',
			'uploadfolder' => 'uploads/tx_fluidce',
			'show_thumbs' => 1,
			'size' => 5,
			'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
			'disallowed' => '',
		),
	),
);

t3lib_extMgm::addTCAcolumns('tt_content',$tmp_fluidce_columns);

$TCA['tt_content']['columns'][$TCA['tt_content']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tt_content.tx_extbase_type.Tx_Fluidce_TextAndImage','Tx_Fluidce_TextAndImage');

$TCA['tt_content']['types']['Tx_Fluidce_TextAndImage']['showitem'] = $TCA['tt_content']['types']['1']['showitem'];
$TCA['tt_content']['types']['Tx_Fluidce_TextAndImage']['showitem'] .= ',--div--;LLL:EXT:fluidce/Resources/Private/Language/locallang_db.xml:tx_fluidce_domain_model_textandimage,';
$TCA['tt_content']['types']['Tx_Fluidce_TextAndImage']['showitem'] .= 'text, image';

*/
?>