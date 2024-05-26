<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Admin"){
echo '<script language="javascript">alert("Anda bukan Dosen");history.back();</script>';
}
$token = $_SESSION['token'];
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
  <title>SITA | List Verifikasi Berkas Final</title>
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

  <script>
$(document).ready(function() {
    $('#load').DataTable();
} );
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script>
$(document).ready(function(){

   $("#nik").keyup(function(){

      var username = $(this).val().trim();

      if(username != ''){

         $.ajax({
            url: 'cek_nik.php',
            type: 'post',
            data: {username: username},
            success: function(response){

                $('#uname_response').html(response);

             }

         });
      }else{
         $("#uname_response").html("");
      }

    });

 });
</script>

<script language="javascript">
    function search_func()
    {
      id_value = document.getElementById("nik").value;
      
        $.ajax({
                        url: 'search.php',
                        type: 'post',
                        data: {'nik' : id_value},
                        dataType: 'json',
                        success: function(response){

                            var len = response.length;

                            if(len > 0){
                                var jabatann =  response[0]['jabatan'];
                                var namaa =  response[0]['name'];
                                var emaill = response[0]['email'];

                                document.getElementById("nama").value = namaa;
                                document.getElementById("email").value = emaill;
                                document.getElementById("jabatan").value = jabatann;
                            }
                        }

                    });
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
                    <h3 class="box-title">List Pengajuan Verifikasi Berkas Final</h3>
                    
                </div><!-- /.box-header -->             

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
        <table id="load" class="table table-hover">
          <thead>
                <tr>
                 <th>ID</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Status Verifikasi</th>
                  <th >Tanggal</th>
                  <th width="10%">#</th>
                </tr>
              </thead>
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_prodi  = $conn->query("SELECT * FROM tb_prodi WHERE id_user = '$id'");
                    $data_prodi = mysqli_fetch_assoc($sql_prodi);
                    $kode_prodi = $data_prodi['kode_prodi'];
                    if($kode_prodi == 'IF'){
                        $kode = '331%';
                    }
                    elseif($kode_prodi == 'GM'){
                        $kode = '332%';
                    }
                    elseif($kode_prodi == 'MJ'){
                        $kode = '431%';
                    }
                    elseif($kode_prodi == 'AN'){
                        $kode = '432%';
                    }
                    elseif($kode_prodi == 'RKS'){
                        $kode = '433%';
                    }
                    
                    $sql  = $conn->query("SELECT * FROM `tb_berkas_final` WHERE id_mhs IN (SELECT id_user_mhs FROM `tb_user_mhs` WHERE `nim` LIKE '$kode');");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_mhs = $data['id_mhs'];
                        $sql2  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = $id_mhs");
                        $data2 = mysqli_fetch_assoc($sql2);
                        if($data['status'] == "Belum lengkap"){
                          $status = '<span class="label label-danger">Belum Lengkap</span>';
                        }
                        if($data['status'] == "Perlu Perbaikan"){
                          $status = '<span class="label label-danger">Perlu Perbaikan</span>';
                        }
                        if($data['status'] == "Lengkap"){
                          $status = '<span class="label label-success">Lengkap</span>';
                        }
                        if($data['status'] == "Diajukan ke Pembimbing"){
                          $status = '<span class="label label-warning">Diajukan ke Pembimbing</span>';
                        }
                        if($data['status'] == "Disetujui Pembimbing"){
                            $status = '<span class="label label-success">Disetujui Pembimbing</span>';
                          }

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data2['nim'].'</td>';
                        echo '<td >'.$data2['nama'].'</td>';
                        echo '<td >'.$status.'</td>';
                        echo '<td >'.$data['tanggal_upload'].'</td>';
                        echo '<td><a class="btn btn-primary btn-xs" href="index.php?page=verifikasi_berkas_final_dosen&id_mhs='.base64_encode($id_mhs).'"><i class="fa fa-eye"></i> Lihat Berkas</a></td>';

                        echo '</tr>';
                        $no++;

                        
                      }
              ?>  
               </tbody>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer" align="right" style="padding-top:13px;">
            </div>
