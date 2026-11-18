<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=stackgame_bd;charset=utf8mb4",
        "root",
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Connected<br>";

    $rows = $pdo->query("SELECT id, login, type_user FROM users")->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>"; print_r($rows); echo "</pre>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}