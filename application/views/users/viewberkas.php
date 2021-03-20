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
                        <?php if ($berkas['file_berkas'] != NULL) :
                            if ($berkas['jenis_berkas'] == 'presentasi') : ?>
                                <video width="100%" height="400px" controls>
                                    <source src="<?= base_url('assets/upload-berkas/') . $berkas['file_berkas']; ?>" type="video/mp4">
                                </video>
                            <?php else : ?>
                                <embed src="<?= base_url('assets/upload-berkas/') . $berkas['file_berkas']; ?>" type="application/pdf" width="100%" height="400px" />
                            <?php endif ?>
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