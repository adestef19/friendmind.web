<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FriendMind - Data Statistik Aktivitas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
      body {
        font-family: 'poppins', sans-serif;
        margin: 0;
        background-color: #f4f7f6;
      }
      .wrapper {
        display: flex;
        min-height: 100vh;
      }
      .sidebar {
        width: 250px;
        background-color: #169a64;
        color: white;
        padding-top: 20px;
      }
      .sidebar a {
        color: #bdc3c7;
        text-decoration: none;
        padding: 10px 20px;
        display: block;
      }
      .sidebar a:hover,
      .sidebar .active {
        background-color: #1cb87a;
        color: white;
      }
       .header {
        background-color: white;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .user-info {
        padding: 10px 20px;
        border-bottom: 1px solid #34495e;
        margin-bottom: 15px;
      }
      .main-content {
        flex-grow: 1;
        padding: 20px;
      }
      .content-panel {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden;
      }
      .chart-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
      }
      .chart-row > div {
        flex: 1 1 15%;
        min-width: 15%;
      }

            .logout-btn {
  background-color: #fff;
  color: #333;
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 8px 15px;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.logout-btn:hover {
  background-color: #1cb87a;
  color: white;
  border: none; }
      
    </style>
  </head>
  <?php include '../includes/header_admin.php'; ?>
  <div class="wrapper">
  <body>
    <?php include '../includes/sidebar_admin.php'; ?>

      <div class="main-content">
        <h1>Data Statistik Aktivitas Website</h1>
        <p>
          Visualisasi data pengunjung harian dan pengguna yang telah
          menyelesaikan tes.
        </p>
        <hr />

        <div class="chart-row">
          <div class="content-panel">
            <h2>📈 Pengunjung Harian Website</h2>
            <div style="height: 350px">
              <canvas id="grafikPengunjung"></canvas>
            </div>
          </div>

          <div class="content-panel">
            <h2>✅ Pengguna Selesai Tes</h2>
            <div style="height: 350px">
              <canvas id="grafikSelesaiTes"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <script src="../assets/js/statistik.js"></script>
  </body>
</html>
