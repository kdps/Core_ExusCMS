<?php

if ( !defined("__FLOWER__") ) exit();

if ( defined('__ENV') ) {
	switch( __ENV ) {
		case 'default':
			error_reporting(E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR);
			ini_set('display_errors', 1);
			break;
			
		case 'development':
			error_reporting(E_ALL);
			break;
			
		case 'production':
			error_reporting(0);
			break;
			
		case 'maximum':
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			break;
			
		case 'simple':
			error_reporting(E_ERROR | E_WARNING | E_PARSE);
			ini_set('display_errors', 1);
			break;
			
		default:
			break;
	}
}