<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Admin"){
echo '<script language="javascript">alert("Anda bukan dosen");history.back();</script>';
}
$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_jabatan'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];
$nama = $_SESSION['nama'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>SITA | Dashboard Admin</title>
  <!-- Favicon -->
  <link rel='shortcut icon' href='img/favicon/favicon-96x96.png' type='image/x-icon' />
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

  <script src="dist/js/angular.min.js"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue-light layout-top-nav">

<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index2.html" class="navbar-brand"><b>SI</b>TA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php?page=identitas">Identitas <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Status Pendaftaran</a></li>
            <li><a href="jadwal_sidang.php">Jadwal Sidang</a></li>     
          </ul>
        </div>
        <!-- /.navbar-collapse -->
  
        <!-- /.navbar-custom-menu -->
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $nama; ?></span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="logout.php">
              <i class="fa fa-sign-out"></i></a>
            </a>
          </li>
        </ul>
      </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Sistem Informasi Tugas Akhir
          <small>Manajemen Bisnis Poltek</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
      <style>
        .blink {
  animation: blink 1s steps(1, end) infinite;
}

@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
      </style>
      <!-- Main content -->
      <section class="content">
        <div class="row" style="margin-top:10px;">
          <div class="col-md-8">
             <div style="margin-bottom:5px;padding:5px 10px;background-color: #FDFDFD !important;border-radius:3px;">
                        <small style="font-weight:bold;color:#3c8dbc;font-size:13px;">Menu Administrator</small>
                    </div>
                                         <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=list_dosen" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px; white-space: normal"><br> Daftar Dosen</a>
                                                 <a href="index.php?page=list_mhs" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Daftar Mahasiswa</a>
                                                 <a href="index.php?page=assign_pembimbing_mhs" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Assign Pembimbing</a>     
                                                
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=periode_sidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Periode Sidang</a>
                                                <a href="index.php?page=assign_jadwal_sidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Assign Jadwal Sidang</a>
                                                <a href="index.php?page=list_judul_pembimbing" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Judul & Pembimbing</a>
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=assign_jadwal_sidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Rekap Nilai Sidang</a>
                                                <a href="index.php?page=rekap_nilai_ta1" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Rekap Nilai Bimbingan <sup><span class="blink">NEW</span></sup></a>
                                                <a href="index.php?page=riwayat_perbaikan_sidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Riwayat Perbaikan Penguji</a>
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=list_berkas_final_admin" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;" ><br> List Berkas Final TA</a>
                                                <a href="index.php?page=approval_prasidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Approval Pra Sidang</a>
                                                <a href="index.php?page=list_mhs" class="btn btn-menu" style="white-space: normal"><img src="img/staff.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Daftarin Sidang MHS</a>
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                                <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                                <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                            </div>
                                        <br>
                                         <div style="margin-bottom:5px;padding:5px 10px;background-color: #FDFDFD !important;border-radius:3px;">
                        <small style="font-weight:bold;color:#3c8dbc;font-size:13px;">Menu Dosen</small>
                    </div>
                                         <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=identitas" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px; white-space: normal"><br> Profile Dosen</a>
                                                 <a href="index.php?page=list_dosen_mhs" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Mahasiswa Bimbingan</a>
                                                <a href="index.php?page=nilai_bimbingan" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Nilai Mahasiswa Bimbingan</a>                                                                   
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=approval_laporan" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Approval Laporan TA/PA</a>
                                                <a href="index.php?page=approval_perbaikan_pembimbing" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Approval Perbaikan Sidang Pembimbing</a>
                                                <a href="index.php?page=approval_perbaikan" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Approval Perbaikan Sidang Penguji</a>
                                            </div>

                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=list_penilaian_sidang" class="btn btn-menu"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Jadwal Uji TA </a>
                                                <a href="index.php?page=qr_sign" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;" ><br> Generate QR Signature </a>
                                                <a href="index.php?page=list_berkas_final_dosen" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;" ><br> Approval Berkas Final TA </a>
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=approval_prasidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Approval Pra Sidang</a>
                                                <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                                <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                            </div>
                                        <br>
              <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Informasi Penting</h3>
                    </div>
                    <div class="box-body">
                      Untuk melakukan pendaftaran Sidang Proposal, TA1, atau TA2 silakan Login ke sistem terlebih dahulu.
                    </div>
                    <!-- /.box-body -->
                  </div>
        
          </div>
        <div class="col-md-4">
          <div class="box box-success">
          <div class="box-header with-border">
            <h5 class="box-title">Jadwal Ujian Sidang</h5>
          </div>
          <div class="box-body">
            <p><strong>A. Syarat Sidang Proposal</strong><br>
            <ol>
              <li>Telah disetujui oleh dosen pembimbing untuk mengikuti sidang proposal, dibuktikan dengan tanda tangan pembimbing pada halaman pengesahan proposal</li>
              <li>Dokumen yang harus dipersiapkan untuk Sidang Proposal: 
                <ul>
                  <li>proposal sebanyak satu eksemplar yang telah ditandatangani pembimbing</li>
                  <li>kartu bimbingan</li>
                  <li>lampiran berupa bahan pustaka yang dijadikan acuan</li>
                  <li>lampiran lain yang ditentukan oleh Koordinator PA/TA atau dosen pembimbing</li>
                </ul>
              </li>
            </ol>
            </p>
            <hr>


          </div>
          <!-- /.box-body -->
        </div>
        </div>
      </div>

                

        
        
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.footer -->
  <?php
      include('footer.php');
  ?>



</div>
<!-- ./wrapper -->
<style>
.height-info{
    height: 920px;
}
.icon-menu{
    margin-top:5px;
    width:50%;
}
@media  screen and (max-width: 780px) {
  .height-info{
      height: 500px;
  }
  .icon-menu{
      margin-top:5px;
        width:80%;
    }
}
.btn-menu{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#3c8dbc;
    font-size:12px;
}
.btn-menu:hover{
    background-color: #fff;
    border-color:#3c8dbc;
    color:#3c8dbc;
    font-size:12px;
}
.btn-menu:focus{
    background-color: #fff;
    border-color:#3c8dbc;
    color:#3c8dbc;
    font-size:12px;
}
.btn-menu-disabled{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#BDBFC1;
    font-size:12px;
}
.btn-menu-disabled:hover{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#BDBFC1;
    font-size:12px;
}
.btn-menu-disabled:focus{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#BDBFC1;
    font-size:12px;
}
</style>
  
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
