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

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<br>
<br>
<br>


<!-- Footer -->
<div class= "footer" style="position: absolute;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;">
<footer class="sticky-footer bg-custom">
  <div class="container my-auto">
    <div class="copyright text-center my-auto text-light">
      <span>Copyright &copy; SIMAWA 2020</span>
    </div>
  </div>
</footer>
</div>
<!-- End of Footer -->

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