<?php
include 'koneksi2.php';

$nama    = $_POST['nama'];
$alamat  = $_POST['alamat'];
$no_hp   = $_POST['no_hp'];
$sekolah = $_POST['sekolah'];

$sql = "INSERT INTO pendaftar (nama, alamat, no_hp, sekolah)
        VALUES ('$nama', '$alamat', '$no_hp', '$sekolah')";

if (mysqli_query($conn, $sql)) {
    echo "Pendaftaran berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
