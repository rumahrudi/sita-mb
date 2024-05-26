
<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if(($_SESSION['user_jabatan'] != "Dosen") && ($_SESSION['user_jabatan'] != "Admin")) {
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
  <title>SITA | Approval Tugas Akhir</title>
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
    $('#load').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
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
                    <h3 class="box-title">Approval Laporan Tugas Akhir</h3>

                </div><!-- /.box-header -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="proses_ta.php?aksi=request_approval_laporan" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                  <input type="hidden" id="id_userr" name="id_userr" value="">
                  <input type="hidden" id="id_mhs" name="id_mhs" value="<?php echo $id; ?>">

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">NIM</label>
                    <div class="col-sm-10">
                       <input type="text"  id="nik" name="nik" class="form-control" value="<?php echo $nik; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                   <label  class="col-sm-2 control-label" for="inputEmail3">Jenis Sidang</label>
                   <div class="col-sm-10">
                    <select class="form-control" name="pilih_sidang" id="pilih_sidang" required="">
                                    <option value="">-Pilih Sidang-</option>
                                    <option value="Sidang Proposal">Sidang Proposal</option>
                                    <option value="Sidang TA 1 / Sidang 1">Sidang TA 1 / Sidang 1</option>
                                    <option value="Sidang TA 2 / Sidang 2 TANPA sidang magang">Sidang TA 2 / Sidang 2 TANPA sidang magang</option>
                                    <option value="Sidang TA 2 / Sidang 2 DENGAN sidang magang">Sidang TA 2 / Sidang 2 DENGAN sidang magang</option>
                    </select>
                   </div>
                </div>
                <div class="form-group">
                   <label  class="col-sm-2 control-label" for="inputEmail3">Periode Sidang</label>
                    <div class="col-sm-10">
                   <select class="form-control" name="skema" id="skema" required="">
                                    <?php
                                      include 'config.php';
                                      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                      $tanggal_hari_ini = date("Y-m-d");
                                      $sql6  = $conn->query("SELECT * FROM tb_periode_ta ORDER BY id_periode DESC LIMIT 1;");
                                      $data6 = mysqli_fetch_assoc($sql6);
                                      $tanggal_buka = $data6['buka_sidang'];
                                      $tanggal_tutup = $data6['tutup_sidang'];

                                      if (($tanggal_hari_ini < $tanggal_buka) || ($tanggal_hari_ini > $tanggal_tutup)){
                                         echo '<option value="">-Pilih Periode Sidang-</option>';
                                      }
                                      else
                                      {
                                        $sql = $conn->query("SELECT * FROM tb_periode_ta ");
                                        while($data = mysqli_fetch_assoc($sql)){
                                         echo '<option value="'.$data['id_periode'].'">'.$data['periode_sidang'].'</option>';
                                        }
                                      }
                                      ?>
                              </select>
                            </div>
                </div>

                <script type="text/javascript">
                  function validasiFile1(){
                      var inputFile = document.getElementById('laporan');
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
                  <label class="col-sm-2 control-label">Upload Softcopy Laporan</label>
                  <div class="col-sm-10">
                  <input type="file" class="form-control" id="laporan" name="laporan" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile1();" />
                  <p class="help-block">Silahkan unggah isi laporan sesuai template dari Koordinator TA dalam bentuk PDF dan < 10MB</p>
                </div>
                </div>

                 <script type="text/javascript">
                  function validasiFile3(){
                      var inputFile = document.getElementById('laporan_magang');
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
                  <div class="form-group" id="laporan_magang1" style="display:none">
                   <label class="col-sm-2 control-label">Laporan Magang</label>
                   <div class="col-sm-10">
                      <input type="file" class="form-control" id="laporan_magang" name="laporan_magang" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile3()">
                      <p class="help-block">Khusu bagi yang melakukan sidang 2 dengan magang, maka laporan magang harus di-upload disini. Jika tidak, maka tidak akan dijadwalkan sidang. Laporan magang harus lengkap dengan semua lampiran nya. Nama file: Nim - Nama.pdf , untuk berkelompok upload menjadi satu zip.</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
                    </div>
                  </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>                     

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
        <table id="load" class="table table-hover" data-page-length="50">
          <thead>
                <tr>
                 <th>ID</th>
                  <th>Periode Sidang</th>
                  <th>NIM - Nama</th>
                  <th>Jenis Sidang</th>
                  <th>File Laporan TA</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_dosen = '$id'");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_mhs = $data['id_mhs'];
                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE `id_user_mhs` = $id_mhs ;");
                        $data5 = mysqli_fetch_assoc($sql5);

                        $sql3  = $conn->query("SELECT * FROM `tb_laporan_ta` WHERE `id_mhs` = $id_mhs ;");
                        while($data3 = mysqli_fetch_assoc($sql3)){
                        $id_laporan = $data3['id_laporan'];
                        $id_periode = $data3['id_periode'];
                        $sql4  = $conn->query("SELECT * FROM `tb_periode_ta` WHERE `id_periode` = $id_periode ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        echo '<tr>';
                        echo '<td >'.$data3['id_laporan'].'</td>';
                        echo '<td >'.$data4['periode_sidang'].'</td>';
                        echo '<td >'.$data5['nim'].' - '.$data5['nama'].'</td>';
                        echo '<td >'.$data3['jenis_sidang'].'</td>';
                        echo '<td ><a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data3['file_laporan']).'" target="_blank" role="button">Lihat File</a></td>';
                       echo '<td>
                        <div class="btn-group">
                              <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                '.$data3['status'].' &nbsp<span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li>
                                <a href="proses_ta.php?token='.$token.'&aksi=approval_laporan&status=Diterima&id_laporan='.base64_encode($data3['id_laporan']).'" id="custId">Diterima</a>
                                </li>
                               <li>
                                <a href="proses_ta.php?token='.$token.'&aksi=approval_laporan&status=Ditolak&id_laporan='.base64_encode($data3['id_laporan']).'" id="custId">Ditolak/Diperbaiki</a>
                                </li>
                                
                              </ul>
                        </div>';
                        if($data3['status'] != "Diterima"){
                        echo '
                        <a class="btn btn-danger btn-xs" onclick="return confirm(\'Anda akan menghapus data. Lanjutkan?\');" href="proses_ta.php?aksi=delete_laporan&id='.$data3['id_laporan'].'" ><i class="fa fa-trash"></i></a>';
                        }
                        else{
                          echo '
                        <a class="btn btn-default btn-xs" ><i class="fa fa-trash"></i></a>';
                        }
                        
                        echo '
                        </td>';
                        echo '</tr>';
                        $no++;

                    

                       
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
