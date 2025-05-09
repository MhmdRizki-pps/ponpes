<?php
$host     = "localhost";     // atau 127.0.0.1
$user     = "root";          // default user XAMPP
$password = "";              // default password kosong
$db       = "ponpes";        // nama database kamu

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
