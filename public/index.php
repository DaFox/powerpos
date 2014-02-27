<?php
use Flex\Application\WebApplication;

// error reporting
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');

// this makes our life easier when dealing with paths.
// everything is relative to the application root now.
chdir(dirname(__DIR__));

// autoloading
include 'autoload.php';

// start application
$app = new WebApplication(include 'configs/application.php');

// run application
$app->run();