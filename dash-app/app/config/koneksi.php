<?php

// Setting default timezone
date_default_timezone_set('Asia/Jakarta');

// Konfigurasi database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'db_desa';

// Aktifkan error reporting untuk debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Koneksi ke database
    $koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $koneksi->set_charset("utf8mb4"); // Pastikan encoding karakter sesuai
} catch (Exception $e) {
    // Tampilkan pesan error jika koneksi gagal
    die("Koneksi gagal: " . $e->getMessage());
}
