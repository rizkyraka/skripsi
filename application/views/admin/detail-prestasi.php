<!-- Begin Page Content -->
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

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Detail Prestasi</h1>

  <!--Tabel Rekomendasi-->
  <div class="card shadow mb-4">
    <div class="card-body">

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-custom">
            <tr class="text-light">
              <th>No</th>
              <th>Nama</th>
              <th>Judul Kegiatan</th>
              <th>Bidang</th>
              <th>Capaian</th>
              <th>Tingkat</th>
              <th>Individu/Kelompok</th>
              <th>Berkas</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $a = 0;
            foreach ($detailprestasi->result() as $row) : ?>
              <tr>
                <td><?= ++$a; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->judul_kegiatan; ?></td>
                <td><?= $row->bidang; ?></td>
                <td><?= $row->capaian; ?></td>
                <td><?= $row->tingkat; ?></td>
                <td><?= $row->keanggotaan; ?></td>
                <td><a href="<?= base_url('kontroldaftarpeserta/viewbukti/') . $row->bukti; ?>"><?php echo $row->bukti; ?></td>
                <td><?= $row->nilai; ?></td>
                <td>
                  <a data-toggle="modal" data-target="#hapusprestasi2_<?= $row->id_prestasi ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></button></a>
                </td>
              </tr>
              <!--Modal Menggugurkan Peserta-->
              <div class="modal fade" id="hapusprestasi2_<?= $row->id_prestasi ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-gray-900" id="exampleModalLabel">Hapus Peserta</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Apakah Anda yakin ingin menghapus (menggugurkan) peserta? Harap cek kembali data dan nilai peserta.</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                      <a type="submit" class="btn btn-danger" href="<?php echo base_url('KontrolPenilaian/hapusPrestasi') . '?id_prestasi=' . $row->id_prestasi . '&id_mhs=' . $row->id_mhs; ?>">Ya</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal Menggugurkan Peserta -->
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- End Tabel Prestasi -->

    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!--End-->
</div>