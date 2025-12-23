// Toggle password visibility
const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");
const eyeIcon = document.getElementById("eyeIcon");

togglePassword.addEventListener("click", () => {
  const isPassword = passwordInput.type === "password";
  passwordInput.type = isPassword ? "text" : "password";

  // Swap icon (eye / eye-slash)
  eyeIcon.src = isPassword
    ? "https://img.icons8.com/ios-glyphs/20/9ca3af/invisible.png"
    : "https://img.icons8.com/ios-glyphs/20/9ca3af/visible.png";

  togglePassword.setAttribute(
    "aria-label",
    isPassword ? "Sembunyikan password" : "Lihat password"
  );
});

// Tambahkan ini untuk alert setelah redirect
window.addEventListener("load", () => {
  if (typeof loginSuccess !== "undefined" && loginSuccess) {
    alert("Anda berhasil masuk di FriendMind!");
  }
});
