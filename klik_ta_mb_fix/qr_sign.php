<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if(($_SESSION['user_jabatan']!="Dosen") AND ($_SESSION['user_jabatan']!="Admin")){
echo '<script language="javascript">alert("Anda bukan Admin");history.back();</script>';
}
$token = $_SESSION['token'];
$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_role'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];

$nama = $_SESSION['nama'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>SITA | Generator QR Signature</title>
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
          include('sidebar_staff.php');
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>
    <div class="content-wrapper">
            <div class="loading">
  <section class="content">
<!-- Input addon -->
        <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Generator QR Signature Pembimbing</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="proses_ta.php?aksi=create_qrcode" method="post">

                  <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Pilih MHS:</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="id_mhs" id="id_mhs" required="">
                    <option value="">-Pilih Mahasiswa-</option>
                                    <?php
                                      include 'config.php';
                                      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                        $sql3 = $conn->query("SELECT * FROM tb_user_mhs WHERE id_user_mhs IN (SELECT id_mhs FROM tb_tugas_akhir WHERE id_dosen = $id); ");
                                        while($data3 = mysqli_fetch_assoc($sql3)){
                                         echo '<option value="'.$data3['id_user_mhs'].'">'.$data3['nim'].' - '.$data3['nama'].'</option>';
                                        }
                                      ?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Perihal :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="perihal" placeholder="contoh: Laporan TA1 telah disetujui"><?php echo $data['komentar']; ?></textarea>
                    </div>   
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" id="btn-add" class="btn btn-primary btn-block">Buatkan QR Signature</button>
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
        <!-- End Modal -->
               <!-- Modal -->
  <div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Generator QR Signature Penguji</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="proses_ta.php?aksi=create_qrcode" method="post">

                  <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Pilih MHS:</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="id_mhs" id="id_mhs" required="">
                    <option value="">-Pilih Mahasiswa-</option>
                                    <?php
                                      include 'config.php';
                                      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                        $sql3 = $conn->query("SELECT * FROM tb_user_mhs WHERE id_user_mhs IN (SELECT id_tugas_akhir FROM tb_jadwal_sidang WHERE penguji_1 = $id OR penguji_2 = $id); ");
                                        while($data3 = mysqli_fetch_assoc($sql3)){
                                         echo '<option value="'.$data3['id_user_mhs'].'">'.$data3['nim'].' - '.$data3['nama'].'</option>';
                                        }
                                      ?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Perihal :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="perihal" placeholder="contoh: Laporan TA1 telah disetujui"><?php echo $data['komentar']; ?></textarea>
                    </div>   
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" id="btn-add" class="btn btn-primary btn-block">Buatkan QR Signature</button>
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
        <!-- End Modal -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Generator QR Signature for Approval</h3>
              <a href="" class="btn-loading label label-primary pull-right" style="font-size: 13px;padding-bottom: 5px;padding-top: 5px; margin-right: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-qrcode" style="margin-right: 3px;"></i> Pembimbing</a>
              <a href="" class="btn-loading label label-primary pull-right" style="font-size: 13px;padding-bottom: 5px;padding-top: 5px; margin-right: 5px;" data-toggle="modal" data-target="#myModal2"><i class="fa fa-qrcode" style="margin-right: 3px;"></i> Penguji</a>
            </div>
            <div class="box-body table-responsive">
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                 <th>No</th>
                  <th>NIM</th>
                  <th>NAMA</th>
                  <th>Perihal</th>
                  <th>Tanggal</th>
                  <th >#</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                $no = 1;
                    $sql = $conn->query("SELECT * FROM `tb_qr_sign` WHERE id_user = $id;");
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_mhs = $data['id_user_mhs'];
                        $sql2 = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = $id_mhs;");
                        $data2 = mysqli_fetch_assoc($sql2);
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data2['nim'].'</td>';
                        echo '<td >'.$data2['nama'].'</td>';
                        echo '<td >'.$data['perihal'].'</td>';
                        echo '<td >'.$data['tanggal'].'</td>';
                        echo '<td align="center">';
                        echo '
                        <a class="btn btn-primary btn-xs" href="qrcode.php?id='.base64_encode($data['id_sign']).'" target="_blank"><i class="fa fa-qrcode"></i> QR Code</a> 
                        ';
                        echo '</td>';                                
                        echo '</tr>';
                        $no++; 
                      }
              ?>  
               </tbody>
              </table>
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
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
