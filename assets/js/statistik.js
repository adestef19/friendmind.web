// statistik.js

document.addEventListener("DOMContentLoaded", () => {
  // ----------------------------------------------------------------
  // FUNGSI SIMULASI DATA (MENGGANTIKAN KONEKSI PHP/MYSQL)
  // ----------------------------------------------------------------

  // Dalam implementasi nyata, fungsi ini akan melakukan FETCH API ke endpoint PHP Anda,
  // yang akan mengembalikan data JSON setelah melakukan query ke database MySQL.
  async function fetchDataStatistik() {
    // --- SIMULASI DATA (Data yang seharusnya diambil dari MySQL) ---
    const dataSimulasi = {
      labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
      pengunjung: [1245, 1510, 1320, 1602, 1850, 2100, 950], // Total Hits
      selesaiTes: [480, 615, 500, 710, 850, 950, 400], // Konversi Tes
    };
    // -------------------------------------------------------------

    // Simulasikan penundaan jaringan/database
    // await new Promise(resolve => setTimeout(resolve, 500));

    return dataSimulasi;
  }

  // ----------------------------------------------------------------
  // FUNGSI INISIASI GRAFIK
  // ----------------------------------------------------------------

  fetchDataStatistik()
    .then((data) => {
      // 1. GRAFIK PENGUNJUNG HARIAN (Line Chart)
      const ctxPengunjung = document
        .getElementById("grafikPengunjung")
        .getContext("2d");
      new Chart(ctxPengunjung, {
        type: "line",
        data: {
          labels: data.labels,
          datasets: [
            {
              label: "Pengunjung Harian",
              data: data.pengunjung,
              borderColor: "#3498db", // Warna Biru
              backgroundColor: "rgba(52, 152, 219, 0.2)",
              tension: 0.4, // Untuk garis melengkung
              fill: true,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Penting agar grafik mengisi div
          scales: {
            y: {
              beginAtZero: true,
              title: { display: true, text: "Jumlah Pengunjung" },
            },
          },
        },
      });

      // 2. GRAFIK PENGGUNA SELESAI TES (Bar Chart)
      const ctxSelesaiTes = document
        .getElementById("grafikSelesaiTes")
        .getContext("2d");
      new Chart(ctxSelesaiTes, {
        type: "bar",
        data: {
          labels: data.labels,
          datasets: [
            {
              label: "Pengguna Selesai Tes",
              data: data.selesaiTes,
              backgroundColor: "#2ecc71", // Warna Hijau
              borderColor: "#27ae60",
              borderWidth: 1,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Penting agar grafik mengisi div
          scales: {
            y: {
              beginAtZero: true,
              title: { display: true, text: "Jumlah Tes Selesai" },
            },
          },
        },
      });
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
      alert("Gagal memuat data statistik dari backend.");
    });
});
