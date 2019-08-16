<?php
namespace Core\Classes;

use Core\ResourceHandler;

class ModuleHandler
{

	public static function Initialize()
	{
		$RequestMethodType = ResourceHandler::getRequestMethod();
		$ModuleType = null;
		
		switch($RequestMethodType)
		{
			case "GET":
				$ModuleType = "Sender";
				break;
				
			case "POST":
				$ModuleType = "Receiver";
				break;
			
			case "PUT":
				$ModuleType = "Putter";
				break;
			
			case "DELETE":
				$ModuleType = "Deleter";
				break;
				
			default:
				break;
		}
		
		
	}
	
}

?>