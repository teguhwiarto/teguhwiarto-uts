<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");
$d = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Data | E-Academic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .header-edit { background: #ff8f00; color: white; border-radius: 15px 15px 0 0; padding: 20px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="header-edit text-center">
                        <h4 class="m-0 fw-bold"><i class="fas fa-user-edit me-2"></i>Ubah Data Siswa</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="proses_edit.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">NIS</label>
                                    <input type="text" name="nis" class="form-control bg-light" value="<?php echo $d['nis']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control bg-light" value="<?php echo $d['nama']; ?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold text-warning">Nilai Tugas</label>
                                    <input type="number" name="tugas" class="form-control text-center fs-5" value="<?php echo $d['nilai_tugas']; ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold text-warning">Nilai UTS</label>
                                    <input type="number" name="uts" class="form-control text-center fs-5" value="<?php echo $d['nilai_uts']; ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold text-warning">Nilai UAS</label>
                                    <input type="number" name="uas" class="form-control text-center fs-5" value="<?php echo $d['nilai_uas']; ?>" required>
                                </div>
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
                                <button type="submit" class="btn btn-warning text-white rounded-pill px-5 shadow fw-bold">
                                    <i class="fas fa-sync-alt me-1"></i> Perbarui Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>