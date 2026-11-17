<?php
session_start();
session_destroy(); // Menghapus semua session yang aktif

echo "<script>
        alert('Selamat Anda berhasil logout');
        document.location.href='login.php';
      </script>";
?>