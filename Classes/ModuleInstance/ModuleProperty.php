<?php
namespace Core\Classes;

class ModuleProperty
{
	
	public $ModuleObject;
	public $ModulePath;
	
	public static function setModuleObject( $ModuleObject )
	{
		$this->ModuleObject = $ModuleObject;
	}
	
}