<?php
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
    <link rel="stylesheet" href="aset/style.css"> 
</head>
<body>

    <header>
        <div class="logo">SkyFleet Manager</div>
        <nav>
            <span style="font-size: 0.9rem;">Admin: Farel Achmad Caesario | A12.2024.07195</span>
        </nav>
    </header>

    <main>
        <div class="toolbar">
            <h2>Daftar Armada Pesawat</h2>
            <a href="tambah.php" class="btn-tambah">+ Tambah Armada</a>
        </div>

        <section class="fleet-grid">
            
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
                        <a href="hapus.php?id=<?= $row['id_pesawat'] ?>" class="btn-action" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </div>
                </article>

            <?php endwhile; ?>

        </section>
    </main>

</body>
</html>