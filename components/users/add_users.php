<?php
include '../conn.php'; 
session_start(); 
if (isset($_POST['registration'])) {
    if (!preg_match('/^[а-яА-Я]+$/u', $_POST['username'])) {
        $_SESSION['username_error'] = 'Имя пользователя может содержать только русские буквы!';
        header('Location: ../../registration.php');
    }
    if (!preg_match('/^(?=.*\d)(?=.*[a-zA-Z]).{8,}$/', $_POST['password'])) {
        $_SESSION['password_error'] = 'Пароль должен быть не менее 8 символов и содержать хотя бы одну цифру и одну букву!';
        header('Location: ../../registration.php');
    }
    $password = md5($_POST['password']);
    $matchChecking = $link->query("SELECT `email` FROM `users` WHERE `email` = '{$_POST['email']}'");
    if (mysqli_num_rows($matchChecking) > 0) {
        $_SESSION['email_error'] = 'Введённый email занят';
        header('Location: ../../registration.php');
    } else {
        mysqli_query($link, "INSERT INTO `users`(`username`, `email`, `password`) 
        VALUES (
            '{$_POST['username']}',
            '{$_POST['email']}',
            '$password')");
        header('Location: ../../index.php');
    }
}
