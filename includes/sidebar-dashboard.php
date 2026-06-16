<?php
// includes/sidebar-dashboard.php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="col-md-3 col-lg-2 sidebar p-3 position-fixed start-0 top-0 bottom-0 shadow">
    <div class="text-center my-3">
        <i class="fa-solid fa-tree-city text-warning fs-1 mb-2"></i>
        <h6 class="fw-bold mb-0 text-white">PANEL SISTEM</h6>
        <span class="badge bg-success small mt-1"><?= strtoupper($_SESSION['role'] ?? 'GUEST'); ?></span>
    </div>
    <hr class="bg-light">
    
    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                <i class="fa-solid fa-gauge me-2"></i> Dashboard
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'mahasiswa.php' ? 'active' : ''; ?>" href="mahasiswa.php">
                <i class="fa-solid fa-graduation-cap me-2"></i> Data Mahasiswa
            </a>
        </li>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'tambah-konten.php' ? 'active' : ''; ?>" href="tambah-konten.php">
                <i class="fa-solid fa-plus-circle me-2"></i> Tambah Konten
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link <?= $current_page == 'kelola-user.php' ? 'active' : ''; ?>" href="kelola-user.php">
                <i class="fa-solid fa-users-gear me-2"></i> Kelola User
            </a>
        </li>
        <?php endif; ?>
        
        <li class="nav-item mt-5">
            <a class="nav-link text-danger" href="logout.php">
                <i class="fa-solid fa-power-off me-2"></i> Keluar / Logout
            </a>
        </li>
    </ul>
</div>