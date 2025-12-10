<?php $title='Produk'; include __DIR__ . '/_header.php'; ?>
<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = ['name'=>'','category'=>'makanan','price'=>'','image'=>null,'is_active'=>1];
if ($id) {
  $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
  $stmt->execute([$id]);
  $data = $stmt->fetch() ?: $data;
}
$err = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $name = trim($_POST['name'] ?? '');
  $category = $_POST['category'] ?? 'makanan';
  $price = (float)($_POST['price'] ?? 0);
  $is_active = isset($_POST['is_active']) ? 1 : 0;
  $img = $data['image'];

  if (!empty($_FILES['image']['name'])) {
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif','webp'];
    if (!in_array($ext, $allowed)) $err = 'Format gambar tidak didukung.';
    if (!$err) {
      $new = uniqid('img_').'.'.$ext;
      @mkdir(__DIR__ . '/../uploads', 0777, true);
      if (!move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../uploads/'.$new)) {
        $err = 'Gagal mengunggah gambar.';
      } else {
        // delete old image
        if ($img && file_exists(__DIR__ . '/../uploads/'.$img)) { @unlink(__DIR__ . '/../uploads/'.$img); }
        $img = $new;
      }
    }
  }

  if (!$err) {
    if ($id) {
      $sql = "UPDATE products SET name=?, category=?, price=?, image=?, is_active=? WHERE id=?";
      $pdo->prepare($sql)->execute([$name,$category,$price,$img,$is_active,$id]);
    } else {
      $sql = "INSERT INTO products (name, category, price, image, is_active) VALUES (?,?,?,?,?)";
      $pdo->prepare($sql)->execute([$name,$category,$price,$img,$is_active]);
      $id = $pdo->lastInsertId();
    }
    header('Location: index.php'); exit;
  }
}
?>
<form class="card form" method="post" enctype="multipart/form-data">
  <h2><?= $id ? 'Edit Produk' : 'Tambah Produk' ?></h2>
  <?php if($err): ?><div class="alert"><?= e($err) ?></div><?php endif; ?>
  <label>Nama
    <input type="text" name="name" value="<?= e($data['name']) ?>" required>
  </label>
  <label>Kategori
    <select name="category">
      <option value="makanan" <?= $data['category']==='makanan'?'selected':'' ?>>Makanan</option>
      <option value="minuman" <?= $data['category']==='minuman'?'selected':'' ?>>Minuman</option>
    </select>
  </label>
  <label>Harga (angka)
    <input type="number" step="100" name="price" value="<?= e($data['price']) ?>" required>
  </label>
  <label>Gambar
    <input type="file" name="image" accept="image/*">
  </label>
  <?php if($data['image']): ?>
    <div class="preview"><img class="thumb" src="../uploads/<?= e($data['image']) ?>" alt=""></div>
  <?php endif; ?>
  <label class="checkbox">
    <input type="checkbox" name="is_active" <?= $data['is_active'] ? 'checked' : '' ?>> Tampilkan di situs
  </label>
  <div class="form-actions">
    <a class="btn secondary" href="index.php">Batal</a>
    <button class="btn" type="submit">Simpan</button>
  </div>
</form>
<?php include __DIR__ . '/_footer.php'; ?>
