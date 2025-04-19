<?php
include '../../dash-app/app/config/koneksi.php';

date_default_timezone_set("Asia/Jakarta"); // Pastikan zona waktu sesuai
$hari = array(
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
);
$bulan = array(
    1 => "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
);

// Dapatkan hari, tanggal, bulan, dan tahun
$hariIni = $hari[date("w")];
$tanggal = date("j");
$bulanIni = $bulan[date("n")];
$tahun = date("Y");

// Format tanggal
$formatTanggal = "$hariIni, $tanggal $bulanIni $tahun";

// Tambahkan script JavaScript untuk detik berjalan

$sql = mysqli_query($koneksi, "SELECT * FROM tb_berita WHERE publish='YES' ORDER BY id_berita ASC") or die(mysqli_error($koneksi));

if ($sql->num_rows > 0) { // Pastikan ada data sebelum mengambilnya
    $data = $sql->fetch_array();
    $judul_berita = $data["judul"];
    $isi_berita = $data["isi_berita"];
    $id_berita = $data["id_berita"];
} else {
    $judul_berita = "Tidak ada berita yang tersedia";
}
