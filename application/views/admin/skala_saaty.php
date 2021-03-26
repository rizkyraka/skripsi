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
                                    <th>Tes IQ</th>
                                    <th>Tes Quran</th>
                                    <th>Tes Mapel</th>
                                    <th>Rapot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tes IQ</td>
                                        <td><input type="number" id="iq_iq" name="iq_iq" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
                                        <td><input type="number" id="iq_quran" name="iq_quran" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[0]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="iq_mapel" name="iq_mapel" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[1]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="iq_rapot" name="iq_rapot" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[2]->nilai;}else{ echo 0;}?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Tes Quran</td>
                                        <td><input type="number" id="quran_iq" name="quran_iq" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[3]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="quran_quran" name="quran_quran" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
                                        <td><input type="number" id="quran_mapel" name="quran_mapel" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[4]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="quran_rapot" name="quran_rapot" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[5]->nilai;}else{ echo 0;}?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Tes Mapel</td>
                                        <td><input type="number" id="mapel_iq" name="mapel_iq" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[6]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="mapel_quran" name="mapel_quran" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[7]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="mapel_mapel" name="mapel_mapel" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
                                        <td><input type="number" id="mapel_rapot" name="mapel_rapot" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[8]->nilai;}else{ echo 0;}?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Rapot</td>
                                        <td><input type="number" id="rapot_iq" name="rapot_iq" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[9]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="rapot_quran" name="rapot_quran" class="form-control" min="0" max="9" step="0.01" value="<?php if($skala !=null){echo $skala[10]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="rapot_mapel" name="rapot_mapel" class="form-control" min="0" step="0.01" max="9" value="<?php if($skala !=null){echo $skala[11]->nilai;}else{ echo 0;}?>" required></td>
                                        <td><input type="number" id="rapot_rapot" name="rapot_rapot" class="form-control" min="0" max="9" step="0.01" value=1 disabled></td>
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
                  <th>Tes IQ</th>
                  <th>Tes Quran</th>
                  <th>Tes Mapel</th>
                  <th>Rapot</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Tes IQ</td>
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
                    <td>Tes Quran</td>
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
                    <td>Tes Mapel</td>
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
                    <td>Rapot</td>
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