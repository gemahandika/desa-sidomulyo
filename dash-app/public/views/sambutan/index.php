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
            <h3 class="fw-bold mb-3">Sambutan Kepala Desa</h3>
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
                    <a href="#">Sambutan Kepala Desa</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center mb-4"><b>KATA SAMBUTAN KEPALA DESA SIDOMULYO</b></h4>
                <div class="card d-flex justify-content-center align-items-center">
                    <img src="../../../app/assets/img/aparatur/20a936c064f7e3b6818f5be14f2bfb8d.png" alt="" style="width: 300px; height: auto; margin-bottom: 8px">
                </div>

                <div class="row d-flex justify-content-start mt-4">
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_sambutan") or die(mysqli_error($koneksi));
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-12 text-center mb-3 p-1">
                            <div class="rounded p-3" style="border: 2px solid;">
                                <h4 class="mt-3"><b>ISI SAMBUTAN KEPALA DESA</b></h4>

                                <div class="text-dark mt-3 fs-5">
                                    <?= nl2br(htmlspecialchars($data['isi_sambutan'])) ?>
                                </div>

                                <button type="button" class="btn btn-info btn-sm mb-1 mt-4" data-bs-toggle="modal" data-bs-target="#editVisi<?= $data['id_sambutan'] ?>">
                                    Edit Data
                                </button>
                            </div>
                        </div>



                        <!-- Modal Edit Aparatur -->
                        <div class="modal fade" id="editVisi<?= $data['id_sambutan'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header btn-info">
                                        <h5 class="modal-title" id="modalAparaturLabel">EDIT KATA SAMBUTAN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form action="../../../app/controller/Sambutan_controller.php" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_visimisi" value="<?= $data['id_sambutan'] ?>">
                                            <!-- Nama Aparatur -->
                                            <div class="d-flex justify-content-center">
                                                <div class="w-75">
                                                    <div class="mb-3">
                                                        <label for="nama_visimisi" class="form-label text-center w-100 fw-bold fs-2">SAMBUTAN KEPALA DESA<b class="text-danger">*</b></label>
                                                        <textarea class="form-control fw-bold fs-6" id="nama_visimisi" name="nama_visimisi" rows="20" required><?= $data['isi_sambutan'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_sambutan">Simpan</button>
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