<?php
session_start();
// Cek apakah session user sudah ada, jika belum arahkan kembali ke halaman login
if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body style="text-align: center;">
    <h2><a href="logout.php">Logout</a></h2>
    <hr>
    <h3>Selamat Datang, <?php echo $_SESSION['user']['nama']; ?></h3>
    <p>Halaman ini akan tampil setelah user login.</p>
</body>
</html>