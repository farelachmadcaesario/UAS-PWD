<?php
session_start(); 
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: login.php");
    exit;
}
require_once 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM pesawat WHERE id_pesawat = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) < 1) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Armada</title>
    <link rel="stylesheet" href="aset/style.css">
    <link rel="icon" href="https://img.icons8.com/color/48/airplane-take-off.png" type="image/png">
    <style>
        .form-container { background: white; max-width: 600px; margin: 2rem auto; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 1.2rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        input, select { width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; }
        .btn-submit { background: #ffc107; color: #333; border: none; padding: 1rem; width: 100%; border-radius: 5px; font-weight: bold; cursor: pointer; }
        .btn-submit:hover { background: #e0a800; }
    </style>
</head>
<body>
    <header><div class="logo">Edit Data</div></header>

    <main>
        <a href="index.php" style="display:inline-block; margin-bottom:1rem; text-decoration:none; color:#555;">← Batal Edit</a>
        
        <div class="form-container">
            <h2 style="text-align: center; margin-bottom: 1.5rem;">Perbarui Data Pesawat</h2>
            
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="id_pesawat" value="<?= $data['id_pesawat'] ?>">

                <div class="form-group">
                    <label>Nomor Registrasi</label>
                    <input type="text" name="registrasi" value="<?= $data['registrasi'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Maskapai</label>
                    <select name="maskapai" required>
                        <option value="Garuda Indonesia" <?= ($data['maskapai'] == 'Garuda Indonesia') ? 'selected' : '' ?>>Garuda Indonesia</option>
                        <option value="Lion Air" <?= ($data['maskapai'] == 'Lion Air') ? 'selected' : '' ?>>Lion Air</option>
                        <option value="Citilink" <?= ($data['maskapai'] == 'Citilink') ? 'selected' : '' ?>>Citilink</option>
                        <option value="Batik Air" <?= ($data['maskapai'] == 'Batik Air') ? 'selected' : '' ?>>Batik Air</option>
                        <option value="AirAsia" <?= ($data['maskapai'] == 'AirAsia') ? 'selected' : '' ?>>AirAsia</option>
                        <option value="Super Air Jet" <?= ($data['maskapai'] == 'Super Air Jet') ? 'selected' : '' ?>>Super Air Jet</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Model Pesawat</label>
                    <input type="text" name="model" value="<?= $data['model'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Base Airport</label>
                    <input type="text" name="base_airport" value="<?= $data['base_airport'] ?>" required maxlength="3" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                    <label>Total Jam Terbang</label>
                    <input type="number" name="total_jam_terbang" value="<?= $data['total_jam_terbang'] ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status_pesawat">
                        <option value="Active" <?= ($data['status_pesawat'] == 'Active') ? 'selected' : '' ?>>Active</option>
                        <option value="Maintenance" <?= ($data['status_pesawat'] == 'Maintenance') ? 'selected' : '' ?>>Maintenance</option>
                        <option value="Grounded" <?= ($data['status_pesawat'] == 'Grounded') ? 'selected' : '' ?>>Grounded</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit" name="update">Simpan Perubahan</button>
            </form>
        </div>
    </main>
        <footer style="text-align: center; padding: 2rem; color: #888; font-size: 0.8rem; margin-top: 2rem; border-top: 1px solid #eee;">
        <p>&copy; <?= date('Y') ?> Fleet Management System.</p>
        <p>Created with by <strong>Farel Achmad Caesario | A12.2024.07195</strong> - Universitas Dian Nuswantoro</p>
    </footer>
</body>
</html>