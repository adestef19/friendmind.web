document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("calculate");

  if (!btn) {
    console.error("Button calculate tidak ditemukan");
    return;
  }

  btn.addEventListener("click", () => {
    const form = document.getElementById("depressionTest");
    const checkedRadios = form.querySelectorAll('input[type="radio"]:checked');

    if (checkedRadios.length === 0) {
      alert("Silakan jawab pertanyaan terlebih dahulu.");
      return;
    }

    let totalScore = 0;

    checkedRadios.forEach((radio) => {
      totalScore += parseInt(radio.value);
    });

    window.location.href = "hasiltesmental.php?score=" + totalScore;
  });
});
