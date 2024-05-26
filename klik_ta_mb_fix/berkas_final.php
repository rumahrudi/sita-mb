
<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Mahasiswa"){
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
  <title>SITA | Berkas Final</title>
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
          include('sidebar_mhs.php');
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
                    <h3 class="box-title">Berkas Final Tugas Akhir</h3>
                    
                </div><!-- /.box-header -->             

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
    <script type="text/javascript">
                  function validasiFile1(){
                      var inputFile = document.getElementById('halaman_judul');
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
    <script type="text/javascript">
                  function validasiFile_pengesahan(){
                      var inputFile = document.getElementById('file_pengesahan');
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
      <script type="text/javascript">
                  function validasiFile_plagiarisme(){
                      var inputFile = document.getElementById('file_plagiarisme');
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
      <script type="text/javascript">
                  function validasiFile_poster(){
                      var inputFile = document.getElementById('file_poster');
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
      <script type="text/javascript">
                  function validasiFile_laporan_akhir(){
                      var inputFile = document.getElementById('file_laporan_akhir');
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
      <script type="text/javascript">
                  function validasiFile_dokumen_perancangan(){
                      var inputFile = document.getElementById('file_dokumen_perancangan');
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
                      <?php
                          include 'config.php';
                          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                          $id = $_SESSION['id_user'];

                          $sql8  = $conn->query("SELECT * FROM tb_jadwal_sidang WHERE id_tugas_akhir = $id AND jenis_sidang = 'Sidang Akhir' ORDER BY id_jadwal DESC LIMIT 1;");
                          $data8 = mysqli_fetch_assoc($sql8);
                          $id_jadwal = $data8['id_jadwal']; //181
                          $penguji_1 = $data8['penguji_1']; // 1
                          $penguji_2 = $data8['penguji_2']; // 7
                          $jenis_sidang = $data8['jenis_sidang'];

                          $sql72  = $conn->query("SELECT * FROM tb_penilaian_sidang_baru WHERE id_jadwal = $id_jadwal AND id_dosen = $penguji_1 AND sidang_ulang = 'tidak';");
                          $data72 = mysqli_fetch_assoc($sql72);

                          $sidang_ulang = $data72['sidang_ulang'];
                          $status = $data72['status'];

                          $sql712  = $conn->query("SELECT * FROM tb_penilaian_sidang_baru WHERE id_jadwal = $id_jadwal AND id_dosen = $penguji_2 AND sidang_ulang = 'tidak';");
                          $data712 = mysqli_fetch_assoc($sql712);

                          $sidang_ulang1 = $data712['sidang_ulang'];
                          $status1 = $data712['status'];

                          $sql  = $conn->query("SELECT * FROM `tb_berkas_final` WHERE id_mhs = $id;");
                          $data = mysqli_fetch_assoc($sql); 
                          if($data['status'] == "Lengkap"){
                            $disabled = "disabled";
                          }

                          $sql9  = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = $id;");
                          $data9 = mysqli_fetch_assoc($sql9); 
                          $judul_inggris = $data9['judul_inggris'];

                          if(($status == "Disetujui Pembimbing") AND ($status1 == "Disetujui Pembimbing") AND ($judul_inggris != "-")){
                            
                            if(!empty($data)){
                              if($data['status'] == "Belum lengkap"){
                              echo '
                              <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                  Anda belum melengkapi seluruh berkas Final atau Ubah Status menjadi "Diajukan ke Pembimbing" jika semua berkas sudah lengkap.
                                </div>
                                </div>
                                ';
                              }
                              if($data['status'] == "Lengkap"){
                                echo '
                                <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                  <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Selamat!</h4>
                                    Berkas Final Tugas Akhir and sudah diverifikasi seluruhnya. Silahkan Verifikasi Data Diri Anda Untuk Keperluan Ijazah di link berikut <a href="https://bit.ly/2Ess7Gj" target="_blank">bit.ly/2Ess7Gj</a>. Dan hubungi Wali untuk melakukan Prayudisium.
                                  </div>
                                  </div>
                                  ';
                                }

                                if($data['status'] == "Perlu Perbaikan"){
                                  echo '
                                  <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                    <div class="alert alert-danger alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                      Berkas Final anda perlu perbaikan. Catatan dari Staff TU adalah <i>"'.$data['komentar'].'"</i>
                                    </div>
                                    </div>
                                    ';
                                  }

                                  if($data['status'] == "Diajukan ke Pembimbing"){
                                    echo '
                                    <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                      <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                        Sudah diajukan ke Pembimbing, menunggu approval oleh pembimbing untuk diteruskan ke Tata Usaha
                                      </div>
                                      </div>
                                      ';
                                    }

                                    if($data['status'] == "Disetujui Pembimbing"){
                                      echo '
                                      <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                                        <div class="alert alert-warning alert-dismissible">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                          <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                          Sudah disetujui oleh Pembimbing, menunggu approval oleh Staff TU.
                                        </div>
                                        </div>
                                        ';
                                      }
                              
                              
                              echo '
                              <table class="table table-striped">
                              <tr>
                                <th style="width: 10%">#</th>
                                <th >File</th>
                                <th style="width: 20%">View File</th>
                                <th style="width: 30%">#</th>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Halaman Judul</td>
                                <td>
                                <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_judul']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                                </td>
                                <td>
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_update_final" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="halaman_judul" id="halaman_judul" accept="application/pdf" onchange="return validasiFile1();"
                                '.$disabled.'>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" '.$disabled.'>Update</button>
                                      </span>
                                </div>
                                </form>
                              </td>
                              </tr>
                              <tr>
                              <td>2.</td>
                              <td>Halaman Pengesahan</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_pengesahan']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              <td>';
                              if($data['file_pengesahan'] == "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_pengesahan" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_pengesahan" id="file_pengesahan" accept="application/pdf" onchange="return validasiFile_pengesahan();" required >
                                      <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="submit">Upload</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              if($data['file_pengesahan'] != "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_pengesahan" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_pengesahan" id="file_pengesahan" accept="application/pdf" onchange="return validasiFile_pengesahan();" required '.$disabled.'>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" '.$disabled.'>Update</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              echo '
                              </td>
                              </tr>
                              <tr>
                              <td>3.</td>
                              <td>Bukti Cek Plagiarisme</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_plagiarisme']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              <td>';
                              if($data['file_plagiarisme'] == "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_plagiarisme" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_plagiarisme" id="file_plagiarisme" accept="application/pdf" onchange="return validasiFile_plagiarisme();" required>
                                      <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="submit">Upload</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              if($data['file_plagiarisme'] != "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_plagiarisme" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_plagiarisme" id="file_plagiarisme" accept="application/pdf" onchange="return validasiFile_plagiarisme();" required '.$disabled.'>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" '.$disabled.'>Update</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              echo '
                              </td>
                              </tr>
                              <tr>
                              <td>4.</td>
                              <td>Poster Tugas Akhir</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_poster']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              <td>
                              ';
                              if($data['file_poster'] == "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_poster" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_poster" id="file_poster" accept="application/pdf" onchange="return validasiFile_poster();" required >
                                      <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="submit">Upload</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              if($data['file_poster'] != "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_poster" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_poster" id="file_poster" accept="application/pdf" onchange="return validasiFile_poster();" required '.$disabled.'>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" '.$disabled.'>Update</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              echo '
                              </td>
                              </tr>
                              <tr>
                              <td>5.</td>
                              <td>Laporan Akhir</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_laporan_akhir']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              <td>
                              ';
                              if($data['file_laporan_akhir'] == "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_laporan_akhir" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_laporan_akhir" id="file_laporan_akhir" accept="application/pdf" onchange="return validasiFile_laporan_akhir();" required>
                                      <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="submit">Upload</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              if($data['file_laporan_akhir'] != "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_laporan_akhir" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_laporan_akhir" id="file_laporan_akhir" accept="application/pdf" onchange="return validasiFile_laporan_akhir();" required '.$disabled.'>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" '.$disabled.'>Update</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              echo '
                              </td>
                              </tr>
                              <tr>
                              <td>6.</td>
                              <td>Dokumen Perancangan</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_dokumen_perancangan']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              <td>';
                              if($data['file_dokumen_perancangan'] == "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_dokumen_perancangan" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_dokumen_perancangan" id="file_dokumen_perancangan" accept="application/pdf" onchange="return validasiFile_dokumen_perancangan();" required>
                                      <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="submit">Upload</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              if($data['file_dokumen_perancangan'] != "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_dokumen_perancangan" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" class="form-control" name="file_dokumen_perancangan" id="file_dokumen_perancangan" accept="application/pdf" onchange="return validasiFile_dokumen_perancangan();" required '.$disabled.'>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" '.$disabled.'>Update</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              echo '
                              </td>
                              </tr>
                              <tr>
                              <td>7.</td>
                              <td>Pengecekan TKT</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td>';
                              if($data['file_tkt'] == "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_final" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" id="exampleInputFile" disabled>
                                      <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="submit" disabled>Upload</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              if($data['file_tkt'] != "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_final" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" id="exampleInputFile" disabled>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" disabled>Update</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              echo '
                              </td>
                              </tr>
                              <tr>
                              <td>8.</td>
                              <td>Pengecekan Katsinov</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td>';
                              if($data['file_katsinov'] == "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_final" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" id="exampleInputFile" disabled>
                                      <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="submit" disabled>Upload</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              if($data['file_katsinov'] != "-"){
                                echo '
                                <form class="form-horizontal" action="proses_ta.php?aksi=upload_final" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" name="token" value="'.$token.'">
                                <div class="input-group input-group-sm">
                                <input type="file" id="exampleInputFile" disabled>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-flat" type="submit" disabled>Update</button>
                                      </span>
                                </div>
                                </form>
                                ';
                              }
                              echo '
                              </td>
                              </tr>
                              <tr>
                              <td>9.</td>
                              <td>Link download Produk Tugas Akhir</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="'.$data['link_produk'].'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              <td>';
                              if($data['link_produk'] == "-"){
                                echo '
                                <a class="btn btn-primary btn-xs" href="#myModalProduk" id="custId" data-toggle="modal" data-id="'.$id.'" role="button" ><i class="fa fa-upload"></i> Isi Link</a>
                                ';
                              }
                              if($data['link_produk'] != "-"){
                                echo '
                                <a class="btn btn-success btn-xs '.$disabled.'" href="#myModalProduk" id="custId" data-toggle="modal" data-id="'.$id.'" role="button" ><i class="fa fa-upload" ></i> Update Link</a>
                                ';
                              }
                              echo '</td>
                            </tr>
                            <tr>
                              <td>10.</td>
                              <td>Nama Sertifikasi Kompetensi Yang Pernah Diikuti</td>
                              <td>
                              '.$data['data_sertifikasi'].'
                              </td>
                              <td>';
                              if($data['data_sertifikasi'] == "-"){
                                echo '
                                <a class="btn btn-primary btn-xs" href="#myModalsertifikasi" id="custId" data-toggle="modal" data-id="'.$id.'" role="button" ><i class="fa fa-edit"></i> Isi Data</a>
                                ';
                              }
                              if($data['data_sertifikasi'] != "-"){
                                echo '
                                <a class="btn btn-success btn-xs '.$disabled.'" href="#myModalsertifikasi" id="custId" data-toggle="modal" data-id="'.$id.'" role="button" ><i class="fa fa-edit"></i> Update Data</a>
                                ';
                              }
                              echo '</td>
                            </tr>
                            </table>
                            <hr>
                              ';
                              if($data['status'] != "Lengkap"){
                                if(($data['data_sertifikasi'] != "-") AND ($data['file_pengesahan'] != "-") AND ($data['file_plagiarisme'] != "-") AND ($data['file_poster'] != "-") AND ($data['file_laporan_akhir'] != "-") AND ($data['file_dokumen_perancangan'] != "-") AND ($data['link_produk'] != "-")){
                                  echo '
                                <form action="proses_ta.php?aksi=update_status_berkas_mhs" method="post">
                                  <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                  <input type="hidden" id="token" name="token" value="'.$token.'">
                                  <div class="form-group">
                                    <label>Tanggal Pengajuan Berkas</label>
                                    <input type="date" class="form-control" value="'.$data['tanggal_upload'].'" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label>Ubah Status, Jika sudah dilengkapi:</label>
                                    <select class="form-control" name="status_verifikasi">
                                      <option>'.$data['status'].'</option>
                                      <option>Diajukan ke Pembimbing</option>
                                    </select>
                                  </div>
                                  <p class="help-block">Ubah Status menjadi "Diajukan ke Pembimbing" jika semua berkas sudah lengkap.</p>
                                  <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                              </form>
                                ';
                                }
                              }
                              else{
                                echo '
                                <form action="proses_ta.php?aksi=update_status_berkas_mhs" method="post">
                                <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id.'">
                                <input type="hidden" id="token" name="token" value="'.$token.'">
                                <div class="form-group">
                                  <label>Tanggal Pengajuan Berkas</label>
                                  <input type="date" class="form-control" value="'.$data['tanggal_upload'].'" disabled>
                                </div>
                                <div class="form-group">
                                  <label>Ubah Status, Jika sudah dilengkapi:</label>
                                  <select class="form-control" name="status_verifikasi" disabled>
                                    <option>'.$data['status'].'</option>
                                    <option>Diajukan ke Pembimbing</option>
                                  </select>
                                </div>
                                <p class="help-block">Harap Lengkapi seluruh isian berkas final atau Berkas Final Anda sudah di Verifikasi "Lengkap" oleh TU.</p>
                                <button type="submit" class="btn btn-primary btn-block" disabled>Simpan</button>
                            </form>
                                ';
                              }
                              
                            }
                            else {
                              echo '
                            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                              <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                Anda belum melengkapi seluruh berkas Final atau Staff TU belum memverifikasi berkas final anda.
                              </div>
                              </div>
                              ';
                              echo '
                              <table class="table table-striped">
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>File</th>
                                <th>Lihat</th>
                                <th style="width: 40px">#</th>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Halaman Judul</td>
                                <td>
                                Belum ada file.
                                </td>
                                <td><a class="btn btn-primary btn-xs" href="#myModalUser" id="custId" data-toggle="modal" data-id="'.$id.'" role="button" ><i class="fa fa-upload"></i> Upload</a></td>
                              </tr>
                              <tr>
                              <td>2.</td>
                              <td>Halaman Pengesahan</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              </tr>
                              <tr>
                              <td>3.</td>
                              <td>Bukti Cek Plagiarisme</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              </tr>
                              <tr>
                              <td>4.</td>
                              <td>Poster Tugas Akhir</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              </tr>
                              <tr>
                              <td>5.</td>
                              <td>Laporan Akhir</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              <tr>
                              <td>6.</td>
                              <td>Dokumen Perancangan</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              <tr>
                              <td>7.</td>
                              <td>Pengecekan TKT</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              </tr>
                              <tr>
                              <td>8.</td>
                              <td>Pengecekan Katsinov</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              </tr>
                              <tr>
                              <td>9.</td>
                              <td>Link download Produk Tugas Akhir</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                            </tr>
                            <tr>
                              <td>10.</td>
                              <td>Nama Sertifikasi Kompetensi Yang Pernah Diikuti</td>
                              <td>
                              Belum ada file.
                              </td>
                              <td><a class="btn btn-danger btn-xs" href="#myModalBelumUpload" id="custId" data-toggle="modal"  role="button" disabled><i class="fa fa-upload"></i> Upload</a></td>
                              </tr>
                            </table>
                              ';
                            
                            }
                          }else{
                            echo '
                            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
                              <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                                Anda belum mengikuti Sidang TA2 / atau Status Perbaikan Sidang TA2 anda belum disetujui seluruh penguji Atau anda belum melengkapi Judul TA anda dalam versi bahasa inggris (lengkapi disini <a href="index.php?page=identitas_ta">Identitas TA '.$status1.'</a>.
                              </div>
                              </div>
                              ';
                          }
                         
                         
                          ?> 
                    
            </div>
            <div class="box-footer" align="left" style="padding-top:13px;">
            
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
<div class="modal fade" id="myModalBelumUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Perhatian!!</h4>
              </div>
              <div class="modal-body">
                 <p>Harap upload sesuai urutan.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="myModalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Isi Link Produk</h4>
              </div>
              <div class="modal-body">
              <form action="proses_ta.php?aksi=link_produk" method="post" enctype="multipart/form-data">
                              <input type="hidden" id="id_mhs" name="id_mhs" value="<?php echo $id; ?>">
                              <input type="hidden" name="token" value="<?php echo $token; ?>">
              <div class="form-group">
                  <label>Link Produk</label>
                  <input type="text" name="link_produk" id="link_produk" class="form-control" value="<?php echo $data['link_produk']; ?>" required>
                </div>
                <p class="help-block">Pastikan Link Produk dalam bentuk zip tersebut dapat di download tidak di private.</p>
              
              </div>
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="myModalsertifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Isi Data Sertifikasi</h4>
              </div>
              <div class="modal-body">
              <form action="proses_ta.php?aksi=data_sertifikasi" method="post" enctype="multipart/form-data">
                              <input type="hidden" id="id_mhs" name="id_mhs" value="<?php echo $id; ?>">
                              <input type="hidden" name="token" value="<?php echo $token; ?>">
                              <p class="help-block">Isi jenis sertifikasi kompetensi apa saja yang pernah diikuti dan masih berlaku (Kirim scan sertifikat ke email <a href="mailto:tu-if@polibatam.ac.id">tu-if@polibatam.ac.id</a>), jika tidak ada tulis TIDAK ADA</p>
              <div class="form-group">
                  <label>Data Sertifikasi</label>
                  
                  <textarea class="form-control" rows="3" name="data_sertifikasi" id="data_sertifikasi" required><?php echo $data['data_sertifikasi']; ?></textarea>
                </div>
               
              
              </div>
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="myModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload Halaman Judul</h4>
              </div>
              <div class="modal-body">
                 <div class="fetched-data"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
      $(document).ready(function(){
        $('#myModalUser').on('show.bs.modal', function (e) {
          var rowid = $(e.relatedTarget).data('id');
          //menggunakan fungsi ajax untuk pengambilan data
          $.ajax({
            type : 'post',
            url : 'detail_upload_final.php',
            data :  'rowid='+ rowid,
            success : function(data){
            $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
          });
         });
      });
</script>
       
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
