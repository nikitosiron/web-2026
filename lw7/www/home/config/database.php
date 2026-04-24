<?php
function connectDatabase() : PDO {
    $dsn = 'mysql:host=localhost;dbname=blog;charset=utf8mb4';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}
?>