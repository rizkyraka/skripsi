<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Rekomendasi</h1>

  <div class="card shadow mb-4">
    <div class="card-body">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="hasil-tab" data-toggle="tab" href="#hasil" role="tab" aria-controls="hasil" aria-selected="true">Hasil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false">Detail</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="hasil" role="tabpanel" aria-labelledby="hasil-tab">
          <br>

          <!--Tabel Rekomendasi -->
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-custom text-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Hasil Perhitungan</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 0;
                if(count($mahasiswa)<=5):
                  foreach ($mahasiswa as $row) : ?>
                  <tr>
                    <td><?= ++$a; ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->nim ?></td>
                    <td><?= $row->nilai ?></td>
                  </tr>
                <?php endforeach; 
                      else:
                      $a = 0;
                      for($i=0;$i<5;$i++):?>
                  <tr>
                    <td><?= ++$a; ?></td>
                    <td><?= $mahasiswa[$i]->nama?></td>
                    <td><?= $mahasiswa[$i]->nim?></td>
                    <td><?= $mahasiswa[$i]->nilai ?></td>
                  </tr>
                <?php endfor;
                endif;?>
              </tbody>
            </table>
          </div>
          <!--End Tabel Hasil Rekomendasi-->

        </div>

        <br>
        <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
          <!--Tabel Rekomendasi -->
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-custom text-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>IPK</th>
                  <th>KTI</th>
                  <th>Prestasi</th>
                  <th>B. Inggris</th>
                  <th>Hasil Vektor S</th>
                </tr>
              </thead>
              <tbody>
                <?php $a = 0;
                foreach ($mahasiswa as $row) : ?>
                  <tr>
                    <td><?= ++$a; ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->nim ?></td>
                    <td><?= $row->ipk ?></td>
                    <td><?php if ($row->kti) {
                          echo $row->kti;
                        } else {
                          echo 70;
                        } ?></td>
                    <td><?php if ($row->prestasi) {
                          echo $row->prestasi;
                        } else {
                          echo 0;
                        } ?></td>
                    <td><?php if ($row->b_inggris) {
                          echo $row->b_inggris;
                        } else {
                          echo 70;
                        } ?></td>
                    <td><?= $row->vektor_s ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!--End Tabel Hasil Rekomendasi-->
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!--End-->
</div>