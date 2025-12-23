<?php
session_start();
require_once __DIR__ . '/config/database.php';

$login_message = "";

// Jika sudah login, langsung ke dashboard user
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
  header("Location: user/dashboard.php");
  exit;
}

if (isset($_POST['login'])) {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  //* cek apaka akun admin
  $admin = $db->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
  $admin->bind_param("ss", $email, $password);
  $admin->execute();
  $resultAdmin = $admin->get_result();

  //* cek apakah akun user
  $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $resultUser = $stmt->get_result();

  if ($resultUser->num_rows === 1) {
    $data = $resultUser->fetch_assoc();

    $_SESSION['is_logged_in'] = true;
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['nama'] = $data['nama'];

    header("Location: user/dashboard.php");
    exit;
  } elseif ($resultAdmin->num_rows === 1) {
    $data = $resultAdmin->fetch_assoc();

    $_SESSION['is_logged_in'] = true;
    $_SESSION['admin_id'] = $data['admin_id'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['nama'] = $data['nama'];

    header("Location: admin/dashboard_admin.php");
    exit;
  } else {
    $login_message = "AKUN TIDAK DITEMUKAN";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FriendMind - Login</title>

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/login.css" />

  <!-- JS -->
  <script src="assets/js/login.js" defer></script>
</head>

<body>
  <div class="login-container">
    <div class="login-card">

      <div class="logo">
        <a href="index.php">
          <img
            src="assets/img/LOGO FRIENDMIND.png"
            alt="FriendMind"
            width="250"
            class="logo" />
        </a>
      </div>

      <h1>Selamat datang!</h1>
      <p class="subtitle">Login untuk melanjutkan asesmenmu</p>

      <?php if ($login_message): ?>
        <p class="error-message"><?= $login_message ?></p>
      <?php endif; ?>

      <form id="loginForm" action="login.php" method="POST">
        <div class="input-group">
          <label for="email">Email</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Masukkan email"
            required />
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <div class="password-wrapper">
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Masukkan password"
              required />
            <button type="button" id="togglePassword" aria-label="Lihat password">
              <img
                id="eyeIcon"
                src="https://img.icons8.com/ios-glyphs/20/9ca3af/visible.png"
                alt="toggle password" />
            </button>
          </div>
        </div>

        <button type="submit" name="login" class="btn-signin">
          Sign In
        </button>

        <div class="links">
          <p>Belum mempunyai akun? <a href="register.php">Daftar</a></p>
        </div>
      </form>

    </div>
  </div>
</body>

</html>