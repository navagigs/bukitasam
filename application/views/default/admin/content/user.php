 <?php if ($action == 'view' || empty($action)){ ?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User
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
                        <a href="<?php echo site_url();?>web/user/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah User</button></a><br><br>

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>USERNAME</th>
                                            <th>NAMA</th>
                                            <th>HAK AKSES</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM user");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->hak_akses; ?></td>
                                            <td><a href="<?php echo site_url();?>web/user/edit/<?php echo $row->username; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>web/user/hapus/<?php echo $row->id_user; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                    <h1 class="page-header">Tambah User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/user/tambah" method="post" id="exampleStandardForm" autocomplete="off">
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama</label>
                                        <input type="text" class="form-control input-sm" id="nama" name="nama" placeholder="Masukan Nama" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Username</label>
                                        <input type="text" class="form-control input-sm" id="username" name="username" placeholder="Masukan Username" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Password</label>
                                        <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Masukan Password" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jabatan</label>
                                        <input type="text" class="form-control input-sm" id="jabatan" name="jabatan" placeholder="Masukan Jabatan" required/>
                                    </div>      
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Alamat</label>
                                        <input type="text" class="form-control input-sm" id="alamat" name="alamat" placeholder="Masukan Alamat" required/>
                                    </div>                            
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Hak Akses</label>
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="hak_akses" id="ADMIN" class="icheck" value="ADMIN"> ADMIN
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="hak_akses" id="PEGAWAI PT.BA" class="icheck" value="PEGAWAI PT.BA"> PEGAWAI PT.BA
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="hak_akses" id="PEGAWAI KAI" class="icheck" value="PEGAWAI KAI"> PEGAWAI KAI
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="hak_akses" id="MANAJER" class="icheck" value="MANAJER"> MANAJER
                                                </label> 
                                         </div>
                                    </div>
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/user'"/>
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
                    <h1 class="page-header">Edit User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/user/edit" method="post" id="exampleStandardForm" autocomplete="off">
                                <input type="hidden" name="username" value="<?php echo $username;?>" />
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama</label>
                                        <input type="text" class="form-control input-sm" id="nama"  name="nama" value="<?php echo $nama;?>"/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Username</label>
                                        <input type="text" class="form-control input-sm" id="username" disabled name="username" value="<?php echo $username;?>"/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Password</label>
                                        <input type="password" class="form-control input-sm" name="password" /> *Kosongkan bila tidak diedit.
                                    </div>                           
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jabatan</label>
                                        <input type="text" class="form-control input-sm" id="jabatan" name="jabatan" value="<?php echo $jabatan;?>" required/>
                                    </div>      
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Alamat</label>
                                        <input type="text" class="form-control input-sm" id="alamat" name="alamat" value="<?php echo $alamat;?>" required/>
                                    </div>

                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Hak Akses</label>
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $admin = ($hak_akses=='ADMIN')?'checked':'';?> name="hak_akses" id="ADMIN" class="icheck" value="ADMIN"> ADMIN
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  <?php echo $ptba = ($hak_akses=='PEGAWAI PT.BA')?'checked':'';?> name="hak_akses" id="PEGAWAI PT.BA" class="icheck" value="PEGAWAI PT.BA"> PEGAWAI PT.BA
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  <?php echo $kai = ($hak_akses=='PEGAWAI KAI')?'checked':'';?> name="hak_akses" id="PEGAWAI KAI" class="icheck" value="PEGAWAI KAI"> PEGAWAI KAI
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $manajer = ($hak_akses=='MANAJER')?'checked':'';?> name="hak_akses" id="manajer" class="icheck" value="MANAJER"> MANAJER
                                                </label> 
                                         </div>
                                    </div>             
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/user'"/>
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