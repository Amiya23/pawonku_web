<?php
require_once __DIR__ . '/../config.php';
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
$id = (int)($_GET['id'] ?? 0);
if ($id) {
  $stmt = $pdo->prepare("SELECT image FROM products WHERE id=?");
  $stmt->execute([$id]);
  if ($row = $stmt->fetch()) {
    if ($row['image'] && file_exists(__DIR__ . '/../uploads/'.$row['image'])) { @unlink(__DIR__ . '/../uploads/'.$row['image']); }
  }
  $pdo->prepare("DELETE FROM products WHERE id=?")->execute([$id]);
}
header('Location: index.php');
