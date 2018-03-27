<?php
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 30);
session_start();
//Our MySQL user account.
define('MYSQL_USER', 'qh-beer');

//Our MySQL password.
define('MYSQL_PASSWORD', 'pass');

//The server that MySQL is located on.
define('MYSQL_HOST', '192.168.10.158:3306');

//The name of our database.
define('MYSQL_DATABASE', 'qh_beer_shop');

/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 */
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
    MYSQL_USER, //Username
    MYSQL_PASSWORD, //Password
    $pdoOptions //Options
);

