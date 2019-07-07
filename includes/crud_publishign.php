<?php
require 'config.php';
if (isset($_POST['add_publish'])){
    if (mysqli_query($connection, "INSERT INTO `publishing`(`name`, `address`, `phone`) VALUES ('".$_POST['add_name']."','".$_POST['add_address']."','".$_POST['add_phone']."')") === TRUE) {
        printf("Издательство добавлено.\n");
        header("Location: ../publishing.php");
    }else{
        printf("Возникла ошибка при добавлении нового издательства в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['edit_publish'])){
    if (mysqli_query($connection, "UPDATE `publishing` SET `name`='".$_POST['edit_name']."',`address`='".$_POST['edit_address']."',`phone`='".$_POST['edit_phone']."' WHERE id = ".$_POST['edit_id']."") === TRUE) {
        printf("Издательство изменено.\n");
        header("Location: ../publishing.php");
    }else{
        printf("Возникла ошибка при изменении издательства в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['delete_publish'])){
    if (mysqli_query($connection, "DELETE FROM `publishing` WHERE id = ".$_POST['del_publish_id']."") === TRUE) {
        printf("Издательство удалено.\n");
        header("Location: ../publishing.php");
    }else{
        printf("Возникла ошибка при удалении издательства в БД\n".mysqli_error($connection));
    }
    exit;
}