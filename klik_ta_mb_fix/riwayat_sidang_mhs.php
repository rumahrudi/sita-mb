<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if(($_SESSION['user_jabatan']!="Dosen") AND ($_SESSION['user_jabatan']!="Admin")){
echo '<script language="javascript">alert("Anda bukan Dosen");history.back();</script>';
}

$token = $_SESSION['token'];
$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_jabatan'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];
$nama = $_SESSION['nama'];
$periode = base64_decode($_GET['periode']);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>SITA | Rekap Penilaian Tugas Akhir</title>
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

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script>
$(document).ready(function() {
    $('#load').DataTable();
} );
</script>

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

  <script>
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
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
    <a href="index.php?page=dashboard2" class="logo">
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
                  <a href="index.php?page=list_dosen_mhs" class="btn-loading"><i class="fa fa-arrow-left" style="margin-right:10px;"></i></a>
                    <h3 class="box-title">Rekapitulasi Sidang Periode Ini</h3>
                    <a href="index.php?page=export_rekap_penilaian_sidang&periode=<?php echo $_GET['periode']; ?>=" class="btn-loading label label-primary pull-right" style="font-size: 13px;padding-bottom: 5px;padding-top: 5px;" ><i class="fa fa-file-excel-o" style="margin-right: 3px;"></i> Export</a>
                </div><!-- /.box-header -->                 

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
         <table id="load" class="table table-hover">
              <thead>
                <tr>
                 <th>No</th>
                  <th width="10%">Jenis Usulan</th>
                  <th width="25%">Nama & Judul</th>
                  <th >Penguji 1 & 2</th>
                  <th >Tanggal Sidang</th>
                  <th >#</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                $id_mhs = $_GET['id_mhs'];
                $month = date('m');
                $no=1;
                     $sql = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE id_tugas_akhir = '$id_mhs'");
                       while($data = mysqli_fetch_assoc($sql)){
                        $periodsidang = $data['periode_sidang'];
                        $periodsidang = base64_encode($periodsidang);
                        $idjadwal = $data['id_jadwal'];
                        $id_ta = $data['id_tugas_akhir'];

                        $idmhs= $data['id_tugas_akhir'];
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
                        $no_wa = $data5['no_wa'];

                        $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen' ;");
                        $data6 = mysqli_fetch_assoc($sql6);
                        $nilai_1 = $data6['nilai_1'];
                        $nilai_2 = $data6['nilai_2'];
                        $nilai_3 = $data6['nilai_3'];
                        $nilai_4 = $data6['nilai_4'];
                        $nilai_5 = $data6['nilai_5'];
                        $nilai_6 = $data6['nilai_6'];
                        $nilai_7 = $data6['nilai_7'];
                        $komentar = $data6['catatan_perbaikan'];
                        $sidang_ulang = $data6['sidang_ulang'];

                        $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen2' ;");
                        $data7 = mysqli_fetch_assoc($sql7);
                        $nilai_12 = $data7['nilai_1'];
                        $nilai_22 = $data7['nilai_2'];
                        $nilai_32 = $data7['nilai_3'];
                        $nilai_42 = $data7['nilai_4'];
                        $nilai_52 = $data7['nilai_5'];
                        $nilai_62 = $data7['nilai_6'];
                        $nilai_72 = $data7['nilai_7'];
                        $komentar2 = $data7['catatan_perbaikan'];
                        $sidang_ulang = $data6['sidang_ulang'];
                        //$id_mhs =$data7['id_mhs'];

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['jenis_sidang'].'</td>';
                        echo '<td >'.$namamhs.'<br><i>'.$data2['judul'].'</i></td>';
                        echo '<td >'.$namadosen.' <br> '.$namadosen2.'</td>';
                        echo '<td >'.$data['tanggal'].' <br> '.$data['jam_sidang'].'</td>';
                        if(empty($data6)){
                          echo '<td ><a class="btn btn-primary btn-xs" href="#" role="button">Belum ada penilaian</a></td>'; 
                        }
                        else{
                          echo '<td ><a class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalReviewer'.$idjadwal.'"  role="button">Lihat Nilai</a>';
                          echo '</td>';
                          echo '
                          <div id="myModalReviewer'.$idjadwal.'" class="modal fade" role="dialog" >
                            <div class="modal-dialog modal-lg">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Hasil dan Komentar Penguji</h4>
                                </div>
                                <div class="modal-body">
                                  <form action="proses_ta.php?aksi=update_penilaian_sidang" method="POST">
                                   <input type="hidden" name="token" id="token" class="form-control" value="'.$token.'" >
                                   <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="'.$idjadwal.'" >
                                   <input type="hidden" name="id_dosen" id="id_dosen" class="form-control" value="'.$id.'" >
                                   <input type="hidden" name="periode" id="periode" class="form-control" value="'.$periode.'" >
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Komentar Penguji 1</label>
                                       <p>'.$komentar.'</p>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Komentar Penguji 2</label>
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
                          <div id="myModalAnggota'.$idjadwal.'" class="modal fade" role="dialog" >
                            <div class="modal-dialog modal-lg">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Hasil dan Komentar Penguji</h4>
                                </div>
                                <div class="modal-body">
                                  <form action="proses_ta.php?aksi=update_penilaian_sidang_anggota" method="POST">
                                   <input type="hidden" name="token" id="token" class="form-control" value="'.$token.'" >
                                   <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="'.$idjadwal.'" >
                                   <input type="hidden" name="id_dosen" id="id_dosen" class="form-control" value="'.$id.'" >
                                   <input type="hidden" name="periode" id="periode" class="form-control" value="'.$periode.'" >
                                   <input type="hidden" name="id_ta" id="id_ta" class="form-control" value="'.$id_ta.'" >
                                   <input type="hidden" name="id_mhs" id="id_mhs" class="form-control" value="'.$id_mhs.'" >
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Perumusan Masalah dan Landasan Teori</label>
                                      <input type="text" name="nilai_1" id="nilai_1" class="form-control" value="'.$nilai_12.'" >
                                  </div>
                                   <div class="form-group">
                                      <label for="exampleInputEmail1">Analisis dan Perancangan/ Pra-produksi </label>
                                      <input type="text" name="nilai_2" id="nilai_2" class="form-control" value="'.$nilai_22.'" >
                                  </div>
                                   <div class="form-group">
                                      <label for="exampleInputEmail1">Implementasi/ Produksi</label>
                                      <input type="text" name="nilai_3" id="nilai_3" class="form-control" value="'.$nilai_32.'" >
                                  </div>
                                   <div class="form-group">
                                      <label for="exampleInputEmail1">Evaluasi dan pembahasan</label>
                                      <input type="text" name="nilai_4" id="nilai_4" class="form-control" value="'.$nilai_42.'" >
                                  </div>
                                   <div class="form-group">
                                      <label for="exampleInputEmail1">Materi dan Teknik Presentasi</label>
                                      <input type="text" name="nilai_5" id="nilai_5" class="form-control" value="'.$nilai_52.'" >
                                  </div>
                                   <div class="form-group">
                                      <label for="exampleInputEmail1">Tanya Jawab</label>
                                      <input type="text" name="nilai_6" id="nilai_6" class="form-control" value="'.$nilai_62.'" >
                                  </div>
                                   <div class="form-group">
                                      <label for="exampleInputEmail1">Sikap</label>
                                      <input type="text" name="nilai_7" id="nilai_7" class="form-control" value="'.$nilai_72.'" >
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Komentar Penguji</label>
                                       <textarea class="form-control" id="summernote2" name="komentar" id="komentar" rows="3">'.$komentar2.'</textarea>
                                  </div>
                                   <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-block">Update</button>
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
