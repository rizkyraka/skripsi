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
    <div class="row justify-content-center align-items-center">
        <!-- Modal Tambah Prestasi Kompetisi-->
        <div class="modal fade" id="tambahkompetisi" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="modal-body text-center">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Riwayat Lomba</h1>
                                    </div>
                                    <form class="form-horizontal" method="post" action="<?php echo base_url('User/addkompetisi'); ?>" enctype="multipart/form-data">
                                        <input type="hidden" id="keterangan" name="keterangan" value="Kompetisi">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="bidang" id="bidang" class="form-control" required>
                                                        <option value="">Bidang Kompetisi</option>
                                                        <option value="Ilmiah/Penalaran/Akademik">Ilmiah/Penalaran/Akademik</option>
                                                        <option value="Seni Budaya">Seni-Budaya</option>
                                                        <option value="Olahraga">Olahraga</option>
                                                        <option value="Teknologi">Teknologi & Sains, serta Inovasi</option>
                                                        <option value="Agama">Keagamaan</option>
                                                        <option value="Usaha">Kewirausahaan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="capaian" id="capaian" class="form-control" required>
                                                        <option value="">Capaian</option>
                                                        <option value="Juara 1">Juara 1</option>
                                                        <option value="Juara 2">Juara 2</option>
                                                        <option value="Juara 3">Juara 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="judul_kegiatan" id="judul_kegiatan" class="form-control" type="text" placeholder="Judul Kegiatan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="tahun_perolehan" id="tahun_perolehan" type="number" class="form-control" min=2017 max=2020 placeholder="Tahun Perolehan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="penyelenggara" id="penyelenggara" class="form-control" type="text" placeholder="Penyelenggara" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="tingkat" id="tingkat" class="form-control" required>
                                                        <option value="">Tingkat</option>
                                                        <option value="Internasional">Internasional</option>
                                                        <option value="Regional">Regional</option>
                                                        <option value="Nasional">Nasional</option>
                                                        <option value="Provinsi">Provinsi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="keanggotaan" id="keanggotaan" class="form-control" placeholder="Keanggotaan" required>
                                                        <option value="">Keanggotaan</option>
                                                        <option value="Individu">Individu</option>
                                                        <option value="Kelompok">Kelompok</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="bukti" name="bukti" accept="application/pdf" accept="application/pdf" required>
                                                        <label class="custom-file-label">Unggah Bukti</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!--Modal Body-->
                            </div>
                            <!--p-5-->
                        </div>
                        <!--col lg-->
                    </div>
                    <!--row-->
                </div>
                <!--modal content-->
            </div>
            <!--modal dialog-->
        </div>
        <!--modal-->
        <!-- End Modal Tambah Prestasi Kompetisi -->

        <!-- Modal Tambah Penghargaan/Pengakuan-->
        <div class="modal fade" id="tambahbukankompetisi" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="modal-body text-center">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Riwayat Bukan Kompetisi</h1>
                                    </div>
                                    <form class="form-horizontal" method="post" action="<?php echo base_url('User/addbukankompetisi'); ?>" enctype="multipart/form-data">
                                        <input type="hidden" id="keterangan" name="keterangan" value="Bukan Kompetisi">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="bidang" id="bidang" class="form-control" required>
                                                        <option value="">Capaian Unggulan non Prestasi</option>
                                                        <option value="Pemakalah/Penyaji/Narasumber/Pemandu">Pemakalah/Penyaji/Narasumber/Pemandu</option>
                                                        <option value="Wirausahawan">Wirausahawan</option>
                                                        <option value="Pelatih/Wasit/Juri">Pelatih/Wasit/Juri</option>
                                                        <option value="Pemberdaya Masyarakat">Pemberdaya Masyarakat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="judul_kegiatan" id="judul_kegiatan" class="form-control" type="text" placeholder="Judul Kegiatan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="tahun_perolehan" id="tahun_perolehan" class="form-control" type="number" min=2017 max=2020 placeholder="Tahun Perolehan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="penyelenggara" id="penyelenggara" class="form-control" type="text" placeholder="Penyelenggara" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="tingkat" id="tingkat" class="form-control" required>
                                                        <option value="">Tingkat</option>
                                                        <option value="Internasional">Internasional</option>
                                                        <option value="Regional">Regional</option>
                                                        <option value="Nasional">Nasional</option>
                                                        <option value="Provinsi">Provinsi</option>
                                                        <option value="Universitas">Universitas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="keanggotaan" id="keanggotaan" class="form-control" placeholder="Keanggotaan" required>
                                                        <option value="">Keanggotaan</option>
                                                        <option value="Individu">Individu</option>
                                                        <option value="Kelompok">Kelompok</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="capaian" id="detail" class="form-control" type="text" placeholder="Detail Penghargaan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="bukti" name="bukti" accept="application/pdf" accept="application/pdf" required>
                                                        <label class="custom-file-label">Unggah Bukti</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!--Modal Body-->
                            </div>
                            <!--p-5-->
                        </div>
                        <!--col lg-->
                    </div>
                    <!--row-->
                </div>
                <!--modal content-->
            </div>
            <!--modal dialog-->
        </div>
        <!--modal-->
        <!-- End Modal Tambah Penghargaan/Pengakuan -->

        <!-- Modal Tambah Prestasi Kepemimpinan-->
        <div class="modal fade" id="tambahkepemimpinan" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="modal-body text-center">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Riwayat Kepemimpinan</h1>
                                    </div>
                                    <form class="form-horizontal" method="post" action="<?php echo base_url('User/addkepemimpinan'); ?>" enctype="multipart/form-data">
                                        <input type="hidden" id="keterangan" name="keterangan" value="Kepemimpinan">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="bidang" id="bidang" class="form-control" required>
                                                        <option value="">Capaian Organisasi Kemahasiswaan</option>
                                                        <option value="Organisasi/Lembaga Kemahasiswaan">Organisasi Kemahasiswaan/Lembaga Kemahasiswaan</option>
                                                        <option value="Unit Kemahasiswaan">Unit Kemahasiswaan</option>
                                                        <option value="Badan Semi Otonom">Badan Semi Otonom</option>
                                                        <option value="Organisasi Profesi Mahasiswa">Organisasi Profesi Mahasiswa</option>
                                                        <option value="Organisasi Sosial Kemasyarakatan">Organisasi Sosial Kemasyarakatan</option>
                                                    </select>
                                                </div>
                                                <small>Organisasi/Lembaga Kemahasiswaan : BEM, Senat Mahasiswa, DPM, MPM, HIMA</small>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="capaian" id="capaian" class="form-control" required>
                                                        <option value="">Jabatan</option>
                                                        <option value="Ketua">Ketua</option>
                                                        <option value="Pengurus Harian">Pengurus Harian</option>
                                                    </select>
                                                </div>
                                                <small>Pengurus Harian : Sekretaris/Bendahara/Pembantu Umum</small>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="judul_kegiatan" id="judul_kegiatan" class="form-control" type="text" placeholder="Organisasi/Judul Kegiatan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <input name="tahun_perolehan" id="tahun_perolehan" type="number" class="form-control" min=2017 max=2020 placeholder="Tahun Menjabat" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <select name="tingkat" id="tingkat" class="form-control" required>
                                                        <option value="">Tingkat</option>
                                                        <option value="Internasional">Internasional</option>
                                                        <option value="Regional">Regional</option>
                                                        <option value="Nasional">Nasional</option>
                                                        <option value="Provinsi">Provinsi</option>
                                                        <option value="Universitas">Universitas</option>
                                                        <option value="Fakultas">Fakultas</option>
                                                        <option value="Program Studi">Program Studi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="bukti" name="bukti" accept="application/pdf" accept="application/pdf" required>
                                                        <label class="custom-file-label">Unggah Bukti</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                            <button class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!--Modal Body-->
                            </div>
                            <!--p-5-->
                        </div>
                        <!--col lg-->
                    </div>
                    <!--row-->
                </div>
                <!--modal content-->
            </div>
            <!--modal dialog-->
        </div>
        <!--modal-->
        <!-- End Modal Tambah Prestasi Kepemimpinan -->

        <!--Modal Hapus Riwayat-->
        <div class="modal fade" id="hapusriwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-gray-900" id="exampleModalLabel">Hapus Riwayat</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!--modal header-->
                    <div class="modal-body">Apakah Anda yakin ingin menghapus riwayat prestasi ini?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                        <a class="btn btn-danger" href="">Ya</a>
                    </div>
                    <!--modal footer-->
                </div>
                <!--modal content-->
            </div>
            <!--modal dialog-->
        </div>
        <!--modal-->
        <!-- End Modal Hapus Riwayat-->

        <!-- Kompetisi-->
        <div class="col-lg-12">
            <div class="card position-relative">
                <div class="card-header py-3" style="background-color: #30475E;">
                    <div class="row d-flex  justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <h6 class="m-0 font-weight-bold text-light">Prestasi Kompetisi</h6>
                        </div>
                        <div class="col-lg-6 text-right">
                        <?php if($jumlah_kompetisi>=10):?>
                            <a><button type="button" class="btn btn-success" id="tambahriwayat" disabled><i class="fa fa-plus" aria-hidden="true"></i> Tambah Riwayat</button></a>
                        <?php else:?>
                            <a href="" data-toggle="modal" data-target="#tambahkompetisi"><button type="button" class="btn btn-success" id="tambahriwayat"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Riwayat</button></a>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Bidang</th>
                                    <th>Capaian</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Tahun</th>
                                    <th>Tingkat</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listkompetisi->result() as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->bidang; ?></td>
                                        <td><?php echo $row->capaian; ?></td>
                                        <td><?php echo $row->judul_kegiatan; ?></td>
                                        <td><?php echo $row->tahun_perolehan; ?></td>
                                        <td><?php echo $row->tingkat; ?></td>
                                        <td><a href="<?= base_url('user/viewbuktiprestasi/') . $row->bukti; ?>"><?php echo $row->bukti; ?></a></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#editkompetisi_<?= $row->id_prestasi; ?>"><button type="button" class="btn btn-primary"><span class="fa fa-pencil-alt" aria-hidden="true"></span></button></a>
                                            <a href="<?= base_url(); ?>User/hapusPrestasi/<?php echo $row->id_prestasi; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></button></a>
                                        </td>
                                    </tr>

                                    <!--Modal Edit Kompetisi-->
                                    <div class="modal fade" id="editkompetisi_<?= $row->id_prestasi; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="col-lg">
                                                    <div class="p-5">
                                                        <div class="modal-body text-center">
                                                            <div class="text-center">
                                                                <h1 class="h4 text-gray-900 mb-4">Edit Riwayat Lomba</h1>
                                                            </div>
                                                            <form class="form-horizontal" method="post" action="<?php echo base_url('User/updateKompetisi/' . $row->id_prestasi); ?>" enctype="multipart/form-data">
                                                                <input type="hidden" id="keterangan" name="keterangan" value="Kompetisi">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="bidang" id="bidang" class="form-control" required>
                                                                                <option value="">Bidang Kompetisi</option>
                                                                                <option value="Ilmiah/Penalaran/Akademik">Ilmiah/Penalaran/Akademik</option>
                                                                                <option value="Seni Budaya">Seni-Budaya</option>
                                                                                <option value="Olahraga">Olahraga</option>
                                                                                <option value="Teknologi">Teknologi & Sains, serta Inovasi</option>
                                                                                <option value="Agama">Keagamaan</option>
                                                                                <option value="Usaha">Kewirausahaan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="capaian" id="capaian" class="form-control" required>
                                                                                <option value="">Capaian</option>
                                                                                <option value="Juara 1">Juara 1</option>
                                                                                <option value="Juara 2">Juara 2</option>
                                                                                <option value="Juara 3">Juara 3</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="judul_kegiatan" id="judul_kegiatan" class="form-control" type="text" placeholder="Judul Kegiatan" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="tahun_perolehan" id="tahun_perolehan" type="number" class="form-control" min=2017 max=2020 placeholder="Tahun Perolehan" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="penyelenggara" id="penyelenggara" class="form-control" type="text" placeholder="Penyelenggara" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="tingkat" id="tingkat" class="form-control" required>
                                                                                <option value="">Tingkat</option>
                                                                                <option value="Internasional">Internasional</option>
                                                                                <option value="Regional">Regional</option>
                                                                                <option value="Nasional">Nasional</option>
                                                                                <option value="Provinsi">Provinsi</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="keanggotaan" id="keanggotaan" class="form-control" placeholder="Keanggotaan" required>
                                                                                <option value="">Keanggotaan</option>
                                                                                <option value="Individu">Individu</option>
                                                                                <option value="Kelompok">Kelompok</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="bukti" name="bukti" accept="application/pdf" accept="application/pdf" required>
                                                                                <label class="custom-file-label">Unggah Bukti</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                                    <button type="submit" class="btn btn-success">Save </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Modal Body-->
                                                    </div>
                                                    <!--p-5-->
                                                </div>
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal Kompetisi-->

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Kompetisi-->

        <!-- Bukan Kompetisi -->
        <div class="col-lg-12">
            <br>
            <div class="card position-relative">
                <div class="card-header py-3" style="background-color: #30475E;">
                    <div class="row d-flex  justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <h6 class="m-0 font-weight-bold text-light">Prestasi Bukan Kompetisi</h6>
                        </div>
                        <div class="col-lg-6 text-right">
                        <?php if($jumlah_kompetisi>=10):?>
                            <a><button type="button" class="btn btn-success" id="tambahriwayat" disabled><i class="fa fa-plus" aria-hidden="true"></i> Tambah Riwayat</button></a>
                        <?php else:?>
                            <a href="" data-toggle="modal" data-target="#tambahbukankompetisi"><button type="button" class="btn btn-success" id="tambahriwayat"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Riwayat</button></a>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Capaian</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Tahun</th>
                                    <th>Tingkat</th>
                                    <th>Detail</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listbukankompetisi->result() as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->bidang; ?></td>
                                        <td><?php echo $row->judul_kegiatan; ?></td>
                                        <td><?php echo $row->tahun_perolehan; ?></td>
                                        <td><?php echo $row->tingkat; ?></td>
                                        <td><?php echo $row->capaian; ?></td>
                                        <td><a href="<?= base_url('user/viewbuktiprestasi/') . $row->bukti; ?>"><?php echo $row->bukti; ?></a></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#editbukankompetisi_<?= $row->id_prestasi; ?>"><button type="button" class="btn btn-primary"><span class="fa fa-pencil-alt" aria-hidden="true"></span></button></a>
                                            <a href="<?= base_url(); ?>User/hapusPrestasi/<?php echo $row->id_prestasi; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></button></a>
                                        </td>
                                    </tr>

                                    <!--Modal Edit Bukan Kompetisi-->
                                    <div class="modal fade" id="editbukankompetisi_<?= $row->id_prestasi; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="col-lg">
                                                    <div class="p-5">
                                                        <div class="modal-body text-center">
                                                            <div class="text-center">
                                                                <h1 class="h4 text-gray-900 mb-4">Edit Riwayat Bukan Kompetisi</h1>
                                                            </div>
                                                            <form class="form-horizontal" method="post" action="<?php echo base_url('User/updatebukankompetisi/' . $row->id_prestasi); ?>" enctype="multipart/form-data">
                                                                <input type="hidden" id="keterangan" name="keterangan" value="Bukan Kompetisi">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="bidang" id="bidang" class="form-control" required>
                                                                                <option value="">Capaian Unggulan non Prestasi</option>
                                                                                <option value="Pemakalah/Penyaji/Narasumber/Pemandu">Pemakalah/Penyaji/Narasumber/Pemandu</option>
                                                                                <option value="Wirausahawan">Wirausahawan</option>
                                                                                <option value="Pelatih/Wasit/Juri">Pelatih/Wasit/Juri</option>
                                                                                <option value="Pemberdaya Masyarakat">Pemberdaya Masyarakat</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="judul_kegiatan" id="judul_kegiatan" class="form-control" type="text" placeholder="Judul Kegiatan" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="tahun_perolehan" id="tahun_perolehan" class="form-control" type="number" min=2017 max=2020 placeholder="Tahun Perolehan" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="penyelenggara" id="penyelenggara" class="form-control" type="text" placeholder="Penyelenggara" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="tingkat" id="tingkat" class="form-control" required>
                                                                                <option value="">Tingkat</option>
                                                                                <option value="Internasional">Internasional</option>
                                                                                <option value="Regional">Regional</option>
                                                                                <option value="Nasional">Nasional</option>
                                                                                <option value="Provinsi">Provinsi</option>
                                                                                <option value="Universitas">Universitas</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="keanggotaan" id="keanggotaan" class="form-control" placeholder="Keanggotaan" required>
                                                                                <option value="">Keanggotaan</option>
                                                                                <option value="Individu">Individu</option>
                                                                                <option value="Kelompok">Kelompok</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="capaian" id="detail" class="form-control" type="text" placeholder="Detail Penghargaan" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="bukti" name="bukti" accept="application/pdf" accept="application/pdf" required>
                                                                                <label class="custom-file-label">Unggah Bukti</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                                    <button class="btn btn-success">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Modal Body-->
                                                    </div>
                                                    <!--p-5-->
                                                </div>
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal Bukan Kompetisi-->

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bukan Kompetisi-->

        <!-- Kepemimpinan -->
        <div class="col-lg-12">
            <br>
            <div class="card position-relative">
                <div class="card-header py-3" style="background-color: #30475E;">
                    <div class="row d-flex  justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <h6 class="m-0 font-weight-bold text-light">Prestasi Kepemimpinan</h6>
                        </div>
                        <div class="col-lg-6 text-right">
                        <?php if($jumlah_kompetisi >= 10):?>
                            <a><button type="button" class="btn btn-success" id="tambahriwayat" disabled><i class="fa fa-plus" aria-hidden="true"></i> Tambah Riwayat</button></a>
                        <?php else:?>
                            <a href="" data-toggle="modal" data-target="#tambahkepemimpinan"><button type="button" class="btn btn-success" id="tambahriwayat"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Riwayat</button></a>
                        <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Capaian</th>
                                    <th>Jabatan</th>
                                    <th>Organisasi/Kegiatan</th>
                                    <th>Tahun</th>
                                    <th>Tingkat</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listkepemimpinan->result() as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->bidang; ?></td>
                                        <td><?php echo $row->capaian; ?></td>
                                        <td><?php echo $row->judul_kegiatan; ?></td>
                                        <td><?php echo $row->tahun_perolehan; ?></td>
                                        <td><?php echo $row->tingkat; ?></td>
                                        <td><a href="<?= base_url('user/viewbuktiprestasi/') . $row->bukti; ?>"><?php echo $row->bukti; ?></a></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#editkepemimpinan_<?= $row->id_prestasi; ?>"><button type="button" class="btn btn-primary"><span class="fa fa-pencil-alt" aria-hidden="true"></span></button></a>
                                            <a href="<?= base_url(); ?>User/hapusPrestasi/<?php echo $row->id_prestasi; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></button></a>
                                        </td>
                                    </tr>

                                    <!--Modal Edit Bukan Kompetisi-->
                                    <div class="modal fade" id="editkepemimpinan_<?= $row->id_prestasi; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="col-lg">
                                                    <div class="p-5">
                                                        <div class="modal-body text-center">
                                                            <div class="text-center">
                                                                <h1 class="h4 text-gray-900 mb-4">Edit Riwayat Lomba</h1>
                                                            </div>
                                                            <form class="form-horizontal" method="post" action="<?php echo base_url('User/updatekepemimpinan/' . $row->id_prestasi); ?>" enctype="multipart/form-data">
                                                                <input type="hidden" id="keterangan" name="keterangan" value="Kepemimpinan">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="bidang" id="bidang" class="form-control" required>
                                                                                <option value="">Capaian Organisasi Kemahasiswaan</option>
                                                                                <option value="Organisasi/Lembaga Kemahasiswaan">Organisasi Kemahasiswaan/Lembaga Kemahasiswaan</option>
                                                                                <option value="Unit Kemahasiswaan">Unit Kemahasiswaan</option>
                                                                                <option value="Badan Semi Otonom">Badan Semi Otonom</option>
                                                                                <option value="Organisasi Profesi Mahasiswa">Organisasi Profesi Mahasiswa</option>
                                                                                <option value="Organisasi Sosial Kemasyarakatan">Organisasi Sosial Kemasyarakatan</option>
                                                                            </select>
                                                                        </div>
                                                                        <small>Organisasi/Lembaga Kemahasiswaan : BEM, Senat Mahasiswa, DPM, MPM, HIMA</small>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="capaian" id="capaian" class="form-control" required>
                                                                                <option value="">Jabatan</option>
                                                                                <option value="Ketua">Ketua</option>
                                                                                <option value="Pengurus Harian">Pengurus Harian</option>
                                                                            </select>
                                                                        </div>
                                                                        <small>Pengurus Harian : Sekretaris/Bendahara/Pembantu Umum</small>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="judul_kegiatan" id="judul_kegiatan" class="form-control" type="text" placeholder="Organisasi/Judul Kegiatan" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <input name="tahun_perolehan" id="tahun_perolehan" type="number" class="form-control" min=2017 max=2020 placeholder="Tahun Menjabat" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <select name="tingkat" id="tingkat" class="form-control" required>
                                                                                <option value="">Tingkat</option>
                                                                                <option value="Internasional">Internasional</option>
                                                                                <option value="Regional">Regional</option>
                                                                                <option value="Nasional">Nasional</option>
                                                                                <option value="Provinsi">Provinsi</option>
                                                                                <option value="Universitas">Universitas</option>
                                                                                <option value="Fakultas">Fakultas</option>
                                                                                <option value="Program Studi">Program Studi</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="bukti" name="bukti" accept="application/pdf" accept="application/pdf" required>
                                                                                <label class="custom-file-label">Unggah Bukti</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                                    <button type="submit" class="btn btn-success">Save </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Modal Body-->
                                                    </div>
                                                    <!--p-5-->
                                                </div>
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal Bukan Kompetisi-->
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Kepemimpinan -->

    </div>
    <!-- End Content Row-->
    <br>
</div>