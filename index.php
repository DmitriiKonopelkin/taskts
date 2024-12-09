<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Выбор типа работы</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">
    <h2>Заполните данные</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
        <div class="form-group">
            <label for="user">Имя и фамилия:</label>
            <input type="text" class="form-control" id="user" name="user" required>
        </div>
        <div class="form-group">
            <label for="work_type">Тип работы:</label>
            <select class="form-control" id="work_type" name="work_type" required>
                <?php
                    include 'db.php';
                    $result = $conn->query("SELECT * FROM worklist");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['worktype'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Отправить</button>
    </form>

    <?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["user"]) && !empty($_POST["work_type"])) {
            $user = $conn->real_escape_string($_POST['user']);
            $work_type = $conn->real_escape_string($_POST['work_type']);

            $query = "INSERT INTO work (user, work_type) VALUES ('$user', '$work_type')";
            if ($conn->query($query) === TRUE) {
                echo '<div class="alert alert-success mt-3">Данные успешно добавлены в систему!</div>';
            } else {
                echo '<div class="alert alert-warning mt-3">Ошибка записи данных: ' . $conn->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-warning mt-3">Заполните все поля!</div>';
        }
    }

    $query = "SELECT w.id, w.user, wl.worktype, w.action_date FROM work w JOIN worklist wl ON w.work_type = wl.id ORDER BY w.id DESC";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<table class="table mt-3">';
        echo '<thead><tr><th scope="col">ID</th><th scope="col">Пользователь</th><th scope="col">Вид работы</th><th scope="col">Дата</th><th scope="col"></th></tr></thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['user'] . '</td>';
            echo '<td>' . $row['worktype'] . '</td>';
            echo '<td>' . $row['action_date'] . '</td>';
            echo '<td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-sm btn-info">Редактировать</a></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="alert alert-info mt-3">Нет записей для отображения.</div>';
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
