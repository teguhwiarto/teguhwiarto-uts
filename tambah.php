<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data | E-Academic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .card-form { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .card-header-blue { background: #1a237e; color: white; padding: 20px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-form">
                    <div class="card-header-blue text-center">
                        <h4 class="m-0 fw-bold"><i class="fas fa-plus-circle me-2"></i>Tambah Data Siswa</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="proses_tambah.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nomor Induk Siswa (NIS)</label>
                                    <input type="text" name="nis" class="form-control" placeholder="1124xxx" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" required>
                                </div>
                            </div>
                            <hr class="my-4">
                            <h6 class="fw-bold mb-3"><i class="fas fa-edit me-2"></i>Input Nilai</h6>
                            <div class="row g-3">
                                <div class="col-md-4 text-center">
                                    <label class="form-label text-primary fw-bold">Tugas</label>
                                    <input type="number" name="tugas" class="form-control text-center" min="0" max="100" required>
                                </div>
                                <div class="col-md-4 text-center">
                                    <label class="form-label text-primary fw-bold">UTS</label>
                                    <input type="number" name="uts" class="form-control text-center" min="0" max="100" required>
                                </div>
                                <div class="col-md-4 text-center">
                                    <label class="form-label text-primary fw-bold">UAS</label>
                                    <input type="number" name="uas" class="form-control text-center" min="0" max="100" required>
                                </div>
                            </div>
                            <div class="mt-5 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-light px-4 border"><i class="fas fa-chevron-left me-2"></i>Kembali</a>
                                <button type="submit" class="btn btn-primary px-5 shadow fw-bold">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>