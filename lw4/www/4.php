<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счастливые билеты</title>
</head>
<body>

<form method="POST">
    <input type="text" name="start" placeholder="Начальный номер" maxlength="6">
    <input type="text" name="end" placeholder="Конечный номер" maxlength="6">
    <input type="submit" value="Найти">
</form>

<?php
function isHappy($number) {
    $n = $number;
    
    $d1 = 0;
    $temp = $n;
    while ($temp >= 100000) {
        $temp = $temp - 100000;
        $d1++;
    }
    $n = $temp;
    
    $d2 = 0;
    $temp = $n;
    while ($temp >= 10000) {
        $temp = $temp - 10000;
        $d2++;
    }
    $n = $temp;
    
    $d3 = 0;
    $temp = $n;
    while ($temp >= 1000) {
        $temp = $temp - 1000;
        $d3++;
    }
    $n = $temp;
    
    $d4 = 0;
    $temp = $n;
    while ($temp >= 100) {
        $temp = $temp - 100;
        $d4++;
    }
    $n = $temp;
    
    $d5 = 0;
    $temp = $n;
    while ($temp >= 10) {
        $temp = $temp - 10;
        $d5++;
    }
    $n = $temp;
    
    $d6 = $n;
    
    $sum1 = $d1 + $d2 + $d3;
    $sum2 = $d4 + $d5 + $d6;
    
    if ($sum1 == $sum2) {
        return true;
    }
    return false;
}

function formatTicket($num) {
    if ($num < 10) return "00000" . $num;
    if ($num < 100) return "0000" . $num;
    if ($num < 1000) return "000" . $num;
    if ($num < 10000) return "00" . $num;
    if ($num < 100000) return "0" . $num;
    return (string)$num;
}

function stringToNumber($str) {
    $num = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $num = $num * 10 + (ord($str[$i]) - ord('0'));
    }
    return $num;
}

if (isset($_POST['start']) && isset($_POST['end'])) {
    $start = stringToNumber($_POST['start']);
    $end = stringToNumber($_POST['end']);
    
    $result = "";
    $first = true;
    
    for ($i = $start; $i <= $end; $i++) {
        if (isHappy($i)) {
            if (!$first) {
                $result .= " ";
            }
            $result .= formatTicket($i);
            $first = false;
        }
    }
    
    echo $result;
}
?>

</body>
</html>