<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Mahasiswa"){
echo '<script language="javascript">alert("Anda bukan Mahasiswa");history.back();</script>';
}
$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_jabatan'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];
$token = $_SESSION['token'];
$nama = $_SESSION['nama'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SITA | Identitas Mahasiswa</title>
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

  <script type="text/javascript">
    jQuery(function ($) {
    var $inputs = $('#contact_form2 :input').prop('disabled', true);
    $('#edit_btn2').click(function () {
        $inputs.prop('disabled', false);
    });
    })
  </script>

  <script type="text/javascript">
    jQuery(function ($) {
    var $inputs = $('#contact_form3 :input').prop('disabled', true);
    $('#edit_btn3').click(function () {
        $inputs.prop('disabled', false);
    });
    })
  </script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body class="hold-transition skin-blue-light sidebar-mini" onload="jQuery()">

<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?page=dashboard" class="logo">
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
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

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
           <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="white-space: normal"><?php echo $nama; ?></p>
          <a href="#"><?php echo $role; ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
      if($role == 'Dosen'){
        include('sidebar.php');
        $kata_role = 'Dosen';
      }
      if($role == 'Mahasiswa'){
        include('sidebar_mhs.php');
        $kata_role = 'Mahasiswa';
      }
      if($role == 'Admin'){
        include('sidebar_staff.php');
        $kata_role = 'Admin';
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
<section class="content">
<!-- Input addon -->
        <!-- End Modal -->
         <!-- START TYPOGRAPHY -->
      <h2 class="page-header">Profil <?php echo $kata_role; ?></h2>

      <div class="row">
          <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Identitas <?php echo $kata_role; ?></h3>
              <!--<a id="edit_btn" class="btn btn-primary btn-xs pull-right" name="submit">Ubah</a>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
                include 'config.php';
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                $sql  = $conn->query("SELECT * FROM tb_user_mhs WHERE id_user_mhs = '$id'");
                $data = mysqli_fetch_assoc($sql);
                $nik = $data['nim'];
                $nama = $data['nama'];
                $jabatan = $data['jabatan'];
                $email = $data['email'];
                $email_lain = $data['email_lain'];
                $no_wa = $data['no_wa'];
                $update = "update_identitas_mhs";
                

                ?>
                
                <form name="contact_form" id="contact_form" action="proses_user.php?aksi=<?php echo $update; ?>" method="post">
                <input type="hidden" id="id_user" name="id_user" value="<?php echo $id; ?>">
                <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">

                <div class="form-group">
                  <label>NIK/NIM</label>
                  <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $nik; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required="" readonly>
                </div>
                <div class="form-group">
                  <label>Email Lainnya</label>
                  <input type="email" name="email_lain" id="email_lain" class="form-control" value="<?php echo $email_lain; ?>" required="">
                </div>
                <div class="form-group">
                  <label>Nomor Whatsapp Aktif</label>
                  <input type="text" name="no_wa" id="no_wa" class="form-control" value="<?php echo $no_wa; ?>" required="">
                </div>
                 <div class="box-footer">
                  <a id="edit_btn" class="btn btn-primary" name="submit">Ubah</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->
      <!-- Modal detail member-->    


    </section>
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