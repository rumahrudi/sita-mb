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
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
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
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script>
$(document).ready(function() {
    $('#load').DataTable();
} );
</script>

  <script>
    $(document).ready(function() {
        $('#summernote11').summernote();
    });
  </script>

<script>
    $(document).ready(function() {
        $('#summernote21').summernote();
    });
  </script>

  <script>
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
  </script>
  <script>
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
  </script>

<script>
    $(document).ready(function() {
        $('#summernote3').summernote();
    });
  </script>

<script>
    $(document).ready(function() {
        $('#summernote4').summernote();
    });
  </script>

<script>
    $(document).ready(function() {
        $('#summernote5').summernote();
    });
  </script>

<script>
    $(document).ready(function() {
        $('#summernote6').summernote();
    });
  </script>


<script>
    $(document).ready(function() {
        $('#summernote7').summernote();
    });
  </script>

<script>
    $(document).ready(function() {
        $('#summernote8').summernote();
    });
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
                  <a href="index.php?page=list_penilaian_sidang" class="btn-loading"><i class="fa fa-arrow-left" style="margin-right:10px;"></i></a>
                    <h3 class="box-title">List Jadwal Menguji Periode Ini</h3>
                  
                </div><!-- /.box-header -->                 

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
         <table id="load" class="table table-hover">
              <thead>
                <tr>
                 <th>No</th>
                  <th width="10%">Jenis Usulan</th>
                  <th width="25%">Nama & Judul</th>
                  <th >Nomor WA</th>
                  <th >Penguji 1 & 2</th>
                  <th >Tanggal Sidang</th>
                  <th width="10%">Riwayat Sidang</th>
                  <th >#</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                $periode = base64_decode($_GET['periode']);
                $month = date('m');
                $no=1;
                     $sql = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE periode_sidang = '$periode' AND (penguji_1 = '$id' OR penguji_2 ='$id')");
                       while($data = mysqli_fetch_assoc($sql)){
                        $periodsidang = $data['periode_sidang'];
                        $periodsidang = base64_encode($periodsidang);
                        $idjadwal = $data['id_jadwal'];
                        $id_ta = $data['id_tugas_akhir'];

                        $idmhs= $data['id_tugas_akhir'];
                        $iddosen = $data['penguji_1'];
                        $iddosen2 = $data['penguji_2'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$idmhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $namamhs = $data5['nama'];
                        $no_wa = $data5['no_wa'];
                        $email = $data5['email_lain'];

                        $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$id' ;");
                        $data6 = mysqli_fetch_assoc($sql6);
                        $nilai_1 = $data6['nilai_1'];
                        $nilai_2 = $data6['nilai_2'];
                        $nilai_3 = $data6['nilai_3'];
                        $nilai_4 = $data6['nilai_4'];
                        $nilai_5 = $data6['nilai_5'];
                        $nilai_6 = $data6['nilai_6'];
                        $nilai_7 = $data6['nilai_7'];
                        $komentar = $data6['catatan_perbaikan'];
                        $sidang_ulang = $data6['sidang_ulang'];

                        $sql62  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$id' ;");
                        $data62 = mysqli_fetch_assoc($sql62);
                        
                        $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang_anggota` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$id' ;");
                        $data7 = mysqli_fetch_assoc($sql7);
                        $nilai_12 = $data7['nilai_1'];
                        $nilai_22 = $data7['nilai_2'];
                        $nilai_32 = $data7['nilai_3'];
                        $nilai_42 = $data7['nilai_4'];
                        $nilai_52 = $data7['nilai_5'];
                        $nilai_62 = $data7['nilai_6'];
                        $nilai_72 = $data7['nilai_7'];
                        $komentar2 = $data7['catatan_perbaikan'];
                        $id_mhs =$data7['id_mhs'];

                        
                        $sql8 = $conn->query("SELECT * FROM tb_anggota_tugas_akhir WHERE id_tugas_akhir = $id_ta ");
                        $data8 = mysqli_fetch_assoc($sql8);
                        $id_anggota = $data8['id_mhs'];

                        $sql9  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$id_anggota' ;");
                        $data9 = mysqli_fetch_assoc($sql9);
                        $nama_anggota = $data9['nama'];

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['jenis_sidang'].'</td>';
                        echo '<td >'.$namamhs.' - '.$nama_anggota.'<br><i>'.$data2['judul'].'</i></td>';
                        echo '<td >'.$no_wa.'<br><i>'.$email.'</i></td>';
                        echo '<td >'.$namadosen.' <br> '.$namadosen2.'</td>';
                        echo '<td >'.$data['tanggal'].' <br> '.$data['jam_sidang'].'</td>';
                        echo '<td><a class="btn btn-primary btn-xs" href="index.php?page=riwayat_sidang_mhs&id_mhs='.$idmhs.'"><i class="fa fa-eye"></i> Lihat</a></td>';
                       
                          if(empty($data62)){
                            echo '<td ><a class="btn btn-primary btn-xs" href="index.php?page=penilaian_sidang_baru&periode='.$periodsidang.'&id_jadwal='.base64_encode($idjadwal).'&id_ta='.base64_encode($idmhs).'" role="button">Beri Penilaian</a></td>'; 
                          }
                          else{
                            if($data['jenis_sidang'] == 'Seminar Proposal'){
                              echo '<td ><a class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalReviewerProposal'.$idjadwal.'"  role="button">Lihat Nilai Proposal</a>';
                            }

                            if($data['jenis_sidang'] == 'Sidang Akhir'){
                              echo '<td ><a class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalReviewerTA2'.$idjadwal.'"  role="button">Lihat Nilai Sidang Akhir</a>';
                            }
                            
                            if(!empty($data7)){
                              echo ' <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalAnggota'.$idjadwal.'"  role="button">Lihat Nilai Anggota</a>';
                            }
                            echo '</td>';
                            if($data['jenis_sidang'] == 'Seminar Proposal'){
                              echo '
                              <div id="myModalReviewerProposal'.$idjadwal.'" class="modal fade" role="dialog" >
                                <div class="modal-dialog modal-lg">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Hasil dan Komentar Penguji '.$data['jenis_sidang'].'</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form action="proses_ta.php?aksi=update_penilaian_sidang_baru" method="POST">
                                       <input type="hidden" name="token" id="token" class="form-control" value="'.$token.'" >
                                       <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="'.$idjadwal.'" >
                                       <input type="hidden" name="id_dosen" id="id_dosen" class="form-control" value="'.$id.'" >
                                       <input type="hidden" name="periode" id="periode" class="form-control" value="'.$periode.'" >
                                       <input type="hidden" name="jenis_sidang" id="jenis_sidang" class="form-control" value="'.$data['jenis_sidang'].'" >
                                       <label for="exampleInputEmail1">Presentasi '.$data['jenis_sidang'].'</label>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">1. Kemampuan Menyajikan Presentasi</label>
                                          <input type="text" name="nilai_1" id="nilai_1" class="form-control" value="'.$data62['nilai_1'].'" >
                                      </div>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">2. Media Presentasi</label>
                                          <input type="text" name="nilai_2" id="nilai_2" class="form-control" value="'.$data62['nilai_2'].'" >
                                      </div>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">3. Kemampuan Menjawab Pertanyaan</label>
                                          <input type="text" name="nilai_3" id="nilai_3" class="form-control" value="'.$data62['nilai_3'].'" >
                                      </div>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">4. Sikap dan Penampilan</label>
                                          <input type="text" name="nilai_4" id="nilai_4" class="form-control" value="'.$data62['nilai_4'].'" >
                                      </div>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">5. Time / Class Management</label>
                                          <input type="text" name="nilai_5" id="nilai_5" class="form-control" value="'.$data62['nilai_5'].'" >
                                      </div>
                                      <label for="exampleInputEmail1">Isi '.$data['jenis_sidang'].'</label>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">1. Pemilihan Topik</label>
                                          <input type="text" name="nilai_6" id="nilai_6" class="form-control" value="'.$data62['nilai_6'].'" >
                                      </div>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">2. Relevansi Topik dengan Keilmuan</label>
                                          <input type="text" name="nilai_7" id="nilai_7" class="form-control" value="'.$data62['nilai_7'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">3. Kedalaman Isu Penelitian</label>
                                          <input type="text" name="nilai_8" id="nilai_8" class="form-control" value="'.$data62['nilai_8'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">4. Metode Penelitian</label>
                                          <input type="text" name="nilai_9" id="nilai_9" class="form-control" value="'.$data62['nilai_9'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">5. Kajian Teori/Tinjauan Pustaka dan Literatur</label>
                                          <input type="text" name="nilai_10" id="nilai_10" class="form-control" value="'.$data62['nilai_10'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">6. Tata Tulisa dan Tata Bahasa</label>
                                          <input type="text" name="nilai_11" id="nilai_11" class="form-control" value="'.$data62['nilai_11'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">7. Pengutipan dan Referensi</label>
                                          <input type="text" name="nilai_12" id="nilai_12" class="form-control" value="'.$data62['nilai_12'].'" >
                                      </div>
                                      ';
                                      
                                      if($data62['sidang_ulang'] == "ya"){
                                      echo '
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Sidang Ulang: </label> <br>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="ya" checked><b>YA</b>
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="tidak"><b>TIDAK</b>
                                            </label>
                                      </div>
                                      ';
                                      }
                                      else{
                                      echo '
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Sidang Ulang: </label> <br>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="ya" ><b>YA</b>
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="tidak" checked><b>TIDAK</b>
                                            </label>
                                      </div>
                                      ';
                                      }
                                      
                                    echo '
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Komentar Penguji</label>
                                           <textarea class="form-control" id="summernote'.$no.'" name="komentar" id="komentar" rows="3">'.$data62['catatan_perbaikan'].'</textarea>
                                      </div>
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-block">Update Penilaian</button>
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
                            elseif($data['jenis_sidang'] == 'Sidang Akhir'){
                              echo '
                              <div id="myModalReviewerTA2'.$idjadwal.'" class="modal fade" role="dialog" >
                                <div class="modal-dialog modal-lg">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Hasil dan Komentar Penguji</h4>
                                    </div>
                                    <div class="modal-body">
                                      <form action="proses_ta.php?aksi=update_penilaian_sidang_baru" method="POST">
                                       <input type="hidden" name="token" id="token" class="form-control" value="'.$token.'" >
                                       <input type="hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="'.$idjadwal.'" >
                                       <input type="hidden" name="id_dosen" id="id_dosen" class="form-control" value="'.$id.'" >
                                       <input type="hidden" name="periode" id="periode" class="form-control" value="'.$periode.'" >
                                       <input type="hidden" name="jenis_sidang" id="jenis_sidang" class="form-control" value="'.$data['jenis_sidang'].'" >
                                       <label for="exampleInputEmail1">Presentasi '.$data['jenis_sidang'].'</label>
                                       <div class="form-group">
                                       <label for="exampleInputEmail1">1. Kemampuan Menyajikan Presentasi</label>
                                       <input type="text" name="nilai_1" id="nilai_1" class="form-control" value="'.$data62['nilai_1'].'" >
                                        </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">2. Media Presentasi</label>
                                            <input type="text" name="nilai_2" id="nilai_2" class="form-control" value="'.$data62['nilai_2'].'" >
                                        </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">3. Kemampuan Menjawab Pertanyaan</label>
                                            <input type="text" name="nilai_3" id="nilai_3" class="form-control" value="'.$data62['nilai_3'].'" >
                                        </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">4. Sikap dan Penampilan</label>
                                            <input type="text" name="nilai_4" id="nilai_4" class="form-control" value="'.$data62['nilai_4'].'" >
                                        </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">5. Time / Class Management</label>
                                            <input type="text" name="nilai_5" id="nilai_5" class="form-control" value="'.$data62['nilai_5'].'" >
                                        </div>
                                      <label for="exampleInputEmail1">Isi '.$data['jenis_sidang'].'</label>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">1. Relevansi Tujuan dan Pembahasan </label>
                                          <input type="text" name="nilai_6" id="nilai_6" class="form-control" value="'.$data62['nilai_6'].'" >
                                      </div>
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">2. Relevansi Kerangka Pemikiran dengan Kajian Teori dan Kajian Empiris </label>
                                          <input type="text" name="nilai_7" id="nilai_7" class="form-control" value="'.$data62['nilai_7'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">3. Ketepatan Penggunaan Metodologi</label>
                                          <input type="text" name="nilai_8" id="nilai_8" class="form-control" value="'.$data62['nilai_8'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">4. Hasil dan Pembahasan</label>
                                          <input type="text" name="nilai_9" id="nilai_9" class="form-control" value="'.$data62['nilai_9'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">5. Relevansi Tujuan dan Kesimpulan, Saran serta Keterbatasan</label>
                                          <input type="text" name="nilai_10" id="nilai_10" class="form-control" value="'.$data62['nilai_10'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">6. Tata Tulis dan Tata Bahasa</label>
                                          <input type="text" name="nilai_11" id="nilai_11" class="form-control" value="'.$data62['nilai_11'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">7. Pengutipan dan Referensi</label>
                                          <input type="text" name="nilai_12" id="nilai_12" class="form-control" value="'.$data62['nilai_12'].'" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">8. Nilai Tambah/ Manfaat Penelitian Terhadap Pengembangan Ilmu Pengetahuan</label>
                                          <input type="text" name="nilai_13" id="nilai_13" class="form-control" value="'.$data62['nilai_13'].'" >
                                      </div>
                                       ';
                                      if($data62['sidang_ulang'] == "ya"){
                                      echo '
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Sidang Ulang: </label> <br>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="ya" checked><b>YA</b>
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="tidak"><b>TIDAK</b>
                                            </label>
                                      </div>
                                      ';
                                      }
                                      else{
                                      echo '
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Sidang Ulang: </label> <br>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="ya" ><b>YA</b>
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="rekomendasi" value="tidak" checked><b>TIDAK</b>
                                            </label>
                                      </div>
                                      ';
                                      }
                                      
                                    echo '
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Komentar Penguji</label>
                                           <textarea class="form-control" id="summernote2'.$no.'" name="komentar" id="komentar" rows="3">'.$data62['catatan_perbaikan'].'</textarea>
                                      </div>
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-block">Update Penilaian Sidang Akhir</button>
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
                          }                  
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
