<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stil.css" type="text/css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="header">
        <div class="logo_div">
            <a href="index.php"><img src="img/svg/logo.svg" class="logo"></a>
        </div>
    </div>
</header>
<div class="form-reg" id="myForm">
    <form action="connect/login.php" class="form-container" method="post" enctype="multipart/form-data">
        <h1>Авторизация</h1>
        <div class="registration__item">
            <input type="text" name="email" class="registration__control" placeholder="Ваш email">
        </div>
        <div class="registration__item">
            <input type="password" name="password" class="registration__control" placeholder="Введите свой пароль">
        </div>
        <button type="submit" class="btn">Войти</button>
        <a href="registration.php" class="registration__text">Еще нет аккаунта?</a>
    </form>

</body>
</html>
