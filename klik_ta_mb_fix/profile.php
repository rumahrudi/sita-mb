<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SITA | Profile</title>
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

   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <script src="dist/js/angular.min.js"></script>
  
  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
    <script type="text/javascript">
    jQuery(function ($) {
    var $inputs = $('#contact_form :input').prop('disabled', true);
    $('#edit_btn').click(function () {
        $inputs.prop('disabled', false);
    });
    })
  </script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple-light sidebar-mini" onload="jQuery()">

<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?page=dashboard" class="logo">
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
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

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

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
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
      <?php
      if($role == 'dosen'){
        include('sidebar.php');
      }
      if($role == 'laboran'){
        include('sidebar.php');
      }
      if($role == 'staffp3m'){
        include('sidebar_staff.php');
      }
      if($role == 'ketuap3m'){
        include('sidebar_staff.php');
      }
          
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
            <div class="loading">
                <style>
table.grid {
    width:100%;
    border:none;
    background-color:#3c8dbc;
    padding:0px;
}
table.grid tr {
    text-align:center;
}
table.grid td {
    border:4px solid white;
    padding:6px;
}
.margin-top-responsive-5{
    margin-top:5px;
}
.btn-grid{
    background:#325d88;
    color:#ffffff;
}
td.active{
    background:#367fa9;
}
@media  screen and (max-width: 780px) {
    .grid small{
        font-size:11px;
    }
    .margin-top-responsive-5{
        margin-top:0px;
    } 
}
</style>
<!-- Main content -->
 <?php
            include 'config.php';
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $sql  = $conn->query("SELECT * FROM tb_identitas_peneliti WHERE id_user = '$id'");
            $data = mysqli_fetch_assoc($sql);
            $nama = $data['nama'];
            $email = $data['email'];
            ?>
<section class="content">
    <div class="row">
        <div class="box box-solid" style="border-radius:0px;margin-bottom:10px;">
            <div class="box-body no-padding">
                <table class="table" style="margin-top:5px;">
                    <tr style="border:none;">
                        <td style="padding-left:15px;width:70px;border:none;text-align:center;">
                                                        <img src="uploads/<?php echo $nik; ?>/<?php echo $foto; ?>?t=<?php echo time();?>" alt="Supardianto" width="70px">
                                                      
                        </td>
                        <td style="border:none;">
                            <div style="line-height: 1.2;">
                                <span style="margin:0px;font-weight:bold;font-size:16px;"><?php echo $nama; ?></span><br>
                                <span style="text-transform:uppercase;font-size:12px;"><?php echo $role; ?></span><br>
                                <i class="fa fa-envelope" style="margin-right:8px;"></i><small><?php echo $email; ?></small>
                            </div>
                        </td>
                        <td style="padding-right:15px;border:none;text-align:right;"><a href="#"></a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="box box-solid" style="border-radius:0px;margin-bottom:10px;">
            <div class="box-body no-padding">
                <table class="table ">
                    <tr>
                        <td style="padding-left:15px;">Jumlah Penelitian</td>
                        <td style="text-align:right;font-weight:bold;padding-right:15px;">
                        <?php
                          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                          include 'config.php';
                          session_start();
                          
                              $sql = $conn->query("SELECT COUNT(id_usulan) AS jumlah_penelitian FROM tb_usulan_penelitian WHERE id_user = '$id' ");
                                while($data = mysqli_fetch_assoc($sql)){
                                  echo $data['jumlah_penelitian'];             
                                }
                        ?>  
                      </td>
                    </tr>
                     <tr>
                        <td style="padding-left:15px;">Jumlah Penelitian Sebagai Anggota</td>
                        <td style="text-align:right;font-weight:bold;padding-right:15px;">
                          <?php
                          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                          include 'config.php';
                          session_start();
                          
                              $sql2 = $conn->query("SELECT count(`id_usulan`) AS jumlah_penelitian FROM `tb_anggota_usulan_penelitian` WHERE `id_user` = '$id'");
                              $data2 = mysqli_fetch_assoc($sql2);
                              $jumlah = $data2['jumlah_penelitian'];
                              echo $jumlah;
                                
                        ?>  
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:15px;">Jumlah Pengabdian</td>
                        <td style="text-align:right;font-weight:bold;padding-right:15px;">
                          <?php
                          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                          include 'config.php';
                          session_start();
                          
                              $sql3 = $conn->query("SELECT count(`id_usulan`) AS jumlah_pengabdian FROM `tb_usulan_pengabdian` WHERE `id_user` = '$id'");
                              $data3 = mysqli_fetch_assoc($sql3);
                              $jumlah2 = $data3['jumlah_pengabdian'];
                              echo $jumlah2;
                                
                        ?>  
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:15px;">Jumlah Pengabdian Sebagai Anggota</td>
                        <td style="text-align:right;font-weight:bold;padding-right:15px;">
                          <?php
                          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                          include 'config.php';
                          session_start();
                          
                              $sql4 = $conn->query("SELECT count(`id_usulan`) AS jumlah_pengabdian FROM `tb_anggota_usulan_pengabdian` WHERE `id_user` = '$id'");
                              $data4 = mysqli_fetch_assoc($sql4);
                              $jumlah3 = $data4['jumlah_pengabdian'];
                              echo $jumlah3;
                                
                        ?>  
                        </td>
                    </tr>
                </table>
            </div>
        </div>
       
        
        <div class="box box-solid" style="border-radius:0px;margin-bottom:10px;">
            <div class="box-body no-padding">
                <table class="table">
                    <tr>
                        <td style="padding-left:15px;border:none;width:55px;vertical-align: middle;text-align:left;"><i class="fa fa-unlock-alt" style="color: #E3E3E3;font-size:17px;"></i></td>
                        <td style="padding-right:15px;font-weight:bold;padding-left:0px;"><a href="index.php?page=update_password" style="color:#555555;">Ubah Kata Sandi</a></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    
</section><!-- /.content -->
            </div>
      </div>

<!-- /.footer -->
  <?php
      include('footer.php');
  ?>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 
<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
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
