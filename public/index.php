<?php
// this makes our life easier when dealing with paths.
// everything is relative to the application root now.
chdir(dirname(__DIR__));

// composer autoloading
if(file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}

// error reporting
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');

// run hive
$hive = new \Hive\Hive();

$hive->getRouter()->createRoute('index')->when('^/$')->then(function ($hive) {
    echo '<h1>powerpos</h1>';
    echo \Powerpos\Version::getVersion();
});

$hive->run();