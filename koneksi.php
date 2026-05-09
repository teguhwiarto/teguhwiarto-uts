<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_sekolah_kita"; // Nama database telah diubah

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>