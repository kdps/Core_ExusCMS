<?php

define('__FLOWER__', TRUE);
define('__ROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('__DIR', dirname(__FILE__));

require("Include/Define/_Loader.php");
require("Include/Environment/_Loader.php");

require("Include/Autoload.php");
require("Include/ResourceHandler.php");

Core\ResourceHandler::Initialize();

?>