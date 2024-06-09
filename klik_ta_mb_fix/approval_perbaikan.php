<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if(($_SESSION['user_jabatan'] != "Dosen") && ($_SESSION['user_jabatan'] != "Admin")) {
echo '<script language="javascript">alert("Anda bukan Dosen");history.back();</script>';
}

$token  = $_SESSION['token'];
$nik    = $_SESSION['user_nik'];
$role   = $_SESSION['user_jabatan'];
$reviewer = $_SESSION['user_reviewer'];
$id     = $_SESSION['id_user'];
$nama   = $_SESSION['nama'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>SITA | Approval Perbaikan Sidang</title>
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


    <script type="text/javascript">
$(document).ready(function() {
    $('#load').DataTable( {
        "order": [[ 1, "asc" ],[5,"desc"]]
    } );
} );
    </script>
 </script>


<script language="javascript">
    function search_func()
    {
      id_value = document.getElementById("nik").value;
      
        $.ajax({
                        url: 'search_mhs.php',
                        type: 'post',
                        data: {'nik' : id_value},
                        dataType: 'json',
                        success: function(response){

                            var len = response.length;

                            if(len > 0){
                                var jabatann =  response[0]['jabatan'];
                                var namaa =  response[0]['name'];
                                var emaill = response[0]['email'];
                                var idd = response[0]['id'];

                                document.getElementById("id_userr").value = idd;
                                document.getElementById("nama").value = namaa;
                                document.getElementById("email").value = emaill;
                                document.getElementById("jabatan").value = jabatann;
                            }
                        }

                    });
    }
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#pilih_sidang').on('change', function() {
      if ( this.value == 'Sidang TA 2 / Sidang 2 TANPA sidang magang')
      {
        $("#laporan_magang1").hide();
      }
      else if ( this.value == 'Sidang TA 2 / Sidang 2 DENGAN sidang magang')
      {
        $("#laporan_magang1").show();
      }
      else
      {
        $("#laporan_magang1").hide();
      }
    });
});
</script>

