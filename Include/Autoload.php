<?php

function Autoload( $className ) {
	$_CLASS = explode('\\', $className);
	$_CLASS = end($_CLASS);
	
	$_GLOBALS = isset($GLOBALS['CLSARR_' . $_CLASS]) ? $GLOBALS['CLSARR_' . $_CLASS] : null;

	if ( isset($_GLOBALS) ) {
		$_Include = $_GLOBALS;
	} else {
		$_Include = array (
			__ROOT . __CLASS_PATH . '/Compress/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/Database/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/ETC/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/FileSystem/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/Id3/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/Image/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/Maya/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/Request/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/Stream/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/Callback/' . $_CLASS . '.php',
			__ROOT . __CLASS_PATH . '/ModuleHandler/' . $_CLASS . '.class.php',
			__ROOT . __CLASS_PATH . '/ModuleInstance/' . $_CLASS . '.class.php',
			__ROOT . __CLASS_PATH . '/SystemHandler/' . $_CLASS . '.class.php'
		);
		
		$GLOBALS['CLSARR_' . $_CLASS] = $_Include;
	}

	foreach ( $_Include as $targetFile ) {
		if ( isset($_Include[$className]) && file_exists($_Include[$className]) ) {
			require($_Include[$className]);
		} else if ( file_exists($targetFile) ) {
			require($targetFile);
		}
	}
}

if ( function_exists('spl_autoload_register') ) {
	spl_autoload_register('Autoload');
} else {
	throw("spl_autoload_register 함수를 찾을 수 없습니다.");
}