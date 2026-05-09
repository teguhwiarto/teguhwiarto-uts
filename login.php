<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | E-Academic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a237e 0%, #3949ab 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }
        .btn-login {
            background: #1a237e;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 10px;
        }
        .btn-login:hover { background: #0d1440; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <div class="h1 text-primary"><i class="fas fa-user-shield"></i></div>
            <h4 class="fw-bold">Portal Akademik</h4>
            <p class="text-muted small">Masuk untuk mengelola data siswa</p>
        </div>
        
        <form action="loginsubmit.php" method="POST">
            <div class="mb-3">
                <label class="form-label small fw-bold">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" class="form-control bg-light border-0" placeholder="Username" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-lock"></i></span>
                    <input type="password" name="pass" class="form-control bg-light border-0" placeholder="••••••••" required>
                </div>
            </div>
            <button type="submit" name="Submit" class="btn btn-primary btn-login w-100 shadow">MASUK</button>
        </form>
    </div>
</body>
</html>