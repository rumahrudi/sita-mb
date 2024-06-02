<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if(($_SESSION['user_jabatan'] != "Dosen") && ($_SESSION['user_jabatan'] != "Admin")) {
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
  <title>SITA | Dashboard Dosen</title>
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
          <a href="#" class="navbar-brand"><b>SI</b>TA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php?page=identitas">Identitas <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Status Pendaftaran</a></li>
            <li><a href="#">Jadwal Sidang</a></li>     
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
          <small>Manajemen Bisnis</small>
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
          <div class="col-md-12">
             <div style="margin-bottom:5px;padding:5px 10px;background-color: #FDFDFD !important;border-radius:3px;">
                        <small style="font-weight:bold;color:#3c8dbc;font-size:13px;">Menu Dosen</small>
                    </div>
                                         <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=identitas" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px; white-space: normal"><br> Profile Dosen</a>
                                                 <a href="index.php?page=list_dosen_mhs" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Mahasiswa Bimbingan</a>
                                                 <a href="index.php?page=nilai_bimbingan_baru" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Nilai Mahasiswa Bimbingan <sup><span class="blink">NEW</span></sup></a>                                                       
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                             
                                                <a href="index.php?page=approval_laporan" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Approval Laporan TA/PA</a>
                                                <a href="index.php?page=approval_perbaikan_pembimbing" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Approval Perbaikan Sidang Pembimbing</a>
                                                <a href="index.php?page=approval_perbaikan" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Approval Perbaikan Sidang Penguji</a>
                                            </div>

                                            <div class="btn-group btn-group-justified">
                                            
                                                <a href="index.php?page=list_penilaian_sidang" class="btn btn-menu"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Jadwal Uji TA </a>
                                                <a href="index.php?page=list_berkas_final_dosen" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;" ><br> Approval Berkas Final TA </a>
                                                <a href="index.php?page=qr_sign" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;" ><br> Generate QR Signature </a>
                                                
                                            </div>

                                            <div class="btn-group btn-group-justified">
                                            <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                                <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                                <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
                                            </div>
                                        <br>
      <?php
       include 'config.php';
       error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
       $sql  = $conn->query("SELECT * FROM tb_prodi WHERE id_user = '$id'");
       $data = mysqli_fetch_assoc($sql);
 
       if(!empty($data)){
        echo '
        <div style="margin-bottom:5px;padding:5px 10px;background-color: #FDFDFD !important;border-radius:3px;">
        <small style="font-weight:bold;color:#3c8dbc;font-size:13px;">Menu KPS '.$data['kode_prodi'].'</small>
        </div>
        ';
         echo '
         <div class="btn-group btn-group-justified">                                          
         <a href="index.php?page=list_berkas_final_kps" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;" ><br> List Pengajuan Verifikasi Berkas Final</a>
         <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
         <a href="" class="btn btn-menu" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> </a>
          </div>
          <br>
         ';
 
       }
      ?>
      
              <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Jadwal Penguji Sidang Periode ini</h3>
                    </div>
                    <div class="box-body">
                    <table class="table table-hover">
              <thead>
                <tr>
                 <th>No</th>
                  <th >Jenis Usulan</th>
                  <th >Nama & Judul</th>
                  <th width="20%">Penguji</th>
                  <th width="15%">Tanggal & Jam Sidang</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                $periode = isset($_GET['periode']) ? base64_decode($_GET['periode']) : ''; 
                $month = date('m');
                $year = date('Y');
                $no = 1;

                $sql = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE MONTH(`tanggal_sidang`) = $month AND YEAR(`tanggal_sidang`) = $year AND (penguji_1 = $id OR penguji_2 = $id)");
                while ($data = mysqli_fetch_assoc($sql)) {
                    $periodsidang = $data['periode_sidang'];
                    $idjadwal = $data['id_jadwal'];

                    $idmhs = $data['id_tugas_akhir'];
                    $iddosen = $data['penguji_1'];
                    $iddosen2 = $data['penguji_2'];

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
                        echo '<td >'.$namadosen.'<br>'.$namadosen2.'</td>';
                        echo '<td >'.$data['tanggal'].'<br>'.$data['jam_sidang'].'</td>';              
                        echo '</tr>';
                        $no++;                   
                      }
              ?>  
               </tbody>
              </table>
                    </div>
                    <!-- /.box-body -->
                  </div>

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
