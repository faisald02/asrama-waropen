<?php
session_start();

// Proteksi Halaman: Jika belum login atau session habis, tendang kembali ke login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Asrama Waropen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f7f6;
        }
        .navbar-custom {
            background-color: #0f4c3a; /* Warna hijau khas asrama */
        }
        .card-menu {
            border: none;
            border-radius: 12px;
            transition: transform 0.2s;
        }
        .card-menu:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="fa-solid fa-gauge-high me-2 text-warning"></i> PANEL KONTROL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item text-white me-3">
                    <i class="fa-solid fa-user-circle text-warning me-1"></i> 
                    Hello, <span class="fw-bold text-uppercase"><?= $_SESSION['role']; ?></span>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-danger btn-sm rounded-pill px-3 fw-bold shadow-sm">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> KELUAR
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col">
            <div class="bg-white p-4 rounded-3 shadow-sm border-start border-success border-4">
                <h2 class="fw-bold text-dark m-0">Selamat Datang di Sistem Informasi</h2>
                <p class="text-secondary m-0 mt-1">Asrama Mahasiswa Kabupaten Waropen terintegrasi Cloud Supabase Database.</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card card-menu shadow-sm h-100 p-3 bg-white">
                <div class="card-body text-center">
                    <div class="bg-light text-success p-3 rounded-circle d-inline-block mb-3">
                        <i class="fa-solid fa-graduation-cap display-6"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Data Mahasiswa</h5>
<p class="text-muted small">Kelola seluruh data identitas mahasiswa yang aktif tinggal di asrama.</p>
<a href="mahasiswa.php" class="btn btn-outline-success btn-sm rounded-pill px-4 fw-medium mt-2">Buka Menu</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-menu shadow-sm h-100 p-3 bg-white">
                <div class="card-body text-center">
                    <div class="bg-light text-primary p-3 rounded-circle d-inline-block mb-3">
                        <i class="fa-solid fa-hotel display-6"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Manajemen Kamar</h5>
                    <p class="text-muted small">Atur pembagian nomor kamar dan inventaris fasilitas asrama.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4 fw-medium mt-2">Buka Menu</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-menu shadow-sm h-100 p-3 bg-white">
                <div class="card-body text-center">
                    <div class="bg-light text-warning p-3 rounded-circle d-inline-block mb-3">
                        <i class="fa-solid fa-sliders display-6"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Konfigurasi</h5>
                    <p class="text-muted small">Kelola data akun pengguna, hak akses instansi dinas, dan log sistem.</p>
                    <a href="#" class="btn btn-outline-warning btn-sm rounded-pill px-4 fw-medium mt-2">Buka Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>