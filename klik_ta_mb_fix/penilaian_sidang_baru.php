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

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SITA | Penilaian Tugas Akhir</title>
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

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="dist/js/jquery.mask.min.js"></script>
  <script src="dist/js/jquery.mask.js"></script>
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>



  <script type="text/javascript">
    $( document ).ready(function() {
    var group = $('#group').val();

    if(group == "B"){
       if(sidang == "Sidang TA 1 / Sidang 1"){
        $( "#tidak" ).prop( "checked", true );
        $( "#ya" ).prop( "disabled", true );
       }
    }
  });
  </script>

  <script type="text/javascript">
  function reset_nilai() {
      $( "#nilai_1" ).prop( "readonly", true );
      $('#nilai_1').val("0");
      $( "#nilai_2" ).prop( "readonly", true );
      $('#nilai_2').val("0");
      $( "#nilai_3" ).prop( "readonly", true );
      $('#nilai_3').val("0");
      $( "#nilai_4" ).prop( "readonly", true );
      $('#nilai_4').val("0");
      $( "#nilai_5" ).prop( "readonly", true );
      $('#nilai_5').val("0");
      $( "#nilai_6" ).prop( "readonly", true );
      $('#nilai_6').val("0");
      $( "#nilai_7" ).prop( "readonly", true );
      $('#nilai_7').val("0");
      $( "#nilai_8" ).prop( "readonly", true );
      $('#nilai_8').val("0");
      $( "#nilai_9" ).prop( "readonly", true );
      $('#nilai_9').val("0");
      $( "#nilai_10" ).prop( "readonly", true );
      $('#nilai_10').val("0");
      $( "#nilai_11" ).prop( "readonly", true );
      $('#nilai_11').val("0");
      $( "#nilai_12" ).prop( "readonly", true );
      $('#nilai_12').val("0");
      $( "#nilai_13" ).prop( "readonly", true );
      $('#nilai_13').val("0");
    } 
  </script>
  <script type="text/javascript">
  function reverse_reset_nilai() {
      $( "#nilai_1" ).prop( "readonly", false );
      $( "#nilai_2" ).prop( "readonly", false );
      $( "#nilai_3" ).prop( "readonly", false );
      $( "#nilai_4" ).prop( "readonly", false );
      $( "#nilai_5" ).prop( "readonly", false );
      $( "#nilai_6" ).prop( "readonly", false );
      $( "#nilai_7" ).prop( "readonly", false );
      $( "#nilai_8" ).prop( "readonly", false );
      $( "#nilai_9" ).prop( "readonly", false );
      $( "#nilai_10" ).prop( "readonly", false );
      $( "#nilai_11" ).prop( "readonly", false );
      $( "#nilai_12" ).prop( "readonly", false );
      $( "#nilai_13" ).prop( "readonly", false );
    } 
  </script>
</head>
<body class="hold-transition skin-blue-light sidebar-mini" onload="jQuery()">

