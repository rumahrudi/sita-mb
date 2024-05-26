<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tugas Akhir | Manajemen Bisnis</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><b>SI</b>TA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?page=login">Login <span class="sr-only">(current)</span></a></li>
            <li><a href="index.php?page=jadwal_sidang">Jadwal Sidang</a></li>    
          </ul>
        </div>
        <!-- /.navbar-collapse -->
  
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Sistem Informasi Tugas Akhir
          <small>Manajemen Bisnis</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
      <!--
      <div class="row" style="margin-top:10px;">
      <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Jadwal Sidang Bulan ini</h4>
                Silahkan klik link berikut untuk lihat jadwal versi pdf. Klik <a href="viewer.php?file=<?php $file="template/JadwalSidangAgus2021v1.pdf"; echo base64_encode($file);  ?>" target="_blank">View Jadwal</a>           
              </div>
      </div>
  -->
        <div class="row" style="margin-top:10px;">
           <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Jadwal Sidang Bulan Ini</h3>
                    </div>
                    <div class="box-body table-responsive">
            <table id="example" class="table table-hover">
              <thead>
                <tr>
                 <th>No</th>
                  <th width="10%">Jenis Usulan</th>
                  <th width="25%">Nama & Judul</th>
                  <th >Penguji 1</th>
                  <th >Penguji 2</th>
                  <th >Tanggal Sidang</th>
                  <th >Jam Sidang</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                
                $periode_encoded = isset($_GET['periode']) ? $_GET['periode'] : null;
                $periode = $periode_encoded !== null ? base64_decode($periode_encoded) : '';
                
                $month = date('m');
                $year = date('Y');
                $no = 1;
                
                $sql = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE MONTH(`tanggal_sidang`) = $month AND YEAR(`tanggal_sidang`) = $year");
                while ($data = mysqli_fetch_assoc($sql)) {
                    $periodsidang = $data['periode_sidang'];
                    $idjadwal = $data['id_jadwal'];
                    $idmhs = $data['id_tugas_akhir'];
                    $iddosen = $data['penguji_1'];
                    $iddosen2 = $data['penguji_2'];
                }

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$idmhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $namamhs = $data5['nama'];

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['jenis_sidang'].'</td>';
                        echo '<td >'.$namamhs.'<br><i>'.$data2['judul'].'</i></td>';
                        echo '<td >'.$namadosen.'</td>';
                        echo '<td >'.$namadosen2.'</td>';
                        echo '<td >'.$data['tanggal'].'</td>';
                        echo '<td >'.$data['jam_sidang'].'</td>';                      
                        echo '</tr>';
                        $no++;                   
                      
              ?>  
               </tbody>
              </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
      </div>     
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.3
      </div>
     <strong>Copyright &copy;<a href="http://if.polibatam.ac.id/">Jurusan Teknik Informatika</a>. </strong> Developed by <a href="https://www.mendeley.com/profiles/supar-dianto/">Supardianto</a>.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
