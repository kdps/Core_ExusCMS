<?php

namespace Core\Kernel;

class Autoloader {
	
	function __Autoload() {
		if (function_exists('spl_autoload_register')) {
			spl_autoload_register('spl_autoload');
		}
	}

	function spl_autoload($className) {
		$_CLASS = ucfirst($className);
		$_GLOBALS = isset($GLOBALS['CLSARR_' . $_CLASS]) ? $GLOBALS['CLSARR_' . $_CLASS] : null;
		
		if (isset($_GLOBALS)) {
			$_AUTOLOAD_CLASSES = $_GLOBALS;
		} else {
			$_AUTOLOAD_CLASSES = array(
				__ROOT . '/Classes/Components/Cache/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/Compress/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/Database/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/ETC/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/FileSystem/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/Id3/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/Image/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/Maya/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/Request/' . $_CLASS . '.php',
				__ROOT . '/Classes/Components/Stream/' . $_CLASS . '.php',
				__ROOT . '/Classes/' . $_CLASS . '.class.php',
				
				'dir' => __ROOT . '/Classes/Components/FileSystem/Directory.php',
				'session' => __ROOT . '/Classes/Components/Request/Session.php',
				'str' => __ROOT . '/Classes/Components/Request/String.php',
				'va' => __ROOT . '/Classes/Components/Request/Variables.php',
			);
			
			$GLOBALS['CLSARR_' . $_CLASS] = $_AUTOLOAD_CLASSES;
		}
	
		foreach ($_AUTOLOAD_CLASSES as $targetFile) {
			if (isset($_AUTOLOAD_CLASSES[$className]) && file_exists($_AUTOLOAD_CLASSES[$className])) {
			    includeClassFile($_AUTOLOAD_CLASSES[$className]);
			} else if (file_exists($targetFile)) {
			    includeClassFile($targetFile);
			}
		}
	}

	function includeClassFile($target_include) {
		if (file_exists($target_include)) {
			include_once($target_include);
		}
	}
	
}