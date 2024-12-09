<?php
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$id) {
    header('Location: index.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["user"]) && !empty($_POST["work_type"])) {
        $user = $conn->real_escape_string($_POST['user']);
        $work_type = $conn->real_escape_string($_POST['work_type']);

        $query = "UPDATE work SET user='$user', work_type='$work_type' WHERE id='$id'";
        if ($conn->query($query) === TRUE) {
            header('Location: index.php');
            exit;
        } else {
            echo '<div class="alert alert-warning mt-3">Ошибка обновления: ' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning mt-3">Заполните все поля!</div>';
    }
}


$query = "SELECT w.user, wl.worktype FROM work w JOIN worklist wl ON w.work_type = wl.id WHERE w.id = '$id'";
$result = $conn->query($query);
$record = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">
    <h2>Редактирование</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
        <div class="form-group">
            <label for="user">Имя и фамилия:</label>
            <input type="text" class="form-control" id="user" name="user" value="<?php echo $record['user']; ?>" required>
        </div>
        <div class="form-group">
            <label for="work_type">Тип работы:</label>
            <select class="form-control" id="work_type" name="work_type" required>
                <?php
                    $result = $conn->query("SELECT * FROM worklist");
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['worktype'] === $record['worktype']) ? ' selected' : '';
                        echo "<option value='" . $row['id'] . "'" . $selected . ">" . $row['worktype'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Обновить</button>
    </form>

    <a href="index.php" class="btn btn-link mt-3">Назад</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
