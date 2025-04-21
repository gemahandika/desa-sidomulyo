<?php
require_once "../config/koneksi.php";
require_once "../assets/sweetalert/dist/func_sweetAlert.php";

// **Edit Visi misi**
if (isset($_POST['edit_visimisi'])) {
    $id_visimisi = trim(mysqli_real_escape_string($koneksi, $_POST['id_visimisi']));
    $nama_visimisi = trim(mysqli_real_escape_string($koneksi, $_POST['nama_visimisi']));

    // Susun query update
    $query_update = "UPDATE visi_misi SET nama_visimisi = '$nama_visimisi' WHERE id_visimisi = '$id_visimisi'";

    if (mysqli_query($koneksi, $query_update)) {
        showSweetAlert('success', 'Sukses', 'Data berhasil diperbarui!', '#3085d6', '../../public/views/visi-misi/index.php');
    } else {
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan saat memperbarui data.', '#d33', '../../public/views/visi-misi/index.php');
    }
}
