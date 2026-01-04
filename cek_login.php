<?php
session_start();

require_once 'koneksi.php';

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = md5($_POST['password']); 

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['status'] = "login";
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['nama'] = $data['nama_lengkap'];

        header("Location: index.php");
    } else {
        echo "<script>alert('Username atau Password Salah!'); window.location='login.php';</script>";
    }
}
?>