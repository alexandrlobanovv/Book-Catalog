<?php
require 'config.php';

$upload_dir = '../images/upload/';


if (isset($_POST['add_book'])) {
    if (mysqli_query($connection, "INSERT INTO `books`(`title`, `author_id`, `issued`, `publishing_id`, `category_id`) VALUES ('" . $_POST['add_title'] . "', " . $_POST['add_author'] . "," . $_POST['add_issue'] . "," . $_POST['add_publishing'] . "," . $_POST['add_category'] . ")") === TRUE) {
        printf("Книга добавлена.\n");
        header("Location: ../book.php");
    } else {
        printf("Возникла ошибка при добавлении новой Книги в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['edit_book'])) {
    if (mysqli_query($connection, "UPDATE `books` SET `title`='" . $_POST['edit_title'] . "',`author_id`=" . $_POST['edit_author'] . ",`issued`=" . $_POST['edit_issue'] . ",`publishing_id`=" . $_POST['edit_publishing'] . ",`category_id`=" . $_POST['edit_category'] . " WHERE id = " . $_POST['edit_id'] . "") === TRUE) {
        printf("Книга изменена.\n");
        header("Location: ../book.php");
    } else {
        printf("Возникла ошибка при изменении Книги в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['delete_book'])) {
    if (mysqli_query($connection, "DELETE FROM `books` WHERE id = " . $_POST['del_id']) === TRUE) {
        printf("Книга удалена.\n");
        header("Location: ../book.php");
    } else {
        printf("Возникла ошибка при удалении Книги в БД\n" . mysqli_error($connection));
    }
    exit;
}

if (isset($_POST['add_img'])) {
    var_dump($_FILES);
    if ($_FILES['upload_file']) {
        $avatar_name = $_FILES["upload_file"]["name"];
        $avatar_tmp_name = $_FILES["upload_file"]["tmp_name"];
        $error = $_FILES["upload_file"]["error"];
        var_dump($error);
        $random_name = rand(1000, 1000000) . "-" . $avatar_name;
        $upload_name = $upload_dir . strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);

        if (move_uploaded_file($avatar_tmp_name, $upload_name)) {
            if (mysqli_query($connection, "INSERT INTO `image`(`book_id`, `image_path`) VALUES ( " . $_POST['id'] . ",'" . substr($upload_name, 3) . "')") === TRUE) {
                printf("Фото загружено.\n");
                header("Location: ../book.php");
            } else {
                printf("Возникла ошибка при загрузке фото\n" . mysqli_error($connection));
            }
        }
    }


    exit;
}