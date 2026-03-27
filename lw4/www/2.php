<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Число в слово</title>
</head>
<body>

<form method="POST">
    <input type="text" name="digit" placeholder="Введите цифру от 0 до 9">
    <input type="submit" value="Преобразовать">
</form>

<?php
function digitToWord($digit) {
    switch ($digit) {
        case 0:
            return "Ноль";
        case 1:
            return "Один";
        case 2:
            return "Два";
        case 3:
            return "Три";
        case 4:
            return "Четыре";
        case 5:
            return "Пять";
        case 6:
            return "Шесть";
        case 7:
            return "Семь";
        case 8:
            return "Восемь";
        case 9:
            return "Девять";
        default:
            return "";
    }
}

if (isset($_POST['digit'])) {
    $digit = $_POST['digit'];
    echo digitToWord($digit);
}
?>

</body>
</html>