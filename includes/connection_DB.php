<?php
$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['user'],
    $config['db']['pass'],
    $config['db']['database']
);
mysqli_query($connection, "SET NAMES utf8");
if ($connection == false){
    echo 'Нет подключения к БД';
    echo mysqli_connect_error();
    exit();
}
