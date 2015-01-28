<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', DS.'wamp'.DS.'www'.DS.'olx');

defined('APPLICATION') ? null : define('APPLICATION', SITE_ROOT.DS.'application');
defined('VIEW') ? null : define('VIEW', APPLICATION.DS.'view');

define('HOME', '/'.'olx/');
define('ASSETS', '/olx/assets/');
define('STYLESHEETS', ASSETS.'stylesheets/');
define('JAVASCRIPTS', ASSETS.'javascripts/');

// load config file first
require_once(APPLICATION.DS.'config'.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(APPLICATION.DS.'controller'.DS.'functions.php');

// load core objects
require_once(APPLICATION.DS.'model'.DS.'session.php');
require_once(APPLICATION.DS.'model'.DS.'database.php');
require_once(APPLICATION.DS.'model'.DS.'database_object.php');
require_once(APPLICATION.DS.'model'.DS.'pagination.php');

// load database-related classes
require_once(APPLICATION.DS.'model'.DS.'user.php');
require_once(APPLICATION.DS.'model'.DS.'product.php');
?>
