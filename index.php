<?php

require "db.php";


if($_SERVER['REQUEST_METHOD']== 'POST') {
    $name= $_POST['name'];
    $surname= $_POST['surname'];
    $work= $_POST['work'];
}



?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма заполнения данных</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <form action='#' method='post'>
        <div>
            <input type='text' name='name' placeholder='имя пользователя'/>
        </div>
        <div>
            <input type='text' name='surname' placeholder='фамилия'/>
        </div>
        <div>
            <select name='work'>
                <option>анализ бизнес- процессов</option>
                <option>написание документации</option>
                <option>подготовка пользовательского сценария</option>
            </select>
        </div>
        <input type='submit' value='Отправить'/>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>