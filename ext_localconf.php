<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'PEEZZER.' . $_EXTKEY,
	'Fe',
	array(
		'Bmi' => 'new, create',
		
	),
	// non-cacheable actions
	array(
		'Bmi' => 'create',
		
	)
);

?>