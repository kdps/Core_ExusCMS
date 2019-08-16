<?php
namespace Core\Classes;

use Core\ResourceHandler;

class ModuleInstance
{

	public static function getObject($ModuleName, $ModuleType)
	{
		$_AcceptModuleType = array("Receiver", "Sender", "Deleter", "Putter", "Query");
		$ModuleObjectName = null;
		
		if (in_array($ModuleType, $_AcceptModuleType)
		{
			$ModuleObjectName = sprintf("%s.%s.Class.php", $ModuleObjectName, $ModuleType);
		}
		
		if ($ModuleObjectName === null)
		{
			return new Object();
		}
		
		
	}
	
}

?>