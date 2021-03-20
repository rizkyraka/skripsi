                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->session->flashdata('message'); ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-0 text-gray-800"><?= $title2; ?></h1>
                    <br>
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="<?= base_url('KontrolPeriode/aturPeriode'); ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Waktu Mulai</label>
                                    <div class="col-sm-10">
                                        <?php if ($admin['role'] == 'kemahasiswaan') { ?>
                                            <input name="tanggalMulai" id="tanggalMulai" class="form-control" type="datetime" placeholder="Tanggal Mulai" value="<?= $periode->waktu_mulai ?>" disabled>
                                        <?php } elseif ($admin['role'] == 'BEMFILKOM') { ?>
                                            <input name="tanggalMulai" id="tanggalMulai" class="form-control" type="datetime-local" placeholder="Tanggal Mulai" value="<?= $periode->waktu_mulai ?>" required>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Waktu Selesai</label>
                                    <div class="col-sm-10">
                                        <?php if ($admin['role'] == 'kemahasiswaan') { ?>
                                            <input name="tanggalSelesai" id="tanggalSelesai" class="form-control" type="datetime" placeholder="Tanggal Selesai" value="<?= $periode->waktu_selesai ?>" disabled>
                                        <?php } elseif ($admin['role'] == 'BEMFILKOM') { ?>
                                            <input name="tanggalSelesai" id="tanggalSelesai" class="form-control" type="datetime-local" placeholder="Tanggal Selesai" value="<?= $periode->waktu_selesai ?>" required>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end">
                                    <?php if ($admin['role'] == 'kemahasiswaan') { ?>
                                        <button type="button" class="btn btn-secondary" disabled>Simpan</button>
                                    <?php } elseif ($admin['role'] == 'BEMFILKOM') { ?>
                                        <button type="submit" class="btn btn-success" href="<?= base_url('aturPeriode'); ?>">Simpan</button>
                                    <?php } ?></div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->