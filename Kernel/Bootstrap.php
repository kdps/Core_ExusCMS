<?php

namespace Core\Kernel;

class Bootstrap {
	
	public function __construct() {
		require_once("./Kernel/Autoloader/Autoloader.php");
		$Autoloader = new Autoloader();
		$Autoloader->__Autoload();
	}
	
}

?>