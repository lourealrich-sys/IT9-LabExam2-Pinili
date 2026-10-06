<?php
declare(strict_types=1);

$databaseHost = '127.0.0.1';
$databasePort = '3307';
$databaseName = 'student_enrollment';
$databaseUser = 'root';
$databasePassword = '';

try {
    $pdo = new PDO(
        "mysql:host={$databaseHost};port={$databasePort};dbname={$databaseName};charset=utf8mb4",
        $databaseUser,
        $databasePassword,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $exception) {
    http_response_code(500);
    exit(
        'Unable to connect to MySQL. Start MySQL in XAMPP, import database.sql in phpMyAdmin, '
        . 'and check the database credentials in config.php. '
        . htmlspecialchars($exception->getMessage(), ENT_QUOTES, 'UTF-8')
    );
}
