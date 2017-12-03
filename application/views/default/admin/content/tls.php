 <?php if ($action == 'view' || empty($action)){ ?>

  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">TLS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            TLS
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
                        <a href="<?php echo site_url();?>web/tls/tambah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Tambah TLS</button></a><br><br>

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO.DOK</th>
                                            <th>TANGGAL</th>
                                            <th>JUMLAH TONASE</th>
                                            <th>JENIS BATUBARA</th>
                                            <th>POSISI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM tls WHERE NOT posisi='TARAHAN'");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->no_dok; ?></td>
                                            <td><?php echo dateindo1($row->tanggal); ?></td>
                                            <td><?php echo $row->jumlah_tonase; ?></td>
                                            <td><?php echo $row->jenis_batubara; ?></td>
                                            <td><p class="btn-warning" align="center"><?php echo $row->posisi; ?></p></td>
                                            <td> <a href="<?php echo site_url();?>web/tls/edit/<?php echo $row->id_tls; ?>" title="Edit"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></button></a> 
                                            <a href="<?php echo site_url();?>web/tls/hapus/<?php echo $row->id_tls; ?>"onclick="return confirm('Anda yakin akan menghapus ?')" title="Hapus"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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
                    <h1 class="page-header">Tambah tls</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah tls
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                              <div class="table-responsive">
                                <form action="<?php echo site_url();?>web/tls/tambah" method="post" id="exampleStandardForm" autocomplete="off">     
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Dok</label>
                                        <input type="text" class="form-control input-sm" id="no_dok" name="no_dok" placeholder="Masukan No.Dok" required/>
                                    </div> 
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Surat Angkut</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM surat_angkut", 'no_surat_angkut', 'no_surat_angkut', 'no_surat_angkut', $no_surat_angkut);?>
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tanggal</label>
                                        <input type="date" class="form-control input-sm" id="tanggal" name="tanggal" placeholder="Masukan Tanggal" required/>
                                    </div>                              
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No Gerbong</label>
                                        <input type="number" class="form-control input-sm" id="no_gerbong" name="no_gerbong" placeholder="Masukan No Gerbong" required/>
                                    </div>                                             
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jumlah Tonase</label>
                                        <input type="number" class="form-control input-sm" id="jumlah_tonase" name="jumlah_tonase"  required/>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pengisian Ke</label>
                                        <input type="number" class="form-control input-sm" id="pengisian_ke" name="pengisian_ke" placeholder="Masukan Pengisian Ke" required/>
                                    </div>                         
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jenis Batubara</label>
                                        <input type="text" class="form-control input-sm" id="jenis_batubara" name="jenis_batubara" placeholder="Masukan Jenis Batubara" required/>
                                    </div>  
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Id Kereta</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kereta", 'id_kereta', 'id_kereta', 'id_kereta', $id_kereta);?>
                                    </div>       
                                    <div class='center'>
                                        <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
                                        <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/tls'"/>
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
                    <h1 class="page-header">Edit tls</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit tls
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                              <div class="table-responsive">
                            	<form action="<?php echo site_url();?>web/tls/edit" method="post" id="exampleStandardForm" autocomplete="off">
                            	<input type="hidden" name="id_tls" value="<?php echo $id_tls;?>" />
                                 <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Dok</label>
                                        <input type="text" class="form-control input-sm" id="no_dok" name="no_dok" value="<?php echo $no_dok;?>" required/>
                                    </div> 
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Tanggal</label>
                                        <input type="date" class="form-control input-sm" id="tanggal" name="tanggal" value="<?php echo $tanggal;?>" required/>
                                    </div>                          
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">No.Gerbong</label>
                                        <input type="number" class="form-control input-sm" id="no_gerbong" name="no_gerbong" value="<?php echo $no_gerbong;?>" required/>
                                    </div>                            
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jumlah Tonase</label>
                                        <input type="number" class="form-control input-sm" id="jumlah_tonase" name="jumlah_tonase" value="<?php echo $jumlah_tonase;?>" required/>
                                    </div>                      
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Pengisian Ke</label>
                                        <input type="number" class="form-control input-sm" id="pengisian_ke" name="pengisian_ke" value="<?php echo $pengisian_ke;?>" required/>
                                    </div>                          
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Jenis Batubara</label>
                                        <input type="text" class="form-control input-sm" id="jenis_batubara" name="jenis_batubara" value="<?php echo $jenis_batubara;?>" required/>
                                    </div>
                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputText">Id Kereta</label>
                                        <?php $this->ADM->combo_box("SELECT * FROM kereta", 'id_kereta', 'id_kereta', 'id_kereta', $id_kereta);?>
                                    </div>       
									<div class='center'>
			                            <input class="btn btn-info" type="submit" name="simpan" value="Simpan Data">
			                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>web/tls'"/>
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

 <?php } elseif ($action == 'rcd') { ?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">RCD</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            RCD
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
                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NO.DOK</th>
                                            <th>TANGGAL</th>
                                            <th>JUMLAH TONASE</th>
                                            <th>JENIS BATUBARA</th>
                                            <th>ID KERETA</th>
                                            <th>POSISI AKHIR</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM tls WHERE NOT posisi='TANJUNG ENIM' AND NOT  posisi='MUARA ENIM' AND NOT posisi='PALEMBANG'   ORDER BY id_tls DESC");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->no_dok; ?></td>
                                            <td><?php echo dateindo1($row->tanggal); ?></td>
                                            <td><?php echo $row->jumlah_tonase; ?></td>
                                            <td><?php echo $row->jenis_batubara; ?></td>
                                            <td><?php echo $row->id_kereta; ?></td>
                                            <td><p class="btn-success" align="center"><?php echo $row->posisi; ?></p></td>
                                            <td> <a href="<?php echo site_url();?>web/print_tls/<?php echo $row->id_tls; ?>" title="Cetak RCD"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span></button></a> 
                                        </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

                       <script src="<?php echo base_url();?>templates/default/admin/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>templates/default/admin/js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
    var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Tonase '
         },
         xAxis: {
            categories: ['Tanggal']
         },
         yAxis: {
            title: {
               text: 'Jumlah Tonase'
            }
         },
              series:             
            [
            <?php
                $query = $this->db->query("SELECT * FROM tls WHERE NOT posisi='TANJUNG ENIM' AND NOT  posisi='MUARA ENIM' AND NOT posisi='PALEMBANG'  ");
                foreach ($query->result() as $row){ 
              ?>
                  {
                      name: '<?php echo dateIndo($row->tanggal); ?>',
                      data: [<?php echo $row->jumlah_tonase; ?>]
                  },
                  <?php } ?>
            ]
      });
   });  
</script>
        <div id='container'></div>      
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
       </div>
     </div>
</div>

 <?php } ?>