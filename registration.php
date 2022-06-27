<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
<div class="form-reg" id="myForm2">
    <form action="connect/signup.php" class="form-container" method="post" enctype="multipart/form-data">
        <h1>Регистрация</h1>
        <div class="registration__item">
            <input type="text" name="nickname" class="registration__control" placeholder="Ваш ник">
        </div>
        <div class="registration__item">
            <input type="email" name="email" class="registration__control" placeholder="Введите свой Email">
        </div>
        <div class="registration__item">
            <input type="password" name="password" class="registration__control" placeholder="Введите свой пароль">
        </div>
        <div class="registration__item">
            <input type="password" name="password_c" class="registration__control" placeholder="Подтвердите свой пароль">
        </div>
        <button type="submit" class="btn">Зарегистрироваться</button>
        <a href="authorisation.php" class="registration__text">Есть аккаунт?</a>
        <?php
        if(isset($_SESSION['message'])){
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</div>
</body>
</html>
