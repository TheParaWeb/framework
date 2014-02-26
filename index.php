<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 4:19 PM
 */

require 'config.php';
require 'util/Auth.php';

// Also spl_autoload_register (Take a look at it if you like)
function __autoload($class)
{
    $file = LIBS . $class . ".php";
    if (file_exists($file)) {
        require $file;
    }

}

// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();