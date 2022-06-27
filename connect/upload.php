<?php
session_start();
require_once 'connect.php';
require_once 'uploadPicture.php';
$path = addPicture('pfp/');
$id = $_SESSION['user']['id'];
mysqli_query($connect, "UPDATE `users` SET `picture`='$path' WHERE `id`='$id'");
$_SESSION['user']['picture'] = $path;
header('location: ../profile.php');

