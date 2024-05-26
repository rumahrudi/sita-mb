<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Mahasiswa"){
echo '<script language="javascript">alert("Anda bukan Mahasiswa");history.back();</script>';
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
          include('sidebar_mhs.php');
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
       <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <div class="loading">
               <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-4">
      <!-- Small boxes (Stat box) -->
      <?php
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      include 'config.php';                       

      $idjadwal = $_GET['id_jadwal'];
      $idjadwal = base64_decode($idjadwal);
      $penguji_1 = $_GET['penguji1'];
      $penguji_1 = base64_decode($penguji_1);
      $penguji_2 = $_GET['penguji2'];
      $penguji_2 = base64_decode($penguji_2);

      $idmhs = $_GET['id_mhs'];

      $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_1' ;");
      $data3 = mysqli_fetch_assoc($sql3);
      $namadosen = $data3['nama'];

      $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_2' ;");
      $data4 = mysqli_fetch_assoc($sql4);
      $namadosen2 = $data4['nama'];

      $sql_tps = $conn->query("SELECT * FROM tb_user_mhs WHERE id_user_mhs = '$idmhs'  ");
      $data_tps = mysqli_fetch_assoc($sql_tps);

      $sql_suara = $conn->query("SELECT * FROM tb_tugas_akhir WHERE id_mhs = '$idmhs'  ");
      $data_suara = mysqli_fetch_assoc($sql_suara);
      $id_dosen = $data_suara['id_dosen'];
      
      $sql22  = $conn->query("SELECT * FROM `tb_user` WHERE `id_user` = $id_dosen ;");
      $data22 = mysqli_fetch_assoc($sql22);
      $nama_dosen = $data22['nama'];
      $email_dosen = $data22['email'];

      $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_1;");
      $data6 = mysqli_fetch_assoc($sql6);

      $sql62  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_1;");
      $data62 = mysqli_fetch_assoc($sql62);

      if(empty($data6)){
      $komentar = $data62['catatan_perbaikan'];
      $status = $data62['status'];
      $sidang_ulang = $data62['sidang_ulang'];
      $modal_upload = 'upload_perbaikan_penguji_baru';
      }
      else{
      $komentar = $data6['catatan_perbaikan'];
      $status = $data6['status'];
      $sidang_ulang = $data6['sidang_ulang'];
      $modal_upload = 'upload_perbaikan_penguji';
      }
      
      $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_2 ;");
      $data7 = mysqli_fetch_assoc($sql7);

      $sql72  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_2 ;");
      $data72 = mysqli_fetch_assoc($sql72);

      if(empty($data7)){
        $komentar2 = $data72['catatan_perbaikan'];
        $status2 = $data72['status'];
        $sidang_ulang2 = $data72['sidang_ulang'];
        $modal_upload = 'upload_perbaikan_penguji_baru';
      }
      else{
        $komentar2 = $data7['catatan_perbaikan'];
        $status2 = $data7['status'];
        $sidang_ulang2 = $data7['sidang_ulang'];
        $modal_upload = 'upload_perbaikan_penguji';
      }


      ?>
       <!-- DIRECT CHAT -->
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
       <div class="box box-default">
                    <div class="box-header with-border">
                      <a href="javascript:history.back()" class="btn-loading"><i class="fa fa-arrow-left" style="margin-right:10px;"></i></a>
                      <h3 class="box-title">Upload Revisi Sidang</h3>
                    </div>
                    <div class="box-body">
                    <form class="form" name="drop_list" id="from1" action="proses_ta.php?aksi=<?php echo $modal_upload; ?>" method="POST" enctype="multipart/form-data">
                      <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                      <input type="hidden" name="id_jadwal" value="<?php echo $idjadwal; ?>">
                      <input type="hidden" name="penguji_1" value="<?php echo $penguji_1; ?>">
                      <input type="hidden" name="penguji_2" value="<?php echo $penguji_2; ?>">
                      <input type="hidden" name="nama_mhs" value="<?php echo $nama; ?>">
                      <input type="hidden" name="nama_dosen" value="<?php echo $nama_dosen; ?>">
                      <input type="hidden" name="email_dosen" value="<?php echo $email_dosen; ?>">

                      <div class="box-body">
                        
                        <?php
                          if(($status == 'Diajukan') or ($status2 == 'Diajukan')){
                            echo '
                            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                  Perbaikan Berhasil Diajukan. Menunggu Dosen Pembimbing menyetujui, Apabila disetujui baru Dosen Penguji dapat melihat perbaikan anda.
                                </div>
                                </div>
                            ';
                          }
                          else if(($status == 'Belum Perbaikan') AND ($status2 == 'Belum Perbaikan')){
                            echo '
                            <div class="form-group">
                            <input type="file" class="form-control" id="laporan_perbaikan" name="laporan_perbaikan" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile()">
                            <p class="help-block">File yang di unggah akan di approval oleh pembimbing terlebih dahulu, file yang di approved oleh pembimbing akan muncul pada halaman approval penguji, untuk kemudian di approval oleh penguji.</p>
                            </div>
                           ';
                         }
                          else if(($status == 'Ditolak Penguji') AND ($status2 == 'Disetujui Penguji')){
                            echo '
                            <div class="form-group">
                            <input type="file" class="form-control" id="laporan_perbaikan" name="laporan_perbaikan" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile()">
                            <p class="help-block">File yang di unggah akan di approval oleh pembimbing terlebih dahulu, file yang di approved oleh pembimbing akan muncul pada halaman approval penguji, untuk kemudian di approval oleh penguji.</p>
                            </div>
                           ';
                         }
                         else if(($status2 == 'Ditolak Penguji') AND ($status == 'Disetujui Penguji')){
                          echo '
                            <div class="form-group">
                            <input type="file" class="form-control" id="laporan_perbaikan" name="laporan_perbaikan" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile()">
                            <p class="help-block">File yang di unggah akan di approval oleh pembimbing terlebih dahulu, file yang di approved oleh pembimbing akan muncul pada halaman approval penguji, untuk kemudian di approval oleh penguji.</p>
                            </div>
                           ';
                       }
                           else if(($status == 'Ditolak Penguji') AND ($status2 == 'Ditolak Penguji')){
                            echo '
                            <div class="form-group">
                            <input type="file" class="form-control" id="laporan_perbaikan" name="laporan_perbaikan" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile()">
                            <p class="help-block">File yang di unggah akan di approval oleh pembimbing terlebih dahulu, file yang di approved oleh pembimbing akan muncul pada halaman approval penguji, untuk kemudian di approval oleh penguji.</p>
                            </div>
                           ';
                          }
                           else if(($status == 'Ditolak Pembimbing') AND ($status2 == 'Ditolak Pembimbing')){
                            echo '
                            <div class="form-group">
                            <input type="file" class="form-control" id="laporan_perbaikan" name="laporan_perbaikan" placeholder="Lokasi" accept="application/pdf" onchange="return validasiFile()">
                            <p class="help-block">File yang di unggah akan di approval oleh pembimbing terlebih dahulu, file yang di approved oleh pembimbing akan muncul pada halaman approval penguji, untuk kemudian di approval oleh penguji.</p>
                            </div>
                           ';
                          }
                           else if(($status == 'Disetujui Penguji') AND ($status2 == 'Disetujui Penguji')){
                            echo '
                            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-check"></i> Perhatian!</h4>
                                  Perbaikan Disetujui Penguji.
                                </div>
                                </div>
                            ';
                          }
                           else if(($status == 'Disetujui Penguji') AND ($status2 == 'Disetujui Pembimbing')){
                            echo '
                            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                  Disetujui Penguji (1 dari 2).
                                </div>
                                </div>
                            ';
                          }
                          else if(($status2 == 'Disetujui Penguji') AND ($status == 'Disetujui Pembimbing')){
                            echo '
                            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                  Disetujui Penguji (1 dari 2).
                                </div>
                                </div>
                            ';
                          }
                          else{
                            echo '
                            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                  Diajukan Perbaikan ke penguji.
                                </div>
                                </div>
                            ';
                          }
                        ?>
                     
                      </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
                    </div>
                    <!-- /.box-body -->
              </div>
              <div class="box box-default">
                    <div class="box-header with-border">
                      <a href="javascript:history.back()" class="btn-loading"><i class="fa fa-arrow-left" style="margin-right:10px;"></i></a>
                      <h3 class="box-title">Approval Penguji</h3>
                    </div>
                    <div class="box-body">
                     <form role="form" action="proses_ta.php?aksi=<?php echo $modal_upload; ?>" method="POST">
                      <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                      <input type="hidden" name="id_jadwal" value="<?php echo $idjadwal; ?>">
                      <input type="hidden" name="id_mhs" value="<?php echo $idmhs; ?>">

                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1"><?php echo $namadosen; ?></label>
                          <input type="text" class="form-control" name="kecamatan" value="<?php echo $status; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"><?php echo $namadosen2; ?></label>
                          <input type="text" class="form-control" name="kelurahan" value="<?php echo $status2; ?>" readonly>
                        </div>                  
                      </div>
            </form>
                    </div>
                    <!-- /.box-body -->
              </div>
       
          </div>
          <div class="col-md-4">
          <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Ruang Diskusi - <?php echo $namadosen; ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 700px;">

                  <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_diskusi  = $conn->query("SELECT * FROM `tb_diskusi_penguji` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$penguji_1' AND id_mhs = '$id';");
                    $data_diskusi = mysqli_fetch_assoc($sql_diskusi);
                    $id_diskusi = $data_diskusi['id_diskusi'];

                    $sql_isi  = $conn->query("SELECT * FROM `tb_isi_diskusi` WHERE id_diskusi = $id_diskusi;");
                    $no = 1;
                      while($data_isi = mysqli_fetch_assoc($sql_isi)){
                        $dosen = $data_isi['id_dosen'];
                        $mhs = $data_isi['id_mhs'];

                        if($mhs == '0'){
                          $sql_dosen  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = $dosen;");
                          $data_dosen = mysqli_fetch_assoc($sql_dosen);
                          echo '
                          <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-left">'.$data_dosen['nama'].'</span>
                              <span class="direct-chat-timestamp pull-right">'.$data_isi['tanggal'].'</span>
                            </div>
                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                            <div class="direct-chat-text">
                              '.$data_isi['isi'].'
                            </div>
                          </div>
                        ';
                        }
                        else{
                          $sql_mhs  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = $mhs;");
                          $data_mhs = mysqli_fetch_assoc($sql_mhs);
                          echo '
                          <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-right">'.$data_mhs['nama'].'</span>
                              <span class="direct-chat-timestamp pull-left">'.$data_isi['tanggal'].'</span>
                            </div>
                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                            <div class="direct-chat-text">
                            '.$data_isi['isi'].'
                            </div>
                          </div>
                          ';
                        }
                        
                      }
                  ?>
                  

                  </div>
                  <!--/.direct-chat-messages-->

                  
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_cek_diskusi  = $conn->query("SELECT * FROM `tb_diskusi_penguji` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$penguji_1' AND id_mhs = '$id';");
                    $data_cek_diskusi = mysqli_fetch_assoc($sql_cek_diskusi);
                    $id_diskusi = $data_cek_diskusi['id_diskusi'];
                    if(empty($data_cek_diskusi)){
                  ?>
                  <p>Belum ada ruang diskusi</p>
                  <?php
                  }
                  else{
                  ?>
                  <form action="proses_ta.php?aksi=balas_diskusi_penguji" method="POST">
                    <div class="input-group">
                      <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                      <input type="hidden" name="id_diskusi" value="<?php echo $id_diskusi; ?>">
                      <input type="hidden" name="id_jadwal" value="<?php echo $idjadwal; ?>">
                      <input type="hidden" name="penguji_1" value="<?php echo $penguji_1; ?>">
                      <input type="hidden" name="penguji_2" value="<?php echo $penguji_2; ?>">
                      <input type="text" name="komentar_revisi" placeholder="Ketik untuk mulai membuka ruang diskusi" class="form-control">
                      <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat">Kirim</button>
                          </span>
                    </div>
                  </form>
                  <?php
                  }
                  ?>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
          </div>
          <div class="col-md-4">
          <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Ruang Diskusi - <?php echo $namadosen2; ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 700px;">

                  <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_diskusi  = $conn->query("SELECT * FROM `tb_diskusi_penguji` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$penguji_2' AND id_mhs = '$id';");
                    $data_diskusi = mysqli_fetch_assoc($sql_diskusi);
                    $id_diskusi = $data_diskusi['id_diskusi'];

                    $sql_isi  = $conn->query("SELECT * FROM `tb_isi_diskusi` WHERE id_diskusi = $id_diskusi;");
                    $no = 1;
                      while($data_isi = mysqli_fetch_assoc($sql_isi)){
                        $dosen = $data_isi['id_dosen'];
                        $mhs = $data_isi['id_mhs'];

                        if($mhs == '0'){
                          $sql_dosen  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = $dosen;");
                          $data_dosen = mysqli_fetch_assoc($sql_dosen);
                          echo '
                          <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-left">'.$data_dosen['nama'].'</span>
                              <span class="direct-chat-timestamp pull-right">'.$data_isi['tanggal'].'</span>
                            </div>
                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                            <div class="direct-chat-text">
                              '.$data_isi['isi'].'
                            </div>
                          </div>
                        ';
                        }
                        else{
                          $sql_mhs  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = $mhs;");
                          $data_mhs = mysqli_fetch_assoc($sql_mhs);
                          echo '
                          <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-right">'.$data_mhs['nama'].'</span>
                              <span class="direct-chat-timestamp pull-left">'.$data_isi['tanggal'].'</span>
                            </div>
                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                            <div class="direct-chat-text">
                            '.$data_isi['isi'].'
                            </div>
                          </div>
                          ';
                        }
                        
                      }
                  ?>
                  

                  </div>
                  <!--/.direct-chat-messages-->

                  
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_cek_diskusi  = $conn->query("SELECT * FROM `tb_diskusi_penguji` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$penguji_2 ' AND id_mhs = '$id';");
                    $data_cek_diskusi = mysqli_fetch_assoc($sql_cek_diskusi);
                    $id_diskusi = $data_cek_diskusi['id_diskusi'];
                    if(empty($data_cek_diskusi)){
                  ?>
                  <p>Belum ada ruang diskusi</p>
                  <?php
                  }
                  else{
                  ?>
                  <form action="proses_ta.php?aksi=balas_diskusi_penguji" method="POST">
                    <div class="input-group">
                      <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                      <input type="hidden" name="id_diskusi" value="<?php echo $id_diskusi; ?>">
                      <input type="hidden" name="id_jadwal" value="<?php echo $idjadwal; ?>">
                      <input type="hidden" name="penguji_1" value="<?php echo $penguji_1; ?>">
                      <input type="hidden" name="penguji_2" value="<?php echo $penguji_2; ?>">
                      <input type="text" name="komentar_revisi" placeholder="Ketik untuk mulai membuka ruang diskusi" class="form-control">
                      <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat">Kirim</button>
                          </span>
                    </div>
                  </form>
                  <?php
                  }
                  ?>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
          </div>
      </div>     

          
      <!-- /.box -->
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
