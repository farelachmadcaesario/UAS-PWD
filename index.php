<?php
session_start(); 
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: login.php");
    exit;
}
require_once 'koneksi.php';

$query = "SELECT * FROM pesawat ORDER BY id_pesawat DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Management System</title>
    <link rel="stylesheet" href="aset/style.css?v=<?php echo time(); ?>"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="https://img.icons8.com/color/48/airplane-take-off.png" type="image/png">
        <style>
        @media print {
            header,
            footer,
            .btn-action,
            .toolbar button,
            .toolbar input,
            .toolbar .btn-tambah,
            .toolbar a {
                display: none !important;
            }

            .toolbar {
                display: block !important;
                text-align: center;
                border-bottom: 2px solid #000;
                margin-bottom: 20px;
            }

            .toolbar h2 {
                display: block !important;
                font-size: 24pt;
                color: #000;
            }

            .fleet-grid {
                display: block !important;
            }

            .card {
                border: 1px solid #000 !important;
                box-shadow: none !important;
                margin-bottom: 20px;
                page-break-inside: avoid;
            }

            body {
                background-color: #fff !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">SkyFleet Manager</div>
        <nav>
            <span style="font-size: 0.9rem;">Admin: Farel Achmad Caesario | A12.2024.07195</span>
            <a href="logout.php" style="color: white; text-decoration: none; border: 1px solid white; padding: 5px 10px; border-radius: 4px; font-size: 0.8rem;">Logout ↪</a>
        </nav>
    </header>

    <main>
    <div class="toolbar">
            <h2>Daftar Armada Pesawat</h2>
            
            <div style="display: flex; gap: 10px;">
                <input type="text" id="searchFleet" placeholder="Cari Maskapai / Registrasi..." 
                       style="padding: 0.8rem; border: 1px solid #ccc; border-radius: 5px; width: 250px;">
                <button onclick="window.print()" class="btn-print" style="background: #6c757d; color: white; border: none; padding: 0.8rem 1.2rem; border-radius: 5px; cursor: pointer; font-weight: bold;">Cetak</button>
                <a href="tambah.php" class="btn-tambah">+ Tambah Armada</a>
            </div>
        </div>

        <section class="fleet-grid">
            
            <?php if (mysqli_num_rows($result) > 0) : ?>

                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                    
                    <?php
                        $maskapai_db = $row['maskapai'];
                        $file_gambar = 'default.png'; 
                        if (stripos($maskapai_db, 'Garuda') !== false) {
                            $file_gambar = 'garuda.png';
                        } elseif (stripos($maskapai_db, 'Lion') !== false) {
                            $file_gambar = 'lion.jpg'; 
                        } elseif (stripos($maskapai_db, 'Citilink') !== false) {
                            $file_gambar = 'citilink.png';
                        } elseif (stripos($maskapai_db, 'AirAsia') !== false) {
                            $file_gambar = 'airasia.png';
                        } elseif (stripos($maskapai_db, 'Batik') !== false) {
                            $file_gambar = 'batik.png';
                        } elseif (stripos($maskapai_db, 'Super Air Jet') !== false) {
                            $file_gambar = 'superairjet.webp';
                        }    
                    ?>  

                    <article class="card" style="border-top-color: 
                        <?php 
                            if($row['status_pesawat'] == 'Active') echo '#28a745';
                            elseif($row['status_pesawat'] == 'Maintenance') echo '#ffc107';
                            else echo '#dc3545';
                        ?>">
                        
                        <div class="card-header">
                            <span class="reg-code"><?= $row['registrasi'] ?></span>
                            <span class="badge status-<?= $row['status_pesawat'] ?>">
                                <?= $row['status_pesawat'] ?>
                            </span>
                        </div>

                        <div class="card-body">
                            <img src="aset/foto/<?= $file_gambar ?>" alt="Logo Maskapai" class="airline-logo">
                            
                            <h3 style="margin-bottom: 0.5rem; font-size: 1.1rem;"><?= $row['maskapai'] ?></h3>
                            <p style="color: #666; margin-bottom: 1rem;"><?= $row['model'] ?></p>
                            
                            <hr style="border: 0; border-top: 1px solid #eee; margin: 10px 0;">

                            <div style="display: flex; justify-content: space-between; font-size: 0.9rem;">
                                <span>Total Terbang:</span>
                                <strong><?= number_format($row['total_jam_terbang']) ?> Jam</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 0.9rem; margin-top: 5px;">
                                <span>Home Base:</span>
                                <strong><?= $row['base_airport'] ?></strong>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="edit.php?id=<?= $row['id_pesawat'] ?>" class="btn-action">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_pesawat'] ?>" class="btn-action">Hapus</a>
                        </div>
                    </article>

                <?php endwhile; ?>

            <?php else : ?>

                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem; background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">🛫</div>
                    <h3 style="color: #555; margin-bottom: 0.5rem;">Belum ada armada yang terdaftar</h3>
                    <p style="color: #888; margin-bottom: 2rem;">Database pesawat saat ini masih kosong. Silakan tambahkan data baru.</p>
                    <a href="tambah.php" class="btn-tambah" style="padding: 1rem 2rem;">Mulai Tambah Data</a>
                </div>

            <?php endif; ?>

        </section>
    </main>
    <footer style="text-align: center; padding: 2rem; color: #888; font-size: 0.8rem; margin-top: 2rem; border-top: 1px solid #eee;">
        <p>&copy; <?= date('Y') ?> Fleet Management System.</p>
        <p>Created with by <strong>Farel Achmad Caesario | A12.2024.07195</strong> - Universitas Dian Nuswantoro</p>
    </footer>
    <script src="aset/script.js"></script>
</body>
</html>