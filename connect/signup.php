<?php

session_start();
require_once 'connect.php';
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$password = MD5($_POST['password']);
$password_c = MD5($_POST['password_c']);
$status = 'S';
if ($_POST['nickname'] == 'admin' && $_POST['email'] == 'admin@gmail.com') {
    $status = "A";
}
if ($password === $password_c) {

    mysqli_query($connect, "INSERT INTO users ( nickname, email, password, status, picture) VALUES ('$nickname', '$email', '$password','$status', null )");
    $_SESSION['message1'] = 'Регистрация прошла успешно! ';
    header('Location: ../authorisation.php');
} else {
    $_SESSION['message'] = 'Пароли не совпадают!';
    header('Location: ../registration.php');
}