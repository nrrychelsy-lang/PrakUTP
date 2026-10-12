<!DOCTYPE html>
<html>
<head><title>Edit Program Kerja</title></head>
<body>
    <h2>Edit Program Kerja</h2>
    <form method="POST" action="index.php?act=edit&id=<?= $data['nomorProgram']; ?>">
        No Program: <input type="number" value="<?= $data['nomorProgram']; ?>" disabled><br><br>
        Nama Program: <input type="text" name="nama" value="<?= $data['namaProgram']; ?>" required><br><br>
        Surat Keterangan: <input type="text" name="surat" value="<?= $data['suratKeterangan']; ?>" required><br><br>
        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>