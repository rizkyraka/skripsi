<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Matriks Berpasangan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
        <?php if($this->session->flashdata('error')){?>
            <div class = "alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>
        <a data-toggle="modal" data-target="#editskala"><button type="button" class="btn btn-primary btn-right"><span class="fa fa-pencil-alt" aria-hidden="true"></span>Edit Skala</button></a>
        <hr>
            <!-- Modal Edit Skala-->
            <div class="modal fade modal-width" id="editskala" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="<?php echo base_url('KontrolSkala/editSkala'); ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h5 class="modal-title text-gray-900" id="exampleModalLabel">Matriks Berpasangan</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <table class="table" id="dataTable">
                                <thead class="bg-custom text-light">
                                    <tr>
                                    <th>Kriteria</th>
                                    <th>IPK</th>
                                    <th>KTI</th>
                                    <th>Prestasi</th>
                                    <th>Bahasa Inggris</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>IPK</td>
                                        <td><input type="number" id="ipk_ipk" name="ipk_ipk" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
                                        <td><input type="number" id="ipk_kti" name="ipk_kti" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[0]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="ipk_prestasi" name="ipk_prestasi" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[1]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="ipk_bing" name="ipk_bing" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[2]->nilai;}else{ echo 0;}?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>KTI</td>
                                        <td><input type="number" id="kti_ipk" name="kti_ipk" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[3]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="kti_kti" name="kti_kti" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
                                        <td><input type="number" id="kti_prestasi" name="kti_prestasi" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[4]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="kti_bing" name="kti_bing" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[5]->nilai;}else{ echo 0;}?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Prestasi</td>
                                        <td><input type="number" id="prestasi_ipk" name="prestasi_ipk" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[6]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="prestasi_kti" name="prestasi_kti" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[7]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="prestasi_prestasi" name="prestasi_prestasi" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
                                        <td><input type="number" id="prestasi_bing" name="prestasi_bing" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[8]->nilai;}else{ echo 0;}?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa Inggris</td>
                                        <td><input type="number" id="bing_ipk" name="bing_ipk" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[9]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="bing_kti" name="bing_kti" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[10]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="bing_prestasi" name="bing_prestasi" class="form-control" min="0" step="0.01" max="9" value="<?php if($skala !=null){echo $skala[11]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="bing_bing" name="bing_bing" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                            <button class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End Modal Skala-->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-custom text-light">
                <tr>
                  <th>Kriteria</th>
                  <th>IPK</th>
                  <th>KTI</th>
                  <th>Prestasi</th>
                  <th>Bahasa Inggris</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>IPK</td>
                    <td>1</td>
                    <td><?php 
                    if($skala != null){
                        echo $skala[0]->nilai; 
                    }else{
                        echo 0;
                        }?></td>
                    <td><?php
                    if($skala != null){
                        echo $skala[1]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td><?php
                    if($skala != null){
                        echo $skala[2]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                </tr>
                <tr>
                    <td>KTI</td>
                    <td><?php
                    if($skala != null){
                        echo $skala[3]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td>1</td>
                    <td><?php
                    if($skala != null){
                        echo $skala[4]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td><?php
                    if($skala != null){
                        echo $skala[5]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                </tr>
                <tr>
                    <td>Prestasi</td>
                    <td><?php
                    if($skala != null){
                        echo $skala[6]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td><?php
                    if($skala != null){
                        echo $skala[7]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td>1</td>
                    <td><?php
                    if($skala != null){
                        echo $skala[8]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                </tr>
                <tr>
                    <td>Bahasa Inggris</td>
                    <td><?php
                    if($skala != null){
                        echo $skala[9]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td><?php
                    if($skala != null){
                        echo $skala[10]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td><?php
                    if($skala != null){
                        echo $skala[11]->nilai;
                    }else{
                        echo 0;
                    }
                    ?></td>
                    <td>1</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>

<!--End-->
</div>