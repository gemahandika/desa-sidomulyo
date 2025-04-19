<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

$allowed_extension = array('png', 'jpg', 'jpeg');
$upload_folder = '../assets/img/berita/';

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
        showSweetAlert('error', 'Gagal', 'Format file tidak valid! Harus PNG, JPG, atau JPEG.', '#d33', '../../public/views/berita/berita.php');
        exit();
    }

    if ($ukuran > 15000000) {
        showSweetAlert('error', 'Gagal', 'Ukuran file terlalu besar! Maksimal 15MB.', '#d33', '../../public/views/berita/berita.php');
        exit();
    }

    move_uploaded_file($tmp_name, $upload_folder . $image);
    return $image;
}

// **Tambah Berita**
if (isset($_POST['add_berita'])) {
    $judul = trim(mysqli_real_escape_string($koneksi, $_POST['judul']));
    $isi_berita = trim(mysqli_real_escape_string($koneksi, $_POST['isi_berita']));
    $tgl_buat = date("Y-m-d H:i:s");
    $publish = trim(mysqli_real_escape_string($koneksi, $_POST['publish']));

    // **Upload gambar jika ada**
    $poto_1 = uploadImage('poto_1', $upload_folder, $allowed_extension);
    $poto_2 = uploadImage('poto_2', $upload_folder, $allowed_extension);
    $poto_3 = uploadImage('poto_3', $upload_folder, $allowed_extension);

    $query = "INSERT INTO tb_berita (judul, isi_berita, poto_1, poto_2, poto_3, tgl_buat, publish) 
              VALUES('$judul', '$isi_berita', '$poto_1', '$poto_2', '$poto_3', '$tgl_buat', '$publish')";

    if (mysqli_query($koneksi, $query)) {
        showSweetAlert('success', 'Sukses', 'Berita berhasil ditambahkan!', '#3085d6', '../../public/views/berita/berita.php');
    } else {
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.', '#d33', '../../public/views/berita/berita.php');
    }
}

// **Edit Berita**
if (isset($_POST['edit_berita'])) {
    $id_berita = trim(mysqli_real_escape_string($koneksi, $_POST['id_berita']));

    // **Ambil data berita lama**
    $query_select = "SELECT * FROM tb_berita WHERE id_berita = '$id_berita'";
    $result = mysqli_query($koneksi, $query_select);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        showSweetAlert('error', 'Gagal', 'Berita tidak ditemukan!', '#d33', '../../public/views/berita/berita.php');
        exit();
    }

    // **Ambil data dari form**
    $judul = trim(mysqli_real_escape_string($koneksi, $_POST['judul']));
    $isi_berita = trim(mysqli_real_escape_string($koneksi, $_POST['isi_berita']));
    $publish = trim(mysqli_real_escape_string($koneksi, $_POST['publish']));

    // **Upload gambar baru jika ada, jika tidak gunakan gambar lama**
    $poto_1 = uploadImage('poto_1', $upload_folder, $allowed_extension, $data['poto_1']);
    $poto_2 = uploadImage('poto_2', $upload_folder, $allowed_extension, $data['poto_2']);
    $poto_3 = uploadImage('poto_3', $upload_folder, $allowed_extension, $data['poto_3']);

    // **Update data ke database**
    $query_update = "UPDATE tb_berita 
                     SET judul='$judul', isi_berita='$isi_berita', 
                         poto_1='$poto_1', poto_2='$poto_2', poto_3='$poto_3', 
                         publish='$publish'
                     WHERE id_berita='$id_berita'";

    if (mysqli_query($koneksi, $query_update)) {
        showSweetAlert('success', 'Sukses', 'Berita berhasil diperbarui!', '#3085d6', '../../public/views/berita/berita.php');
    } else {
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan saat memperbarui data.', '#d33', '../../public/views/berita/berita.php');
    }
}
