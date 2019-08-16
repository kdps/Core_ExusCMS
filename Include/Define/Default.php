<?php

if (!defined("__FLOWER__")) exit();

const DS = DIRECTORY_SEPARATOR;

date_default_timezone_set('Asia/Seoul');

ini_set("url_rewriter.tags","");
ini_set('gd.jpeg_ignore_warning', true);
ini_set('magic_quotes_gpc', 'Off');

defined('__APP_ENV')          || define('__APP_ENV',          getenv('APP_ENV'));
defined('__MODULEID')         || define('__MODULEID',         'module');
defined('__ACTION')           || define('__ACTION',           'action');
defined('__REQUIRETOTALDISK') || define('__REQUIRETOTALDISK', 5000);
defined('__REQUIREFREEDISK')  || define('__REQUIREFREEDISK',  500);
defined('__ENV')              || define('__ENV',              'development'); // development, production, default
defined('__REQUIRE__')        || define('__REQUIRE__',        '7.2.0');
defined('__SUB_PATH')         || define('__SUB_PATH',         strlen(dirname($_SERVER['DOCUMENT_URI'])) == 1 ? '' : dirname($_SERVER['DOCUMENT_URI']));
defined('__ROOT_DIR')         || define('__ROOT_DIR',         substr(__ROOT, 0, strlen(__ROOT) - strlen(__SUB_PATH)));
defined('__ATTACH_PATH')      || define('__ATTACH_PATH',      '/Files/Attach');
defined('__THUMBNAIL_PATH')   || define('__THUMBNAIL_PATH',   '/Files/Thumbnail');
defined('__FILE')             || define('__FILE',             realpath(dirname(__FILE__)).DS);
defined('__PLUGIN')           || define('__PLUGIN',           __DIR."/Plugins");
defined('__COMPONENTS')       || define('__COMPONENTS',       __DIR."/Components");
defined('__MODULE_PATH')      || define('__MODULE_PATH',      __DIR."/Modules/");
defined('__REQUEST_URL')      || define('__REQUEST_URL',      $_SERVER['REQUEST_URI']);
defined('__SERVERNAME')       || define('__SERVERNAME',       $_SERVER['SERVER_NAME']);
defined('__CLASS_PATH')       || define('__CLASS_PATH',       "/Classes");
defined('__INCLUDE_PATH')     || define('__INCLUDE_PATH',     "/Include");

?>