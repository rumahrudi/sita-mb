<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Admin"){
echo '<script language="javascript">alert("Anda bukan Admin");history.back();</script>';
}
$token = $_SESSION['token'];
$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_role'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];

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
  <title>SITA | List Dosen</title>
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
                    <h3 class="box-title">List Dosen</h3>
                    <a href="" class="btn-loading label label-primary pull-right" style="font-size: 13px;padding-bottom: 5px;padding-top: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" style="margin-right: 3px;"></i> Tambah</a>
                </div><!-- /.box-header -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah User Dosen</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="proses_user.php?aksi=tambah" method="post">
                  <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">


                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">NIK</label>
                    <div class="col-sm-10">
                       <input type="text"  id="nik" name="nik" class="form-control" placeholder="Masukan nama " autocomplete="off" onkeyup="search_func();" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Nama</label>
                    <div class="col-sm-10">
                       <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan NIK staff" readonly="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                       <input type="text" name="email" id="email" class="form-control" placeholder="Masukan NIK staff" readonly="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Jabatan</label>
                    <div class="col-sm-10">
                       <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan NIK staff" readonly="">
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
        <table id="load" class="table table-hover">
          <thead>
                <tr>
                 <th>ID</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th width="20%">Bidang</th>
                  <th>Jumlah MHS</th>
                  <th width="10%">#</th>
                </tr>
              </thead>
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT * FROM `tb_user` ORDER BY nik ASC");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_dosen = $data['id_user'];
                        $sql2  = $conn->query("SELECT COUNT(id_mhs) AS jumlah FROM `tb_tugas_akhir` WHERE id_dosen = '$id_dosen' AND id_mhs IN (SELECT id_user_mhs FROM tb_user_mhs WHERE status = 'Aktif');");
                        $data2 = mysqli_fetch_assoc($sql2);
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['nik'].'</td>';
                        $id_user = $data['id_user'];
                        echo '<td >'.$data['nama'].'</td>';
                        echo '<td >'.$data['email'].'</td>';
                        echo '<td>';
                        $sql_bidang  = $conn->query("SELECT * FROM `tb_kompetensi` WHERE id_user = $id_user");
                        $no = 1;
                          while($data_bidang = mysqli_fetch_assoc($sql_bidang)){
                            $id_kom = $data_bidang['id_kompetensi'];
                            echo ''.$data_bidang['kompetensi'].', ';
                            $no++;
                          }
                        echo '</td>';
                        echo '<td >'.$data2['jumlah'].'</td>';
                        echo '<td align="center">';
                        echo '
                        <a class="btn btn-danger btn-xs" onclick="return confirm(\'Anda akan menghapus data. Lanjutkan?\');" href="proses_user.php?aksi=delete&id='.$data['nik'].'" ><i class="fa fa-trash"></i> Hapus</a>
                        ';
                        echo '</td>'; 
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
