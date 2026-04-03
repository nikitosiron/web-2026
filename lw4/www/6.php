<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обратная польская запись</title>
</head>
<body>

<form method="POST">
    <input type="text" name="expression" placeholder="Введите польскую запись" size="50">
    <input type="submit" value="Вычислить">
</form>

<?php
function transformP($expression) {
    $stack = [];
    $i = 0;
    $len = strlen($expression);
    $current = "";
    
    for ($i = 0; $i < $len; $i++) {
        $char = $expression[$i];
        
        if ($char == ' ') {
            if ($current != "") {
                if ($current == "+" || $current == "-" || $current == "*") {
                    $b = $stack[count($stack) - 1];
                    array_pop($stack);
                    $a = $stack[count($stack) - 1];
                    array_pop($stack);
                    
                    if ($current == "+") {
                        $result = $a + $b;
                    } elseif ($current == "-") {
                        $result = $a - $b;
                    } elseif ($current == "*") {
                        $result = $a * $b;
                    }
                    
                    $stack[] = $result;
                } else {
                    $num = 0;
                    for ($j = 0; $j < strlen($current); $j++) {
                        $num = $num * 10 + (ord($current[$j]) - ord('0'));
                    }
                    $stack[] = $num;
                }
                $current = "";
            }
        } else {
            $current = $current . $char;
        }
    }
    
    if ($current != "") {
        if ($current == "+" || $current == "-" || $current == "*") {
            $b = $stack[count($stack) - 1];
            array_pop($stack);
            $a = $stack[count($stack) - 1];
            array_pop($stack);
            
            if ($current == "+") {
                $result = $a + $b;
            } elseif ($current == "-") {
                $result = $a - $b;
            } elseif ($current == "*") {
                $result = $a * $b;
            }
            
            $stack[] = $result;
        } else {
            $num = 0;
            for ($j = 0; $j < strlen($current); $j++) {
                $num = $num * 10 + (ord($current[$j]) - ord('0'));
            }
            $stack[] = $num;
        }
    }
    
    return $stack[0];
}

if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];
    $result = transformP($expression);
    echo $result;
}
?>

</body>
</html>