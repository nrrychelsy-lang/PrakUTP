<!DOCTYPE html>
<html>
<head><title>Tambah Program Kerja</title></head>
<body>
    <h2>Tambah Program Kerja</h2>
    <form method="POST" action="index.php?act=tambah">
        No Program: <input type="number" name="nomor" required><br><br>
        Nama Program: <input type="text" name="nama" required><br><br>
        Surat Keterangan: <input type="text" name="surat" required><br><br>
        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>