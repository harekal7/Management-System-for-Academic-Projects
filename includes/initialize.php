<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT',DS.'var'.DS.'www'.DS.'kaper');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// fb config
defined('APP_ID') ? null : define('APP_ID' , '432801593435633');
defined('APP_SECRET') ? null : define('APP_SECRET' , 'b77e844e64148182d668e113d5c46f62');

// load config file first
require_once(LIB_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');

// load database-related classes
require_once(LIB_PATH.DS.'user.php');

// load facebook api
require_once(LIB_PATH.DS.'facebook/facebook.php');
?>
