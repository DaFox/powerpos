<?php
// composer autoloading
if(file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}

$autoLoader = new \Zend\Loader\StandardAutoloader();
$autoLoader->registerNamespace('Powerpos', __DIR__ . '/src/Powerpos');
$autoLoader->register();