<?php

if (!defined("__FLOWER__")) exit();

if (session_status() == PHP_SESSION_NONE) 
{
	ini_set('session.auto_start', 'Off');
}
else
{
	ini_set('session.lazy_write', 'On');
}

ini_set('session.use_only_cookies', 'Off');
ini_set("session.cache_expire", 180);
ini_set("session.gc_maxlifetime", 10800);
ini_set("session.gc_probability", 1);
ini_set("session.gc_divisor", 100);

session_name('flowersession');