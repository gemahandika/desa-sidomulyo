<?php
session_name("desa_session");
session_start();
include '../../header.php';
$date = date("Y-m-d");
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
            <h3 class="fw-bold mb-3">Visi & Misi</h3>
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
                    <a href="#">Visi Misi Desa</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title  text-center mb-4" style="border-bottom: 1px solid black;"><b>VISI MISI DESA SIDOMULYO</b></h4>
                <div class="row d-flex justify-content-start mt-4">
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM visi_misi") or die(mysqli_error($koneksi));
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-12 text-center mb-3 p-1">
                            <div class="rounded" style="border: 2px solid;">
                                <h1> <?= $data['jenis_visimisi'] ?> </h1>
                                <h6 class="fw-bold text-dark mt-3"><?= $data['nama_visimisi'] ?></h6>
                                <button type="button" class="btn btn-info btn-sm mb-1 mt-4" data-bs-toggle="modal" data-bs-target="#editVisi<?= $data['id_visimisi'] ?>"> Edit Data </button>
                            </div>
                        </div>

                        <!-- Modal Edit Aparatur -->
                        <div class="modal fade" id="editVisi<?= $data['id_visimisi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header btn-info">
                                        <h5 class="modal-title" id="modalAparaturLabel">EDIT <?= $data['jenis_visimisi'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form action="../../../app/controller/Visimisi_controller.php" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_visimisi" value="<?= $data['id_visimisi'] ?>">
                                            <!-- Nama Aparatur -->
                                            <div class="d-flex justify-content-center">
                                                <div class="w-75">
                                                    <div class="mb-3">
                                                        <label for="nama_visimisi" class="form-label text-center w-100 fw-bold fs-2"><?= $data['jenis_visimisi'] ?> <b class="text-danger">*</b></label>
                                                        <textarea class="form-control fw-bold fs-6" id="nama_visimisi" name="nama_visimisi" rows="7" required><?= $data['nama_visimisi'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_visimisi">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit -->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../footer.php'; ?>