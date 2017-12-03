 <?php if ($action == 'view' || empty($action)){ ?>

  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pegawai
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
                        <a href="<?php echo site_url();?>web/pegawai/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah Pegawai</button></a><br><br>

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO.PEGAWAI</th>
                                            <th>NAMA</th>
                                            <th>JABATAN</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM pegawai");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->no_pegawai; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->jabatan; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><a href="<?php echo site_url();?>web/pegawai/edit/<?php echo $row->id_pegawai; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>web/pegawai/hapus/<?php echo $row->id_pegawai; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                    <h1 class="page-header">Tambah Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Pegawai
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                              <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/pegawai/tambah" method="post" id="exampleStandardForm" autocomplete="off">     
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Pegawai</label>
                                        <input type="text" class="form-control input-sm" id="no_pegawai" name="no_pegawai" placeholder="Masukan No.Pegawai" required/>
                                    </div> 
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama Pegawai</label>
                                        <input type="text" class="form-control input-sm" id="nama" name="nama" placeholder="Masukan Nama Pegawai" required/>
                                    </div>                             
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jabatan</label>
                                        <input type="text" class="form-control input-sm" id="jabatan" name="jabatan" placeholder="Masukan Jabatan" required/>
                                    </div>                         
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Alamat</label>
                                        <input type="text" class="form-control input-sm" id="alamat" name="alamat" placeholder="Masukan alamat" required/>
                                    </div>                                                
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Status</label>
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="status" id="aktif" class="icheck" value="aktif"> Aktif
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="status" id="tidak aktif" class="icheck" value="tidak aktif"> Tidak Aktif
                                                </label> 
                                         </div>
                                    </div>
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/pegawai'"/>
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
                    <h1 class="page-header">Edit Pegawai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Pegawai
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                              <div class="table-responsive">
                            	<form action="<?php echo site_url();?>web/pegawai/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai;?>" />
                                 <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Pegawai</label>
                                        <input type="text" class="form-control input-sm" id="no_pegawai" name="no_pegawai" value="<?php echo $no_pegawai;?>" required/>
                                    </div> 
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama Pegawai</label>
                                        <input type="text" class="form-control input-sm" id="nama" name="nama" value="<?php echo $nama;?>" required/>
                                    </div>                             
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jabatan</label>
                                        <input type="text" class="form-control input-sm" id="jabatan" name="jabatan"value="<?php echo $jabatan;?>" required/>
                                    </div>                         
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Alamat</label>
                                        <input type="text" class="form-control input-sm" id="alamat" name="alamat" value="<?php echo $alamat;?>" required/>
                                    </div>                             
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Status</label>
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $aktif = ($status=='AKTIF')?'checked':'';?> name="status" id="aktif" class="icheck" value="aktif"> Aktif
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $tidak = ($status=='TIDAK AKTIF')?'checked':'';?> name="status" id="tidak aktif" class="icheck" value="tidak aktif"> Tidak Aktif
                                                </label> 
                                         </div>
                                    </div>
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/pegawai'"/>
			                        </div>
								</form>
                            	</div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
               
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
          
        </div>
 <?php } ?>