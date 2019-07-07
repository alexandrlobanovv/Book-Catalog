<?php
require 'config.php';
if (isset($_POST['add_author'])){
    $author = strip_tags(addslashes($_POST['full_name']));
    if (mysqli_query($connection, "INSERT INTO `author`(`full_name`) VALUES ('".$author."')") === TRUE) {
        printf("Автор добавлен.\n");
        header("Location: ../author.php");
    }else{
        printf("Возникла ошибка при добавлении нового автора в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['rename_author'])){
    $author = strip_tags(addslashes($_POST['edit_full_name']));
    $id = strip_tags(addslashes($_POST['edit_id']));
    if (mysqli_query($connection, "UPDATE `author` SET `full_name`='".$author."' WHERE id = ".$id."") === TRUE) {
        printf("Автор изменен.\n");
        header("Location: ../author.php");
    }else{
        printf("Возникла ошибка при изменении автора в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['delete_author'])){
    $id = strip_tags(addslashes($_POST['del_author_id']));
    if (mysqli_query($connection, "DELETE FROM `author` WHERE id = ".$id."") === TRUE) {
        printf("Автор удален.\n");
        header("Location: ../author.php");
    }else{
        printf("Возникла ошибка при удалении автора в БД\n".mysqli_error($connection));
    }
    exit;
}