<?php
include 'koneksi.php';

if (isset($_POST['username'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi password dengan MD5

    $query = mysqli_query($koneksi, "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')");

    if ($query) {
        echo "<script>
                alert('Pendaftaran berhasil, silakan login!');
                document.location.href='login.php';
              </script>";
    } else {
        echo "<script>alert('Pendaftaran gagal!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran User</title>
</head>
<body>
    <h3 style="text-align: center;">Pendaftaran User</h3>
    <form method="POST">
        <table align="center">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Daftar</button>
                    <a href="login.php">Sudah punya akun? Login</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>