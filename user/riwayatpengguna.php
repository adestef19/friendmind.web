<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FriendMind - Riwayat Pengguna</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <style>
      /* Gaya dasar (konsisten dengan dashboard) */
      body {
        font-family: "poppins", sans-serif;
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

      /* Gaya untuk tabel data pengguna */
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
      }
      table th,
      table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
      }
      table th {
        background-color: #2ecc71;
        color: white;
      }

      /* Status badge */
      .badge {
        padding: 5px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
      }
      .status-selesai {
        background-color: #2ecc71;
        color: white;
      }
      .status-belum {
        background-color: #f39c12;
        color: white;
      }

      /* Revisi Gaya Tombol Lihat Detail */
      .btn-detail {
        padding: 8px 12px;
        border: none; /* Menghapus stroke */
        border-radius: 4px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        background-color: #1cb87a; /* Warna biru */
        color: white;
        transition: background-color 0.2s;
      }
      .btn-detail:hover {
        background-color: #1cb87a;
      }
    </style>
  </head>
   <?php include 'includes/header_admin.html'; ?>
   <div class="wrapper">
  <body>
    <?php include 'includes/sidebar_admin.php'; ?>
      <div class="main-content">
        <h1>Riwayat Akun dan Hasil Tes Pengguna</h1>
        <p>
          Daftar lengkap pengguna yang terdaftar melalui email beserta data
          hasil tes mereka.
        </p>
        <hr />

        <div class="content-panel">
          <div style="display: flex; gap: 10px; margin-bottom: 20px">
            <input
              type="text"
              placeholder="Cari berdasarkan Email atau ID Pengguna..."
              style="
                padding: 10px;
                flex-grow: 1;
                border: 1px solid #ccc;
                border-radius: 4px;
              "
            />
            <select
              style="padding: 10px; border: 1px solid #ccc; border-radius: 4px"
            >
              <option value="">Filter Status Tes</option>
              <option value="selesai">Selesai</option>
              <option value="belum">Belum Selesai</option>
            </select>
            <button
              style="
                padding: 10px 15px;
                background-color: #2ecc71;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
              "
            >
              Cari
            </button>
          </div>

          <h3>Tabel Riwayat Pengguna</h3>

          <table>
            <thead>
              <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 25%">Email Pengguna</th>
                <th style="width: 15%">Status Tes</th>
                <th style="width: 15%">Skor Total</th>
                <th style="width: 20%">Hasil Diagnosis</th>
                <th style="width: 20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>101</td>
                <td>andi.s***@email.com</td>
                <td><span class="badge status-selesai">Selesai</span></td>
                <td>45/60</td>
                <td>Tingkat Kecemasan Tinggi</td>
                <td>
                  <button
                    class="btn-detail"
                    onclick="location.href='detail_riwayat.html?id=101'"
                  >
                    <i class="fas fa-file-alt"></i> Lihat Detail
                  </button>
                </td>
              </tr>

              <tr>
                <td>102</td>
                <td>budi.w***@email.com</td>
                <td><span class="badge status-belum">Belum Selesai</span></td>
                <td>N/A</td>
                <td>Belum Ada Data</td>
                <td>
                  <button
                    class="btn-detail"
                    disabled
                    title="Pengguna belum menyelesaikan tes"
                  >
                    <i class="fas fa-file-alt"></i> Lihat Detail
                  </button>
                </td>
              </tr>

              <tr>
                <td>103</td>
                <td>citra.p***@email.com</td>
                <td><span class="badge status-selesai">Selesai</span></td>
                <td>12/60</td>
                <td>Kondisi Normal</td>
                <td>
                  <button
                    class="btn-detail"
                    onclick="location.href='detail_riwayat.html?id=103'"
                  >
                    <i class="fas fa-file-alt"></i> Lihat Detail
                  </button>
                </td>
              </tr>
            </tbody>
          </table>

          <div style="margin-top: 20px; text-align: right">
            <small>Menampilkan 1-10 dari 10.200 Riwayat</small>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
