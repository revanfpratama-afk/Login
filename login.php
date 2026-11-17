<?php
// Enable error reporting at the very top for proper debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';
session_start();

$error_message = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Menggunakan md5 agar cocok dengan saat daftar

    // Use Prepared Statements to prevent SQL Injection
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);
    
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        
        $_SESSION['user'] = $data; 
        echo "<script>
                alert('Selamat datang, " . addslashes($data['nama']) . "');
                document.location.href='index.php';
              </script>";
        exit;
    } else {
        $error_message = "Username atau password tidak sesuai!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h3 style="text-align: center;">Login ke Aplikasi</h3>
    
    <?php if (!empty($error_message)): ?>
        <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <table align="center">
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
                    <button type="submit">Login</button>
                    <a href="daftar.php">Belum punya akun? Daftar</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>