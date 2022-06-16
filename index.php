<?php
session_start();
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
        <div class="menu">
            <p class="category">Категории</p>
        </div>
        <div class="menu">
            <p>Недавние</p>
        </div>
        <div class="menu">
            <p>О нас</p>
        </div>
        <div class="search">
                <input type="text" class="header__search">
                <button class="header__btn">
                    </button>
        </div>
        <div class="header__reg">
            <a href="profile.php"><img src="img/svg/user.svg" class="user_pic"></a>
            <?php
            if (isset($_SESSION['user']))
                {
                    echo "<p><a href='connect/logout.php'>выйти</a></p>";
                }
            else
            {
                echo '<p><a onclick="openForm()">войти</a></p>';
            }
            ?>
        </div>
</div>
</header>
<div class="form-popup" id="myForm2">
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
        <button type="button" class="btn cancel" onclick="closeForm()">Закрыть</button>

        <a onclick="openForm()" class="registration__text">Есть аккаунт?</a>
        <?php
        if(isset($_SESSION['message'])){
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</div>
    <div class="form-popup" id="myForm">
        <form action="connect/login.php" class="form-container" method="post" enctype="multipart/form-data">
            <h1>Авторизация</h1>
            <div class="registration__item">
                <input type="text" name="email" class="registration__control" placeholder="Ваш email">
            </div>
            <div class="registration__item">
                <input type="password" name="password" class="registration__control" placeholder="Введите свой пароль">
            </div>
            <button type="submit" class="btn">Войти</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Закрыть</button>
            <a onclick="openForm2()" class="registration__text">Еще нет аккаунта?</a>
        </form>
</div>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "flex";
        document.getElementById("myForm2").style.display = "none";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("myForm2").style.display = "none";
    }
    function openForm2() {
        document.getElementById("myForm2").style.display = "flex";
        document.getElementById("myForm").style.display = "none";

    }
</script>
</body>
</html>
