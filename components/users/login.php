<?php
include '../conn.php';
session_start();
if (isset($_POST['authorization'])) {
    $password = md5($_POST['password']);
    $result = $link->query("SELECT * FROM `users` WHERE `email` = '{$_POST['email']}' AND `password` = '$password'");
    if ($result->num_rows > 0) {
        foreach ($result as $key => $value) {
            $_SESSION['users']['id'] = $value['id'];
            header("Location: ../../todo.php");
            exit;
        }
    } else {
        $_SESSION['error'] = 'Неверный логин или пароль!';
        header('Location: ../../authorization.php');
    }
}