<script type="text/javascript">
                  function validasiFile(j){
                    laporan  = "laporan_perbaikan"+j;
                      var inputFile = document.getElementById(laporan);
                      var pathFile =   inputFile.value;
                      var ekstensiOk = /(\.pdf|\.PDF)$/i;
                      if(!ekstensiOk.exec(pathFile)){
                          alert('Silakan upload file yang memiliki ekstensi .pdf');
                          inputFile.value = '';
                          return false;
                      }
                      else{
                        if (inputFile.files.length > 0) { 
                          for (x = 0; x <= inputFile.files.length - 1; x++) { 
                
                              const fsize = inputFile.files.item(x).size; 
                              const file = Math.round((fsize / 1024)); 
                              // The size of the file. 
                              if (file >= 10485) { 
                                  alert( 
                                    "Ukuran File Terlalu Besar, Ukuran file yang diizinkan < 10MB"); 
                                  inputFile.value = '';
                                  return false;
                              } 
                          } 
                      } 
                      }
                  }
                </script>
                <script type="text/javascript">
                  function validasiFile2(j){
                    laporan  = "laporan_perbaikan2"+j;
                      var inputFile = document.getElementById(laporan);
                      var pathFile =   inputFile.value;
                      var ekstensiOk = /(\.pdf|\.PDF)$/i;
                      if(!ekstensiOk.exec(pathFile)){
                          alert('Silakan upload file yang memiliki ekstensi .pdf');
                          inputFile.value = '';
                          return false;
                      }
                      else{
                        if (inputFile.files.length > 0) { 
                          for (x = 0; x <= inputFile.files.length - 1; x++) { 
                
                              const fsize = inputFile.files.item(x).size; 
                              const file = Math.round((fsize / 1024)); 
                              // The size of the file. 
                              if (file >= 10485) { 
                                  alert( 
                                    "Ukuran File Terlalu Besar, Ukuran file yang diizinkan < 10MB"); 
                                  inputFile.value = '';
                                  return false;
                              } 
                          } 
                      } 
                      }
                  }
                </script>




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
<body class="hold-transition skin-blue-light sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SITA</span>
      <!-- logo for regular state and mobile devices -->
      <img src="img/logo.png" height="50%" class="rounded" alt="...">
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="dist/img/user2-160x160.jpg"  class="user-image" alt="User Image">
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
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="white-space: normal"><?php echo $nama; ?></p>
          <a href="#"><?php echo $role; ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!-- /.footer -->
      <?php
          include('sidebar.php');
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
       <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <div class="loading">
                <section class="content">
    <div class="row ">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Approval Perbaikan Sidang</h3>
                </div><!-- /.box-header -->                 

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body ">
         <table id="load" class="table table-hover">
              <thead>
                <tr>
                 <th>No</th>
                 <th>#</th>
                  <th width="10%">Jenis Usulan</th>
                  <th width="25%">Nama & Judul</th>
                  <th >Penguji 1 & 2</th>
                  <th >Tanggal Sidang</th>
                  <th>File Perbaikan</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                
                // Cek apakah $_GET['periode'] ada dan tidak null
                $periode = isset($_GET['periode']) ? base64_decode($_GET['periode']) : ''; // line 271
                
                $month = date('m');
                $no = 1;
                
                $sql = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%d %M %Y') as `tanggal_sidang2` FROM `tb_jadwal_sidang` WHERE penguji_1 = '$id' OR penguji_2 = '$id'");
                while ($data = mysqli_fetch_assoc($sql)) {
                    $periodsidang = $data['periode_sidang'];
                    $idjadwal = $data['id_jadwal'];
                    $penguji_1 = $data['penguji_1'];
                    $penguji_2 = $data['penguji_2'];
                        
                        $idmhs= $data['id_tugas_akhir'];
                        $iddosen = $data['penguji_1'];
                        $iddosen2 = $data['penguji_2'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];
                        $id_dosen2 = $data3['id_user'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$idmhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $namamhs = $data5['nama'];

                        // $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_1;");
                        // $data6 = mysqli_fetch_assoc($sql6);
                        // $komentar = $data6['catatan_perbaikan'];
                        // $status = $data6['status'];
                        // $file_perbaikan = $data6['file_perbaikan'];

                        // $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = $idjadwal AND id_dosen = $penguji_2 ;");
                        // $data7 = mysqli_fetch_assoc($sql7);
                        // $komentar2 = $data7['catatan_perbaikan'];
                        // $status2 = $data7['status'];

                        $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_1;");
                        $data6 = mysqli_fetch_assoc($sql6);

                        $sql62  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_1;");
                        $data62 = mysqli_fetch_assoc($sql62);

                        if(empty($data6)){
                        $komentar = $data62['catatan_perbaikan'];
                        $status = $data62['status'];
                        $sidang_ulang = $data62['sidang_ulang'];
                        $file_perbaikan = $data62['file_perbaikan'];
                        $modal_upload = 'approval_perbaikan_penguji_baru';
                        }
                        else{
                        $komentar = $data6['catatan_perbaikan'];
                        $status = $data6['status'];
                        $sidang_ulang = $data6['sidang_ulang'];
                        $file_perbaikan = $data6['file_perbaikan'];
                        $modal_upload = 'approval_perbaikan_penguji';
                        }
                        
                        $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_2 ;");
                        $data7 = mysqli_fetch_assoc($sql7);

                        $sql72  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_2 ;");
                        $data72 = mysqli_fetch_assoc($sql72);

                        if(empty($data7)){
                          $komentar2 = $data72['catatan_perbaikan'];
                          $status2 = $data72['status'];
                          $sidang_ulang2 = $data72['sidang_ulang'];
                          $modal_upload = 'approval_perbaikan_penguji_baru';
                          }
                          else{
                          $$komentar2 = $data7['catatan_perbaikan'];
                          $status2 = $data7['status'];
                          $sidang_ulang2 = $data7['sidang_ulang'];
                          $modal_upload = 'approval_perbaikan_penguji';
                        }

                        $sql8  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = $idjadwal AND id_dosen = $id;");
                        $data8 = mysqli_fetch_assoc($sql8);

                        $sql82  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = $idjadwal AND id_dosen = $id;");
                        $data82 = mysqli_fetch_assoc($sql82);

                        if(empty($data8)){
                        $status8 = $data82['status'];
                        }else{
                        $status8 = $data8['status'];
                        }

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        if(($status8 == 'Disetujui Pembimbing') OR ($status8 == 'Ditolak Penguji')){
                        echo '<td>
                        <div class="btn-group">
                              <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                '.$status8.' &nbsp<span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li>
                               <a href="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($idjadwal).'&id_mhs='.$idmhs.'" id="custId">Disetujui</a>
                                </li>
                               <li>
                                 <a href="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($idjadwal).'&id_mhs='.$idmhs.'" id="custId">Ditolak/Diperbaiki</a>
                                </li> 
                                <li>
                                 <a href="proses_ta.php?token='.$token.'&aksi='.$modal_upload.'&status=Disetujui Pembimbing&id_jadwal='.$idjadwal.'&id_dosen='.$id.'" id="custId">Disetujui Pembimbing</a>
                                </li>          
                              </ul>
                        </div>
                        </td>';
                        }
                        elseif($status8 == 'Diajukan'){
                        echo '<td>
                        <div class="btn-group" >
                              <button class="btn btn-warning btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menunggu Approval Pembimbing &nbsp<span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" >
                                <li>
                               <a href="#" id="custId">Menunggu Approval Pembimbing</a>
                                </li>         
                              </ul>
                        </div>
                        </td>';
                        }
                        elseif($status8 == 'Belum Perbaikan'){
                          echo '<td>
                          <div class="btn-group">
                                <button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.$status8.' &nbsp<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">          
                                </ul>
                          </div>
                          </td>';
                        }
                        else{
                        echo '<td>
                        <div class="btn-group">
                              <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                '.$status8.' &nbsp<span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu"> 
                              <li>
                              <a href="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($idjadwal).'&id_mhs='.$idmhs.'" id="custId">Disetujui</a>
                               </li>
                              <li>
                                <a href="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($idjadwal).'&id_mhs='.$idmhs.'" id="custId">Ditolak/Diperbaiki</a>
                               </li> 
                               <li>
                                <a href="proses_ta.php?token='.$token.'&aksi='.$modal_upload.'&status=Disetujui Pembimbing&id_jadwal='.$idjadwal.'&id_dosen='.$id.'" id="custId">Disetujui Pembimbing</a>
                               </li>           
                              </ul>
                        </div>
                        </td>';
                        }
                        
                        echo '<td >'.$data['jenis_sidang'].'</td>';
                        echo '<td >'.$namamhs.'<br><i>'.$data2['judul'].'</i></td>';
                        echo '<td >#1: '.$namadosen.' <br> #2: '.$namadosen2.'</td>';
                        echo '<td >'.$data['tanggal_sidang'].'</td>';
                        echo '<td>
                         <div class="btn-group">
                              <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Berita Acara Sidang &nbsp<span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                              <li>
                              
                                <a href="viewer.php?file='.base64_encode($file_perbaikan).'" target="_blank" id="custId"><i class="fa fa-file"></i> Lihat Hasil File Perbaikan</a> 
                                </li> 
                                <li>
                                <a href="" id="custId" data-toggle="modal" data-target="#myModalReviewer'.$idjadwal.'"><i class="fa fa-file"></i> Lihat Hasil Sidang</a>
                                </li>   
                                <li>
                                <a href="index.php?page=cetak_berita_acara&id_jadwal='.base64_encode($idjadwal).'" id="custId" target="_blank"><i class="fa fa-file"></i> Berita Acara Sidang</a>
                                </li> 
                                <li>
                                <a href="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($idjadwal).'&id_mhs='.$idmhs.'" id="custId" target="_blank"><i class="fa fa-file"></i> Diskusi Revisi</a>
                                </li>    
                              </ul>
                              </div>
                              
                        </td>';
                        echo '
                          <div id="myModalReviewer'.$idjadwal.'" class="modal fade" role="dialog" >
                            <div class="modal-dialog modal-lg">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Berita Acara Sidang</h4>
                                </div>
                                <div class="modal-body">
                                  <form action="proses_ta.php?aksi=update_penilaian_sidang" method="POST">
                                   <input type="hidden" name="token" id="token" class="form-control" value="'.$token.'" >
                                   <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="'.$idjadwal.'" >
                                   <input type="hidden" name="id_dosen" id="id_dosen" class="form-control" value="'.$id.'" >
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Komentar Penguji '.$namadosen.'</label>
                                       <p>'.$komentar.'</p>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Komentar Penguji '.$namadosen2.'</label>
                                       <p>'.$komentar2.'</p>
                                  </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div> 
                          ';

                          echo '
                        <div id="myModalLaporan'.$idjadwal.'" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Laporan Tugas Akhir/PA</h4>
                              </div>
                              <div class="modal-body" style="height: 600px">
                                <iframe src="" frameborder="0" width="100%" height="100%" allowtransparency="true"></iframe> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>   
                        ';                        
                        echo '</tr>';
                        $no++;                   
                      }
              ?>  
               </tbody>
              </table>
    </div><!-- /.box-body -->
    <div class="box-footer" align="left" style="padding-top:13px;">
      <p><b>Catatan:</b></p>
      <p>Judul yang meminta approval perbaikan penguji hanya judul yang laporan perbaikan nya sudah diajukan, sedangkan yang "<b>Belum perbaikan</b>" tidak akan muncul di list.</p>
    </div>
</div>
</section>
</div><!-- /.box -->
</div>
</div>
</section>
</div>
</div>
  <!-- /.content-wrapper -->
<!-- Modal -->
       
  <!-- /.footer -->
  <?php
      include('footer.php');
  ?>



</div>
<!-- ./wrapper -->

  
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
   
        if (document.documentElement.clientWidth < 780) {
            $('.btn-loading').on('click', function(){
                // $('.loading').html("<div class='hidden-lg' style='text-align:center;'><i class='fa fa-spinner fa-4x faa-spin animated text-primary' style='margin-top:100px;'></i></div>");
                $('.sidebar-mini').removeClass('sidebar-open');
                
            });
            $('.box-penjelasan').addClass('collapsed-box');
            $('.box-minus').removeAttr('style');
            $('.header-profile').removeAttr('style');
        }
        $('.submit').on('click', function(){
           $('.submit').html("<i class='fa fa-spinner faa-spin animated' style='margin-right:5px;'></i> Loading...");
           $('.submit').attr('style', 'cursor:not-allowed;pointer-events: none;');
        });
        function openCustomerSupport() {
          if (typeof AndroidNative !== 'undefined') {
            AndroidNative.openCustomerSupport();
          }
        }
        
        
        function notReady() {
          toastr.error("Halaman tidak dapat di akses, produk ini masih dalam tahap pengembangan.");
        }
    </script>
    
    <script>
$('#filter-web').on('click', function(){
    var filterWeb = $('.filter-web').val();
    getDeposit(filterWeb);
    $('#load tbody').css('color', '#dfecf6');
});
$('#filter-mobile').on('click', function(){
    var filterMobile = $('.filter-mobile').val();
    getDeposit(filterMobile);
    $('#load tbody a').css('color', '#dfecf6');
});

setInterval(function() {
    $('.refresh').html("<i class='fa fa-refresh faa-spin animated'></i>");
    var filter = '';
    getDeposit(filter);
}, 60000);

$('.refresh').on('click', function(){
    $('.refresh').html("<i class='fa fa-refresh faa-spin animated'></i>");
    var filter = '';
    getDeposit(filter);
    $('#load tbody').css('color', '#dfecf6');
    $('#load tbody a').css('color', '#dfecf6');
});


$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load tbody').css('color', '#dfecf6');
        $('#load tbody a').css('color', '#dfecf6');
        // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');  
        getDeposit(url);
        // window.history.pushState("", "", url);
        
    });
});
</script>
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
