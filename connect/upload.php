<?php
session_start();
function Upload()
{
    $path = 'uploads/' . uniqid() . "." . pathinfo($_FILES['picture'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['picture']['tmp_name'], $path);
    return $path;
}

function addPfp($title, $path, $content)
{
    $id = $_SESSION['user']['id'];
    $pdo = new PDO("mysql:host = localhost;dbname=news", "root", "root");
    $sql = "UPDATE `users` SET `pic`=`$path` WHERE `id`=`$id`";
    $statement = $pdo->prepare($sql);
    $statement->execute(['pic' => $path, 'content' => $_POST['content'], 'title' => $_POST['title'], 'author' => $_SESSION['user']['nickname'], 'status' => 0]);
}
