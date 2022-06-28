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
    <link href="css/stil.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="header">
        <div class="logo_div">
            <a class="image__a" href="index.php">
                <img src="img/svg/logo.svg" class="logo">
            </a>
        </div>
        <form method="get" class="menu" action="showNews.php">
            <input type="hidden" name="category" value="Web">
            <input type="submit" value="Web">
        </form>
        <form method="get" class="menu" action="showNews.php">
            <input type="hidden" name="category" value="Tech">
            <input type="submit" value="Технологии">
        </form>
        <form method="get" class="menu" action="showNews.php">
            <input type="hidden" name="category" value="Design">
            <input type="submit" value="Дизайн">
        </form>
        <form method="get" class="menu" action="showNews.php">
            <input type="hidden" name="category" value="Managment">
            <input type="submit" value="Менеджмент">
        </form>
        <form method="get" class="menu" action="showNews.php">
            <input type="hidden" name="category" value="other">
            <input type="submit" value="Другое">
        </form>
        <form method="get" action="showNews.php" class="search">
            <input type="text" name="search" class="header__search">
            <button type="submit" class="header__btn"></button>
            <div class="header__reg">
                <?php
                if (isset($_SESSION['user']))
                {
                    echo '<a href="profile.php"><img src="img/svg/user.svg" class="user_pic"></a>
                            <p><a href="connect/logout.php">выйти</a></p>';
                }
                else
                {
                    echo '<a href="authorisation.php"><img src="img/svg/user.svg" class="user_pic"></a>
                      <p><a href="authorisation.php">войти</a></p>';
                }
                ?>
            </div>
        </form>
    </div>
</header>
<div class="form-reg" id="myForm">
    <form action="connect/uploadnews.php" class="form-container-news" method="post" enctype="multipart/form-data">
        <h2 class="news-h">Добавить статью</h2>
        <input type="text" class="news__title" name="title" placeholder="заголовок статьи">
        <input type="file" class="news__input" name="picture">
        <textarea type="text" class="news__text" name="text" placeholder="Текст статьи"></textarea>
        <p><select size="1"  name="category">
                <option disabled>Категории</option>
                <option value="Web">Web</option>
                <option value="Tech">Технологии</option>
                <option value="Design">Дизайн</option>
                <option value="Managment">Менеджмент</option>
                <option value="other">Другое</option>
            </select></p>
        <p>
        <button type="submit" class="news-btn">Разместить статью</button>
        <?php
        if(isset($_SESSION['message1'])){
        echo '<p class="msg">' . $_SESSION['message1'] . '</p>';
        unset($_SESSION['message1']);
        }
        ?>
    </form>
</div>

</body>
</html>
