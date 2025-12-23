<?php
$type = $_GET['type'] ?? 'Tidak diketahui';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tes Kepribadian (24 Pertanyaan) - FriendMind</title>
    <meta name="description" content="Tes kepribadian MBTI dengan 24 pertanyaan untuk mengetahui tipe kepribadian Anda di FriendMind." />
    <meta name="keywords" content="tes mbti, tes kepribadian, friendmind" />

    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />

    <style>
         .quiz-section { padding: 60px 0; background-color: #f8f9fa; }
         .quiz-container { max-width: 800px; margin: 0 auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
         .question { margin-bottom: 30px; }
         .question h4 { margin-bottom: 15px; color: #333; font-weight: 600; }
         .options label { display: block; margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; cursor: pointer; transition: background-color 0.3s; }
         .options label:hover { background-color: #f0f0f0; }
         .options input[type="radio"] { margin-right: 10px; }
         .btn-calculate { background-color: #007bff; color: white; border: none; padding: 12px 30px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: 600; }
         .btn-calculate:hover { background-color: #0056b3; }
         .disclaimer { font-size: 0.9em; color: #666; text-align: center; margin-bottom: 30px; }
         .hero-label { display: inline-block; background-color: #d5f5e3; color: #10bc69; font-weight: 600; font-size: 14px; padding: 6px 14px; border-radius: 6px; margin-bottom: 20px; }
    </style>
</head>

<script>
function calculateMBTI() {
    const form = document.getElementById("mbtiTest");
    // UBAH JUMLAH PERTANYAAN DI SINI
    const totalQuestions = 24; 

    let scores = { E: 0, I: 0, S: 0, N: 0, T: 0, F: 0, J: 0, P: 0 };
    
    // Validasi semua pertanyaan sudah dijawab
    for (let i = 1; i <= totalQuestions; i++) {
        // Cek apakah radio button dengan nama q[i] sudah dipilih
        if (!form["q" + i]) {
             console.error("Pertanyaan q" + i + " tidak ditemukan di HTML.");
             continue;
        }
        
        const answer = form["q" + i].value;
        if (answer === "") {
            alert("Pastikan semua " + totalQuestions + " pertanyaan sudah dijawab sebelum melihat hasil.");
            return;
        }
        // Menambahkan skor ke kategori yang sesuai
        scores[answer]++;
    }

    // Menentukan 4 huruf
    let resultType = "";
    resultType += (scores.E > scores.I) ? "E" : "I";
    resultType += (scores.S > scores.N) ? "S" : "N";
    resultType += (scores.T > scores.F) ? "T" : "F";
    resultType += (scores.J > scores.P) ? "J" : "P";

    // Arahkan ke halaman hasil tes (file yang sama seperti sebelumnya)
    window.location.href = "hasilteskepribadian.php?type=" + resultType;
}
</script>


<body class="index-page">
    
    <?php include 'includes/header.html'; ?>

    <main class="main">
        <section id="quiz" class="quiz-section">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">
                    <span class="hero-label">Tes Kepribadian</span>
                    <h2>Tes Kepribadian</h2>
                    <p>Pilih jawaban yang paling mewakili diri Anda. Tes ini hanya untuk hiburan dan pengenalan diri.</p>
                </div>
                <div class="quiz-container">
                    <p class="disclaimer">Tes ini tidak menggantikan asesmen profesional. Ini adalah alat sederhana untuk membantu Anda mengeksplorasi preferensi kepribadian Anda.</p>
                    
                    <form id="mbtiTest">
                        <div class="question">
                            <h4>1. Di sebuah pesta, Anda lebih sering:</h4>
                            <div class="options">
                                <label><input type="radio" name="q1" value="E"> Berbicara dengan banyak orang</label>
                                <label><input type="radio" name="q1" value="I"> Berbicara mendalam dengan beberapa orang</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>2. Setelah hari yang sibuk, Anda mengisi ulang energi dengan:</h4>
                            <div class="options">
                                <label><input type="radio" name="q2" value="E"> Bertemu teman-teman</label>
                                <label><input type="radio" name="q2" value="I"> Waktu tenang sendirian</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>3. Anda cenderung:</h4>
                            <div class="options">
                                <label><input type="radio" name="q3" value="E"> Lebih banyak bicara dan memulai percakapan</label>
                                <label><input type="radio" name="q3" value="I"> Lebih banyak mendengarkan dan menunggu diajak bicara</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>4. Saat fokus, Anda lebih suka:</h4>
                            <div class="options">
                                <label><input type="radio" name="q4" value="E"> Suasana yang ramai dan penuh aktivitas (misal: kafe)</label>
                                <label><input type="radio" name="q4" value="I"> Suasana yang tenang dan bebas gangguan</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>5. Mengenai pertemanan:</h4>
                            <div class="options">
                                <label><input type="radio" name="q5" value="E"> Anda memiliki lingkaran pertemanan yang luas</label>
                                <label><input type="radio" name="q5" value="I"> Anda memiliki beberapa teman dekat yang sangat Anda percayai</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>6. Dalam kerja kelompok, Anda:</h4>
                            <div class="options">
                                <label><input type="radio" name="q6" value="E"> Menikmati diskusi dan bertukar pikiran secara aktif</label>
                                <label><input type="radio" name="q6" value="I"> Lebih suka memikirkan ide Anda sendiri terlebih dahulu</label>
                            </div>
                        </div>
                        
                        <div class="question">
                            <h4>7. Saat belajar hal baru, Anda lebih suka:</h4>
                            <div class="options">
                                <label><input type="radio" name="q7" value="S"> Sesuatu yang praktis dan bisa langsung dicoba</label>
                                <label><input type="radio" name="q7" value="N"> Sesuatu yang bersifat konsep dan teori</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>8. Anda lebih fokus pada:</h4>
                            <div class="options">
                                <label><input type="radio" name="q8" value="S"> Realita saat ini dan fakta yang ada</label>
                                <label><input type="radio" name="q8" value="N"> Kemungkinan di masa depan dan 'apa yang bisa terjadi'</label>
                            </div>
                        </div>
                         <div class="question">
                            <h4>9. Anda lebih percaya pada:</h4>
                            <div class="options">
                                <label><input type="radio" name="q9" value="S"> Pengalaman dan data nyata</label>
                                <label><input type="radio" name="q9" value="N"> Inspirasi dan firasat (intuisi)</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>10. Saat diberi instruksi, Anda lebih suka:</h4>
                            <div class="options">
                                <label><input type="radio" name="q10" value="S"> Instruksi yang jelas, detail, dan langkah demi langkah</label>
                                <label><input type="radio" name="q10" value="N"> Gambaran besar atau tujuannya saja, Anda akan cari cara sendiri</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>11. Anda cenderung lebih:</h4>
                            <div class="options">
                                <label><input type="radio" name="q11" value="S"> Realistis dan membumi</label>
                                <label><input type="radio" name="q11" value="N"> Imajinatif dan visioner</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>12. Saat bercerita, Anda:</h4>
                            <div class="options">
                                <label><input type="radio" name="q12" value="S"> Menceritakan kejadian secara runut dan faktual</label>
                                <label><input type="radio" name="q12" value="N"> Sering melompat ke ide atau makna di balik kejadian</label>
                            </div>
                        </div>

                        <div class="question">
                            <h4>13. Saat membuat keputusan, Anda lebih mengutamakan:</h4>
                            <div class="options">
                                <label><input type="radio" name="q13" value="T"> Logika objektif dan keadilan</label>
                                <label><input type="radio" name="q13" value="F"> Perasaan pribadi dan keharmonisan</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>14. Anda lebih dikenal sebagai orang yang:</h4>
                            <div class="options">
                                <label><input type="radio" name="q14" value="T"> Tegas, analitis, dan kritis</label>
                                <label><input type="radio" name="q14" value="F"> Hangat, empatik, dan suportif</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>15. Saat berargumen, Anda cenderung:</h4>
                            <div class="options">
                                <label><input type="radio" name="q15" value="T"> Mencari kebenaran logis, meski itu tidak nyaman</label>
                                <label><input type="radio" name="q15" value="F"> Mencari kesepakatan bersama dan menjaga perasaan</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>16. Saat teman curhat masalah, reaksi pertama Anda adalah:</h4>
                            <div class="options">
                                <label><input type="radio" name="q16" value="T"> Menawarkan solusi dan langkah praktis</label>
                                <label><input type="radio" name="q16" value="F"> Menawarkan dukungan emosional dan mendengarkan</label>
                            </div>
                        </div>
                         <div class="question">
                            <h4>17. Anda lebih tersinggung jika seseorang menganggap Anda:</h4>
                            <div class="options">
                                <label><input type="radio" name="q17" value="T"> Tidak logis</label>
                                <label><input type="radio" name="q17" value="F"> Tidak peduli</label>
                            </div>
                        </div>
                         <div class="question">
                            <h4>18. Saat memberi kritik, Anda:</h4>
                            <div class="options">
                                <label><input type="radio" name="q18" value="T"> Langsung ke intinya secara jujur</label>
                                <label><input type="radio" name="q18" value="F"> Berusaha melembutkannya agar tidak menyakiti hati</label>
                            </div>
                        </div>

                        <div class="question">
                            <h4>19. Anda lebih suka hidup yang:</h4>
                            <div class="options">
                                <label><input type="radio" name="q19" value="J"> Terencana dan terstruktur</label>
                                <label><input type="radio" name="q19" value="P"> Fleksibel dan spontan</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>20. Saat bekerja, Anda:</h4>
                            <div class="options">
                                <label><input type="radio" name="q20" value="J"> Suka menyelesaikan tugas jauh sebelum tenggat waktu</label>
                                <label><input type="radio" name="q20" value="P"> Bekerja paling baik mendekati tenggat waktu (terpacu adrenalin)</label>
                            </div>
                        </div>
                        <div class="question">
                            <h4>21. Untuk liburan, Anda lebih suka:</h4>
                            <div class="options">
                                <label><input type="radio" name="q21" value="J"> Membuat rencana perjalanan (itinerary) yang rinci</label>
                                <label><input type="radio" name="q21" value="P"> Pergi dan melihat apa yang terjadi di sana (spontan)</label>
                            </div>
                        </div>
                         <div class="question">
                            <h4>22. Mengenai keputusan:</h4>
                            <div class="options">
                                <label><input type="radio" name="q22" value="J"> Anda suka mengambil keputusan dengan cepat</label>
                                <label><input type="radio" name="q22" value="P"> Anda suka membiarkan opsi tetap terbuka selama mungkin</label>
                            </div>
                        </div>
                         <div class="question">
                            <h4>23. Meja kerja Anda cenderung:</h4>
                            <div class="options">
                                <label><input type="radio" name="q23" value="J"> Rapi dan terorganisir</label>
                                <label><input type="radio" name="q23" value="P"> Terlihat berantakan namun Anda tahu di mana letaknya</label>
                            </div>
                        </div>
                         <div class="question">
                            <h4>24. Rencana yang berubah mendadak membuat Anda:</h4>
                            <div class="options">
                                <label><input type="radio" name="q24" value="J"> Merasa stres atau tidak nyaman</label>
                                <label><input type="radio" name="q24" value="P"> Merasa tertantang atau biasa saja</label>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="button" class="btn-calculate" onclick="calculateMBTI()">Lihat Hasil Kepribadian</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>
        </main>

<?php include 'includes/footer.html'; ?>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>