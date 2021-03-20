<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Content Row -->
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
      <div class="card position-relative">
        <div class="card-header py-3" style="background-color: #30475E;">
          <h6 class="m-0 font-weight-bold text-light">Form Pendaftaran</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <?php if ($mahasiswa['ipk'] >= 3 and $mahasiswa['status'] == 'Belum Terdaftar') { ?>
                <p>Mendaftar sebagai calon mawapres</p>
                <ul>
                  <li>Apabila mahasiswa menekan tombol "Mendaftar" dibawah, maka mahasiswa telah setuju untuk mendaftar sebagai calon mahasiswa berprestasi.</li>
                  <li>Apabila mahasiswa tidak mengunggah berkas dengan lengkap atau memasukkan berkas yang tidak sesuai, maka mahasiswa akan digugurkan sebagai calon mahasiswa berprestasi.</li>
                  <li>Panduan tentang pendaftaran terdapat setelah mahasiswa menekan tombol "Mendaftar".</li>
                </ul><?php } elseif ($mahasiswa['ipk'] < 3 and $mahasiswa['status'] == 'Belum Terdaftar') { ?>
                <p>Mohon maaf, IPK Anda tidak mencukupi untuk mendaftar. Silahkan klik "Logout" pada profil Anda.</p>
              <?php } else { ?>
                <p>Mohon maaf, Anda telah dinyatakan gugur. Silahkan mendaftar kembali tahun berikutnya.</p>
              <?php } ?>
            </div>
            <?php if ($mahasiswa['ipk'] >= 3 and $mahasiswa['status'] == 'Belum Terdaftar') { ?>
              <div class="col-lg-12 text-center">
                <a href="<?= base_url('User/daftar'); ?>"><button type="button" class="btn btn-success"></i>Mendaftar</button></a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!--End Page Content-->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Simpan data Anda sebelum keluar. Apabila yakin, klik "Logout".</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
<!-- Buat choose file -->
<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>