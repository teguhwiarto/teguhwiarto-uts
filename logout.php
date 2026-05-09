<?php
session_start(); // Memulai sesi 

// Menghapus semua variabel session yang ada 
session_unset(); 

// Memberikan pesan sukses logout ke dalam session 
$_SESSION['logout'] = 'Berhasil logout.';

// Mengalihkan halaman kembali ke form login 
header("Location: login.php");
exit();
?>