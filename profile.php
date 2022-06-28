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
<section>
    <div class="profile__info">
        <div class="image__info">
            <img class="pfp" src="<?=$_SESSION['user']['picture']?>">
            <form action="connect/upload.php" class="form-pfp" method="post" enctype="multipart/form-data">
                <input type="file" class="pfp-update" name="picture">
                <button type="submit" class="pfp-btn">Заменить фото</button>
            </form>
        </div>
        <div class="pf-text-main">
            <div class="pf-text1">
                <h2 class="name-1"> username </h2>
                <h2 class="name-1"> email</h2>
                <h2 class="name-1"> роль</h2>
            </div>
            <div class="pf-text">
                <div class="pf-text2">
                    <h2 class="name-1"> <?= $_SESSION['user']['nickname'] ?></h2>
                    <h2 class="name-1"> <?= $_SESSION['user']['email'] ?></h2>
                    <?php
                    if($_SESSION['user']['status']=='S'){
                        echo '<h2 class="name-1">Пользователь</h2>';
                    }
                    elseif( $_SESSION['user']['status']=='J')
                    {
                        echo '<h2 class="name-1">Автор статей</h2>';
                    }
                    elseif( $_SESSION['user']['status']=='A')
                    {
                        echo '<h2 class="name-1">Администратор</h2>';
                    }
                    ?>

                </div>
            </div>
            <div class="action-form">
                <?php
                if($_SESSION['user']['status']=='S'){

                }
                elseif( $_SESSION['user']['status']=='J')
                {
                    echo '<a class="news-a" href="newArticle.php">Создать новую статью</a>';
                }
                elseif( $_SESSION['user']['status']=='A')
                {
                    echo '<a class="news-a" href="newArticle.php">Создать новую статью</a>';
                    echo '<a href="adminpage.php" class="news-a">Cтатьи на рассмотрении</a>';
                }
                ?>
            </div>
        </div>
    </div>
    </section>
    <?php
    if( $_SESSION['user']['status']=='A' or $_SESSION['user']['status']=='J' ) {
        echo '<p class="yours"> Ваши статьи</p>
    <div class="news-block">';
    }
        require_once 'connect/getNews.php';
        $news = getNews4();
        foreach (array_reverse($news) as $post ):
            ?>
            <form method="GET" target="_blank"   class="form__news" action="newspage.php">
                <input type="hidden" name="id" value="<?=$post['id']?>">
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
                </div>
            </form>
    <?php
    endforeach;
    ?>

</body>
</html>
