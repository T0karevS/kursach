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
    </div>
</header>

<div class="newspage-block">
    <?php
    require_once 'connect/getNews.php';
    if (isset($_GET['id']))
    {
        $news = getNews2();
    }
    elseif( isset($_GET['category']))
    {
        $news = getNews5();
    }
    elseif (isset($_GET['search']))
    {
        $news= getNews6();
    }
    foreach (array_reverse($news) as $post ):
        ?>
        <div class="div__news">
               <div class="news__stuff">
                   <h2 class="search__text"><?= $post['title']?></h2>
                   <p class="search__text2" >Автор: <?= $post['author'] ?></p>
                   <p class="search__text2" ><?= $post['text'] ?></p>
               </div>
                    <img class="news-img" src="<?= $post['picture']?>" >
           </div>
    <?php
    endforeach;
    ?>
</div>
</div>
</body>
</html>
