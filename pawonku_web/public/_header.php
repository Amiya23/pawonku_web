<?php require_once __DIR__ . '/../config.php'; ?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title ?? 'Katalog') ?></title>
<link rel="stylesheet" href="<?= $BASE_URL ?>/assets/style.css?v=logo3">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="topbar">
  <div class="topbar-inner">
    <div class="logo">
  <a href="<?= $BASE_URL ?>/public/index.php">
    <img class="site-logo" src="<?= $BASE_URL ?>/assets/logo.jpg" alt="Logo">
  </a>
</div>
    <form class="search" method="get" action="<?= $BASE_URL ?>/public/index.php">
      <input type="text" name="q" placeholder="Cari..." value="<?= e($_GET['q'] ?? '') ?>">
      <button type="submit">Cari</button>
    </form>
  </div>
</header>
<div class="container">
  <aside class="sidebar">
    <div class="side-card side-title">Kategori</div>
    <?php
      $activeCat = $_GET['cat'] ?? 'semua';
      $cats = [
        'semua' => 'Semua',
        'makanan' => 'Makanan',
        'minuman' => 'Minuman'
      ];
      foreach($cats as $key => $label):
    ?>
      <a class="side-card <?= $activeCat===$key ? 'active' : '' ?>" href="<?= $BASE_URL ?>/public/index.php?cat=<?= $key ?>&q=<?= e($_GET['q'] ?? '') ?>"><?= e($label) ?></a>
    <?php endforeach; ?>
    <div class="spacer"></div>
    <!-- <a class="side-card cta" href="#order">Pesan Sekarang</a> -->
  </aside>
  <main class="content">
