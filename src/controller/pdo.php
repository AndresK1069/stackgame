<?php
function create_pdo(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $c = require __DIR__ . '/../sql/sql_config.php';
        $dsn = "mysql:host={$c['host']};dbname={$c['name']};charset={$c['charset']}";
        $pdo = new PDO($dsn, $c['user'], $c['pass'], [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }
    return $pdo;
}