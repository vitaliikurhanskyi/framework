<?php

/* Подключает lib\Dev.php */
require 'lib/Dev.php';

/* Подключаем класс Router */
use core\Router;
use lib\Db;

/* Функция автозагрузки*/
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    // echo $path;
    if (file_exists($path)) {
    	require $path;
    }
});

/* старт сесий */
session_start();

$router = new Router;
$router->run();
$db = new Db;





























?>