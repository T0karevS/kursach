<?php
    require_once '../connect/getNews.php';
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
            <div class="dve_knopki">
                <button type="submit" class="button1" name="<?= $post['id']; ?>">Забанить cтатью</button>
                <button type="submit" class="button1" name="<?=  'a'.$post['id']; ?>">Выложить статью</button>
            </div>

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
                    var_dump($_POST[$id]);
                    ?>
        </div>
        </div>
    <?php
    endforeach;
    ?>