<?php
require_once "config/database.php";

$register_messaage = "";


if (isset($_POST['register'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $confirm_password = $_POST['confirm_password'];

  $sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email' , '$password')";

  // Validasi konfirmasi password
  if ($password !== $confirm_password) {
    $error_message = "Password dan konfirmasi tidak cocok!";
  }

  if ($db->query($sql)) {
    echo "DATA MASUK";

    header("location: login.php");
  } else {
    $error_message = "Password dan konfirmasi tidak cocok!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FriendMind - Buat Akun</title>
  <link rel="stylesheet" href="assets/css/daftar.css" />
</head>

<body>

  <div class="container">
    <form class="register-form" action="register.php" method="POST">
      <h3>Daftar Akun</h3>
      <p>Buat akun untuk memulai assessmentmu!</p>
      <h6 class="subtitle"><?= $register_messaage ?></h6>

      <?php if (!empty($error_message)): ?>
        <div style="color: red; margin-bottom: 10px;"><?php echo $error_message; ?></div>
      <?php endif; ?>

      <label for="nama">Nama lengkap</label>
      <input type="text" id="name" name="nama"
        placeholder="Tulis nama lengkapmu disini..." required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email"
        placeholder="Masukkan Email kamu disini..." required />

      <label for="password">Kata sandi</label>
      <input type="password" id="password" name="password"
        placeholder="Buat kata sandi kamu disini..." required />

      <label for="confirm-password">Konfirmasi kata sandi</label>
      <input type="password" id="confirm_password" name="confirm_password"
        placeholder="Konfirmasi kata sandi yang kamu buat disini..." required />

      <div class="checkbox">
        <input type="checkbox" id="agree" required />
        <label for="agree">
          Saya setuju dengan <a href="#">Terms of Services</a> dan <a href="#">Privacy Policy</a>
        </label>
      </div>

      <button type="submit" name="register">Buat akun</button></a>
      <p class="login">Sudah mempunyai akun? <a href="login.php">Login!</a></p>
    </form>
  </div>
</body>

</html>