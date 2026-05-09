<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['pass'];

$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);

if ($data && $password == $data['password']) {
    $_SESSION['hakakses'] = $data['hakakses'];
    $_SESSION['username'] = $data['username'];
    header("Location: index.php");
} else {
    echo "<script>alert('Login Gagal!'); window.location='login.php';</script>";
}
?>