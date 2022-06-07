<?php

$host = "localhost";
$database = "data_for_website";
$user = "root";
$password = "";

$connect = mysqli_connect($host, $user, $password, $database);


if(!$connect) {
    die('Ошибка к подключению базе данных!');
}

?>