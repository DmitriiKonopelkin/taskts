<?php

$host='localhost';
$user='root';
$pass='root';
$db_name='student';

$conn= new mysqli($host, $user, $pass, $db_name);

if($conn->connect_error) {
    die("ошибка подключения к БД");
}


?>