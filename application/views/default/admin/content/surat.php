 <?php if ($action == 'view' || empty($action)){ ?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Surat Angkut</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Surat Angkut
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
                        <a href="<?php echo site_url();?>web/surat/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Surat Angkut</button></a><br><br>

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR SURAT</th>
                                            <th>TUJUAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT *  FROM surat_angkut");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->no_surat_angkut; ?></td>
                                            <td><?php echo $row->tujuan; ?></td>
                                            <td><a href="<?php echo site_url();?>web/surat/edit/<?php echo $row->id_surat_angkut; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>web/surat/hapus/<?php echo $row->id_surat_angkut; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                    <h1 class="page-header">Tambah Surat Angkut</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Surat Angkut
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/surat/tambah" method="post" id="exampleStandardForm" autocomplete="off">
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nomor Surat Angkut</label>
                                        <input type="text" class="form-control input-sm" id="no_surat_angkut" name="no_surat_angkut" placeholder="Masukan Nomor Surat Angkut" required/>
                                    </div>
                                     <!--div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pengisian Ke</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM tls", 'pengisian_ke', 'pengisian_ke', 'pengisian_ke', $pengisian_ke);?>
                                    </div--> 
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pegawai</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM pegawai", 'id_pegawai', 'id_pegawai', 'nama', $nama);?>
                                    </div>  
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tujuan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kereta", 'tujuan', 'tujuan', 'tujuan', $tujuan);?>
                                    </div> 
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/surat'"/>
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
                    <h1 class="page-header">Edit Surat Angkut</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Surat Angkut
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/surat/edit" method="post" id="exampleStandardForm" autocomplete="off">
                                <input type="hidden" name="id_surat_angkut" value="<?php echo $id_surat_angkut;?>" />
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nomor Surat Angkut</label>
                                        <input type="text" class="form-control input-sm" id="no_surat_angkut" name="no_surat_angkut" value="<?php echo $no_surat_angkut; ?>" required/>
                                    </div>
                                    <!--div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pengisian Ke</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM tls", 'pengisian_ke', 'pengisian_ke', 'pengisian_ke', $pengisian_ke);?>
                                    </div--> 
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pegawai</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM pegawai", 'id_pegawai', 'id_pegawai', 'nama', $id_pegawai);?>
                                    </div>  
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tujuan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kereta", 'tujuan', 'tujuan', 'tujuan', $tujuan);?>
                                    </div> 
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/surat'"/>
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