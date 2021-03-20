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
    <!-- Content Row -->
    <div class="row">
        <!-- Profil Mahasiswa -->
        <div class="col-lg-6">
            <form action="<?= base_url('user/editProfil'); ?>" method="post" enctype="multipart/form-data">
                <div class="card shadow position-relative">
                    <div class="card-header py-3" style="background-color: #30475E;">
                        <div class="row d-flex  justify-content-center align-items-center">
                            <div class="col-lg-6">
                                <h6 class="m-0 font-weight-bold text-light">Profil Mahasiswa</h6>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/') . $mahasiswa['foto_profil']; ?>" class="card-img">
                                <small>Update Foto Resmi (3x4)</small>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil" placeholder="Upload Foto Baru" value="<?= $mahasiswa['foto_profil']; ?>">
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
                                            <?php if ($mahasiswa['email'] == NULL) { ?>
                                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= $mahasiswa['email']; ?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="<?= $mahasiswa['email']; ?>" value="<?= $mahasiswa['email']; ?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
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
            </div>
        </div>
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
                            <td><a href="<?= base_url('user/viewbuktiprestasi/') . $row->bukti; ?>"><?php echo $row->bukti; ?></a> </td>
                        </tr> <?php endforeach; ?> </tbody>
            </table>
        </div>
    </div>
</div> <br>
</div>
<!-- End of Main Content -->