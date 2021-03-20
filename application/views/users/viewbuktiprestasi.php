<!--- Bagian Judul-->
<div class="container-fluid">
    <!--Kembali-->
    <div class="row">
        <div class="col-lg">
            <button onClick="kembali()" class="btn btn-danger btn-icon-split">
                <span class="icon text-white">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </button>
            <script>
                function kembali() {
                    window.history.back();
                }
            </script>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div>
                        <?php if ($bukti != NULL) : ?>
                            <embed src="<?= base_url('assets/upload-prestasi/') . $bukti; ?>" type="application/pdf" width="100%" height="400px" />
                        <?php else : ?>
                            <h6>Berkas belum diunggah.</h6>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>