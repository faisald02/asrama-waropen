<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Asrama Mahasiswa Waropen</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <link rel="stylesheet" href="/asrama-waropen/assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow" style="background-color: #0f4c3a;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/asrama-waropen/index.php">
            <img src="/asrama-waropen/assets/images/logo-waropen.jpg" alt="Logo Waropen" class="me-2" style="height: 45px; width: auto; object-fit: contain;" onerror="this.src='https://placehold.co/45x45?text=LOGO'">
            
            <div class="d-flex flex-column lh-1">
                <span class="fw-bold tracking-wide" style="font-size: 1.15rem; color: #ffffff;">ASRAMA MAHASISWA</span>
                <span class="fw-bold text-warning" style="font-size: 0.9rem; letter-spacing: 1px;">KABUPATEN WAROPEN</span>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item px-2">
                    <a class="nav-link text-white" href="/asrama-waropen/index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-white" href="/asrama-waropen/about.php"><i class="fa-solid fa-circle-info me-1"></i> About</a>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-sitemap me-1"></i> Struktur Organisasi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item py-2" href="/asrama-waropen/index.php#struktur-putra"><i class="fa-solid fa-mars text-primary me-2"></i>Struktur Putra</a></li>
                        <li><a class="dropdown-item py-2" href="/asrama-waropen/index.php#struktur-putri"><i class="fa-solid fa-venus text-danger me-2"></i>Struktur Putri</a></li>
                    </ul>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-warning text-dark fw-bold px-4 rounded-pill shadow-sm" href="/asrama-waropen/login.php">
                        <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>