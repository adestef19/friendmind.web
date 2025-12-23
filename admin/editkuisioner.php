<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FriendMind - Edit Kuisioner</title>
    <style>
      /* Gaya dasar (tetap sama) */
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
        border-bottom: 1px solid #1cb87a;
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
  /* Hapus overflow: hidden jika tidak diperlukan, 
     atau gunakan overflow-x: auto agar table bisa di-scroll di HP */
  overflow-x: auto; 
}

      /* Gaya spesifik untuk tabel dan tombol */
      .btn-add {
        background-color: #2ecc71;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 3px;
        cursor: pointer;
        margin-bottom: 20px;
        text-decoration: none;
        display: inline-block;
      }
  table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
  /* Pastikan tidak ada max-width yang membatasi */
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
      .btn-action {
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-right: 5px;
      }
      .btn-edit {
        background-color: #f39c12;
        color: white;
      }
      .btn-delete {
        background-color: #e74c3c;
        color: white;
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
  border: none;}

    </style>
  </head>
   <?php include '../includes/header_admin.php'; ?>
   <div class="wrapper">
  <body>
    <?php include '../includes/sidebar_admin.php'; ?>

      <div class="main-content">
        <h1>Manajemen Kuisioner (Pilihan Ganda)</h1>
        <hr />

        <div class="content-panel">
          <a href="tambah_soal.html" class="btn-add">Tambah Soal Baru</a>

          <h3>Daftar Soal Aktif</h3>

          <table>
            <thead>
              <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 45%">Teks Soal</th>
                <th style="width: 30%">Format Jawaban & Skor (PG)</th>
                <th style="width: 20%">Aksi (CRUD)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  Seberapa sering Anda merasa cemas tanpa alasan yang jelas
                  dalam seminggu terakhir?
                </td>
                <td>
                  <p>A: Tidak pernah (Skor 0)</p>
                  <p>B: Jarang (Skor 1)</p>
                  <p>C: Sering (Skor 2)</p>
                  <p>D: Selalu (Skor 3)</p>
                </td>
                <td>
                  <button
                    class="btn-action btn-edit"
                    onclick="location.href='edit_soal.html?id=1'"
                  >
                    Edit
                  </button>
                  <button
                    class="btn-action btn-delete"
                    onclick="confirmDelete(1)"
                  >
                    Hapus
                  </button>
                </td>
              </tr>

              <tr>
                <td>2</td>
                <td>
                  Apakah Anda mengalami kesulitan untuk tidur atau tetap tidur?
                </td>
                <td>
                  <p>A: Tidak (Skor 0)</p>
                  <p>B: Ya (Skor 3)</p>
                </td>
                <td>
                  <button
                    class="btn-action btn-edit"
                    onclick="location.href='edit_soal.html?id=2'"
                  >
                    Edit
                  </button>
                  <button
                    class="btn-action btn-delete"
                    onclick="confirmDelete(2)"
                  >
                    Hapus
                  </button>
                </td>
              </tr>

              <tr>
                <td>3</td>
                <td>Saya merasa sangat sedih dan putus asa.</td>
                <td>
                  <p>1: Sangat Jarang (Skor 0)</p>
                  <p>2: Jarang (Skor 1)</p>
                  <p>3: Kadang-kadang (Skor 2)</p>
                  <p>4: Sering (Skor 3)</p>
                  <p>5: Selalu (Skor 4)</p>
                </td>
                <td>
                  <button
                    class="btn-action btn-edit"
                    onclick="location.href='edit_soal.html?id=3'"
                  >
                    Edit
                  </button>
                  <button
                    class="btn-action btn-delete"
                    onclick="confirmDelete(3)"
                  >
                    Hapus
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>

    <script>
      function confirmDelete(id) {
        if (
          confirm(
            "Apakah Anda yakin ingin menghapus soal ID " +
              id +
              "? Tindakan ini akan menghapus data dari database MySQL."
          )
        ) {
          // Di implementasi nyata, Anda akan menggunakan AJAX/fetch ke endpoint PHP untuk menghapus data dari MySQL
          alert(
            "Soal ID " + id + " telah dihapus (Simulasi koneksi MySQL/PHP)"
          );
        }
      }
    </script>
  </body>
</html>
