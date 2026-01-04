<?php
require_once 'koneksi.php';

if (isset($_POST['update'])) {
    $id         = $_POST['id_pesawat'];
    $registrasi = htmlspecialchars($_POST['registrasi']);
    $maskapai   = htmlspecialchars($_POST['maskapai']);
    $model      = htmlspecialchars($_POST['model']);
    $base       = strtoupper(htmlspecialchars($_POST['base_airport']));
    $jam        = (int) $_POST['total_jam_terbang'];
    $status     = htmlspecialchars($_POST['status_pesawat']);

    $query = "UPDATE pesawat SET 
              registrasi = '$registrasi',
              maskapai = '$maskapai',
              model = '$model',
              base_airport = '$base',
              total_jam_terbang = '$jam',
              status_pesawat = '$status'
              WHERE id_pesawat = $id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
}
?>