<?php
function getNews()
{
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $statement = $pdo->prepare("SELECT * FROM news where `status`='A'");
    $statement->execute();
    $news = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
function getNews2()
{
    $id = $_GET['id'];
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $statement = $pdo->prepare("SELECT * FROM news where `id`='$id'");
    $statement->execute();
    $news = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
function getNews3()
{
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $statement = $pdo->prepare("SELECT * FROM news where `status`='C'");
    $statement->execute();
    $news = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
function getNews4()
{
    $nick = $_SESSION['user']['nickname'];
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $statement = $pdo->prepare("SELECT * FROM news where `author`='$nick'");
    $statement->execute();
    $news = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
function getNews5()
{
    $category = $_GET['category'];
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $statement = $pdo->prepare("SELECT * FROM news where `category`='$category' && `status`='A'");
    $statement->execute();
    $news = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
function getNews6()
{
    $search = $_GET['search'];
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $statement = $pdo->prepare("SELECT * FROM news where title LIKE '%" . $search . "%' OR text LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%'");
    $statement->execute();
    $news = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}