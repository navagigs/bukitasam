<?php if ($action == 'view' || empty($action)){ ?>
 
<?php } elseif ($action == 'kereta'){ ?>
      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Kereta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Laporan  Kereta
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <br>
                        <a href="<?php echo site_url();?>web/laporankereta"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print Laporan</button></a><br><br>
                         <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>JUMLAH GERBONG</th>
                                            <th>TUJUAN</th>
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
                                          
                                        </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>
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

<?php } elseif ($action == 'stasiun'){ ?>
     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Stasiun</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Laporan  Stasiun
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <br>
                       <a href="<?php echo site_url();?>web/laporanstasiun"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print Laporan</button></a><br><br>
                         <div class="table-responsive">

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>JARAK</th>
                                            <th>TUJUAN</th>
                                            <th>NAMA PEGAWAI</th>
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
                                          </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>
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

<?php } elseif ($action == 'singgah'){ ?>
     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Singgah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Laporan  Singgah
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <br>
                       <a href="<?php echo site_url();?>web/laporansinggah"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print Laporan</button></a><br><br>
                         <div class="table-responsive">

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAMA TEMPAT SINGGAH</th>
                                            <th>WAKTU</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM singgah");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->nama_singgah; ?></td>
                                            <td><?php echo $row->waktu; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>
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

<?php } elseif ($action == 'surat'){ ?>
     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Surat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Laporan  Surat
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <br>
                       <a href="<?php echo site_url();?>web/laporansurat"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print Laporan</button></a><br><br>
                         <div class="table-responsive">

                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NOMOR SURAT</th>
                                            <th>PENGISIAN KE</th>
                                            <th>TUJUAN</th>
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
                                            <td><?php echo $row->pengisian_ke; ?></td>
                                            <td><?php echo $row->tujuan; ?></td>
                                         </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
                        </div>
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
 <?php }  ?>