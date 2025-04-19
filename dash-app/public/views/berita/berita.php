<?php
session_name("desa_session");
session_start();

include '../../header.php';
?>
<style>
    h6 {
        display: -webkit-box;
        /* -webkit-line-clamp: 2; */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 3rem;
        font-size: 14px;
        line-height: 1.4rem;
    }
</style>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Berita</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="../home/home.php">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">List Berita</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-body">

                <h4 class="card-title  text-center mb-4" style="border-bottom: 1px solid black;"><b>LIST BERITA DESA SIDOMULYO</b></h4>
                <a href="input_berita.php" class="btn btn-secondary btn-sm mb-4"><i class="icon-plus"></i> Tambah Berita</a>
                <div class="row row-demo-grid d-flex justify-content-start"> <!-- Tambahkan class ini -->
                    <?php
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_berita ORDER BY id_berita ASC") or die(mysqli_error($koneksi));
                    $result = array();
                    while ($data = mysqli_fetch_array($sql)) {
                        $result[] = $data;
                    }
                    foreach ($result as $data) {
                        $no++;
                    ?>
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <?php
                                    if (!empty($data['poto_1'])) {
                                        $gambar = "../../../app/assets/img/berita/" . $data['poto_1'];
                                    } elseif (!empty($data['poto_2'])) { // Perbaikan elseif
                                        $gambar = "../../../app/assets/img/berita/" . $data['poto_2'];
                                    } elseif (!empty($data['poto_3'])) { // Perbaikan elseif
                                        $gambar = "../../../app/assets/img/berita/" . $data['poto_3'];
                                    } else {
                                        $gambar = "../../../app/assets/img/berita/User.png"; // Gambar default
                                    }
                                    ?>

                                    <img src="<?= $gambar ?>" alt="Gambar Berita" class="img-fluid" style="max-width: 100%; height: 150px; object-fit: cover; border-radius: 5px;">

                                    <h6 class="mt-2 text-truncate" style="max-width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <?= $data['judul'] ?>
                                    </h6>
                                    <div class="d-flex justify-content-center">
                                        <form method="POST" action="edit_berita.php">
                                            <input type="hidden" name="id_berita" value="<?= $data['id_berita'] ?>">
                                            <button type="submit" class="btn btn-info btn-sm">Edit Berita</button>
                                        </form>
                                        <button class="btn btn-danger btn-sm ml-2" onclick="confirmDelete(<?= $data['id_berita'] ?>)">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "delete.php?id=" + id;
            }
        });
    }
</script>

<?php
include '../../footer.php';
?>