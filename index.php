<?php
session_start();
// Memastikan user sudah login sebelum mengakses halaman ini
if (!isset($_SESSION['username'])) { 
    header("Location: login.php"); 
    exit();
}
include "koneksi.php"; // Menghubungkan ke database db_sekolah_kita
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Academic | Dashboard Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; }
        .navbar { background: #1a237e; border-bottom: 4px solid #ffd600; }
        .main-card { border: none; border-radius: 15px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); }
        .table thead { background-color: #f8f9fa; }
        .status-badge { font-size: 0.8rem; padding: 6px 12px; font-weight: 600; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4 p-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-university me-2"></i>E-ACADEMIC</a>
        <div class="d-flex align-items-center">
            <span class="text-light me-3 small">Halo, <strong><?php echo $_SESSION['username']; ?></strong></span>
            <a href="logout.php" class="btn btn-warning btn-sm rounded-pill px-3 fw-bold" onclick="confirmLogout(event)">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="main-card bg-white p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold m-0 text-dark">Data Nilai Siswa</h3>
                <p class="text-muted mb-0 small">Daftar lengkap hasil ujian dan rata-rata akhir</p>
            </div>
            <a href="tambah.php" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Tambah Data
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle border-top">
                <thead class="table-light">
                    <tr class="text-secondary small text-uppercase">
                        <th width="5%">No</th>
                        <th width="25%">Nama & NIS</th>
                        <th class="text-center">Tugas</th>
                        <th class="text-center">UTS</th>
                        <th class="text-center">UAS</th>
                        <th class="text-center">Rata-rata</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC");
                    while($d = mysqli_fetch_array($query)){
                        // Menghitung Nilai Rata-rata
                        $rata_rata = ($d['nilai_tugas'] + $d['nilai_uts'] + $d['nilai_uas']) / 3;
                        $status = ($rata_rata >= 70) ? "LULUS" : "GAGAL";
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <div class="fw-bold text-dark"><?php echo $d['nama']; ?></div>
                            <div class="text-muted small">NIS: <?php echo $d['nis']; ?></div>
                        </td>
                        <td class="text-center text-secondary"><?php echo $d['nilai_tugas']; ?></td>
                        <td class="text-center text-secondary"><?php echo $d['nilai_uts']; ?></td>
                        <td class="text-center text-secondary"><?php echo $d['nilai_uas']; ?></td>
                        <td class="text-center fw-bold text-primary">
                            <?php echo number_format($rata_rata, 1); ?>
                        </td>
                        <td class="text-center">
                            <span class="badge rounded-pill status-badge <?php echo ($status == "LULUS") ? 'bg-success' : 'bg-danger'; ?>">
                                <?php echo $status; ?>
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group shadow-sm" role="group">
                                <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-outline-warning" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger" onclick="confirmDelete(<?php echo $d['id']; ?>, '<?php echo $d['nama']; ?>')" title="Hapus Data">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Konfirmasi Hapus dengan SweetAlert2
    function confirmDelete(id, nama) {
        Swal.fire({
            title: 'Hapus Data Siswa?',
            text: "Data nilai milik '" + nama + "' akan dihapus selamanya.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#adb5bd',
            confirmButtonText: 'Ya, Hapus Data',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "hapus.php?id=" + id;
            }
        })
    }

    // Konfirmasi Logout dengan SweetAlert2
    function confirmLogout(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Keluar',
            text: "Apakah Anda yakin ingin mengakhiri sesi?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1a237e',
            cancelButtonColor: '#adb5bd',
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "logout.php";
            }
        })
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>