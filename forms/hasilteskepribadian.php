<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Hasil Tes Kepribadian MBTI - FriendMind</title>
    <meta name="description" content="Hasil tes kepribadian MBTI Anda di FriendMind." />
    <meta name="keywords" content="hasil tes mbti, kepribadian, friendmind" />

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
         .result-section {
             padding: 60px 0;
             background-color: #f8f9fa;
         }
         .result-container {
             max-width: 800px;
             margin: 0 auto;
             background: white;
             padding: 40px;
             border-radius: 10px;
             box-shadow: 0 4px 6px rgba(0,0,0,0.1);
             text-align: center;
         }
         .result-score { /* Kita gunakan ini untuk menampilkan Tipe MBTI */
             font-size: 48px;
             font-weight: bold;
             color: #007bff;
             margin-bottom: 20px;
         }
         .result-message { /* Kita gunakan ini untuk deskripsi */
             font-size: 18px;
             margin-bottom: 30px;
         }
         .btn-back {
             background-color: #28a745;
             color: white;
             border: none;
             padding: 12px 30px;
             border-radius: 5px;
             cursor: pointer;
             font-size: 16px;
             font-weight: 600;
         }
         .btn-back:hover {
             background-color: #218838;
         }
         .disclaimer {
             font-size: 0.9em;
             color: #666;
             margin-top: 30px;
         }
         .hero-label {
             display: inline-block;
             background-color: #d5f5e3;
             color: #10bc69;
             font-weight: 600;
             font-size: 14px;
             padding: 6px 14px;
             border-radius: 6px;
             margin-bottom: 20px;
         }
    </style>
</head>

<body class="index-page">
        <?php include 'includes/header.html'; ?>

    <main class="main">
        <section id="result" class="result-section">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">
                    <span class="hero-label">Hasil Tes Kepribadian</span>
                    <h2>Tipe Kepribadian Anda</h2>
                    <p>Berikut adalah tipe kepribadian Anda berdasarkan jawaban yang diberikan.</p>
                </div>
                <div class="result-container">
                    <div id="resultContent">
                        </div>
                    <button class="btn-back" onclick="window.location.href='dashboard.php'">Ulangi Tes</button>
                    <p class="disclaimer">Tipe kepribadian adalah alat bantu untuk memahami diri. </p>
                </div>
            </div>
        </section>
        </main>

    <footer id="footer" class="footer">
        <div class="container copyright text-center mt-4">
             <p>© <span>Copyright 2025</span> <strong class="px-1 sitename">FriendMind Sejahtera</strong> <span>All Rights Reserved</span></p>
         </div>
    </footer>

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

    <script>
        // Fungsi untuk mendapatkan parameter dari URL
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Database deskripsi singkat (bisa Anda kembangkan)
        const mbtiDescriptions = {
            "ISTJ": "<b>Sang Inspektur:</b> Praktis, sangat teliti, dan dapat diandalkan. Anda menghargai keteraturan dan tradisi.",
            "ISFJ": "<b>Sang Pelindung:</b> Hangat, penuh perhatian, dan bertanggung jawab. Anda berdedikasi untuk membantu orang lain.",
            "INFJ": "<b>Sang Penasihat:</b> Idealis, berprinsip, dan intuitif. Anda memiliki pemahaman mendalam tentang orang lain.",
            "INTJ": "<b>Sang Arsitek:</b> Strategis, logis, dan imajinatif. Anda selalu memiliki rencana untuk segala sesuatu.",
            "ISTP": "<b>Sang Pengrajin:</b> Logis, pengamat yang baik, dan ahli memecahkan masalah praktis. Anda suka 'coba-coba'.",
            "ISFP": "<b>Sang Seniman:</b> Ramah, sensitif, dan spontan. Anda menikmati momen saat ini dan menghargai keindahan.",
            "INFP": "<b>Sang Mediator:</b> Idealis, setia pada nilai-nilai, dan puitis. Anda ingin membuat dunia menjadi tempat yang lebih baik.",
            "INTP": "<b>Sang Ahli Logika:</b> Inovatif dan analitis. Anda memiliki dahaga tak terpuaskan akan pengetahuan.",
            "ESTP": "<b>Sang Wirausahawan:</b> Cerdas, energik, dan berani. Anda hidup di 'ujung tanduk' dan suka tantangan.",
            "ESFP": "<b>Sang Penghibur:</b> Spontan, bersemangat, dan antusias. Anda senang menjadi pusat perhatian.",
            "ENFP": "<b>Sang Juru Kampanye:</b> Antusias, kreatif, dan mudah bergaul. Anda selalu menemukan alasan untuk tersenyum.",
            "ENTP": "<b>Sang Pendebat:</b> Cerdas, penasaran, dan suka menantang ide. Anda tidak bisa menolak adu argumen yang bagus.",
            "ESTJ": "<b>Sang Eksekutif:</b> Terorganisir, jujur, dan pemimpin yang baik. Anda hebat dalam mengelola berbagai hal.",
            "ESFJ": "<b>Sang Konsul:</b> Penuh perhatian, populer, dan suportif. Anda selalu ingin membantu orang lain.",
            "ENFJ": "<b>Sang Protagonis:</b> Karismatik, inspiratif, dan menawan. Anda terlahir sebagai pemimpin.",
            "ENTJ": "<b>Sang Komandan:</b> Berani, imajinatif, dan berkemauan kuat. Anda selalu menemukan atau menciptakan jalan."
        };

        // Tampilkan hasil berdasarkan tipe
        const mbtiType = getQueryParam('type');
        const resultContent = document.getElementById('resultContent');

        if (mbtiType && mbtiDescriptions[mbtiType]) {
            const message = mbtiDescriptions[mbtiType];
            resultContent.innerHTML = `
                <div class="result-score">${mbtiType}</div>
                <div class="result-message">${message}</div>
            `;
        } else {
            resultContent.innerHTML = '<p>Terjadi kesalahan dalam memuat hasil. Silakan ulangi tes.</p>';
        }
    </script>
</body>
</html>