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
</body>
</html>