<?php

// Define Directory Separator
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Site Root i.e. root directory of the project
$dir = dirname(dirname(__FILE__));
defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', $dir . DS);

define('APPLICATION', SITE_ROOT.'application'.DS);
define('MODEL', APPLICATION.'model'.DS);
define('VIEW', APPLICATION.'view'.DS);

define('CONFIG', SITE_ROOT.'config'.DS);
define('SCRIPTS', SITE_ROOT.'scripts'.DS);

$projectHome = array_pop(explode(DS, $dir)); // will return the name of the project
// Since project root inside localhost so therefore HOME = "/{$home}/"
define('HOME', "/{$projectHome}/");
define('ASSETS', HOME.'assets/');
define('STYLESHEETS', ASSETS.'css/');
define('JAVASCRIPTS', ASSETS.'js/');

$dir_admin = VIEW.'admin'.DS;
$dir_public = VIEW.'public'.DS;
$dir_categories = $dir_public.DS.'categories'.DS;
?>