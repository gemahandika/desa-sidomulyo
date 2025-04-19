<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

$allowed_extension = array('png', 'jpg', 'jpeg');
$upload_folder = '../assets/img/aparatur/';

// **Fungsi untuk upload gambar**
function uploadImage($input_name, $upload_folder, $allowed_extension, $current_image = '')
{
    if (!isset($_FILES[$input_name]) || $_FILES[$input_name]['error'] == 4) {
        return $current_image; // Jika tidak ada file baru, gunakan gambar lama (jika ada)
    }

    $nama = $_FILES[$input_name]['name'];
    $tmp_name = $_FILES[$input_name]['tmp_name'];
    $ukuran = $_FILES[$input_name]['size'];

    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot));
    $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;

    if (!in_array($ekstensi, $allowed_extension)) {
        showSweetAlert('error', 'Gagal', 'Format file tidak valid! Harus PNG, JPG, atau JPEG.', '#d33', '../../public/views/aparatur/aparatur.php');
        exit();
    }

    if ($ukuran > 5000000) { // Maksimal 5MB
        showSweetAlert('error', 'Gagal', 'Ukuran file terlalu besar! Maksimal 5MB.', '#d33', '../../public/views/aparatur/aparatur.php');
        exit();
    }

    move_uploaded_file($tmp_name, $upload_folder . $image);
    return $image;
}

// **Tambah Aparatur**
if (isset($_POST['submit_aparatur'])) {
    $nama_aparatur = trim(mysqli_real_escape_string($koneksi, $_POST['nama_aparatur']));
    $tgl_lahir = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']));
    $pendidikan = trim(mysqli_real_escape_string($koneksi, $_POST['pendidikan']));
    $jabatan = trim(mysqli_real_escape_string($koneksi, $_POST['jabatan']));

    // Upload foto jika ada
    $foto_aparatur = uploadImage('poto_aparatur', $upload_folder, $allowed_extension);

    $query = "INSERT INTO tb_aparatur (nama_aparatur, tgl_lahir, pendidikan, jabatan, poto_aparatur) 
              VALUES('$nama_aparatur', '$tgl_lahir', '$pendidikan', '$jabatan', '$foto_aparatur')";

    if (mysqli_query($koneksi, $query)) {
        showSweetAlert('success', 'Sukses', 'Aparatur berhasil ditambahkan!', '#3085d6', '../../public/views/aparatur/aparatur.php');
    } else {
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.', '#d33', '../../public/views/aparatur/aparatur.php');
    }
}

// **Edit Aparatur**
if (isset($_POST['edit_aparatur'])) {
    $id_aparatur = trim(mysqli_real_escape_string($koneksi, $_POST['id_aparatur']));

    // Ambil data lama
    $query_select = "SELECT * FROM tb_aparatur WHERE id_aparatur = '$id_aparatur'";
    $result = mysqli_query($koneksi, $query_select);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        showSweetAlert('error', 'Gagal', 'Data aparatur tidak ditemukan!', '#d33', '../../public/views/aparatur/aparatur.php');
        exit();
    }

    $nama_aparatur = trim(mysqli_real_escape_string($koneksi, $_POST['nama_aparatur']));
    $tgl_lahir = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']));
    $pendidikan = trim(mysqli_real_escape_string($koneksi, $_POST['pendidikan']));
    $jabatan = trim(mysqli_real_escape_string($koneksi, $_POST['jabatan']));

    // Upload foto baru jika ada, jika tidak gunakan yang lama
    $foto_aparatur = uploadImage('poto_aparatur', $upload_folder, $allowed_extension, $data['poto_aparatur']);

    $query_update = "UPDATE tb_aparatur 
                     SET nama_aparatur='$nama_aparatur', tgl_lahir='$tgl_lahir', 
                         pendidikan='$pendidikan', jabatan='$jabatan', poto_aparatur='$foto_aparatur' 
                     WHERE id_aparatur='$id_aparatur'";

    if (mysqli_query($koneksi, $query_update)) {
        showSweetAlert('success', 'Sukses', 'Data Aparatur berhasil diperbarui!', '#3085d6', '../../public/views/aparatur/aparatur.php');
    } else {
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan saat memperbarui data.', '#d33', '../../public/views/aparatur/aparatur.php');
    }
}

// **Hapus Aparatur**
if (isset($_POST['delete_aparatur'])) {
    $id_aparatur = trim(mysqli_real_escape_string($koneksi, $_POST['id_aparatur']));

    // Hapus data dari database
    $query_delete = "DELETE FROM tb_aparatur WHERE id_aparatur = '$id_aparatur'";

    if (mysqli_query($koneksi, $query_delete)) {
        showSweetAlert('success', 'Sukses', 'Data Aparatur berhasil dihapus!', '#3085d6', '../../public/views/aparatur/aparatur.php');
    } else {
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan saat menghapus data.', '#d33', '../../public/views/aparatur/aparatur.php');
    }
}
