<?php
require_once __DIR__ . '/../config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $u = trim($_POST['username'] ?? '');
  $p = $_POST['password'] ?? '';


  $stmt = $pdo->prepare("SELECT id, username, password_hash, is_active FROM admins WHERE username = ?");
  $stmt->execute([$u]);
  $user = $stmt->fetch();

  if ($user && (int)$user['is_active'] === 1 && password_verify($p, $user['password_hash'])) {
    session_regenerate_id(true);
    $_SESSION['admin'] = $user['username'];
    $_SESSION['admin_id'] = (int)$user['id'];
    $_SESSION['last_activity'] = time();
    header('Location: index.php'); exit;
  } else {
    $error = 'Username atau password salah.';
  }
}
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Admin</title>
<link rel="stylesheet" href="<?= $BASE_URL ?>/assets/style.css">
</head>
<body class="auth">
  <form class="card auth-card" method="post">
    <h1>Login Admin</h1>
    <?php if ($error): ?><div class="alert"><?= e($error) ?></div><?php endif; ?>
    <label>Username
      <input type="text" name="username" required autofocus>
    </label>
    <label>Password
      <input type="password" name="password" required>
    </label>
    <button class="btn" type="submit">Masuk</button>
  </form>
</body>
</html>
