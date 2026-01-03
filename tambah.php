<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Armada Baru</title>
    <link rel="stylesheet" href="aset/style.css">
    <style>
        .form-container {
            background: white;
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .form-group { margin-bottom: 1.2rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        input, select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn-submit {
            background: #003366;
            color: white;
            border: none;
            padding: 1rem;
            width: 100%;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-submit:hover { background: #002244; }
        .btn-back { display: inline-block; margin-bottom: 1rem; color: #666; text-decoration: none; }
    </style>
</head>
<body>

    <header>
        <div class="logo">SkyFleet Admin</div>
    </header>

    <main>
        <a href="index.php" class="btn-back">← Kembali ke Dashboard</a>
        
        <div class="form-container">
            <h2 style="margin-bottom: 1.5rem; text-align: center;">Registrasi Pesawat Baru</h2>
            
            <form action="proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label>Nomor Registrasi</label>
                    <input type="text" name="registrasi" required placeholder="PK-..." maxlength="10">
                </div>

                <div class="form-group">
                    <label>Maskapai</label>
                    <select name="maskapai" required>
                        <option value="">-- Pilih Maskapai --</option>
                        <option value="Garuda Indonesia">Garuda Indonesia</option>
                        <option value="Lion Air">Lion Air</option>
                        <option value="Citilink">Citilink</option>
                        <option value="Batik Air">Batik Air</option>
                        <option value="AirAsia">AirAsia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Model Pesawat</label>
                    <input type="text" name="model" required placeholder="Contoh: Boeing 737-800 NG">
                </div>

                <div class="form-group">
                    <label>Base Airport (Kode IATA)</label>
                    <input type="text" name="base_airport" required placeholder="CGK/SUB/DPS" maxlength="3" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                    <label>Total Jam Terbang (Opsional)</label>
                    <input type="number" name="total_jam_terbang" value="0">
                </div>

                <div class="form-group">
                    <label>Status Awal</label>
                    <select name="status_pesawat">
                        <option value="Active">Active (Siap Terbang)</option>
                        <option value="Maintenance">Maintenance (Perbaikan)</option>
                        <option value="Grounded">Grounded (Dilarang Terbang)</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit" name="simpan">Simpan Data Armada</button>
            </form>
        </div>
    </main>

</body>
</html>