<?php
require_once 'koneksi.php';

if (isset($_POST['simpan'])) {

    $registrasi = htmlspecialchars($_POST['registrasi']);
    $maskapai   = htmlspecialchars($_POST['maskapai']);
    $model      = htmlspecialchars($_POST['model']);
    $base       = strtoupper(htmlspecialchars($_POST['base_airport'])); 
    $jam        = (int) $_POST['total_jam_terbang']; 
    $status     = htmlspecialchars($_POST['status_pesawat']);
    $tgl_ops    = date('Y-m-d'); 
    $serial_random = "MSN-" . rand(1000, 9999); 
    $query = "INSERT INTO pesawat 
              (registrasi, serial_number, model, maskapai, status_pesawat, total_jam_terbang, tgl_operasional, base_airport) 
              VALUES 
              ('$registrasi', '$serial_random', '$model', '$maskapai', '$status', '$jam', '$tgl_ops', '$base')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }

} else {
    header("Location: tambah.php");
}
?>