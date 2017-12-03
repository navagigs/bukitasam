<?php if ($action == 'view' || empty($action)){ ?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan TLS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Laporan TLS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                         
                          <form role="form" action="<?php echo base_url();?>web/laporantls" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                        <div class="form-group">
                                            <label>Dari Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="dari" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sampai Tanggal <span class="required">*</span></label>
                                            <input type="date"  name="sampai" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="buat" value="Buat Laporan">
                                </div>
                                       
                                </form>
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