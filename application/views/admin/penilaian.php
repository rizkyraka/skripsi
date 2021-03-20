<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Penilaian</h1>

  <div class="card shadow mb-4">
    <div class="card-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="berkas-tab" data-toggle="tab" href="#berkas" role="tab" aria-controls="berkas" aria-selected="true">Berkas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="prestasi-tab" data-toggle="tab" href="#prestasi" role="tab" aria-controls="prestasi" aria-selected="false">Prestasi</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="berkas" role="tabpanel" aria-labelledby="berkas-tab">
          <br>
          <!-- Tabel Penilaian Berkas -->
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-custom">
                <tr>
                  <th class="text-light">No</th>
                  <th class="text-light">Nama</th>
                  <th class="text-light">IPK</th>
                  <th class="text-light">KTI</th>
                  <th class="text-light">Prestasi</th>
                  <th class="text-light">B.Inggris</th>
                  <th class="text-light">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 0;
                foreach ($berkas->result() as $row) : ?>
                  <tr>
                    <td class="font-weight-bold text-custom"><?= ++$a; ?></td>
                    <td class="font-weight-bold text-custom"><?= $row->nama; ?></td>
                    <td><?= $row->ipk; ?></td>
                    <td><?php if ($row->tabel_kti == 1) {
                          if ($row->kti) {
                            echo $row->kti;
                          } else {
                            echo "Belum dinilai";
                          }
                        } else {
                          echo "Belum upload";
                        }
                        ?></td>
                    <td><?php if($row->prestasi){
                      echo $row->prestasi;
                    }else{
                      echo 0;
                    }?></td>
                    <td><?php if ($row->tabel_bing == 1) {
                          if ($row->bing) {
                            echo $row->bing;
                          } else {
                            echo "Belum dinilai";
                          }
                        } else {
                          echo "Belum upload";
                        }
                        ?></td>
                    <td>
                      <!--yang video presentasinya aku hapus, soalnya tabelnya kan berubah...-->
                      <?php if (($row->tabel_kti == 1) and ($row->tabel_bing == 1) and ($admin['role'] == 'kemahasiswaan')) : ?>
                        <a data-toggle="modal" data-target="#nilaiberkas_<?= $row->id_mhs; ?>"><button type="button" class="btn btn-primary"><span class="fa fa-pencil-alt" aria-hidden="true"></span></button></a>
                      <?php else : ?>
                        <button type="button" class="btn btn-primary" disabled><span class="fa fa-pencil-alt" aria-hidden="true"></span></button>
                      <?php endif; ?>
                      <?php if ($row->bing and $row->kti and $admin['role'] == 'kemahasiswaan') : ?>
                        <a href="<?php echo base_url('KontrolPenilaian/hapusPenilaian') . '/' . $row->id_mhs; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></button></a>
                      <?php else : ?>
                        <button type="button" class="btn btn-danger" disabled><span class="fa fa-trash" aria-hidden="true"></span></button>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <!--Modal Penilaian Berkas-->
                  <div class="modal fade" id="nilaiberkas_<?= $row->id_mhs; ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-gray-900" id="exampleModalLabel">Nilai Peserta</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="row">
                          <div class="col-lg">
                            <div class="modal-body text-center">
                              <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?= $row->nama; ?></h1>
                              </div>
                              <form action="<?php echo base_url('KontrolPenilaian/editPenilaian'); ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="<?= $row->id_mhs ?>">
                                <div class="modal-body">
                                  <div class="form-row">
                                    <div class="form group col-md-6">
                                      <label for="nilai_kti">Nilai KTI</label>
                                      <input type="text" id="nilai_kti" name="nilai_kti" class="form-control" placeholder="Nilai KTI" value="<?= $row->kti ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="nilai_bing">Nilai B.Inggris</label>
                                      <input type="text" id="nilai_bing" name="nilai_bing" class="form-control" placeholder="Nilai B.Inggris" value="<?= $row->bing ?>" required>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                              <button class="btn btn-success">Simpan</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--End Modal Penilaian Berkas-->

                  <!--Modal Menggugurkan Penilaian-->
                  <div class="modal fade" id="hapusnilai" role="dialog">
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
                          <a class="btn btn-danger" href="<?php echo base_url('KontrolPenilaian/hapusPenilaian') . '/' . $row->id_mhs; ?>">Ya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Menggugurkan Penilaian -->
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- End Tabel Penilaian Berkas -->

        <!-- Tab Penilaian Prestasi -->
        <div class="tab-pane fade" id="prestasi" role="tabpanel" aria-labelledby="prestasi-tab">
          <br>
          <!-- Tabel Prestasi -->
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-custom">
                <tr class="text-light">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Akumulasi Poin</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $a = 0;
                foreach ($berkas->result() as $row) : ?>
                  <tr class="font-weight-bold text-custom">
                    <td><?= ++$a; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?php if ($row->prestasi) {
                          echo $row->prestasi;
                        } else {
                          echo 0;
                        } ?></td>
                    <td>
                      <a href="<?php echo base_url('KontrolPenilaian/detailprestasi') . '/' . $row->id_mhs; ?>"><button type="button" class="btn btn-primary"><i class="fas fa-eye" aria-hidden="true"></i> Detail</button></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- End Tabel Prestasi -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->


<!--End-->