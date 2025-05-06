<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = $koneksi->query("
    SELECT krs.id, m.npm, m.nama AS nama_mhs, m.jurusan, m.alamat,
           mk.kodemk, mk.nama AS namamk, mk.jumlah_sks AS sks
    FROM krs
    JOIN mahasiswa m ON krs.mahasiswa_npm = m.npm
    JOIN matakuliah mk ON krs.matakuliah_kodemk = mk.kodemk
    WHERE krs.id = $id
");

$data = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data KRS</h2>
    <form action="edit-process.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <fieldset>
            <legend>Data Mahasiswa</legend>
            <label>NPM:</label>
            <input type="text" name="npm" value="<?= $data['npm'] ?>" readonly>

            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $data['nama_mhs'] ?>">

            <label>Jurusan:</label>
            <select name="jurusan">
                <option <?= $data['jurusan'] == 'Informatika' ? 'selected' : '' ?>>Informatika</option>
                <option <?= $data['jurusan'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
            </select>

            <label>Alamat:</label>
            <textarea name="alamat"><?= $data['alamat'] ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Data Mata Kuliah</legend>
            <label>Kode:</label>
            <input type="text" name="kodemk" value="<?= $data['kodemk'] ?>">

            <label>Nama Matkul:</label>
            <input type="text" name="namamk" value="<?= $data['namamk'] ?>">

            <label>SKS:</label>
            <input type="number" name="sks" value="<?= $data['sks'] ?>">
        </fieldset>

        <button type="submit">Update</button>
    </form>
</body>
</html>
