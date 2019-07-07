<?php
require 'config.php';

if (isset($_POST['add_category'])) {
    $cat = strip_tags(addslashes($_POST['add_cat']));
    if (mysqli_query($connection, "INSERT INTO `category`(`parent_id`, `name`) VALUES (0,'" . $cat . "')") === TRUE) {
        printf("Категория добавлена.\n");
        header("Location: ../category.php");
    } else {
        printf("Возникла ошибка при добавлении новой категории в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['add_sub_category'])) {
    $id = strip_tags(addslashes($_POST['add_sub_id']));
    $cat = strip_tags(addslashes($_POST['add_sub_cat']));
    if (mysqli_query($connection, "INSERT INTO `category`(`parent_id`, `name`) VALUES ('" . $id . "','" . $cat . "')") === TRUE) {
        printf("Категория добавлена.\n");
        header("Location: ../category.php");
    } else {
        printf("Возникла ошибка при добавлении новой категории в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['edit_category'])) {
    $id = strip_tags(addslashes($_POST['edit_id']));
    $cat = strip_tags(addslashes($_POST['edit_cat']));
    if (mysqli_query($connection, "UPDATE `category` SET `name`='" . $cat . "' WHERE id = " . $id . "") === TRUE) {
        printf("Категория изменена.\n");
        header("Location: ../category.php");
    } else {
        printf("Возникла ошибка при изменении категории в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['delete_category'])) {
    $_id = strip_tags(addslashes($_POST['del_categiry_id']));
    include_once 'get_children.php';
    $id = get_children($connection, $_id);
    $query = "DELETE FROM `category` WHERE id = " . $_id . "";

    foreach ($id as $item) {
        $query = $query . " OR id = " . $item . " ";
    }
    var_dump($query);
    if (mysqli_query($connection, $query) === TRUE) {
        printf("Категория удалена.\n");
        header("Location: ../category.php");
    } else {
        printf("Возникла ошибка при удалении категории в БД\n" . mysqli_error($connection));
    }
    exit;
}