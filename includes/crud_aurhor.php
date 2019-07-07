<?php
require 'config.php';
if (isset($_POST['add_author'])){
    if (mysqli_query($connection, "INSERT INTO `author`(`full_name`) VALUES ('".$_POST['full_name']."')") === TRUE) {
        printf("Автор добавлен.\n");
        header("Location: ../author.php");
    }else{
        printf("Возникла ошибка при добавлении нового автора в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['rename_author'])){
    if (mysqli_query($connection, "UPDATE `author` SET `full_name`='".$_POST['edit_full_name']."' WHERE id = ".$_POST['edit_id']."") === TRUE) {
        printf("Автор изменен.\n");
        header("Location: ../author.php");
    }else{
        printf("Возникла ошибка при изменении автора в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['delete_author'])){
    if (mysqli_query($connection, "DELETE FROM `author` WHERE id = ".$_POST['del_author_id']."") === TRUE) {
        printf("Автор удален.\n");
        header("Location: ../author.php");
    }else{
        printf("Возникла ошибка при удалении автора в БД\n".mysqli_error($connection));
    }
    exit;
}