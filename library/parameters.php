<?php

// Define Directory Separator
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Site Root i.e. root directory of the project
defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', DS.'wamp'.DS.'www'.DS.'OLX'.DS);

define('APPLICATION', SITE_ROOT.'application'.DS);
define('MODEL', APPLICATION.'model'.DS);
define('VIEW', APPLICATION.'view'.DS);

define('CONFIG', SITE_ROOT.'config'.DS);
define('SCRIPTS', SITE_ROOT.'scripts'.DS);

/**
 * For URL rewriting
 * The root directory of domain i.e. 'localhost' is '/'
 * Project is in the folder 'OLX'
 * So root of project is /olx/
 * Which translates to http://localhost/olx/
*/
define('HOME', '/olx/');
define('ASSETS', '/olx/assets/');
define('STYLESHEETS', ASSETS.'css/');
define('JAVASCRIPTS', ASSETS.'js/');

$dir_admin = VIEW.'admin'.DS;
$dir_public = VIEW.'public'.DS;
$dir_categories = $dir_public.DS.'categories'.DS;
?>