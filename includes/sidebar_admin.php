<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
  <div class="user-info">
    Halo, <strong>Nama Pengguna</strong><br>
    Anda adalah admin
  </div>

  <a href="dashboard_admin.php"
     class="<?= ($currentPage == 'dashboard_admin.php') ? 'active' : '' ?>">
     Dashboard
  </a>

  <a href="datastatistik.php"
     class="<?= ($currentPage == 'datastatistik.php') ? 'active' : '' ?>">
     Data Statistik Aktivitas
  </a>

  <a href="editkuisioner.php"
     class="<?= ($currentPage == 'editkuisioner.php') ? 'active' : '' ?>">
     Edit Kuisioner
  </a>

  <a href="riwayatpengguna.php"
     class="<?= ($currentPage == 'riwayatpengguna.php') ? 'active' : '' ?>">
     Riwayat Pengguna
  </a>
</div>
