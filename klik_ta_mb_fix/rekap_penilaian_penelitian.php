<?php
session_start();

$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_role'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];
$token = $_SESSION['token'];

if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_role'] != "staffp3m"){

echo '<script language="javascript">alert("Anda bukan Staff P3M");history.back();</script>';

}

include 'config.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$sql  = $conn->query("SELECT * FROM tb_identitas_peneliti WHERE id_user = '$id'");
$data = mysqli_fetch_assoc($sql);
$foto = $data['foto'];
$nama = $_SESSION['nama'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>SIMP3M | Rekapitulasi Penilaian Usulan Penelitian</title>
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
            $(document).ready(function () {
                $("#nama_dosen").select2({
                    theme: "bootstrap",
                    placeholder: "Please Select"
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $("#nama_dosen2").select2({
                   theme: "bootstrap",
                    placeholder: "Please Select"
                });
            });
        </script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


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
<body class="hold-transition skin-purple-light sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php?page=dashboard2" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">P3M</span>
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
              <img src="uploads/<?php echo $nik; ?>/<?php echo $foto; ?>?t=<?php echo time();?>" class="user-image" alt="User Image">
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
          <img src="uploads/<?php echo $nik; ?>/<?php echo $foto; ?>?t=<?php echo time();?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="white-space: normal"><?php echo $nama; ?></p>
          <a href="#"><?php echo $role; ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!-- /.footer -->
      <?php
          include('sidebar_staff.php');
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
                include 'config.php'; 
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                $idteam = $_GET['id']; 

                $sql3="SELECT * FROM tb_team_kampus WHERE `id_team` = '".$idteam."' ";
                $result3 = $conn->query($sql3);
                $row3 = mysqli_fetch_array($result3);
                $nama_team = $row3['nama_team'];
                ?>
  <!-- Content Wrapper. Contains page content -->
       <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <div class="loading">
                <section class="content">
    <div class="row ">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Rekapitulasi Penilaian Usulan Penelitian</h3>
                    <a href="index.php?page=export_rekap_penilaian_penelitian" class="btn-loading label label-primary pull-right" style="font-size: 13px;padding-bottom: 5px;padding-top: 5px;" ><i class="fa fa-file-excel-o" style="margin-right: 3px;"></i> Export</a>
                </div><!-- /.box-header -->                 

    <section class="transaksi-lists">
      <script>
        $(document).ready(function(){
          $("#filterTable").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu li").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
    <div class="">
    <div class="box-body table-responsive">
        <table id="load" class="table table-hover table-responsive">
          <thead>
                <tr>
                  <th>No Proposal</th>
                  <th>Judul Kegiatan</th>                   
                  <th>Nilai Rata2</th>                     
                  <th>Biaya Rata2</th>                     
                  <th>Rekomendasi Reviewer</th>
                  <th>Detail Reviewer</th>
                </tr>
              </thead>
               <tbody>
                <?php
                include 'config.php';
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                $sql  = $conn->query("SELECT *, YEAR(`tgl_usulan`) as tahun_usulan FROM `tb_usulan_penelitian` WHERE reviewer_satu != 0 AND reviewer_dua != 0");
                while($data = mysqli_fetch_assoc($sql)){
                  $skema = $data['skema'];
                  $tanggal_usulan = $data['tahun_usulan'];
                  $judul = $data['judul'];
                  $id_usulan = $data['id_usulan'];
                  $id_user_reviwer_1 = $data['reviewer_satu'];
                  $id_user_reviwer_2 = $data['reviewer_dua'];

                  if($skema == 'Penelitian Muda'){
                    $no_proposal = 'PM-'.$tanggal_usulan.'-'.$id_usulan.'';
                  }
                  if($skema == 'Penelitian Terapan'){
                    $no_proposal = 'PT-'.$tanggal_usulan.'-'.$id_usulan.'';
                  }
                  if($skema == 'Penelitian Kerjasama'){
                    $no_proposal = 'PK-'.$tanggal_usulan.'-'.$id_usulan.'';
                  }
                  if($skema == 'Penelitian Penugasan'){
                    $no_proposal = 'PP-'.$tanggal_usulan.'-'.$id_usulan.'';
                  }

                  $sql3  = $conn->query("SELECT *, SUM(nilai_1+nilai_2+nilai_3+nilai_4+nilai_5) as total_nilai FROM `tb_penilaian_usulan_penelitian` WHERE id_usulan = '".$id_usulan."' AND id_user_reviewer = '".$id_user_reviwer_1."';");            
                  $data3 = mysqli_fetch_assoc($sql3);

                  $komentar_satu = $data3['komentar'];
                  $rekomendasi_satu = $data3['rekomendasi'];
                  $biaya_disetujui_satu = $data3['biaya_disetujui'];
                  $nilai_satu = $data3['total_nilai'];

                  $sql4  = $conn->query("SELECT *, SUM(nilai_1+nilai_2+nilai_3+nilai_4+nilai_5) as total_nilai FROM `tb_penilaian_usulan_penelitian` WHERE id_usulan = '".$id_usulan."' AND id_user_reviewer = '".$id_user_reviwer_2."';");                  
                  $data4 = mysqli_fetch_assoc($sql4);
                  $komentar_dua = $data4['komentar'];
                  $rekomendasi_dua = $data4['rekomendasi'];
                  $biaya_disetujui_dua = $data4['biaya_disetujui'];
                  $nilai_dua = $data4['total_nilai'];

                  $biaya_rata2 = ($biaya_disetujui_satu + $biaya_disetujui_dua) / 2;               
                  $nilai_rata2 = ($nilai_satu + $nilai_dua) / 2;

                  $sql5 = $conn->query("SELECT * FROM tb_identitas_peneliti WHERE id_user = $id_user_reviwer_1; ");
                  $data5 = mysqli_fetch_assoc($sql5);
                  $nama_satu = $data5['nama'];

                  $sql6 = $conn->query("SELECT * FROM tb_identitas_peneliti WHERE id_user = $id_user_reviwer_2; ");
                  $data6 = mysqli_fetch_assoc($sql6);
                  $nama_dua = $data6['nama'];                
                  
                  echo '<tr>';
                  echo '<td >'.$no_proposal.'</td>';
                  echo '<td >'.$judul.'</td>';
                  echo '<td >'.$nilai_rata2.'</td>';
                  echo '<td >Rp. '.number_format($biaya_rata2,2,',','.').'</td>'; 
                  echo '<td ><span class="label label-default">'.$rekomendasi_satu.'</span> <span class="label label-default">'.$rekomendasi_dua.'</span></td>';
                  echo '<td ><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalReviewer'.$id_usulan.'"  role="button">Detail Review</a></td>';
                  echo '</tr>';

                  if(!empty($data3) AND !empty($data4)){
                        echo '
                        <div id="myModalReviewer'.$data['id_usulan'].'" class="modal fade" role="dialog" >
                          <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Hasil dan Komentar Reviewer</h4>
                              </div>
                              <div class="modal-body">
                                <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Reviewer 1</label>
                                     <input type="text" name="judul" id="judul" class="form-control" value="'.$nama_satu.'" readonly>
                                </div>
                                <div class="form-group">
                                    <small id="emailHelp" class="form-text text-muted">Biaya yang disetujui</small>
                                    <input type="text" name="judul" id="judul" class="form-control" value="'.number_format($biaya_disetujui_satu,2,',','.').'" readonly>
                                </div>
                                <div class="form-group">
                                    <small id="emailHelp" class="form-text text-muted">Nilai</small>
                                     <input type="text" name="judul" id="judul" class="form-control" value="'.$nilai_satu.'" readonly>
                                </div>
                                <div class="form-group">
                                    <small id="emailHelp" class="form-text text-muted">Rekomendasi</small>
                                     <input type="text" name="judul" id="judul" class="form-control" value="'.$rekomendasi_satu.'" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Reviewer 2</label>
                                     <input type="text" name="judul" id="judul" class="form-control" value="'.$nama_dua.'" readonly>
                                </div>
                                <div class="form-group">
                                    <small id="emailHelp" class="form-text text-muted">Biaya yang disetujui</small>
                                    <input type="text" name="judul" id="judul" class="form-control" value="'.number_format($biaya_disetujui_dua,2,',','.').'" readonly>
                                </div>
                                <div class="form-group">
                                    <small id="emailHelp" class="form-text text-muted">Nilai</small>
                                     <input type="text" name="judul" id="judul" class="form-control" value="'.$nilai_dua.'" readonly>
                                </div>
                                <div class="form-group">
                                    <small id="emailHelp" class="form-text text-muted">Rekomendasi</small>
                                     <input type="text" name="judul" id="judul" class="form-control" value="'.$rekomendasi_dua.'" readonly>
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
                        else{
                        echo '
                        <div id="myModalReviewer'.$data['id_usulan'].'" class="modal fade" role="dialog" >
                          <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Hasil dan Komentar Reviewer</h4>
                              </div>
                              <div class="modal-body">
                                <p>Hasil dan komentar belum tersedia</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div> 
                        ';
                        }
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
