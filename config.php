<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 12/4/13
 * Time: 5:01 PM
 */

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://framework.tpmchosting.com/');
define('LIBS', 'libs/');
define('VERSION','1.0.1');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'tpmcho5_mtcquiz');
define('DB_USER', 'tpmcho5_lee');
define('DB_PASS', 'Begaeen1!');

// NSEncrypt Keys, DO NOT CHANGE ONCE IN PRODUCTION!!! THIS WILL BREAK THE APP.
define("AES_KEY", "abcdefghijuklmno0123456789012345");
define("AES_IV", "1234567890abcdef");