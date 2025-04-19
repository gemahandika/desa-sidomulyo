<?php
session_name("desa_session");
session_start();
include '../../header.php';
$date = date("Y-m-d");
$time = date("H:i");
$dateTime = date("Y-m-d H:i:s");
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms Berita</h3>
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
                    <a href="berita.php">List Berita</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="../../../app/controller/Berita_controller.php" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title text-center"><b>MASUKAN BERITA BARU</b></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="successInput"><b>JUDUL BERITA</b> <b class="text-danger">*</b></label>
                                        <input type="text" id="successInput" class="form-control" name="judul" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="comment"><b>ISI BERITA <b class="text-danger">*</b></b></label>
                                        <textarea class="form-control" id="comment" rows="10" name="isi_berita" required> </textarea>
                                    </div>

                                </div>
                                <div class="row">
                                    <!-- Photo 1 -->
                                    <div class="col-md-6 col-lg-4 d-flex flex-column">
                                        <div class="form-group">
                                            <label for="photo1">Photo 1 <b class="text-danger">*</b></label>
                                            <input type="file" class="form-control-file" id="photo1" name="poto_1" onchange="previewImage(event, 'preview1', 'btnHapus1')" />

                                            <img id="preview1" src="" alt="Preview" style="max-width: 200px; display: none; margin-top: 10px;" />

                                            <!-- Tombol Hapus Preview -->
                                            <button type="button" id="btnHapus1" class="btn btn-danger btn-sm mt-2" style="display: none;" onclick="hapusPreview('preview1', 'photo1', 'btnHapus1')">
                                                Hapus Preview
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Photo 2 -->
                                    <div class="col-md-6 col-lg-4 d-flex flex-column">
                                        <div class="form-group">
                                            <label for="photo2">Photo 2</label>
                                            <input type="file" class="form-control-file" id="photo2" name="poto_2" onchange="previewImage(event, 'preview2', 'btnHapus2')" />

                                            <img id="preview2" src="" alt="Preview" style="max-width: 200px; display: none; margin-top: 10px;" />

                                            <!-- Tombol Hapus Preview -->
                                            <button type="button" id="btnHapus2" class="btn btn-danger btn-sm mt-2" style="display: none;" onclick="hapusPreview('preview2', 'photo2', 'btnHapus2')">
                                                Hapus Preview
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Photo 3 -->
                                    <div class="col-md-6 col-lg-4 d-flex flex-column">
                                        <div class="form-group">
                                            <label for="photo3">Photo 3</label>
                                            <input type="file" class="form-control-file" id="photo3" name="poto_3" onchange="previewImage(event, 'preview3', 'btnHapus3')" />

                                            <img id="preview3" src="" alt="Preview" style="max-width: 200px; display: none; margin-top: 10px;" />

                                            <!-- Tombol Hapus Preview -->
                                            <button type="button" id="btnHapus3" class="btn btn-danger btn-sm mt-2" style="display: none;" onclick="hapusPreview('preview3', 'photo3', 'btnHapus3')">
                                                Hapus Preview
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="tgl_buat" value="<?= $dateTime; ?>" required />
                                <input type="hidden" class="form-control" name="publish" value="NO" required />
                            </div>
                        </div>
                        <div class=" card-action d-flex justify-content-end">
                            <button class="btn btn-success" type="submit" name="add_berita">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- menampilkan poto preview -->
        <script>
            function previewImage(event, previewId) {
                var input = event.target;
                var preview = document.getElementById(previewId);

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = "block";
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // poto preview
            function previewImage(event, previewId, btnId) {
                const reader = new FileReader();
                reader.onload = function() {
                    const img = document.getElementById(previewId);
                    img.src = reader.result;
                    img.style.display = "block"; // Tampilkan gambar
                    document.getElementById(btnId).style.display = "inline-block"; // Tampilkan tombol hapus
                };
                reader.readAsDataURL(event.target.files[0]);
            }

            function hapusPreview(previewId, inputId, btnId) {
                document.getElementById(previewId).style.display = "none"; // Sembunyikan gambar
                document.getElementById(previewId).src = ""; // Hapus src gambar
                document.getElementById(inputId).value = ""; // Reset input file
                document.getElementById(btnId).style.display = "none"; // Sembunyikan tombol hapus
            }
        </script>

    </div>
</div>
<?php
include '../../footer.php';
?>