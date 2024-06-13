<?php
include '../conn.php';
session_start();
$id = $_SESSION['users']['id'];
if (isset($_POST['add'])) {
	if ($_POST['task'] != "") {
		$task = $_POST['task'];
		$status = "Не выполнено";
		$ins = $link->query("INSERT INTO `task` (`id_user`, `task`, `status`) 
			VALUES (
				'$id',
				'$task',
				'$status')");
		header('location: ../../todo.php');
	}
	if (!isset($_SESSION['users']['id'])) {
		header("Location: index.php");
	}
}
