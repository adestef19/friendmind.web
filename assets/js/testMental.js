function calculateScore() {
  const form = document.getElementById("depressionTest");
  let totalScore = 0;
  const totalQuestions = 10;

  // Hitung skor dari semua pertanyaan
  for (let i = 1; i <= totalQuestions; i++) {
    const answer = form["q" + i].value;
    if (answer === "") {
      alert("Pastikan semua pertanyaan sudah dijawab sebelum menghitung skor.");
      return;
    }
    totalScore += parseInt(answer);
  }

  // Arahkan ke halaman hasil tes dengan membawa skor sebagai parameter URL
  window.location.href = "hasiltesmental.php?score=" + totalScore;
}
