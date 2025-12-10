<?php

session_start();

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'pawonku');
define('DB_USER', 'root');
define('DB_PASS', '');

$BASE_URL = '/PAWONKU_WEB';

try {
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
function rupiah($n){
    if ($n === null) return '';
    return 'Rp ' . number_format((float)$n, 0, ',', '.');
}
?>
