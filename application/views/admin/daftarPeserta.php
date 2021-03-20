<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Daftar Peserta</h1>

  <!--Tabel Rekomendasi-->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-custom">
            <tr class="text-light">
              <th>No</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $a = 0;
            foreach ($daftarpeserta->result() as $row) : ?>
              <tr class="font-weight-bold text-custom">
                <td><?= ++$a; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->nim; ?></td>
                <td><a href="<?= base_url('KontrolDaftarPeserta/viewPeserta/') . $row->id_mhs; ?>"><button type="button" class="btn btn-primary"><span class="fas fa-eye" aria-hidden="true"></span></button></a></td>
              </tr>
            <?php endforeach; ?>
            <!-- <?= $this->pagination->create_links(); ?> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!--End-->
</div>