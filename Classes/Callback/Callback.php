<?php
namespace Core\Classes;

class Callback
{

	public static function Require($IncludeFile, $CallBack)
	{
		require($IncludeFile);
		
		$CallBack();
	}
	
}

?>