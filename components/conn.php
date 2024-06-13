<?php
session_start();
$link = new mysqli("localhost", "root", "", "db_task");

if ($link->connect_error) {
	die("Ошибка подключения: " . $link->connect_error);
}
