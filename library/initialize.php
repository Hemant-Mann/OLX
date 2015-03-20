<?php
// load constants
require_once('parameters.php');

// load config file first
require_once(CONFIG.'config.php');

// load basic functions next so that everything after can use them
require_once(SCRIPTS.'functions.php');

// load core objects
require_once(MODEL.'session.php');
require_once(MODEL.'database.php');
require_once(MODEL.'database_object.php');

// load database related classes
require_once(MODEL.'product.php');
require_once(MODEL.'user.php');

require_once(MODEL.'pagination.php');
?>
