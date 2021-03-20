<!-- Begin Page Content -->
<div class="container-fluid">
    <!--Kembali-->
    <div class="row">
        <div class="col-lg">
            <a href="<?= base_url('kontroldaftarpeserta'); ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
    <br>
    <!--End Kembali-->

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow position-relative">
                <a href="#collapseCardExample" class="d-block card-header py-3 " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample" style="background-color: #30475E;">
                    <h6 class="m-0 font-weight-bold text-light">Profil Mahasiswa</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
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
            </div>
        </div>
        <!-- Berkas -->
        <div class="col-lg-6">
            <div class="card shadow position-relative">
                <div class="card-header py-3" style="background-color: #30475E;">
                    <h6 class="m-0 font-weight-bold text-light">Berkas</h6>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputKTI" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah</label>
                        <div class="col-sm-4 text-right">
                            <a href="<?= base_url('kontroldaftarpeserta/viewBerkas/kti/') . $mahasiswa['id_mhs']; ?>"><button type="button" class="btn btn-primary"><i class="fas fa-eye" aria-hidden="true"></i> Tampilkan</button></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputKTIBing" class="col-sm-8 col-form-label font-weight-bold text-custom">Karya Tulis Ilmiah (Inggris)</label>
                        <div class="col-sm-4 text-right">
                            <a href="<?= base_url('KontrolDaftarPeserta/viewBerkas/kti-b.ing/') . $mahasiswa['id_mhs']; ?>"><button type="button" class="btn btn-primary"><i class="fas fa-eye" aria-hidden="true"></i> Tampilkan</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Profil Mahasiswa -->

    <!-- Prestasi -->
    <div class="card shadow position-relative">
        <div class="card-header py-3" style="background-color: #30475E;">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <h6 class="m-0 font-weight-bold text-light">Prestasi</h6>
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
                                <form action="<?= base_url('kontroldaftarpeserta/viewbuktiprestasi/'); ?>" method="post">
                                    <input type="hidden" name="id_prestasi" id="id_prestasi" value="<?= $row->id_prestasi; ?>">
                                    <td><?php echo $row->keterangan; ?></td>
                                    <td><?php echo $row->bidang; ?></td>
                                    <td><?php echo $row->judul_kegiatan; ?></td>
                                    <td><?php echo $row->capaian; ?></td>
                                    <td><?php echo $row->tingkat; ?></td>
                                    <td><?php echo $row->tahun_perolehan; ?></td>
                                    <td><a href="<?= base_url('kontroldaftarpeserta/viewbukti/') . $row->bukti; ?>"><?php echo $row->bukti; ?></a></td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<br>


<!-- End of Main Content -->