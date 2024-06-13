<?php
include '../conn.php';
if ($_GET['id']) {
	$task_id = $_GET['id'];
	$link->query("DELETE FROM `task` WHERE `id` = $task_id") or die(mysqli_errno($link));
	header('location: ../../todo.php');
}
