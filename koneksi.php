<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "belajar_db"; // Sesuaikan dengan nama database Anda di phpMyAdmin

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>