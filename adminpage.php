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
    <link rel="stylesheet" href="css/stil.css" type="text/css">
    <link rel="stylesheet" href="css/index.css" type="text/css">
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


<form method="post" class="form" enctype="multipart/form-data">
<div class="news-block">
    <?php
    require_once 'connect/getNews.php';
    $news = getNews3();
    foreach (array_reverse($news) as $post ):
        ?>
    <form method="post"  enctype="multipart/form-data">
    <div class="block__news">
        <div class="news__info">
            <button class="button__news" type="submit" >
                <h2 class="post_title"><?= $post['title']?></h2>
            </button>
            <p class="post__category">Категория: <?= $post['category']?></p>
            <p class="post__text" ><?= $post['text'] ?></p>
            <p class="post__author" > <?= $post['author'] ?> </p>
            <p class="post__time"><?= $post['vremya']?></p>
        </div>
        <img class="news-img" src="<?= $post['picture']?>">

                <?php

                $id=$post['id'];
                $id2='a'.$id;
                if( isset($_POST[ $id ]) )
                {
                    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
                    $sql = "DELETE from `news` WHERE `id`='$id' ";
                    $statement = $pdo->prepare($sql);
                    $statement->execute();
                }
                if( isset($_POST[ $id2 ]) )
                {
                    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
                    $sql = "UPDATE `news` SET `status`='A' WHERE `id`='$id' ";
                    $statement = $pdo->prepare($sql);
                    $statement->execute();
                }
                ?>
        <div class="dve_knopki">
            <button type="submit" class="button1" name="<?= $post['id']; ?>">Забанить cтатью</button>
            <button type="submit" class="button1" name="<?=  'a'.$post['id']; ?>">Выложить статью</button>
        </div>
    </div>

    <?php
    endforeach;
    ?>
</div>

</form>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script src="js/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</body>
</html>
