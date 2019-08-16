<?php

if ( !defined("__FLOWER__") ) exit();

if ( !empty($_SERVER['HTTP_X_ORIGINAL_URL']) ) {
	$_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
}

if ( !isset($_SERVER['REQUEST_URI']) && isset($_SERVER['SCRIPT_NAME']) ) {
	$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
	
	if ( isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']) ) {
		$_SERVER['REQUEST_URI'] .= '?'.$_SERVER['QUERY_STRING'];
	}
}

if ( !isset($_SERVER['REQUEST_TIME']) ) {
	$_SERVER['REQUEST_TIME'] = time();
}

if ( !isset($HTTP_RAW_POST_DATA) ) {
	$HTTP_RAW_POST_DATA = file_get_contents('php://input'); //XMLRPC(XML)
}

?>