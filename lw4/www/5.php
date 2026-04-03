<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Факториал</title>
</head>
<body>

<form method="POST">
    <input type="text" name="number" placeholder="Введите число">
    <input type="submit" value="Вычислить">
</form>

<?php
function factorial($n) {
    if ($n == 0 || $n == 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

if (isset($_POST['number'])) {
    $n = (int)$_POST['number'];
    echo factorial($n);
}
?>
</body>
</html>