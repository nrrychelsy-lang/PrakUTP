<!DOCTYPE html>
<html>
<head><title>Sistem Informasi Proker BEM</title></head>
<body>
    <h2>Daftar Program Kerja BEM FILKOM</h2>
    <p>Selamat Datang: <b><?= $_SESSION['user']['nama']; ?></b> (Jabatan: <?= $_SESSION['user']['jabatan']; ?> | Role: <b><?= $_SESSION['user']['role']; ?></b>) | <a href="index.php?act=logout">Logout</a></p>
    <hr>

    <!-- Tombol Tambah hanya aktif/muncul untuk Kepala Departemen -->
    <?php if ($_SESSION['user']['role'] == 'Kepala Departemen'): ?>
        <a href="index.php?act=tambah">+ Tambah Program Kerja</a><br><br>
    <?php endif; ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Program Kerja</th>
            <th>Surat Keterangan</th>
            <?php if ($_SESSION['user']['role'] == 'Kepala Departemen'): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($proker as $row): ?>
        <tr>
            <td><?= $row['nomorProgram']; ?></td>
            <td><?= $row['namaProgram']; ?></td>
            <td><?= $row['suratKeterangan']; ?></td>
            <?php if ($_SESSION['user']['role'] == 'Kepala Departemen'): ?>
            <td>
                <a href="index.php?act=edit&id=<?= $row['nomorProgram']; ?>">Edit</a> | 
                <a href="index.php?act=hapus&id=<?= $row['nomorProgram']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>