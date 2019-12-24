<?php

/* Вывод ошибок */
ini_set('display_errors', 1);

/* Отчет об ошибках */
error_reporting(E_ALL);

/* Функция для дебага */
function debug($str) {
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
	exit;
}

?>