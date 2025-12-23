<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/admin/dashboard.css">
  <title>FriendMind - Dashboard Admin</title>
</head>

<!-- memanggil html -->
<?php include '../includes/header_admin.php'; ?>

<div class="wrapper">

  <body>
    <!-- memanggil html -->
    <?php include '../includes/sidebar_admin.php'; ?>

    <div class="main-content">
      <hr />

      <div class="card-row">
        <div class="card bg-blue">
          <h2>1.5K</h2>
          <p>Kunjungan Situs Harian</p>
          <div class="card-info">
            Lebih info <span style="float: right">📈</span>
          </div>
        </div>

        <div class="card bg-green">
          <h2>35K</h2>
          <p>Kunjungan Situs Bulanan</p>
          <div class="card-info">
            Lebih info <span style="float: right">📊</span>
          </div>
        </div>

        <div class="card bg-orange">
          <h2>8</h2>
          <p>Kuisioner Aktif</p>
          <div class="card-info">
            Lebih info <span style="float: right">📝</span>
          </div>
        </div>

        <div class="card bg-red">
          <h2>10.2K</h2>
          <p>Total Riwayat Pengguna</p>
          <div class="card-info">
            Lebih info <span style="float: right">👤</span>
          </div>
        </div>
      </div>

      <div class="activity-section">
        <h3>Detail Dashboard Aktivitas</h3>
        <p>
          Di sini akan ditampilkan grafik atau tabel detail mengenai statistik
          trafik, misalnya perbandingan bulan ke bulan atau jam sibuk.
        </p>
        <div
          style="
              background-color: white;
              padding: 20px;
              height: 300px;
              border-radius: 5px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            ">
          [Placeholder untuk Grafik Statistik Kunjungan]
        </div>
      </div>
    </div>
</div>
</div>
</body>

</html>