<?php
$host = '127.0.0.1';
$db   = 'fittrack';
$user = 'root'; // default xampp user
$pass = '';     // default xampp pass is empty
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=3307;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    if ($e->getCode() == 1049) {
        $pdo = null;
    } else {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>
