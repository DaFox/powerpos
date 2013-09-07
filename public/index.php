<?php
// define constants
define('APPLICATION_ROOT', dirname(dirname(__FILE__)));
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// this makes our life easier when dealing with paths. everything is relative to the application root now.
chdir(dirname(__DIR__));

// setup autoloading
require 'autoload.php';

echo '<h1>coming soon: powerpos</h1>';
echo '<h2>current version: ' . \Powerpos\Version::getVersion() . '</h2>';