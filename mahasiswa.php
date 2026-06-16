<?php
session_start();
// Hubungkan ke jembatan Supabase
require_once 'config/supabase.php';

// Proteksi Halaman
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Mengambil data mahasiswa secara real-time dari tabel 'mahasiswa' di Supabase
// Data diurutkan berdasarkan id paling baru (descending)
$data_mahasiswa = supabase_get('mahasiswa', 'order=id.desc');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Induk Mahasiswa - Asrama Waropen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f7f6;
        }
        .navbar-custom {
            background-color: #0f4c3a;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php"><i class="fa-solid fa-gauge-high me-2 text-warning"></i> PANEL KONTROL</a>
        <div class="ms-auto">
            <a href="dashboard.php" class="btn btn-warning btn-sm rounded-pill px-3 fw-bold shadow-sm me-2">
                <i class="fa-solid fa-arrow-left me-1"></i> Dashboard
            </a>
            <a href="logout.php" class="btn btn-danger btn-sm rounded-pill px-3 fw-bold shadow-sm">
                <i class="fa-solid fa-right-from-bracket me-1"></i> Keluar
            </a>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="card border-0 shadow-sm rounded-3 bg-white p-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-dark m-0"><i class="fa-solid fa-graduation-cap text-success me-2"></i>Data Induk Anak Asrama</h3>
                <small class="text-muted">Total data yang tersinkronisasi langsung dengan database cloud Supabase</small>
            </div>
            <a href="#" class="btn btn-success rounded-pill px-4 fw-bold shadow-sm" style="background-color: #0f4c3a; border: none;">
                <i class="fa-solid fa-user-plus me-1"></i> Tambah Mahasiswa
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle border">
                <thead class="table-light text-uppercase small fw-bold text-secondary">
                    <tr>
                        <th width="60" class="text-center">No</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Universitas / Kampus</th>
                        <th>Jurusan</th>
                        <th>No. WhatsApp</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data_mahasiswa)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-folder-open display-4 mb-3 d-block"></i>
                                <span class="fw-bold">Belum ada data mahasiswa.</span><br>Silakan klik tombol Tambah Mahasiswa untuk mengisi.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($data_mahasiswa as $mhs): ?>
                            <tr>
                                <td class="text-center fw-bold text-secondary"><?= $no++; ?></td>
                                <td class="fw-medium text-dark"><?= htmlspecialchars($mhs['nim']); ?></td>
                                <td class="fw-bold text-success"><?= htmlspecialchars($mhs['nama_lengkap']); ?></td>
                                <td><span class="badge bg-light text-dark border px-2.5 py-1.5 fw-medium"><i class="fa-solid fa-building-columns me-1 text-muted"></i><?= htmlspecialchars($mhs['universitas']); ?></span></td>
                                <td class="text-secondary"><?= htmlspecialchars($mhs['jurusan']); ?></td>
                                <td>
                                    <a href="https://wa.me/<?= $mhs['no_hp']; ?>" target="_blank" class="text-decoration-none text-dark small fw-medium">
                                        <i class="fa-brands fa-whatsapp text-success me-1 fs-5"></i><?= htmlspecialchars($mhs['no_hp']); ?>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-outline-primary" title="Ubah Data"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>