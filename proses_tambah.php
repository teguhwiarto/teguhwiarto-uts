<?php
// Pastikan tidak ada teks apapun sebelum tag <?php di atas
include "koneksi.php"; // [cite: 3]

$nis    = $_POST['nis'];
$nama   = $_POST['nama'];
$tugas  = $_POST['tugas'];
$uts    = $_POST['uts'];
$uas    = $_POST['uas'];

// Pastikan nama tabel adalah 'siswa' dan nama database 'akademik' [cite: 1]
$query = "INSERT INTO siswa (nis, nama, nilai_tugas, nilai_uts, nilai_uas) 
          VALUES ('$nis', '$nama', '$tugas', '$uts', '$uas')";

if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, kembali ke halaman utama
    header("Location: index.php?pesan=berhasil");
} else {
    // Jika gagal, tampilkan error
    echo "Gagal menyimpan: " . mysqli_error($koneksi);
}
?>