<!-- Site wrapper -->
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
      <!-- /.footer -->
      <?php
          include('sidebar.php');
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
<div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="font-weight:bold;font-size:14px;text-transform:uppercase;">
                        <a href="index.php?page=penilaian_sidang&periode=<?php echo $_GET['periode']; ?>" class="btn-loading hidden-lg">
                            <i class="fa fa-arrow-left" style="margin-right:10px;"></i>
                        </a>
                        Penilaian Sidang Tugas Akhir
                    </h3>
                </div>
                <div class="box-body">
                <?php
                include 'config.php';
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                $id_ta = mysqli_real_escape_string($conn,$_GET['id_ta']);
                $id_ta = base64_decode($id_ta);
                $id_jadwal = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
                $id_jadwal = base64_decode($id_jadwal);
                $periode = mysqli_real_escape_string($conn,$_GET['periode']);
                $periode = base64_decode($periode);

                $sql  = $conn->query("SELECT * FROM tb_tugas_akhir WHERE id_mhs = '$id_ta'");
                $data = mysqli_fetch_assoc($sql);
                $id_dosen = $data['id_dosen'];

                $sql2  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE `id_user_mhs` = $id_ta ;");
                $data2 = mysqli_fetch_assoc($sql2);
                $nama_mhs = $data2['nama'];
                $nim_mhs = $data2['nim'];
                $group = $data2['group'];

                $judul = $data['judul'];
                $deskripsi = $data['deskripsi'];
                $status = $data['status'];

                $sql3  = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE `id_jadwal` = $id_jadwal ;");
                $data3 = mysqli_fetch_assoc($sql3);
                $jenis_sidang = $data3['jenis_sidang'];
                $file2 = $data3['file_prasidang'];

                $sql6  = $conn->query("SELECT * FROM `tb_laporan_ta` WHERE `id_mhs` = $id_ta ORDER BY id_laporan DESC LIMIT 1;");
                $data6 = mysqli_fetch_assoc($sql6);
                $file1 = $data6['file_laporan'];
                
                ?>

                
                    <form role="form" class="form-horizontal" action="proses_ta.php?aksi=penilaian_sidang_baru&jenis=<?php echo $jenis_sidang; ?>" method="post" onsubmit="return confirm('Anda akan memberikan penilaian terhadap sidang, Periksa kembali nilai yang anda berikan, apabila anda sudah yakin, lanjutkan?');">
                       <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                       <input type="hidden" id="id_jadwal" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
                       <input type="hidden" id="id_dosen" name="id_dosen" value="<?php echo $id; ?>">
                       <input type="hidden" id="periode" name="periode" value="<?php echo $periode; ?>">
                       <input type="hidden" id="nim" name="nim" value="<?php echo $nim_mhs; ?>">
                       <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Sidang : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="jenis_sidang" id="jenis_sidang" class="form-control" value="<?php echo $jenis_sidang; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama / NIM Mahasiswa : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="nama_nim" id="nama_nim" class="form-control" value="<?php echo $nama_mhs; ?> / <?php echo $nim_mhs; ?>" readonly>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Judul Tugas Akhir : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $judul; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Deskripsi: </label>
                                <div class="col-sm-9">
                                 <p><?php echo $deskripsi; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kelengkapan: </label>
                                <div class="col-sm-9">
                                    <a href="viewer.php?file=<?php echo base64_encode($file1); ?>" target="_blank" class="btn btn-default col-sm-6" role="button">Lihat Laporan TA/PA</a>
                                    
                                </div>
                            </div>
                            <?php
                            if($jenis_sidang == 'Seminar Proposal'){
                                ?>
                                <div class="form-group">
                                <label class="col-sm-3 control-label">Tabel Penilaian: </label>
                                <div class="col-sm-9">
                                   <table class="table table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kriteria Penilaian Sidang 2 (Hasil)</th>
                                      <th>Nilai</th>
                                      <th>Nilai</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>1</td>
                                        <td>
                                        Presentasi Proposal
                                        <ul>
                                            <li>Kemampuan menyajikan presentasi</li>
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_1" id="nilai_1" class="form-control" required="" ></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        
                                        <ul>
                                            <li>Media Presentasi</li>
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_2" id="nilai_2" class="form-control" required="" ></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Kemampuan Menjawab Pertanyaan</li>
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_3" id="nilai_3" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Sikap dan Penampilan</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_4" id="nilai_4" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Time atau Class Management</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_5" id="nilai_5" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td>2</td>
                                        <td>
                                        Isi Proposal atau Konten
                                        <ul>
                                            <li>Pemilihan Topik</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_6" id="nilai_6" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Relevansi Topik dengan Keilmuan</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_7" id="nilai_7" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Kedalaman Isu Penelitian</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_8" id="nilai_8" class="form-control" required=""></td>
                                      </tr>
                                        <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Metodologi Penelitian</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_9" id="nilai_9" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Kajian Teori/Tinjauan Pustaka dan Literatur</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_10" id="nilai_10" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Tata Tulisa dan Tata Bahasa</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_11" id="nilai_11" class="form-control" required=""></td>
                                      </tr>                       
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Pengutipan dan Referensi</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_12" id="nilai_12" class="form-control" required=""></td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                                <?php
                            }
                            ?>
                            <?php
                            if($jenis_sidang == 'Sidang Akhir'){
                                ?>
                                <div class="form-group">
                                <label class="col-sm-3 control-label">Tabel Penilaian: </label>
                                <div class="col-sm-9">
                                   <table class="table table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kriteria Penilaian Sidang 2 (Hasil)</th>
                                      <th>Nilai</th>
                                      <th>Nilai</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>1</td>
                                        <td>
                                        Presentasi Proposal
                                        <ul>
                                            <li>Kemampuan menyajikan presentasi</li>
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_1" id="nilai_1" class="form-control" required="" ></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Media Presentasi</li>
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_2" id="nilai_2" class="form-control" required="" ></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Kemampuan Menjawab Pertanyaan</li>
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_3" id="nilai_3" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Sikap dan Penampilan</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_4" id="nilai_4" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Time atau Class Management</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_5" id="nilai_5" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td>2</td>
                                        <td>
                                        Isi Artikel atau Konten
                                        <ul>
                                            <li>Relevansi Tujuan dan Pembahasan </li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_6" id="nilai_6" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Relevansi Kerangka Pemikiran dengan Kajian Teori dan Kajian Empiris c</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_7" id="nilai_7" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Ketepatan Penggunaan Metodologi</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_8" id="nilai_8" class="form-control" required=""></td>
                                      </tr>
                                        <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Hasil dan Pembahasan</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_9" id="nilai_9" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Relevansi Tujuan dan Kesimpulan, Saran serta Keterbatasan</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_10" id="nilai_10" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Tata Tulisa dan Tata Bahasa</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_11" id="nilai_11" class="form-control" required=""></td>
                                      </tr>                       
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Pengutipan dan Referensi</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_12" id="nilai_12" class="form-control" required=""></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <ul>
                                            <li>Nilai Tambah/ Manfaat Penelitian Terhadap Pengembangan Ilmu Pengetahuan</li>                                          
                                        </ul>
                                        </td>
                                        <td>70-100</td>
                                        <td><input type="number" name="nilai_13" id="nilai_13" class="form-control" required=""></td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                                <?php
                            }
                            ?>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Sidang Ulang: </label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                      <input type="radio" name="rekomendasi" id="ya" value="ya" required="" onclick="reset_nilai();"><b>Mengulang</b>
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="rekomendasi" id="tidak" value="tidak" required="" onclick="reverse_reset_nilai();"><b>Tidak Mengulang</b>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Catatan Penguji: </label>
                                <div class="col-sm-9">
                                   <textarea id="summernote" class="form-control" name="komentar" id="komentar" rows="5" required="" placeholder="Isi komentar minimal  100 karakter" minlength="100"></textarea>
                                </div>
                            </div>                    

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="submit btn btn-primary btn-block" name="login" value="Login" >&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="box box-solid box-penjelasan">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title">Rubrik Penilaian</h3>
                    <div class="box-tools pull-right box-minus" style="display:none;">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <p>Berikut adalah rubrik penilaian untuk matakuliah berikut:
                      <ul>
                        <li>MJ541 Tugas Akhir: <a href="https://bit.ly/rubrikTA2-MJ">https://bit.ly/rubrikTA2-MJ</a></li>
                        <li>AN839 Tugas Akhir; <a href="https://bit.ly/rubrikTA2-AN">https://bit.ly/rubrikTA2-AN</a></li>
                        <li>GM526 Proyek Akhir: <a href="https://bit.ly/rubrikTA2-GM">https://bit.ly/rubrikTA2-GM</a></li>
                        <li>IF528 Proyek Akhir II: <a href="https://bit.ly/rubrikTA1-IF">https://bit.ly/rubrikTA1-IF</a></li>
                        <li>IF631 Proyek Akhir III: <a href="https://bit.ly/rubrikTA2-IF">https://bit.ly/rubrikTA2-IF</a></li>
                      </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</section><!-- /.content -->
            </div>
      </div>

<div id="myModalProposal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Proposal Tugas Akhir</h4>
      </div>
      <div class="modal-body" style="height: 600px">
        <iframe src="" frameborder="0" width="100%" height="100%" allowtransparency="true"></iframe> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
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
