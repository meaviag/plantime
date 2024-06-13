<?php
include '../conn.php';
session_start();

if (isset($_POST['add_comment']) && isset($_POST['task_id']) && isset($_SESSION['users']['id'])) {
    $task_id = $_POST['task_id'];
    $user_id = $_SESSION['users']['id'];
    $comment = $_POST['comment'];

    try {
        // Подготовка запроса
        $stmt = $link->prepare("INSERT INTO comments (task_id, user_id, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $task_id, $user_id, $comment);

        // Выполнение запроса
        if ($stmt->execute()) {
            header('Location: ../../todo.php');
            exit;
        } else {
            echo "Error inserting comment";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
