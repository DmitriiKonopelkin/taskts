<?php

$host='localhost';
$user='test20245';
$pass='test20245';
$db_name='student';

$conn= new mysqli($host, $user, $pass, $db_name);

if($conn->connect_error) {
    die("ошибка подключения к БД");
}


?>