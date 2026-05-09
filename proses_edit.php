<?php
include "koneksi.php"; // [cite: 3]

$id     = $_POST['id'];
$nis    = $_POST['nis'];
$nama   = $_POST['nama'];
$tugas  = $_POST['tugas'];
$uts    = $_POST['uts'];
$uas    = $_POST['uas'];

$query = "UPDATE siswa SET 
          nis='$nis', 
          nama='$nama', 
          nilai_tugas='$tugas', 
          nilai_uts='$uts', 
          nilai_uas='$uas' 
          WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php?pesan=update_berhasil");
} else {
    echo "Gagal mengupdate: " . mysqli_error($koneksi);
}
?>