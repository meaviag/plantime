<?php
include '../conn.php';
session_start();
if (isset($_SESSION['users']['id']) && isset($_POST['edit'])) {
    $userId = $_SESSION['users']['id'];
    if (isset($_POST['task']) && isset($_GET['id'])) {
        $task = $_POST['task'];
        $task_id = $_GET['id'];

        $query = $link->query("SELECT `id` FROM `task` WHERE `id` = '$task_id' AND `id_user` = '$userId'");
        if ($query->num_rows > 0) {
            $link->query("UPDATE `task` SET `task` = '$task' WHERE `id` = '$task_id'");
            header('Location: ../../todo.php');
            exit();
        } else {
            echo "Ошибка: Задача с указанным ID не найдена или не принадлежит текущему пользователю.";
        }
    } else {
        echo "Ошибка: Не удалось получить данные для редактирования задачи.";
    }
} else {
    echo "Ошибка: Недостаточно данных для выполнения запроса или неавторизованный пользователь.";
}