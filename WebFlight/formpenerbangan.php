<?php
function hitungPajak($asal, $tujuan) {
    $pajak_asal = [
        "Soekarno Hatta" => 65000,
        "Husein Sastranegara" => 50000,
        "Abdul Rachman Saleh" => 40000,
        "Juanda" => 30000
    ];

    $pajak_tujuan = [
        "Ngurah Rai" => 85000,
        "Hasanuddin" => 70000,
        "Inanwatan" => 90000,
        "Sultan Iskandar Muda" => 60000
    ];

    // Seleksi kondisi menggunakan if
    if (!isset($pajak_asal[$asal]) || !isset($pajak_tujuan[$tujuan])) {
        return 0;
    }

    return $pajak_asal[$asal] + $pajak_tujuan[$tujuan];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembelian Tiket Pesawat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img src="./assets/Background.jpg" alt="Background" class="bg-image">

<div class="container">
    <h2>Pendaftaran Rute Penerbangan</h2>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php
            $maskapai = $_POST['maskapai'];
            $asal = $_POST['bandara_asal'];
            $tujuan = $_POST['bandara_tujuan'];
            $harga = (int) $_POST['harga_tiket'];
            $tanggal = date("Y-m-d H:i:s");
            $nomor = rand(1, 100);

            $pajak = hitungPajak($asal, $tujuan);
            $total = $harga + $pajak;
        ?>
        <div class="result">
            <h3>Data Penerbangan</h3>
            <p><strong>Nomor:</strong> <?= $nomor ?></p>
            <p><strong>Tanggal:</strong> <?= $tanggal ?></p>
            <p><strong>Nama Maskapai:</strong> <?= htmlspecialchars($maskapai) ?></p>
            <p><strong>Asal Penerbangan:</strong> <?= $asal ?></p>
            <p><strong>Tujuan Penerbangan:</strong> <?= $tujuan ?></p>
            <p><strong>Harga Tiket:</strong> Rp <?= number_format($harga, 0, ',', '.') ?></p>
            <p><strong>Pajak:</strong> Rp <?= number_format($pajak, 0, ',', '.') ?></p>
            <p><strong>Total Harga Tiket:</strong> Rp <?= number_format($total, 0, ',', '.') ?></p>
        </div>
        <a href="formpenerbangan.php" class="btn-kembali">Kembali</a>
    <?php else: ?>
        <?php
            // Daftar bandara
            $asal_list = ["Soekarno Hatta", "Husein Sastranegara", "Abdul Rachman Saleh", "Juanda"];
            $tujuan_list = ["Ngurah Rai", "Hasanuddin", "Inanwatan", "Sultan Iskandar Muda"];
            
            // Urutkan array bandara
            sort($asal_list);
            sort($tujuan_list);
        ?>
        <form method="post" action="">
            <label for="maskapai">Nama Maskapai</label>
            <input type="text" name="maskapai" id="maskapai" required>

            <label for="asal">Bandara Asal</label>
            <select name="bandara_asal" id="asal" required>
                <?php foreach ($asal_list as $b): ?>
                    <option value="<?= $b ?>"><?= $b ?></option>
                <?php endforeach; ?>
            </select>

            <label for="tujuan">Bandara Tujuan</label>
            <select name="bandara_tujuan" id="tujuan" required>
                <?php foreach ($tujuan_list as $b): ?>
                    <option value="<?= $b ?>"><?= $b ?></option>
                <?php endforeach; ?>
            </select>

            <label for="harga">Harga Tiket</label>
            <input type="number" name="harga_tiket" id="harga" required>

            <button type="submit">Daftar Penerbangan</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
