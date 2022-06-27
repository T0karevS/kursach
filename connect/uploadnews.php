<?php
session_start();
require_once 'uploadPicture.php';
$path = addPicture('ArticlePics/');
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $sql = "INSERT INTO `news`( `title`, `picture`,  `text`, `author`, `status`, `category`) VALUES ( :title, :picture, :text, :author, :status, :category)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['title' => $_POST['title'], 'picture' => $path, 'text' => $_POST['text'], 'author' => $_SESSION['user']['nickname'], 'status'=>'C', 'category'=>$_POST['category']]);
    $_SESSION['message1'] = 'статья загружена успешно!';
    header('location: ../newArticle.php');
