<?php require_once __DIR__ . '/../config.php'; ?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin – <?= e($title ?? 'Dashboard') ?></title>
<link rel="stylesheet" href="<?= $BASE_URL ?>/assets/style.css?v=admin1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="topbar">
  <div class="topbar-inner">

    <!-- LOGO ADMIN -->
    <div class="logo">
      <a href="<?= $BASE_URL ?>/admin/index.php">
        <img class="site-logo" src="<?= $BASE_URL ?>/assets/logo.jpg" alt="Logo Admin">
      </a>
    </div>

    <!-- MENU KANAN -->
    <nav style="display:flex; gap:12px;">
      <a class="btn small" href="<?= $BASE_URL ?>/public/index.php">Lihat Situs</a>
      <a class="btn small danger" href="<?= $BASE_URL ?>/admin/logout.php">Keluar</a>
    </nav>

  </div>
</header>

<div class="container admin-layout">
