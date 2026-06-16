<?php
// includes/header-dashboard.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    <title>Panel Kontrol - Asrama Waropen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root { --primary: #0f4c3a; --dark: #0a2540; }
        body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
        .sidebar { background-color: var(--dark); min-height: 100vh; color: white; z-index: 1000; }
        .sidebar .nav-link { color: rgba(255,255,255,0.75); font-weight: 500; padding: 10px 15px; display: block; text-decoration: none; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { color: #ffc107; background-color: rgba(255,255,255,0.05); border-radius: 5px; }
        .main-content { margin-left: 25%; }
        @media (min-width: 768px) { .main-content { margin-left: 25%; } }
        @media (min-width: 992px) { .main-content { margin-left: 16.66667%; } }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php include 'includes/sidebar-dashboard.php'; ?>
        
        <div class="col-md-9 col-lg-10 main-content p-4">
            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm mb-4">
                <div>
                    <h5 class="fw-bold text-dark mb-0">Sistem Informasi Asrama</h5>
                    <small class="text-muted">Logged in as: <strong><?= $_SESSION['username']; ?></strong> (<?= text_capitalize($_SESSION['role']); ?>)</small>
                </div>
                <a href="index.php" class="btn btn-outline-success btn-sm rounded-pill"><i class="fa-solid fa-globe me-1"></i> Web Utama</a>
            </div>
<?php
function text_capitalize($string) { return strtoupper($string); }
?>