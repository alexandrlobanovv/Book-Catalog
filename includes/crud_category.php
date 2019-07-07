<?php
require 'config.php';

if (isset($_POST['add_category'])){
    if (mysqli_query($connection, "INSERT INTO `category`(`parent_id`, `name`) VALUES (0,'".$_POST['add_cat']."')") === TRUE) {
        printf("Категория добавлена.\n");
        header("Location: ../category.php");
    }else{
        printf("Возникла ошибка при добавлении новой категории в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['add_sub_category'])){

    if (mysqli_query($connection, "INSERT INTO `category`(`parent_id`, `name`) VALUES ('".$_POST['add_sub_id']."','".$_POST['add_sub_cat']."')") === TRUE) {
        printf("Категория добавлена.\n");
        header("Location: ../category.php");
    }else{
        printf("Возникла ошибка при добавлении новой категории в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['edit_category'])){

    if (mysqli_query($connection, "UPDATE `category` SET `name`='".$_POST['edit_cat']."' WHERE id = ".$_POST['edit_id']."") === TRUE) {
        printf("Категория изменена.\n");
        header("Location: ../category.php");
    }else{
        printf("Возникла ошибка при изменении категории в БД\n".mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['delete_category'])){
    include_once 'get_children.php';
    $id = get_children($connection,$_POST['del_categiry_id']);
    $query = "DELETE FROM `category` WHERE id = ".$_POST['del_categiry_id']."";

    foreach ($id as $item) {
        $query = $query . " OR id = " . $item . " ";
    }
    var_dump($query);
    if (mysqli_query($connection, $query) === TRUE) {
        printf("Категория удалена.\n");
        header("Location: ../category.php");
    }else{
        printf("Возникла ошибка при удалении категории в БД\n".mysqli_error($connection));
    }
    exit;
}