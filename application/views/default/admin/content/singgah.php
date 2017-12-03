 <?php if ($action == 'view' || empty($action)){ ?>

  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Singgah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Singgah
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

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO.DOK</th>
                                            <th>NO.SURAT</th>
                                            <th>NAMA TEMPAT SINGGAH</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM tls");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->no_dok; ?></td>
                                            <td><?php echo $row->no_surat_angkut; ?></td>
                                            <td><?php echo $row->posisi; ?></td>
                                            <td><a href="<?php echo site_url();?>web/singgah/edit/<?php echo $row->id_tls; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>web/singgah/hapus/<?php echo $row->id_tls; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                    <h1 class="page-header">Tambah singgah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah singgah
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                              <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/singgah/tambah" method="post" id="exampleStandardForm" autocomplete="off">     
                                  <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Nama Tempat Singgah singgah</label>
                                        <input type="text" class="form-control input-sm" id="nama_singgah" name="nama_singgah" placeholder="Masukan Nama Tempat Singgah" required/>
                                    </div>                             
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Waktu</label>
                                        <div class="controls input-append date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                            <input type="text"  class="form-control input-sm" name="waktu"  value="" readonly>
                                            <span class="add-on"><i class="icon-remove"></i></span>
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="" />
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Surat Angkut</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM surat_angkut", 'id_surat_angkut', 'id_surat_angkut', 'no_surat_angkut', $id_surat_angkut);?>
                                    </div>                                                 
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Status</label>
                                        <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="status" id="SAMPAI" class="icheck" value="SAMPAI"> SAMPAI
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio"  name="status" id="BELUM" class="icheck" value="BELUM"> BELUM
                                                </label> 
                                         </div>
                                    </div>
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/singgah'"/>
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
                    <h1 class="page-header">Edit Singgah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Singgah
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                              <div class="table-responsive">
                            	<form action="<?php echo site_url();?>web/singgah/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="id_tls" value="<?php echo $id_tls;?>" />                     
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Posisi</label>
                                        <select name="posisi" class="form-control">
                                          <option value="<?php echo $posisi; ?>"><?php echo $posisi; ?></option>
                                          <option value="TANJUNG ENIM">TANJUNG ENIM</option>
                                          <option value="MUARA ENIM">MUARA ENIM</option>
                                          <option value="PALEMBANG">PALEMBANG</option>
                                          <option value="TARAHAN">TARAHAN</option>
                                        </select>
                                    </div>                               
                                   
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/singgah'"/>
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