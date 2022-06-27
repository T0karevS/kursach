<?php
function addPicture($folder)
{
    $path = '../uploads/' .$folder. uniqid() . "." . pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['picture']['tmp_name'], $path);
    return $path;
}