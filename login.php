<?php
session_start();
// Hubungkan ke file jembatan Supabase Anda
require_once 'config/supabase.php';

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

$error = false;

// Eksekusi ketika tombol MASUK ditekan
if (isset($_POST['submit_login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role     = $_POST['role'];

    // Ambil data dari Supabase
    $user_data = supabase_get('users');

    // ========================================================
    // KOTAK DEBUGGING: MELIHAT RESPON ASLI SUPABASE
    // ========================================================
    echo "<div style='background: #fff; color: #000; padding: 20px; border: 4px solid #dc3545; position: relative; z-index: 99999; font-family: monospace;'>";
    echo "<h3>🔍 LAPORAN DIAGNOSIS KONEKSI DATABASE:</h3>";
    echo "<b>1. Input Form:</b> Username: <mark>$username</mark> | Role: <mark>$role</mark><br><br>";
    
    if (empty($user_data)) {
        echo "<b style='color: red;'>❌ ERROR: Data dari Supabase KOSONG!</b><br>";
        echo "Kemungkinan Penyebab: API Key/URL di file <u>config/supabase.php</u> salah atau koneksi internet terputus.";
    } else {
        echo "<b style='color: green;'>✅ BERHASIL: Supabase Merespon Data!</b><br>";
        echo "Isi tabel users yang ditarik:<pre style='background: #f8f9fa; padding: 10px; border: 1px solid #ccc;'>";
        print_r($user_data);
        echo "</pre>";
    }
    echo "</div>";
    // ========================================================

    $login_sukses = false;

    // Jika user_data berbentuk string JSON (karena beberapa versi file jembatan mengembalikan string), ubah ke array
    if (is_string($user_data)) {
        $user_data = json_decode($user_data, true);
    }

    if (!empty($user_data) && is_array($user_data)) {
        foreach ($user_data as $user) {
            if ($user['username'] === $username && $user['password'] === $password && $user['role'] === $role) {
                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $user['id'];
                $_SESSION['username'] = (!empty($user['nama_lengkap'])) ? $user['nama_lengkap'] : $user['username'];
                $_SESSION['role'] = $user['role'];
                
                $login_sukses = true;
                break;
            }
        }
    }

    if ($login_sukses) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem - Asrama Waropen</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #0f4c3a 0%, #0a2540 100%);
            min-height: 100vh;
            display: block; 
        }
        
        .login-wrapper {
            min-height: calc(100vh - 75px); 
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            border: none;
            border-top: 5px solid #ffc107;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            background-color: #ffffff;
            position: relative;
        }

        .card-header-papua {
            position: relative;
            height: 140px;
            background: linear-gradient(rgba(15, 76, 58, 0.7), rgba(10, 37, 64, 0.85)), 
                        url('https://images.unsplash.com/photo-1621551003713-393282f1b402?q=80&w=600&auto=format&fit=crop') center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-align: center;
        }

        .card-header-papua::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #ffc107 0%, #dc3545 50%, #ffc107 100%);
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
        }

        .form-control, .form-select {
            border-left: none;
        }

        .form-control:focus, .form-select:focus {
            border-color: #dee2e6;
            box-shadow: none;
        }

        .input-group:focus-within .input-group-text {
            border-color: #86b7fe;
        }
        
        .input-group:focus-within .form-control {
            border-color: #86b7fe;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="login-wrapper">
    <div class="card login-card">
        
        <div class="card-header-papua px-4">
            <i class="fa-solid fa-tree-city text-warning display-5 mb-1"></i>
            <h5 class="fw-bold m-0 tracking-wide text-uppercase" style="letter-spacing: 1px;">Sistem Informasi</h5>
            <small class="fw-medium text-warning text-uppercase small" style="font-size: 0.75rem; letter-spacing: 0.5px;">Asrama Mahasiswa Kabupaten Waropen</small>
        </div>

        <div class="card-body p-4">
            
            <?php if ($error): ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center py-2" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-2 fs-5"></i>
                    <div class="small fw-bold">Username, Password, atau Role salah!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary"><i class="fa-solid fa-user-shield me-1 text-success"></i> Hak Akses Pengguna</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-users text-muted small"></i></span>
                        <select class="form-select text-dark fw-medium" name="role" required>
                            <option value="admin">Admin Asrama</option>
                            <option value="dinas">Dinas Pendidikan (Kab. Waropen)</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Username / Email Akun</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user text-muted small"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" required autocomplete="off">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Kata Sandi (Password)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock text-muted small"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                    </div>
                </div>

                <button type="submit" name="submit_login" class="btn btn-success w-100 py-2.5 fw-bold rounded-pill shadow-sm border-0" style="background-color: #0f4c3a;">
                    MASUK KE SYSTEM <i class="fa-solid fa-right-to-bracket ms-1"></i>
                </button>
            </form>

            <div class="text-center mt-4 pt-2 border-top border-light">
                <a href="index.php" class="text-decoration-none small text-success fw-bold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda Utama
                </a>
            </div>
        </div>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>