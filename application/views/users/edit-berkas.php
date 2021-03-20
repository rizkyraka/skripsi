<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <?php if ($cekberkas['id_mhs'] == null) : ?>
    <form action="<?= base_url('user/uploadfilemawapres'); ?>" method="post" enctype="multipart/form-data">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-8">
          <div class="card position-relative">
            <div class="card-header py-3" style="background-color: #30475E;">
              <h6 class="m-0 font-weight-bold text-light">Upload Berkas</h6>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputKTI" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah</label>
                <div class="col-sm-4">
                  <input type="file" accept="application/pdf" class="form-control-file" id="inputKTI" name="inputKTI" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputKTIBing" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah (Inggris)</label>
                <div class="col-sm-4">
                  <input type="file" accept="application/pdf" class="form-control-file" id="inputKTIBing" name="inputKTIBing" required>
                </div>
              </div>
              <!-- <div class="form-group row">
                <label for="inputVideo" class="col-sm-8 col-form-label font-weight-bold text-custom">Video Presentasi</label>
                <div class="col-sm-4">
                  <input id="inputVideo" name="inputVideo" type="file" accept="video/*" class="form-control-file" required>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!-- Button Simpan -->
        <div class="col-lg-8 text-center">
          <br>
          <div class="row justify-content-center align-items-center">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  <?php else : ?>
    <form action="<?= base_url('user/updatefilemawapres'); ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" id="id_kti" name="id_kti" value="<?= $cekberkas['kti'] ?>">
      <input type="hidden" id="id_bing" name="id_bing" value="<?= $cekberkas['bing'] ?>">
      <!-- <input type="hidden" id="id_video" name="id_video" value="<?= $cekberkas['video'] ?>"> -->
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-8">
          <div class="card position-relative">
            <div class="card-header py-3" style="background-color: #30475E;">
              <h6 class="m-0 font-weight-bold text-light">Upload Berkas</h6>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputKTI" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah</label>
                <div class="col-sm-4">
                  <input type="file" accept="application/pdf" class="form-control-file" id="inputKTI" name="inputKTI" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputKTIBing" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah (Inggris)</label>
                <div class="col-sm-4">
                  <input type="file" accept="application/pdf" class="form-control-file" id="inputKTIBing" name="inputKTIBing" required>
                </div>
              </div>
              <!-- <div class="form-group row">
                <label for="inputVideo" class="col-sm-8 col-form-label font-weight-bold text-custom">Video Presentasi</label>
                <div class="col-sm-4">
                  <input id="inputVideo" name="inputVideo" type="file" accept="video/*" class="form-control-file"  required>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!-- Button Simpan -->
        <div class="col-lg-8 text-center">
          <br>
          <div class="row justify-content-center align-items-center">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  <?php endif; ?>
  <!-- End Content Row-->
  <br>
</div>