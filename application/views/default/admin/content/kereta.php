 <?php if ($action == 'view' || empty($action)){ ?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kereta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Kereta
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                    <br>
                        <a href="<?php echo site_url();?>web/kereta/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Kereta</button></a><br><br>

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>JUMLAH GERBONG</th>
                                            <th>TUJUAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT *  FROM kereta");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->jumlah_gerbong; ?></td>
                                            <td><?php echo $row->tujuan; ?></td>
                                            <td><a href="<?php echo site_url();?>web/kereta/edit/<?php echo $row->id_kereta; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>web/kereta/hapus/<?php echo $row->id_kereta; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                        </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
       </div>
     </div>
</div>
 <?php } elseif ($action == 'tambah') { ?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Kereta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Kereta
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/kereta/tambah" method="post" id="exampleStandardForm" autocomplete="off">
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jumlah Gerbong</label>
                                        <input type="text" class="form-control input-sm" id="jumlah_gerbong" name="jumlah_gerbong" placeholder="Masukan Jumlah Gerbong" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tujuan</label>
                                        <select name='tujuan' id='tujuan' onchange='' required class='form-control input-sm' style='width:'>
                                            <option value=''></option>
                                                <option value='PALEMBANG'>PALEMBANG</option>
                                                <option value='PRABUMULIH'>PRABUMULIH</option>
                                                <option value='TARAHAN'>TARAHAN</option>
                                        </select>
                                    </div> 
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/kereta'"/>
                                    </div>
                                </form>
                                </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>
 <?php } elseif ($action == 'edit') { ?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit kereta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit kereta
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/kereta/edit" method="post" id="exampleStandardForm" autocomplete="off">
                                <input type="hidden" name="id_kereta" value="<?php echo $id_kereta;?>" />
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jumlah Gerbong</label>
                                        <input type="text" class="form-control input-sm" id="jumlah_gerbong" name="jumlah_gerbong" value="<?php echo $jumlah_gerbong; ?>" required/>
                                    </div>
                                     <div class="form-group form-material">
                                     <select name='tujuan' id='tujuan' onchange='' required class='form-control input-sm' style='width:'>
                                            <option value='<?php echo $tujuan; ?>'><?php echo $tujuan; ?></option>
                                                <option value='PALEMBANG'>PALEMBANG</option>
                                                <option value='PRABUMULIH'>PRABUMULIH</option>
                                                <option value='TARAHAN'>TARAHAN</option>
                                        </select>
                                      </div>
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/kereta'"/>
                                    </div>
                                </form>
                                </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>

 <?php } ?>