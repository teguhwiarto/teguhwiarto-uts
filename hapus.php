<?php
include "koneksi.php"; // Mengambil konfigurasi database 

// Mengambil ID siswa yang dikirim melalui URL
$id = $_GET['id']; 

// Menghapus data dari tabel siswa berdasarkan ID
$query = "DELETE FROM siswa WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, diarahkan kembali ke halaman utama
    header("Location: index.php?pesan=hapus_berhasil");
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>