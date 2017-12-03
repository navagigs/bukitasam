<?php error_reporting(0); date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Pendistribusian Monitoring Batubara</title>

            <link href="<?php echo base_url();?>templates/default/admin/vendor/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>templates/default/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>templates/default/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PT.Bukit Asam</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><b><?php echo $user->hak_akses; ?></b></a>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url();?>login/keluar"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url();?>web/"><i class="fa fa-home fa-fw"></i> Beranda</a>
                        </li>
                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'ADMIN') { ?> 
                        <li>
                            <a href="<?php echo site_url();?>web/user"><i class="fa fa-user fa-fw"></i> User</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/stasiun"><i class="fa fa-sticky-note fa-fw"></i> Stasiun</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/kereta"><i class="fa fa-sitemap fa-fw"></i> Kereta</a>
                        </li>   
                        <li>
                            <a href="<?php echo site_url();?>web/pegawai"><i class="fa fa-users fa-fw"></i> Pegawai</a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'PEGAWAI KAI') { ?>                      
                        <li>
                            <a href="<?php echo site_url();?>web/surat"><i class="fa fa-file-o fa-fw"></i> Surat Angkut</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/singgah"><i class="fa fa-truck fa-fw"></i> Singgah</a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'PEGAWAI PT.BA') { ?> 
                        <li>
                            <a href="<?php echo site_url();?>web/tls"><i class="fa fa-suitcase fa-fw"></i> TLS</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/tls/rcd"><i class="fa fa-tags fa-fw"></i> RCD</a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('hak_akses') == 'MANAJER') { ?> 
                        <li>
                            <a href="<?php echo site_url();?>web/tls/rcd"><i class="fa fa-tags fa-fw"></i> RCD</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/laporan_tls"><i class="fa fa-print fa-fw"></i> Laporan TLS</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/laporansemua"><i class="fa fa-print fa-fw"></i> Laporan</a>
                        </li>
                        <!--li>
                            <a href="<?php echo site_url();?>web/laporan/kereta"><i class="fa fa-print fa-fw"></i> Laporan Kereta</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/laporan/stasiun"><i class="fa fa-print fa-fw"></i> Laporan Stasiun</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/laporan/singgah"><i class="fa fa-print fa-fw"></i> Laporan Singgah</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>web/laporan/surat"><i class="fa fa-print fa-fw"></i> Laporan Surat Angkut</a>
                        </li-->
                    <?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

         <?php $this->load->view($content);?>
       

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>templates/default/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>templates/default/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>templates/default/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>templates/default/admin/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>templates/default/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>templates/default/admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>templates/default/admin/dist/js/sb-admin-2.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>templates/default/admin/vendor/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/admin/vendor/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
</body>

</html>
