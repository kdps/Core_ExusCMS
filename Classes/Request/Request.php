<?php
namespace Core\Classes;

class Request {

	public static function getRequestVariables() {
		$requestMethod = self::getRequestMethod();
		$requestVariables = null;
		
		switch ( $requestMethod ) {
			case "GET":
				$requestVariables = $_GET;
				break;
			case "POST":
				$requestVariables = $_POST;
				break;
		}
		
		return $requestVariables;
	}
	
	public static function getRequestMethod() {
		$requestMethod = $_SERVER['REQUEST_METHOD'];
		
		return $requestMethod;
	}
	
	public static function FormatRequestVariable($Type, $vars) {
		switch ( $Type ) {
			case ( preg_match('/^MaxLength\((.*\))$/', $Type, $matches) ? true : false ) :
				if ( strlen($vars) > $matches[1] ) {
					$vars = null;
				}
				
				break;
			case (preg_match('/^Bracket\((.*\))$/', $Type, $matches) ? true : false) :
				if ( isset($matches[1]) ) {
					$regex = $matches[1];
					$regex = '/^<'.$regex.'>([\s\S]*?)<\/'.$regex.'>$/i';
					if ( preg_match($regex, $vars, $matches) ) {
						if ( isset($matches[1]) ) {
							$vars = $matches[1];
						} else {
							$vars = null;
						}
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'strnum':
				if ( preg_match("/^[A-Za-z0-9]+$/i", $vars, $matches) ) {
					if (isset($matches[1])) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'phonenumber':
				if ( preg_match("/^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}$/g", $vars, $matches) ) {
					if ( isset($matches[1]) ) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'url':
				if ( preg_match("/^(http\:\/\/)*[.a-zA-Z0-9-]+\.[a-zA-Z]+$/g", $vars, $matches) ) {
					if ( isset($matches[1]) ) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'email':
				if ( preg_match("/^[^@]+@[._a-zA-Z0-9-]+\.[a-zA-Z]+$/g", $vars, $matches) ) {
					if ( isset($matches[1]) ) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'urlparam':
				if ( preg_match("/([^=&?]+)=([^&#]*)/g", $vars, $matches) ) {
					if ( count($matches) === 1 ) {
						if ( isset($matches[1]) ) {
							$vars = $matches[1];
						} else {
							$vars = null;
						}
					} else if ( count($matches) > 1 ) {
						$vars = $matches;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'label':
				if ( preg_match("/\[([a-zA-Z0-9\s_-]+)\]/i", $vars, $matches) ) {
					if ( isset($matches[1]) ) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'functionname':
				if ( preg_match_all("/(\[?[a-zA-Z0-9\s_-]+\]?)/", $vars, $matches) ) {
					if ( isset($matches[1]) ) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'deny':
				$vars = null;
				
				break;
			case 'doublequotation':
				if ( preg_match('/^"(.*)"$/', $key, $matches) ) {
					if ( isset($matches[1]) ) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'siniglequotation':
				if ( preg_match('/^\'(.*)\'$/', $vars, $matches) ) {
					if ( isset($matches[1]) ) {
						$vars = $matches[1];
					} else {
						$vars = null;
					}
				} else {
					$vars = null;
				}
				
				break;
			case 'withouthtml':
				$vars = strip_tags($vars);
				break;
			case 'json':
				if ( !str::is_json($vars) ) {
					$vars = null;
				}
				
				break;
			case 'numbers':
				//not include negative numbers
				if ( !is_numeric($vars) || !is_int($vars) ) {
					if ( preg_match('/^(\d[\d\.]+)$/', $key, $matches) ) {
						if ( isset($matches[1]) ) {
							$vars = $matches[1];
						} else {
							$vars = 0;
						}
					} else {
						$vars = 0;
					}
				}
				
				break;
			case 'number':
				if ( !is_numeric($vars) || !is_int($vars) ) {
					if ( preg_match('/^(\d+)$/', $vars, $matches) ) {
						if ( isset($matches[1]) ) {
							$vars = $matches[1];
						} else {
							$vars = 0;
						}
					} else {
						$vars = 0;
					}
				}
				
				break;
			case 'string':
				if ( !is_string($vars) ) {
					$vars = null;
				}
				
				break;
			case 'int':
				$vars = intval($vars);
				
				break;
			case 'float':
				$vars = intval($vars);
				$vars = (float)sprintf("% u",$vars);
				if ($vars < 0) {
					$vars = 0;
				}
				
				break;
			case 'bool':
				$vars = ($vars === true) ? true : (($vars === false) ? false : false);
				break;
			default:
				break;
		}
		
		return $vars;
	}
	
}

?>