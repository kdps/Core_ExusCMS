<?php

if (!defined("__FLOWER__")) exit();

ini_set('mbstring.encoding_translation', 'On');
ini_set('mbstring.substitute_character', 'none');
ini_set('mbstring.script_encoding', 'auto');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');
mb_regex_encoding('UTF-8');