<?php
require 'config.php';
if (isset($_POST['add_publish'])) {
    $name = strip_tags(addslashes($_POST['add_name']));
    $address = strip_tags(addslashes($_POST['add_address']));
    $phone = strip_tags(addslashes($_POST['add_phone']));
    if (mysqli_query($connection, "INSERT INTO `publishing`(`name`, `address`, `phone`) VALUES ('" . $name . "','" . $address . "','" . $phone . "')") === TRUE) {
        printf("Издательство добавлено.\n");
        header("Location: ../publishing.php");
    } else {
        printf("Возникла ошибка при добавлении нового издательства в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['edit_publish'])) {
    $name = strip_tags(addslashes($_POST['edit_name']));
    $address = strip_tags(addslashes($_POST['edit_address']));
    $phone = strip_tags(addslashes($_POST['edit_phone']));
    if (mysqli_query($connection, "UPDATE `publishing` SET `name`='" . $name . "',`address`='" . $address . "',`phone`='" . $phone . "' WHERE id = " . $_POST['edit_id'] . "") === TRUE) {
        printf("Издательство изменено.\n");
        header("Location: ../publishing.php");
    } else {
        printf("Возникла ошибка при изменении издательства в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['delete_publish'])) {
    $id = strip_tags(addslashes($_POST['del_publish_id']));
    if (mysqli_query($connection, "DELETE FROM `publishing` WHERE id = " . $id . "") === TRUE) {
        printf("Издательство удалено.\n");
        header("Location: ../publishing.php");
    } else {
        printf("Возникла ошибка при удалении издательства в БД\n" . mysqli_error($connection));
    }
    exit;
}