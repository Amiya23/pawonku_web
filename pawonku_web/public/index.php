<?php
$title = 'Katalog Menu';
require_once __DIR__ . '/../config.php';
$q = trim($_GET['q'] ?? '');
$cat = $_GET['cat'] ?? 'semua';

$sql = "SELECT * FROM products WHERE is_active=1";
$params = [];
if ($cat && $cat !== 'semua') { $sql .= " AND category = :cat"; $params[':cat'] = $cat; }
if ($q !== '') { $sql .= " AND name LIKE :q"; $params[':q'] = "%{$q}%"; }
$sql .= " ORDER BY created_at DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();
?>
<?php $title = 'Katalog Menu'; include __DIR__ . '/_header.php'; ?>

<div class="cards">
  <?php if (empty($products)): ?>
    <div class="empty">Tidak ada produk yang cocok.</div>
  <?php endif; ?>
  <?php foreach ($products as $p): ?>
    <article class="card">
      <div class="card-media">
        <?php if ($p['image']): ?>
          <img src="<?= $BASE_URL ?>/uploads/<?= e($p['image']) ?>" alt="<?= e($p['name']) ?>">
        <?php else: ?>
          <div class="placeholder">GAMBAR MAKANAN/MINUMAN</div>
        <?php endif; ?>
      </div>
      <div class="card-info">
        <div class="name"><?= e($p['name']) ?></div>
        <div class="price"><?= rupiah($p['price']) ?></div>
      </div>
    </article>
  <?php endforeach; ?>
</div>

<div class="order-strip" id="order">
    <span>Siap memesan? Hubungi kami.</span>

    <a class="btn whatsapp" 
       href="https://wa.me/6281234567890" 
       target="_blank">
        Chat WhatsApp
    </a>
</div>



<?php include __DIR__ . '/_footer.php'; ?>
