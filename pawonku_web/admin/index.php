<?php $title='Produk'; include __DIR__ . '/_header.php'; ?>
<?php
$rows = $pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
?>
<div class="toolbar">
  <a class="btn" href="product_form.php">+ Tambah Produk</a>
</div>
<table class="table">
  <thead>
    <tr><th>ID</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Gambar</th><th>Status</th><th>Aksi</th></tr>
  </thead>
  <tbody>
  <?php foreach($rows as $r): ?>
    <tr>
      <td><?= (int)$r['id'] ?></td>
      <td><?= e($r['name']) ?></td>
      <td><?= e(ucfirst($r['category'])) ?></td>
      <td><?= rupiah($r['price']) ?></td>
      <td><?php if($r['image']): ?><img class="thumb" src="../uploads/<?= e($r['image']) ?>" alt="" /><?php endif; ?></td>
      <td><?= $r['is_active'] ? 'Aktif' : 'Nonaktif' ?></td>
      <td>
        <a class="btn small" href="product_form.php?id=<?= (int)$r['id'] ?>">Edit</a>
        <a class="btn small danger" href="delete.php?id=<?= (int)$r['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php include __DIR__ . '/_footer.php'; ?>
