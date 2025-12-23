<?php
require_once __DIR__ . '/../config/database.php';

/* =========================
   FUNCTION CREATE SOAL
========================= */
function createSoal(string $isiPertanyaan): int|false
{
  global $db;
  $sql = "INSERT INTO pertanyaan (tes_id, isi_pertanyaan, tipe_jawaban) VALUES (?, ?, ?)";
  $stmt = $db->prepare($sql);
  $tesId = 2;
  $tipeJawaban = "Skala";
  $stmt->bind_param("iss", $tesId, $isiPertanyaan, $tipeJawaban);
  if (!$stmt->execute()) return false;
  return $db->insert_id;
}

/* =========================
   FUNCTION CREATE OPSI
========================= */
function createOpsi(int $pertanyaanId, string $isiOpsi, int $skor): bool
{
  global $db;
  $sql = "INSERT INTO opsi_jawaban (pertanyaan_id, isi_opsi, skor) VALUES (?, ?, ?)";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("isi", $pertanyaanId, $isiOpsi, $skor);
  return $stmt->execute();
}

/* =========================
   FUNCTION GET SOAL + OPSI
========================= */
function getPertanyaanDanOpsi(): array
{
  global $db;
  $sql = "SELECT * FROM pertanyaan WHERE tes_id = 2 ORDER BY pertanyaan_id ASC";
  $result = $db->query($sql);
  $data = [];
  while ($pertanyaan = $result->fetch_assoc()) {
    $stmt = $db->prepare("SELECT * FROM opsi_jawaban WHERE pertanyaan_id = ? ORDER BY skor ASC");
    $stmt->bind_param("i", $pertanyaan['pertanyaan_id']);
    $stmt->execute();
    $opsiResult = $stmt->get_result();
    $opsi = [];
    while ($row = $opsiResult->fetch_assoc()) $opsi[] = $row;
    $pertanyaan['opsi'] = $opsi;
    $data[] = $pertanyaan;
  }
  return $data;
}

/* =========================
   PROSES TAMBAH SOAL
========================= */
if (isset($_POST['tambah'])) {
  $db->begin_transaction();
  try {
    $soalId = createSoal($_POST['pertanyaan']);
    if (!$soalId) throw new Exception("Gagal membuat soal");
    for ($i = 1; $i <= 4; $i++) {
      createOpsi($soalId, $_POST["opsi$i"], $_POST["value$i"]);
    }
    $db->commit();
  } catch (Exception $e) {
    $db->rollback();
    echo $e->getMessage();
  }
}

/* =========================
   PROSES HAPUS SOAL
========================= */
if (isset($_POST['delete'])) {
  $soalId = intval($_POST['delete_soal']);
  $db->begin_transaction();
  try {
    $stmt = $db->prepare("DELETE FROM opsi_jawaban WHERE pertanyaan_id = ?");
    $stmt->bind_param("i", $soalId);
    $stmt->execute();
    $stmt = $db->prepare("DELETE FROM pertanyaan WHERE pertanyaan_id = ?");
    $stmt->bind_param("i", $soalId);
    $stmt->execute();
    $db->commit();
  } catch (Exception $e) {
    $db->rollback();
    echo $e->getMessage();
  }
}

/* =========================
   PROSES EDIT SOAL
========================= */
if (isset($_POST['edit'])) {
  $db->begin_transaction();
  try {
    $soalId = intval($_POST['soal_id']);
    $stmt = $db->prepare("UPDATE pertanyaan SET isi_pertanyaan = ? WHERE pertanyaan_id = ?");
    $stmt->bind_param("si", $_POST['pertanyaan'], $soalId);
    $stmt->execute();
    for ($i = 1; $i <= 4; $i++) {
      $stmt = $db->prepare("UPDATE opsi_jawaban SET isi_opsi = ?, skor = ? WHERE opsi_id = ?");
      $stmt->bind_param("sii", $_POST["opsi$i"], $_POST["value$i"], $_POST["opsi_id$i"]);
      $stmt->execute();
    }
    $db->commit();
  } catch (Exception $e) {
    $db->rollback();
    echo $e->getMessage();
  }
}

$daftarSoal = getPertanyaanDanOpsi();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FriendMind - Edit Kuisioner</title>
  <link rel="stylesheet" href="../assets/css/admin/editKuisioner.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php include '../includes/header_admin.php'; ?>
<div class="wrapper">

  <body>
    <?php include '../includes/sidebar_admin.php'; ?>

    <div class="main-content">
      <h1>Manajemen Kuisioner (Pilihan Ganda)</h1>
      <hr>
      <div class="content-panel">

        <!-- Tambah Soal Button -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
          Tambah Soal Baru
        </button>

        <h3>Daftar Soal Aktif</h3>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Teks Soal</th>
              <th>Opsi & Skor</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($daftarSoal as $soal): ?>
              <tr>
                <td><?= $soal['pertanyaan_id'] ?></td>
                <td><?= htmlspecialchars($soal['isi_pertanyaan']) ?></td>
                <td>
                  <?php foreach ($soal['opsi'] as $opsi): ?>
                    <p><?= htmlspecialchars($opsi['isi_opsi']) ?> (Skor <?= $opsi['skor'] ?>)</p>
                  <?php endforeach; ?>
                </td>
                <td>
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $soal['pertanyaan_id'] ?>">Edit</button>

                  <!-- Delete Form -->
                  <form action="" method="post" style="display:inline-block;">
                    <input type="hidden" name="delete_soal" value="<?= $soal['pertanyaan_id'] ?>">
                    <button class="btn btn-danger" name="delete" onclick="return confirm('Yakin ingin menghapus soal ini?')">Hapus</button>
                  </form>

                  <!-- Modal Edit Soal -->
                  <div class="modal fade" id="editModal<?= $soal['pertanyaan_id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $soal['pertanyaan_id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="" method="post">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5">Edit Soal</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="soal_id" value="<?= $soal['pertanyaan_id'] ?>">
                            <div class="mb-3">
                              <label class="form-label">Teks Soal</label>
                              <input type="text" class="form-control" name="pertanyaan" value="<?= htmlspecialchars($soal['isi_pertanyaan']) ?>">
                            </div>
                            <?php foreach ($soal['opsi'] as $index => $opsi): ?>
                              <input type="hidden" name="opsi_id<?= $index + 1 ?>" value="<?= $opsi['opsi_id'] ?>">
                              <div class="mb-3">
                                <label class="form-label">Opsi <?= $index + 1 ?></label>
                                <input type="text" class="form-control" name="opsi<?= $index + 1 ?>" value="<?= htmlspecialchars($opsi['isi_opsi']) ?>">
                                <input type="number" class="form-control" name="value<?= $index + 1 ?>" value="<?= $opsi['skor'] ?>">
                              </div>
                            <?php endforeach; ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Modal Tambah Soal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Tambah Soal Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Teks Soal</label>
            <input type="text" class="form-control" name="pertanyaan" required>
          </div>
          <?php for ($i = 1; $i <= 4; $i++): ?>
            <div class="mb-3">
              <label class="form-label">Opsi <?= $i ?></label>
              <input type="text" class="form-control" name="opsi<?= $i ?>" required>
              <input type="number" class="form-control" name="value<?= $i ?>" placeholder="Skor" required>
            </div>
          <?php endfor; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>