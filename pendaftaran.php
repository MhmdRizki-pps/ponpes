<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Santri</title>
</head>
<body>
    <h2>Pendaftaran Santri Baru</h2>
    <form action="proses-daftar.php" method="POST">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>No. HP:</label><br>
        <input type="text" name="no_hp" required><br><br>

        <label>Asal Sekolah:</label><br>
        <input type="text" name="sekolah" required><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
