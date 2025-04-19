<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header btn-secondary">
                <h5 class="modal-title" id="modalAparaturLabel">TAMBAH APARATUR DESA</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="../../../app/controller/Aparatur_controller.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- Nama Aparatur -->
                    <div class="mb-3">
                        <label for="nama_aparatur" class="form-label"><b>NAMA APARATUR</b> <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="nama_aparatur" name="nama_aparatur" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label"><b>TANGGAL LAHIR</b> <b class="text-danger">*</b></label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $date ?>">
                    </div>

                    <!-- Pendidikan -->
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label"><b>PENDIDIKAN</b> <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-3">
                        <label for="jabatan" class="form-label"><b>JABATAN</b> <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                    </div>

                    <!-- Upload Foto Aparatur -->
                    <div class="mb-3">
                        <label for="poto_aparatur" class="form-label"><b>PHOTO APARATUR</b> <b class="text-danger">*</b></label>
                        <input type="file" class="form-control" id="poto_aparatur" name="poto_aparatur" accept="image/*">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary" name="submit_aparatur">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>