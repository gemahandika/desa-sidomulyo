<?php
session_name("desa_session");
session_start();
include '../../header.php';
// include '../../config/koneksi.php'; // Pastikan koneksi database sudah ada

if (!isset($_POST['id_berita'])) {
    die("ID Berita tidak ditemukan dalam permintaan POST!");
}

$id_berita = $_POST['id_berita']; // Ambil dari form

$date = date("Y-m-d");
$time = date("H:i");
$dateTime = date("Y-m-d H:i:s");

// Gunakan prepared statements untuk keamanan
$stmt = $koneksi->prepare("SELECT * FROM tb_berita WHERE id_berita = ?");
$stmt->bind_param("i", $id_berita); // "i" menandakan tipe data integer
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    die("Data berita tidak ditemukan!");
}
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
                            <div class="card-title text-center mb-4"> <b>EDIT BERITA</b> </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id_berita" value="<?= $data['id_berita'] ?>">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="successInput"><b>JUDUL BERITA</b></label>
                                        <input type="text" id="successInput" class="form-control" value="<?= $data['judul']; ?>" name="judul" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="comment"><b>ISI BERITA</b></label>
                                        <textarea class="form-control" id="comment" rows="10" name="isi_berita" required><?= $data['isi_berita']; ?></textarea>
                                    </div>
                                </div>
                                <!-- Photo 1 -->
                                <div class="col-md-6 col-lg-4 d-flex flex-column">
                                    <div class="form-group">
                                        <label for="photo1">Photo 1</label>
                                        <input type="file" class="form-control-file photo-input" name="poto_1" onchange="previewImage(this)">

                                        <?php
                                        $gambar1 = !empty($data['poto_1']) ? "../../../app/assets/img/berita/" . $data['poto_1'] : "";
                                        ?>

                                        <img class="preview-image" src="<?= $gambar1; ?>"
                                            alt="Preview"
                                            style="max-width: 200px; <?= !empty($data['poto_1']) ? '' : 'display: none;'; ?> margin-top: 10px;" />
                                    </div>
                                </div>

                                <!-- Photo 2 -->
                                <div class="col-md-6 col-lg-4 d-flex flex-column">
                                    <div class="form-group">
                                        <label for="photo2">Photo 2</label>
                                        <input type="file" class="form-control-file photo-input" name="poto_2" onchange="previewImage(this)">

                                        <?php
                                        $gambar2 = !empty($data['poto_2']) ? "../../../app/assets/img/berita/" . $data['poto_2'] : "";
                                        ?>

                                        <img class="preview-image" src="<?= $gambar2; ?>"
                                            alt="Preview"
                                            style="max-width: 200px; <?= !empty($data['poto_2']) ? '' : 'display: none;'; ?> margin-top: 10px;" />
                                    </div>
                                </div>

                                <!-- Photo 3 -->
                                <div class="col-md-6 col-lg-4 d-flex flex-column">
                                    <div class="form-group">
                                        <label for="photo3">Photo 3</label>
                                        <input type="file" class="form-control-file photo-input" name="poto_3" onchange="previewImage(this)">

                                        <?php
                                        $gambar3 = !empty($data['poto_3']) ? "../../../app/assets/img/berita/" . $data['poto_3'] : "";
                                        ?>

                                        <img class="preview-image" src="<?= $gambar3; ?>"
                                            alt="Preview"
                                            style="max-width: 200px; <?= !empty($data['poto_3']) ? '' : 'display: none;'; ?> margin-top: 10px;" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="successInput"><b>PUBLISH</b></label>
                                        <select name="publish" id="" class="form-select">
                                            <option value="<?= $data['publish']; ?>"><?= $data['publish']; ?></option>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class=" card-action d-flex justify-content-end">
                            <button class="btn btn-info" type="submit" name="edit_berita">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- menampilkan poto preview -->
        <script>
            function previewImage(input) {
                var preview = input.closest('.form-group').querySelector('.preview-image'); // Cari preview di dalam form-group yang sama

                if (input.files.length > 0) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = "block"; // Pastikan ditampilkan
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = "";
                    preview.style.display = "none";
                }
            }
        </script>

    </div>
</div>

<?php
include '../../footer.php';
?>