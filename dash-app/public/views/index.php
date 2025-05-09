<?php
include("../../app/config/koneksi.php");
session_name("desa_session");
session_start();

// Pengecekan Level Akses
if (in_array("super_admin", $_SESSION['admin_akses'])) {
    header("location:home/home.php");
    exit();
} elseif (in_array("admin", $_SESSION['admin_akses'])) {
    // Jika memiliki akses "admin", arahkan ke halaman tertentu untuk admin
    header("location:berita/berita.php");
    exit();
} else {
    // Jika tidak memiliki akses yang sesuai, lakukan tindakan lain (misalnya, arahkan ke halaman kesalahan)
    header("location:login/index");
    exit();
}
