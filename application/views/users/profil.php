<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow bg-danger">
        <div class="card-body">
            <i class="fa fa-exclamation-triangle text-light"></i>
            <span class="card-title font-weight-bold text-light">PERHATIAN!</span>
            <p class="card-text text-light">Bisa diisi apapun terkait pemberitahuan</p>
            <i class="fas fa-file-alt text-light"></i>
            <a href="https://docs.google.com/document/d/1P_Hfpk28YAXHc9qRT-PaW-J6Pc3CzvMi0ovsSu2bMz4/edit"><span class=" font-weight-bold text-light">Panduan Prestasi</span></a>
            <br>
            <i class="fas fa-file-alt text-light"></i>
            <a href="https://docs.google.com/document/d/1wU6KJ8tYuD2fDgLzepjwB0w72EIumHS6csGeuH9QLEc/edit"><span class=" font-weight-bold text-light">Panduan Karya Tulis Ilmiah</span></a>

        </div>
    </div>
    <br>

    <!-- Content Row -->
    <div class="row">
        <!-- Profil Mahasiswa -->
        <div class="col-lg-6">
            <div class="card shadow position-relative">
                <div class="card-header py-3" style="background-color: #30475E;">
                    <div class="row d-flex  justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <h6 class="m-0 font-weight-bold text-light">Profil Mahasiswa</h6>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="<?= base_url('User/editProfil'); ?>"> <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/profile/') . $mahasiswa['foto_profil']; ?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Nama</p>
                                    </div>
                                    <div class="col-sm-8 font-weight-bold text-custom">
                                        <p><?= $mahasiswa['nama']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>NIM</p>
                                    </div>
                                    <div class="col-sm-8 font-weight-bold text-custom">
                                        <p><?= $mahasiswa['nim']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Program Studi</p>
                                    </div>
                                    <div class="col-sm-8 font-weight-bold text-custom">
                                        <p><?= $mahasiswa['prodi']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Angkatan</p>
                                    </div>
                                    <div class="col-sm-8 font-weight-bold text-custom">
                                        <p><?= $mahasiswa['angkatan']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Semester</p>
                                    </div>
                                    <div class="col-sm-8 font-weight-bold text-custom">
                                        <p><?= $mahasiswa['semester']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>IPK</p>
                                    </div>
                                    <div class="col-sm-8 font-weight-bold text-custom">
                                        <p><?= $mahasiswa['ipk']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-sm-8 font-weight-bold text-custom">
                                        <p><?= $mahasiswa['email']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <!--End Profil Mahasiswa-->

        <!-- Berkas -->
        <div class="col-lg-6">
            <div class="card shadow position-relative">
                <div class="card-header py-3" style="background-color: #30475E;">
                    <div class="row d-flex  justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <h6 class="m-0 font-weight-bold text-light">Berkas</h6>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a href="<?= base_url('User/uploadfilemawapres'); ?>"> <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputKTI" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah</label>
                        <div class="col-sm-4 text-right">
                            <a href="<?= base_url('user/viewBerkas/kti'); ?>"><button type="button" class="btn btn-primary"><i class="fas fa-eye" aria-hidden="true"></i> Tampilkan</button></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputKTIBing" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah (Inggris)</label>
                        <div class="col-sm-4 text-right">
                            <a href="<?= base_url('user/viewBerkas/kti-b.ing'); ?>"><button type="button" class="btn btn-primary"><i class="fas fa-eye" aria-hidden="true"></i> Tampilkan</button></a>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="inputVideo" class="col-sm-8 col-form-label font-weight-bold text-custom">Video Presentasi</label>
                        <div class="col-sm-4 text-right">
                            <a href="<?= base_url('user/viewBerkas/presentasi'); ?>"><button type="button" class="btn btn-primary"><i class="fas fa-eye" aria-hidden="true"></i> Tampilkan</button></a>
                        </div>
                    </div> -->
                </div>
            </div>
            <br>
        </div>

    </div>

    <!-- Prestasi -->
    <div class="card shadow position-relative">
        <div class="card-header py-3" style="background-color: #30475E;">
            <div class="row d-flex  justify-content-center align-items-center">
                <div class="col-lg-6">
                    <h6 class="m-0 font-weight-bold text-light">Prestasi</h6>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="<?= base_url('User/prestasi'); ?>"> <button type="button" class="btn btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jenis Prestasi</th>
                            <th>Bidang</th>
                            <th>Judul Kegiatan</th>
                            <th>Capaian</th>
                            <th>Tingkat</th>
                            <th>Tahun</th>
                            <th>Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listPrestasi->result() as $row) : ?>
                            <tr>
                                <td><?php echo $row->keterangan; ?></td>
                                <td><?php echo $row->bidang; ?></td>
                                <td><?php echo $row->judul_kegiatan; ?></td>
                                <td><?php echo $row->capaian; ?></td>
                                <td><?php echo $row->tingkat; ?></td>
                                <td><?php echo $row->tahun_perolehan; ?></td>
                                <td><a href="<?= base_url('user/viewbuktiprestasi/') . $row->bukti; ?>"><?php echo $row->bukti; ?></a></td>
                            </tr><?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <br>
</div>
<!-- End of Main Content -->