 <?php if ($action == 'view' || empty($action)){ ?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stasiun</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Stasiun
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
                        <a href="<?php echo site_url();?>web/stasiun/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Stasiun</button></a><br><br>

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>JARAK</th>
                                            <th>TUJUAN</th>
                                            <th>NAMA PEGAWAI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT 
                                            kereta.id_kereta AS id_kereta,
                                            kereta.tujuan AS tujuan,
                                            pegawai.id_pegawai AS id_pegawai,
                                            pegawai.nama AS nama,
                                            stasiun.id_stasiun AS id_stasiun,
                                            stasiun.jarak AS jarak
                                            FROM stasiun
                                            LEFT JOIN kereta ON kereta.id_kereta=stasiun.id_kereta
                                            LEFT JOIN pegawai ON pegawai.id_pegawai=stasiun.id_pegawai
                                            ");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->jarak; ?></td>
                                            <td><?php echo $row->tujuan; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><a href="<?php echo site_url();?>web/stasiun/edit/<?php echo $row->id_stasiun; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>web/stasiun/hapus/<?php echo $row->id_stasiun; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                    <h1 class="page-header">Tambah stasiun</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah stasiun
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/stasiun/tambah" method="post" id="exampleStandardForm" autocomplete="off">
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jarak</label>
                                        <input type="text" class="form-control input-sm" id="jarak" name="jarak" placeholder="Masukan Jarak" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tujuan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kereta", 'id_kereta', 'id_kereta', 'tujuan', $tujuan);?>
                                    </div> 
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pegawai</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM pegawai", 'id_pegawai', 'id_pegawai', 'nama', $nama);?>
                                    </div> 
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/stasiun'"/>
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
                    <h1 class="page-header">Edit stasiun</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit stasiun
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/stasiun/edit" method="post" id="exampleStandardForm" autocomplete="off">
                                <input type="hidden" name="stasiunname" value="<?php echo $id_stasiun;?>" />
                                     <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jarak</label>
                                        <input type="text" class="form-control input-sm" id="jarak" name="jarak" value="<?php echo $jarak; ?>" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tujuan</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kereta", 'id_kereta', 'id_kereta', 'tujuan', $id_kereta);?>
                                    </div> 
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pegawai</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM pegawai", 'id_pegawai', 'id_pegawai', 'nama', $id_pegawai);?>
                                    </div> 
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/stasiun'"/>
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