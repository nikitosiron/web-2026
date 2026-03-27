<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Знак зодиака</title>
</head>

<body>

<form method="POST">
    <input type="text" name="date" placeholder="Введите дату">
    <input type="submit" value="Узнать знак">
</form>

<?php
function getZodiac($day, $month)
{
    if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        return "Водолей";
    }
    if (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
        return "Рыбы";
    }
    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        return "Овен";
    }
    if (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        return "Телец";
    }
    if (($month == 5 && $day >= 21) || ($month == 6 && $day <= 21)) {
        return "Близнецы";
    }
    if (($month == 6 && $day >= 22) || ($month == 7 && $day <= 22)) {
        return "Рак";
    }
    if (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        return "Лев";
    }
    if (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        return "Дева";
    }
    if (($month == 9 && $day >= 23) || ($month == 10 && $day <= 23)) {
        return "Весы";
    }
    if (($month == 10 && $day >= 24) || ($month == 11 && $day <= 22)) {
        return "Скорпион";
    }
    if (($month == 11 && $day >= 23) || ($month == 12 && $day <= 21)) {
        return "Стрелец";
    }
    if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        return "Козерог";
    }
    return "";
}

function transformDate($date)
{
    $separator = "";
    for ($i = 0; $i < strlen($date); $i++) {
        $char = $date[$i];
        if ($char < '0' || $char > '9') {
            $separator = $char;
            break;
        }
    }

    $day = "";
    $month = "";
    $year = "";
    $part = 1;
    $temp = "";

    for ($i = 0; $i < strlen($date); $i++) {
        $char = $date[$i];
        if ($char == $separator) {
            if ($part == 1) {
                $day = $temp;
            } elseif ($part == 2) {
                $month = $temp;
            }
            $temp = "";
            $part++;
        } else {
            $temp = $temp . $char;
        }
    }
    $year = $temp;

    $dayNum = 0;
    for ($i = 0; $i < strlen($day); $i++) {
        $dayNum = $dayNum * 10 + (ord($day[$i]) - ord('0'));
    }

    $monthNum = 0;
    for ($i = 0; $i < strlen($month); $i++) {
        $monthNum = $monthNum * 10 + (ord($month[$i]) - ord('0'));
    }

    return array($dayNum, $monthNum);
}

if (isset($_POST['date'])) {
    $date = $_POST['date'];
    list($day, $month) = transformDate($date);
    echo getZodiac($day, $month);
}
?>

</body>
</html>