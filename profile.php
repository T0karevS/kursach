<?php
session_start();
if (!$_SESSION['user'])
{
    header('location: registration.php');
}
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
            <img src="img/svg/user.svg" class="user_pic">
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
<section>
    <div class="profile__info">
        <form action="connect/upload.php" class="form-container" method="post" enctype="multipart/form-data">
        <img src="<?=$_SESSION['user']['pic']?>">
        <input type="file" name="picture">
            <button type="submit">сменить фото профиля</button>
        </form>
        <h2 class="name-1"> <?= $_SESSION['user']['nickname'] ?></h2>
        <h2 class="name-1"> <?= $_SESSION['user']['email'] ?></h2>
    </div>
</section>
</body>
</html>
