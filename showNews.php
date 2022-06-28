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
            <button type="submit" class="header__btn">
            </button>
        </form>
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
<?php
if( isset($_GET['category']))
{
    $text = $_GET['category'];
    echo '<div class="where_are_we"><h1>Новости категории '.$text.'</h1></div>';
}
elseif (isset($_GET['search']))
{
    $text = $_GET['search'];
    echo '<div class="where_are_we"><h1>Новости по запросу '.$text.'</h1></div>';
}
?>

<div class="news-block">
    <?php
    require_once 'connect/getNews.php';
    if( isset($_GET['category']))
    {
        $news = getNews5();
    }
    elseif (isset($_GET['search']))
    {
        $news= getNews6();
    }
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
