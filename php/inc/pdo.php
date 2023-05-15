<?php
$dataSource = 'mysql:dbname=CFDR;host=localhost;charset=UTF8';
$user = 'CFDR';
$password = 'Gachette';

try {
    $pdo = new PDO (
        $dataSource,
        $user,
        $password,
        array (PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
    );
} catch (PDOException $exception) {
    echo 'connection échouée : '.$exception->getMessage();
}