<?php
// 1. Mulai membaca session aktif
session_start();

// 2. Kosongkan semua data di dalam variabel session
session_unset();

// 3. Hancurkan total session yang terdaftar di browser
session_destroy();

// 4. Tendang pengguna kembali ke halaman login yang bersih
header("Location: login.php");
exit;