<?php
if (isset($_POST['logout'])) {
  session_start();

  session_unset();
  session_destroy();

  header("Location: ../login.php");
  exit();
}
?>

<div class="header">
  <div class="logo-section">
    <a href="starter.php">
      <img
        src="../assets/img/LOGO FRIENDMIND.png" alt="FriendMind"
        width="250px"
        class="logo d-flex align-items-center me-auto" />
    </a href>
  </div>
  <form action="" method="post">
    <button class="logout-btn" name="logout">
      <span class="icon"></span> Log out
    </button>
  </form>
</div>