<?php
// koneksi local
$koneksi = mysqli_connect('localhost', 'root', '', 'db_desa');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

// // koneksi public
// $koneksi = mysqli_connect('localhost', 'jnee6778_mesit', 'Jnemes2017', 'jnee6778_dbdesa');
// if (mysqli_connect_errno()) {
//     echo mysqli_connect_error();
// }
