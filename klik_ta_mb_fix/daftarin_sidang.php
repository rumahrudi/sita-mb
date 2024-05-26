<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Admin"){
echo '<script language="javascript">alert("Anda bukan Mahasiswa");history.back();</script>';
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
  <title>SITA | Identitas Tugas Akhir</title>
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

  <script src="dist/js/sweetalert.min.js"></script>

   
  
  <style>
    .swal-button--confirm {
      background-color: #DD6B55;
    }
  </style>

  <script>
$(document).ready(function() {
    $('#load').DataTable();
} );
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
        $("#pra_sidang1").show();
      }
      else if ( this.value == 'Sidang TA 2 / Sidang 2 DENGAN sidang magang')
      {
        $("#pra_sidang1").show();
      }
      else
      {
        $("#pra_sidang1").hide();
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
                    <h3 class="box-title">Daftar Sidang Tugas Akhir</h3>
                    
                </div><!-- /.box-header -->             

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body">
       <?php
                include 'config.php';
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                $id_mhs    = mysqli_real_escape_string($conn,$_GET['id']);
                $sql4  = $conn->query("SELECT * FROM tb_tugas_akhir WHERE id_mhs = '$id_mhs'");
                $data4 = mysqli_fetch_assoc($sql4);
                $id_dosen = $data4['id_dosen'];
                $id_tugas_akhir = $data4['id_mhs'];

                $sql5  = $conn->query("SELECT * FROM `tb_user` WHERE `id_user` = $id_dosen ;");
                $data5 = mysqli_fetch_assoc($sql5);
                $namadosen = $data5['nama'];

                $sql6  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE `id_user_mhs` = $id_mhs ;");
                $data6 = mysqli_fetch_assoc($sql6);
                $namamhs = $data6['nama'];
                $nimmhs = $data6['nim'];

                ?>
       <form name="contact_form" id="contact_form" action="proses_jadwalsidang.php?aksi=daftarin_mhs" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id_user" name="id_user" value="<?php echo $id_mhs; ?>">
                <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                <input type="hidden" id="id_tugas_akhir" name="id_tugas_akhir" value="<?php echo $id_tugas_akhir; ?>">

                <div class="form-group">
                  <label>Jenis Sidang</label>
                    <select class="form-control" name="pilih_sidang" id="pilih_sidang" required="">
                                    <option value="">-Pilih Sidang-</option>
                                    <option value="Sidang Proposal">Sidang Proposal</option>
                                    <option value="Sidang TA 1 / Sidang 1">Sidang TA 1 / Sidang 1</option>
                                    <option value="Sidang TA 2 / Sidang 2 TANPA sidang magang">Sidang TA 2 / Sidang 2 TANPA sidang magang</option>
                                    <!--<option value="Sidang TA 2 / Sidang 2 DENGAN sidang magang">Sidang TA 2 / Sidang 2 DENGAN sidang magang</option>-->
                              </select>
                </div>
                <div class="form-group">
                  <label>Periode Sidang</label>
                   <select class="form-control" name="skema" id="skema" required="">
                                  
                                    <?php
                                      include 'config.php';
                                      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                      $sql = $conn->query("SELECT * FROM tb_periode_ta ORDER BY id_periode DESC LIMIT 1;");
                                        while($data = mysqli_fetch_assoc($sql)){
                                         echo '<option value="'.$data['periode_sidang'].'">'.$data['periode_sidang'].'</option>';
                                        }
                                      
                                      ?>
                              </select>
                </div>
                <div class="form-group">
                  <label>NIM</label>
                  <input type="text" name="judul" id="judul" class="form-control"  value="<?php echo $nimmhs; ?>" readonly>
                </div>
               <div class="form-group">
                  <label>Judul TA/PA</label>
                  <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $data4['judul']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Dosen Pembimbing</label>
                  <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="<?php echo $namadosen; ?>" readonly="">
                </div>

                 <div class="form-group">
                  <label>Pilih File Laporan</label>
                   <select class="form-control" name="file_laporan" id="file_laporan" required="">
                   <option value="0">-Laporan Menyusul-</option>       
                                    <?php
                                     error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
                                     $sql22 = $conn->query("SELECT * FROM tb_laporan_ta WHERE id_mhs = '$id_mhs' AND status = 'Diterima' ORDER BY id_laporan DESC LIMIT 1;");
                                     while($data22 = mysqli_fetch_assoc($sql22)){
                                      $id_periode = $data22['id_periode'];
                                      $sql4  = $conn->query("SELECT * FROM `tb_periode_ta` WHERE `id_periode` = $id_periode ;");
                                      $data4 = mysqli_fetch_assoc($sql4);
                                     echo '<option value="'.$data22['id_laporan'].'">Periode sidang '.$data4['periode_sidang'].' - '.$data22['jenis_sidang'].' - '.$data22['status'].'</option>';
                                     }
                                      ?>
                   </select>
                   <p class="help-block">Pilih laporan yang sudah disetujui sesuai periode sidang atau anda dapat melakukannya terlebih dahulu melalui menu <a href="index.php?page=request_approval_laporan">request approval laporan</a>.</p>
                </div>
                
                <script type="text/javascript">
                  function validasiFile2(){
                      var inputFile = document.getElementById('pra_sidang');
                      var pathFile = inputFile.value;
                      var ekstensiOk = /(\.pdf|\.PDF)$/i;
                      if(!ekstensiOk.exec(pathFile)){
                          alert('Silakan upload file yang memiliki ekstensi .pdf');
                          inputFile.value = '';
                          return false;
                      }
                      else{
                        if (inputFile.files.length > 0) { 
                          for (const i = 0; i <= inputFile.files.length - 1; i++) { 
                
                              const fsize = inputFile.files.item(i).size; 
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
                <div class="form-group">
                    <label for="inputEmail3" class="control-label">File Pendukung Lainnya </label>
                      <input type="file" class="form-control" id="file_pendukung" name="file_pendukung" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile2()">
                      <p class="help-block">File pendukung lain, seperti bukti chat persetujuan pembimbing, Berita acara sidang sebelum menggunakan SITA, atau dokumen lainnya ketika masih sidang Offline atau belum menggunakan SITA. Boleh dikosong jika tidak punya.</p>
                  </div>
                
                <div class="form-group" id="pra_sidang1" style="display:none">
                  <label>Pilih Pra Sidang</label>
                   <select class="form-control" name="id_pra_sidang" id="id_pra_sidang" required="">
                   <option value="0">-Prasidang Menyusul-</option>        
                                    <?php
                                     error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
                                     $sql22 = $conn->query("SELECT * FROM tb_pra_sidang WHERE id_mhs = '$id' AND status = 'Disetujui' ORDER BY id_pra_sidang DESC LIMIT 1;");
                                     while($data22 = mysqli_fetch_assoc($sql22)){
                                      $id_periode = $data22['id_periode'];
                                      $sql4  = $conn->query("SELECT * FROM `tb_periode_ta` WHERE `id_periode` = $id_periode ;");
                                      $data4 = mysqli_fetch_assoc($sql4);
                                     echo '<option value="'.$data22['id_pra_sidang'].'">Periode sidang '.$data4['periode_sidang'].' - '.$data22['status'].'</option>';
                                     }
                                      ?>
                   </select>
                   <p class="help-block">Pilih pra sidang yang sudah disetujui sesuai periode sidang atau anda dapat melakukannya terlebih dahulu melalui menu <a href="index.php?page=request_pra_sidang">request Pra Sidang</a>.</p>
                </div>
                 <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-block">Daftarin</button>
                </div>
            </form>
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
