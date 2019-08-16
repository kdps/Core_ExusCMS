<?php

namespace Core;

use Classes\Request;
use Classes\Session;
use Classes\ModuleHandler;

class ResourceHandler {
	
	protected static $Instance = null;
	
	public $RequestMethodType = null;
	public $RequestVariables = null;
	public $SessionObject = null;
	public $CookieObject = null;
	
	/**
	 * Get http request method name
	 *
	 * @Return String
	 */
	
	public static function getRequestMethod() :string {
		return self::$Instance->RequestMethodType;
	}
	
	/**
	 * Get a request variable
	 *
	 * @Parameter {$Name}               : Request Variable Name
	 * @Parameter {$DefaultReturnValue} : Default Return Type
	 * @Parameter {$Type}               : Return Type
	 *
	 * @Return String
	 */
	
	public static function getRequestVariable( $Name, $DefaultReturnValue, $Type = '' ) {
		if ( !$Name ) {
			return $DefaultReturnValue || "";
		}
		
		if ( !$Type ) {
			if ( isset(self::$Instance->RequestVariables[$Name]) ) {
				return self::$Instance->RequestVariables[$Name];
			}
		} else {
			if ( isset(self::$Instance->RequestVariables[$Name]) ) {
				$RequestVariable = self::$Instance->RequestVariables[$Name];
				$RequestVariable = Classes\Request::FormatRequestVariable($Type, $RequestVariable);
				
				return $RequestVariable;
			}
		}
		
		return $DefaultReturnValue || "";
	}
	
	/**
	 * Get a cookie variable
	 *
	 * @Return String
	 */
	
	public static function getCookieVariable( $Name ) {
		if ( isset(self::$Instance->CookieObject[$Name]) ) {
			return self::$Instance->CookieObject[$Name];
		}
	}
	
	/**
	 * Get Singleton of Resource Handler
	 *
	 * @Return Static Resource Handler Object
	 */
	
	public static function &getInstance() {
		static $ResourceHandlerInstance = null;
		
		if ( !$ResourceHandlerInstance ) {
			$ResourceHandlerInstance = new ResourceHandler();
		}
		
		return $ResourceHandlerInstance;
	}
	
	/**
	 * Initialize Resource Handler Object
	 *
	 * @Return Void
	 */
	
	public static function Initialize() {
		if ( Classes\Session::isInitialized() === true ) {
			Classes\Session::Start();
		}
		
		if ( self::$Instance === null ) {
			$InstanceHandler = self::$Instance = self::getInstance();
		}
		
		if ( self::$Instance->RequestMethodType === null ) {
			$InstanceHandler->RequestMethodType = Classes\Request::getRequestMethod();
		}
		
		if ( self::$Instance->RequestMethodType === "POST" ) {
			
		}
		
		if ( self::$Instance->RequestVariables === null ) {
			$InstanceHandler->RequestVariables = Classes\Request::getRequestVariables();
		}
		
		if ( self::$Instance->SessionObject === null ) {
			$InstanceHandler->SessionObject = Classes\Session::getObject();
		}
		
		if ( self::$Instance->CookieObject === null ) {
			$InstanceHandler->CookieObject = Classes\Cookie::getObject();
		}
		
		Classes\ModuleHandler::Initialize();
	}
	
}