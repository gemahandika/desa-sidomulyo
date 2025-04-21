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


$sql_visi = mysqli_query($koneksi, "SELECT * FROM visi_misi WHERE jenis_visimisi='VISI'") or die(mysqli_error($koneksi));

if ($sql_visi->num_rows > 0) { // Pastikan ada data sebelum mengambilnya
    $data_visi = $sql_visi->fetch_array();
    $visi = $data_visi["nama_visimisi"];
} else {
    $visi = "Tidak ada berita yang tersedia";
}


$sql_misi = mysqli_query($koneksi, "SELECT * FROM visi_misi WHERE jenis_visimisi='MISI'") or die(mysqli_error($koneksi));

if ($sql_misi->num_rows > 0) { // Pastikan ada data sebelum mengambilnya
    $data_misi = $sql_misi->fetch_array();
    $misi = $data_misi["nama_visimisi"];
} else {
    $misi = "Tidak ada berita yang tersedia";
}
