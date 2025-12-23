<?php
session_start();

// Proteksi halaman
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - FriendMind</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/dashboard.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  

<?php include __DIR__ . '/../includes/header_user.php'; ?>

<main class="content">

  <nav class="back-navigation">
  <a href="../index.php"
    class="back-btn"
  >
    <i class="bi bi-arrow-left"></i>
  </a>
</nav>


  <div class="welcome-section">
    <div class="profile-header-container">

      <div class="profile-avatar">
        <img
          src="../assets/img/profile-icon.png"
          alt="Profile Icon"
          id="display-profile"
        >
      </div>

      <div class="profile-info">
        <h2 class="username">Nama User</h2>
        <span class="email">email@example.com</span>
        <p class="subtitle">
          Lanjutkan mengetahui jati dirimu dengan mengikuti kuisioner kami!
        </p>
      </div>

    </div>

    <div class="card-container">

      <div class="card highlight">
        <div class="card-header">
          <img
            src="../assets/img/tesdepresi.png"
            alt="Tes Mental"
            class="icon"
          >
          <div>
            <h3>Tes Kesehatan Mental</h3>
            <p>Mulai untuk mengetahui kondisi depresi kamu saat ini!</p>
          </div>
        </div>
        <a href="../forms/tesmental.php">
          <button class="btn">+ Mulai kuisioner!</button>
        </a>
      </div>

      <div class="card">
        <div class="card-header">
          <img
            src="../assets/img/tespersonality.png"
            alt="Tes Kepribadian"
            class="icon"
          >
          <div>
            <h3>Tes Kepribadian</h3>
            <p>Cari tahu kepribadian kamu melalui tes ini!</p>
          </div>
        </div>
        <a href="../forms/teskepribadian.php">
          <button class="btn">+ Mulai kuisioner!</button>
        </a>
      </div>

    </div>

    <div class="history">
      <div class="history-header">
        <h3>Riwayat Hasil Tes</h3>
        <button class="lihat-btn">Lihat semua</button>
      </div>
      <p class="desc">Disini terlihat hasil tes terakhir kali kamu</p>
    </div>

  </div>
</main>

</body>
</html>
