<?php
session_start();

$host = getenv('MYSQL_HOST') ?: 'localhost';
$db   = getenv('MYSQL_DATABASE') ?: 'store2026';
$user = getenv('MYSQL_USER') ?: 'root';
$pass = getenv('MYSQL_PASSWORD') ?: '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Custom session handler
require_once __DIR__ . '/session_handler.php';
$handler = new MySQLSessionHandler($pdo);
session_set_save_handler($handler, true);
session_start();

// Site base URL for absolute links
define('SITE_URL', getenv('VERCEL_URL') ? 'https://' . getenv('VERCEL_URL') : 'http://localhost');
