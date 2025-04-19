<?php
session_name("desa_session");
session_start();
include '../../header.php';
$date = date("Y-m-d");
include 'aparatur_addmodal.php';
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
            <h3 class="fw-bold mb-3">Aparatur Desa</h3>
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
                    <a href="#">List Aparatur</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title  text-center mb-4" style="border-bottom: 1px solid black;"><b>APARATUR DESA</b></h4>
                <button type="button" class="btn btn-secondary btn-sm mb-4" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="icon-plus"></i> Tambah Aparatur</button>
                <div class="row d-flex justify-content-start mt-4">
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_aparatur ORDER BY id_aparatur ASC") or die(mysqli_error($koneksi));
                    while ($data = mysqli_fetch_array($sql)) {
                        // Menentukan gambar yang akan digunakan
                        if (!empty($data['poto_aparatur'])) {
                            $gambar = "../../../app/assets/img/aparatur/" . $data['poto_aparatur'];
                        } else {
                            $gambar = "../../../app/assets/img/aparatur/head.png"; // Gambar default jika tidak ada foto
                        }

                        // Menambahkan nama dan jabatan
                        $nama = !empty($data['nama_aparatur']) ? $data['nama_aparatur'] : "Nama Tidak Tersedia";
                        $jabatan = !empty($data['jabatan']) ? $data['jabatan'] : "Jabatan Tidak Tersedia";
                    ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 text-center mb-3 p-1">
                            <div style="border: 2px solid;">
                                <img src="<?= $gambar ?>" alt="Foto Aparatur Desa" class="img-fluid " style="max-width: 250px; height: 150px; ">
                                <h6 class="fw-bold text-dark mt-3"><?= $nama ?></h6>
                                <p class="text-muted" style="font-size: 14px; margin-top: 5px;"><?= $jabatan ?></p>
                                <button type="button" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#editAparatur<?= $data['id_aparatur'] ?>"><i class="icon-pencil"></i> Edit Data</button>
                            </div>
                        </div>

                        <!-- Modal Edit Aparatur -->
                        <div class="modal fade" id="editAparatur<?= $data['id_aparatur'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header btn-info">
                                        <h5 class="modal-title" id="modalAparaturLabel">EDIT APARATUR DESA</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form action="../../../app/controller/Aparatur_controller.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_aparatur" value="<?= $data['id_aparatur'] ?>">
                                            <!-- Nama Aparatur -->
                                            <div class="mb-3">
                                                <label for="nama_aparatur" class="form-label"><b>NAMA APARATUR</b> <b class="text-danger">*</b></label>
                                                <input type="text" class="form-control" id="nama_aparatur" name="nama_aparatur" value="<?= $data['nama_aparatur'] ?>" required>
                                            </div>

                                            <!-- Tanggal Lahir -->
                                            <div class="mb-3">
                                                <label for="tgl_lahir" class="form-label"><b>TANGGAL LAHIR</b> <b class="text-danger">*</b></label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
                                            </div>

                                            <!-- Pendidikan -->
                                            <div class="mb-3">
                                                <label for="pendidikan" class="form-label"><b>PENDIDIKAN</b> <b class="text-danger">*</b></label>
                                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $data['pendidikan'] ?>" required>
                                            </div>

                                            <!-- Jabatan -->
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label"><b>JABATAN</b> <b class="text-danger">*</b></label>
                                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $data['jabatan'] ?>" required>
                                            </div>

                                            <!-- Upload Foto Aparatur (dalam modal) -->
                                            <div class="mb-3">
                                                <label for="photo" class="form-label"><b>PHOTO APARATUR</b> <b class="text-danger">*</b></label>
                                                <input type="file" class="form-control-file photo-input" name="poto_aparatur" onchange="previewImage(this)">

                                                <?php
                                                $gambar = !empty($data['poto_aparatur']) ? "../../../app/assets/img/aparatur/" . $data['poto_aparatur'] : "";
                                                ?>

                                                <!-- Preview Image -->
                                                <img class="preview-image" src="<?= $gambar; ?>"
                                                    alt="Preview"
                                                    style="max-width: 200px; <?= !empty($data['poto_aparatur']) ? '' : 'display: none;'; ?> margin-top: 10px;" />
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_aparatur">Simpan</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                        <!-- JavaScript -->
                        <script>
                            function previewImage(input) {
                                var preview = input.closest('.mb-3').querySelector('.preview-image'); // Cari preview dalam modal yang sama

                                if (input.files.length > 0) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                        preview.style.display = "block"; // Tampilkan preview
                                    };

                                    reader.readAsDataURL(input.files[0]);
                                } else {
                                    preview.src = "";
                                    preview.style.display = "none";
                                }
                            }
                        </script>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../footer.php'; ?>