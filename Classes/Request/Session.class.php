<?php
namespace Core\Classes;

class Session {
	
	public static function isInitialized() {
		if (session_status() == PHP_SESSION_NONE && empty($_SESSION)) {
			return true;
		}
		
		return false;
	}
	
	public static function Start() {
		session_name('flowersession');
		session_start();
	}
	
	public static function getObject() {
		return $_SESSION;
	}
	
}