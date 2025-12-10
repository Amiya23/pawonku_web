<?php
require_once __DIR__ . '/../config.php';
$MAX_IDLE = 2*60*60; // 2 jam idle

if (!empty($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $MAX_IDLE) {
  session_unset(); session_destroy(); header('Location: login.php?timeout=1'); exit;
}
$_SESSION['last_activity'] = time();

if (empty($_SESSION['admin_id'])) {
  header('Location: login.php'); exit;
}
