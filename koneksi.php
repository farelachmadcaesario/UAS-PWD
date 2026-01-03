<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "pesawat";

$koneksi = mysqli_connect($host, $user, $pass, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {

}
?>