</div>
</section>
</div><!-- /.box -->
</div>
</div>
<div class="row ">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List Mahasiswa Lulus TA2</h3>
                    
                </div><!-- /.box-header -->             

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
    <table id="example" class="table table-bordered table-striped" data-page-length="25">
              <thead>
                <tr>
                 <th>No</th>
                  <th >NIM - Nama</th>
                  <th >Pembimbing</th>
                  <th >Penguji 1</th>
                  <th >Penguji 2</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                $periode = base64_decode($_GET['periode']);
                
                $no=1;
                     $sql = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE jenis_sidang = 'Sidang TA 2 / Sidang 2 TANPA sidang magang' AND id_tugas_akhir IN (SELECT id_user_mhs FROM `tb_user_mhs` WHERE `nim` LIKE '$kode');");
                      while($data = mysqli_fetch_assoc($sql)){
                        $periodsidang = $data['periode_sidang'];
                        $idjadwal = $data['id_jadwal'];
                        $id_mhs = $data['id_tugas_akhir'];
                        $jenis_sidang = $data['jenis_sidang'];
                        $file_laporan = $data['file_laporan'];

                        //$idmhs= $data['id_tugas_akhir'];
                        $iddosen = $data['penguji_1'];
                        $iddosen2 = $data['penguji_2'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$id_mhs'");
                        $data2 = mysqli_fetch_assoc($sql2);
                        $id_pembimbing = $data2['id_dosen'];

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql44  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$id_pembimbing' ;");
                        $data44 = mysqli_fetch_assoc($sql44);
                        $namapembimbing = $data44['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$id_mhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $nama_mhs = $data5['nama'];
                        $nim_mhs = $data5['nim'];

                        //$sql6  = $conn->query("SELECT * FROM `tb_laporan_ta` WHERE `id_laporan` = '$file_laporan' ;");
                        //$data6 = mysqli_fetch_assoc($sql6);

                        $sql10 = $conn->query("SELECT * FROM tb_anggota_tugas_akhir WHERE id_tugas_akhir = $id_mhs ");
                        $data10 = mysqli_fetch_assoc($sql10);
                        $id_anggota = $data10['id_mhs'];

                        $sql11  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$id_anggota' ;");
                        $data11 = mysqli_fetch_assoc($sql11);
                        $nim_anggota = $data11['nim'];
                        $nama_anggota = $data11['nama'];

                        $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $iddosen AND sidang_ulang = 'tidak';");
                        $data6 = mysqli_fetch_assoc($sql6);
                        $sql62  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = $iddosen AND sidang_ulang = 'tidak';");
                        $data62 = mysqli_fetch_assoc($sql62);
                        if(empty($data6)){
                          $status = $data62['status'];
                        }
                        else{
                          $status = $data6['status'];
                        }

                        $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = $idjadwal AND id_dosen = $iddosen2 AND sidang_ulang = 'tidak';");
                        $data7 = mysqli_fetch_assoc($sql7);
                        $sql72  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = $idjadwal AND id_dosen = $iddosen2 AND sidang_ulang = 'tidak';");
                        $data72 = mysqli_fetch_assoc($sql72);
                        if(empty($data7)){
                          $status2 = $data72['status'];
                        }
                        else{
                          $status2 = $data7['status'];
                        }

                        if(!empty($status) AND !empty($status2)){
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$nim_mhs.' '.$nama_mhs.'<br>'.$nim_anggota.' '.$nama_anggota.'</td>';
                        echo '<td>'.$namapembimbing.'</td>';
                        echo '<td>'.$status.'</td>';
                        echo '<td>'.$status2.'</td>';
                        }
          
                        echo '</tr>';
                        $no++; 
                      }
              ?>  
               </tbody>
              </table>
    </div><!-- /.box-body -->
    <div class="box-footer" align="right" style="padding-top:13px;">
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
