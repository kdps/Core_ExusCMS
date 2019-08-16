<?php
namespace Core\Classes;

use Core\ResourceHandler;
use Core\Callback;

class ModuleInstance {

	public static function getObject( $ModuleName, $ModuleType ) {
		$ModuleInstance = null;
		$ModuleObject_ClassName = null;
		$ModuleObject_FileName = null;
		$_AcceptModuleType = array("Receiver", "Sender", "Deleter", "Putter", "Query");
		
		if ( in_array($ModuleType, $_AcceptModuleType) ) {
			$ModuleObject_FileName = sprintf("%s.%s.Class.php", $ModuleName, $ModuleType);
			$ModuleObject_ClassName = sprintf("%s%s", $ModuleName, $ModuleType);
		}
		
		if ( $ModuleObject_FileName === null ) {
			return new Object();
		}
		
		$ModuleObjectFilePath = sprintf("%s/%s/%s", __MODULE_PATH, $ModuleName, $ModuleObject_FileName);
		if ( file_exists($ModuleObjectFilePath) ) {
			Require( $ModuleObjectFilePath, function() {
				if ( class_exists($ModuleObject_ClassName) ) {
					$ModuleInstance = new $ModuleObject_ClassName();
				}
			} );
		}
		
	}
	
}

?>