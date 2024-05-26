<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if($_SESSION['user_jabatan']!="Mahasiswa"){
echo '<script language="javascript">alert("Anda bukan mahasiswa");history.back();</script>';
}
$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_jabatan'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];
$nama = $_SESSION['nama'];

if($_SESSION['status_mhs'] =="Non-aktif"){
  echo '<script language="javascript">alert("Akun anda di Non-aktif kan."); document.location="logout.php";</script>';
  }


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>SITA | Dashboard Mahasiswa</title>
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

  <script src="dist/js/angular.min.js"></script>


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
<body class="hold-transition skin-blue-light layout-top-nav">

<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand"><b>SI</b>TA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php?page=identitas_mhs">Identitas <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Status Pendaftaran</a></li>
            <li><a href="#">Jadwal Sidang</a></li>     
          </ul>
        </div>
        <!-- /.navbar-collapse -->
  
        <!-- /.navbar-custom-menu -->
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
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Sistem Informasi Tugas Akhir
          <small>Manajemen Bisnis</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row" style="margin-top:10px;">
          <div class="col-md-8">
             <div style="margin-bottom:5px;padding:5px 10px;background-color: #FDFDFD !important;border-radius:3px;">
                        <small style="font-weight:bold;color:#3c8dbc;font-size:13px;">Menu Mahasiswa</small>
                    </div>
                                         <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=list_mhs_dosen" class="btn btn-menu" style="white-space: normal"><img src="img/member.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px; white-space: normal"><br> Daftar Dosen</a>
                                                <a href="index.php?page=identitas_ta" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Tugas Akhir / PA</a>  
                                                <a href="index.php?page=request_approval_laporan" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Request Approval Laporan</a>                                                      
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=daftar_sidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Daftar Sidang</a>
                                                <a href="index.php?page=logbook_bimbingan" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br>Logbook Bimbingan</a>
                                                <a href="index.php?page=berita_acara_sidang" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Berita Acara Sidang</a>
                                            </div>
                                            <div class="btn-group btn-group-justified">
                                                <a href="index.php?page=berkas_final" class="btn btn-menu" style="white-space: normal"><img src="img/file.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"><br> Berkas Final</a>
                                                <a href="" class="btn btn-menu" style="white-space: normal" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"></a>
                                                <a href="" class="btn btn-menu" style="white-space: normal" style="white-space: normal"><img src="img/coming-soon.png" class="icon-menu" alt="Pulsa" style="margin-bottom:7px;"></a>
                                            </div>
                                        <br>
              <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Informasi Penting</h3>
                    </div>
                    <div class="box-body">
                    Terkait TA dan SITA silahkan join di grup ini <a href="https://discord.gg/jJZrZ7UbwR" target="_blank">https://discord.gg/jJZrZ7UbwR</a>. Semua pertanyaan terkati SITA dan TA silahkan melalui grup tersebut
                    </div>
                    <!-- /.box-body -->
                  </div>

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Daftar Sidang</a></li>
              <li><a href="#tab_2" data-toggle="tab">Perbaikan Sidang</a></li>
              <li><a href="#tab_3" data-toggle="tab">Pra Sidang TA2</a></li>
              <li><a href="#tab_4" data-toggle="tab">Berkas Final TA & Bebas Masalah</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                Untuk melakukan pendaftaran Sidang Proposal, TA1, atau TA2 silakan Login ke sistem terlebih dahulu. Berikut Proses nya:
                      <ol>
                        <li>Buka menu Request Approval Laporan</li>
                        <li>Upload laporan yang akan diminta persetujuan nya oleh pembimbing</li>
                        <li>Menunggu status laporan disetujui oleh Pembimbing</li>
                        <li>Apabila sudah disetujui atau diterima, maka buka menu Daftar Sidang</li>
                        <li>Pada bagian pilih laporan, pilih laporan yang sudah disetujui tadi.</li>
                        <li>Lalu tunggu sampai koordinator TA memberikan jadwal sidang yang dapat dilihat di dashboard anda</li>
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/6TEK1EDMGbc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                Terkait perbaikan sidang berikut beberapa ketentuan yang harus diketahui:
                      <ol>
                        <li>Perbaikan sidang PROPOSAL tidak wajib di upload pada sistem.</li>
                        <li>
                          Perbaikan sidang TA 1, wajib diupload pada sistem. Adapun alurnya adalah:
                          <ul>
                            <li>MHS mengajukan perbaikan pada menu berita acara sidang. (menunggu approval pembimbing)</li>
                            <li>Pembimbing MHS menyetujui hasil perbaikan pada sistem. (diajukan ke penguji)</li>
                            <li>Apabila sudah disetujui pembimbing, maka penguji baru dapat menyetujui atau menolak perbaikan.</li>
                          </ul>
                        </li>
                        <li>Perbaikan sidang TA 2 juga berlaku hal yang sama seperti TA 1.</li>
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/UxQaqvK-Hgg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Terkait pra sidang berikut beberapa ketentuan yang harus diketahui:
                      <ol>
                        <li>Draft laporan TA2 baik sudah disetujui atau belum</li>
                        <li>Demo aplikasi yang sudah diupload di Youtube</li>
                        <li>Meng-klik menu Request Prasidang, lalu mengisikan form.
                            <ul>
                              <li>Tanggal prasidang: Tanggal pada saat prasidang akan atau sudah dilakukan</li>
                              <li>Periode sidang: Pilih periode sidang yang akan didaftar</li>
                              <li>Draft laporan: draft laporan yang akan dilihat.</li>
                              <li>Link demo aplikasi: Link youtube dimana video demo aplikasi sudah di upload.</li>
                            </ul>
                        </li>
                        
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/EXWyUH-tpfw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
              </div>
              <!-- /.tab-pane -->
               <div class="tab-pane" id="tab_4">
                Terkait berkas final TA berikut beberapa ketentuan yang harus diketahui:
                      <ol>
                        <li>Pastikan perbaikan sidang TA2 anda sudah disetujui oleh semua penguji.</li>
                        <li>Kumpulkan semua berkas yang diperlukan, seperti:
                            <ul>
                              <li>Halaman judul yang sudah disetujui oleh pembimbing.</li>
                              <li>Halaman pengesahan yang terdiri dari tanda tangan penguji dan pembimbing</li>
                              <li>Bukti cek plagiarism yang bisa anda dapatkan dari pembimbing</li>
                              <li>Poster Tugas Akhir</li>
                              <li>Laporan Akhir</li>
                              <li>Dokumen Perancangan</li>
                              <li>Pengecekan TKT (saat ini belum)</li>
                              <li>Pengecekan Katsinov (saat ini belum)</li>
                              <li>Link Produk TA yang sudah di upload di google drive.</li>
                            </ul>
                        </li>
                        <li>Setelah dokumen semua lengkap, pastikan mengubah status menjadi <b>"Diajukan ke Pembimbing"</b></li>
                        <li>Hubungi pembimbing untuk melakukan pengecekan berkas, apabila sudah disetujui, maka selanjutnya akan diverikasi oleh TU</li>
                        <li>Setelah nya anda dapat memonitoring status pengajuan berkas final. Pastikan mengecek secara berkala.</li>
                        <li>TU akan memverifikasi berkas TA tersebut, Ada 2 tipe mahasiswa yang mengurus Berkas Final TA:
                          <ol>
                            <li>Bagi mahasiswa yang sidang nya proposal, hingga sidang TA2 nya menggunakan Sistem SITA, maka tinggal melengkapi identitas TA.</li>
                            <li>Bagi mahasiswa yang sidang proposal atau sidang TA1 nya tidak melalui Sistem SITA, maka mahasiswa diwajibkan mengisi form bebas masalah melalui link <a href="https://bit.ly/BebasMasalah-JurIF">bit.ly/BebasMasalah-JurIF</a></li>
                          </ol>
                           </li>
                        <li>Berkas final yang sudah disetujui oleh pembimbing dan Form Bebas Masalah yang telah diisi maka diverikasi oleh TU, TU akan memeriksa berkas, apabila status berupa <b>"Perlu Perbaikan"</b> maka lihat komentar lalu update kembali. Apabila stastus nya <b>"Lengkap"</b>, maka pengajuan selesai. Berkas tidak dapat di update kembali.</li>
                        <li>Sebagai tambahan, anda Di wajibkan mengisi Form dari akademik yaitu untuk Verifikasi Data Diri di link berikut <a href="https://bit.ly/2Ess7Gj" target="_blank">bit.ly/2Ess7Gj</a></li>
                        <li>Dan jangan lupa menghubungi wali untuk melakukan Prayudisium jika semua tahapan selesai dilakukan.</li>
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/MEKxAQFqxVY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          <!--
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pengajuan Pendaftaran Sidang TA/PA</h3>
                    </div>
                    <div class="box-body">
                      Untuk melakukan pendaftaran Sidang Proposal, TA1, atau TA2 silakan Login ke sistem terlebih dahulu. Berikut Proses nya:
                      <ol>
                        <li>Buka menu Request Approval Laporan</li>
                        <li>Upload laporan yang akan diminta persetujuan nya oleh pembimbing</li>
                        <li>Menunggu status laporan disetujui oleh Pembimbing</li>
                        <li>Apabila sudah disetujui atau diterima, maka buka menu Daftar Sidang</li>
                        <li>Pada bagian pilih laporan, pilih laporan yang sudah disetujui tadi.</li>
                        <li>Lalu tunggu sampai koordinator TA memberikan jadwal sidang yang dapat dilihat di dashboard anda</li>
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/6TEK1EDMGbc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pengajuan Perbaikan Setelah Sidang</h3>
                    </div>
                    <div class="box-body">
                      Terkait perbaikan sidang berikut beberapa ketentuan yang harus diketahui:
                      <ol>
                        <li>Perbaikan sidang PROPOSAL tidak wajib di upload pada sistem.</li>
                        <li>
                          Perbaikan sidang TA 1, wajib diupload pada sistem. Adapun alurnya adalah:
                          <ul>
                            <li>MHS mengajukan perbaikan pada menu berita acara sidang. (menunggu approval pembimbing)</li>
                            <li>Pembimbing MHS menyetujui hasil perbaikan pada sistem. (diajukan ke penguji)</li>
                            <li>Apabila sudah disetujui pembimbing, maka penguji baru dapat menyetujui atau menolak perbaikan.</li>
                          </ul>
                        </li>
                        <li>Perbaikan sidang TA 2 juga berlaku hal yang sama seperti TA 1.</li>
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/UxQaqvK-Hgg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    </div>

                  </div>
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pengajuan Pra Sidang untuk Sidang TA2</h3>
                    </div>
                    <div class="box-body">
                    Terkait pra sidang berikut beberapa ketentuan yang harus diketahui:
                      <ol>
                        <li>Draft laporan TA2 baik sudah disetujui atau belum</li>
                        <li>Demo aplikasi yang sudah diupload di Youtube</li>
                        <li>Meng-klik menu Request Prasidang, lalu mengisikan form.
                            <ul>
                              <li>Tanggal prasidang: Tanggal pada saat prasidang akan atau sudah dilakukan</li>
                              <li>Periode sidang: Pilih periode sidang yang akan didaftar</li>
                              <li>Draft laporan: draft laporan yang akan dilihat.</li>
                              <li>Link demo aplikasi: Link youtube dimana video demo aplikasi sudah di upload.</li>
                            </ul>
                        </li>
                        
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/EXWyUH-tpfw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    </div>
 
                  </div>
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pengajuan Berkas Final Tugas Akhir</h3>
                    </div>
                    <div class="box-body">
                    Terkait berkas final TA berikut beberapa ketentuan yang harus diketahui:
                      <ol>
                        <li>Pastikan perbaikan sidang TA2 anda sudah disetujui oleh semua penguji.</li>
                        <li>Kumpulkan semua berkas yang diperlukan, seperti:
                            <ul>
                              <li>Halaman judul yang sudah disetujui oleh pembimbing.</li>
                              <li>Halaman pengesahan yang terdiri dari tanda tangan penguji dan pembimbing</li>
                              <li>Bukti cek plagiarism yang bisa anda dapatkan dari pembimbing</li>
                              <li>Poster Tugas Akhir</li>
                              <li>Laporan Akhir</li>
                              <li>Dokumen Perancangan</li>
                              <li>Pengecekan TKT (saat ini belum)</li>
                              <li>Pengecekan Katsinov (saat ini belum)</li>
                              <li>Link Produk TA yang sudah di upload di google drive.</li>
                            </ul>
                        </li>
                        <li>Setelah dokumen semua lengkap, pastikan mengubah status menjadi <b>"Diajukan ke Pembimbing"</b></li>
                        <li>Hubungi pembimbing untuk melakukan pengecekan berkas, apabila sudah disetujui, maka selanjutnya akan diverikasi oleh TU</li>
                        <li>Berkas final yang sudah disetujui oleh pembimbing akan diverikasi oleh TU, TU akan memeriksa berkas, apabila status berupa <b>"Perlu Perbaikan"</b> maka lihat komentar lalu update kembali. Apabila stastus nya <b>"Lengkap"</b>, maka pengajuan selesai.</li>
                        <li>Setelah nya anda dapat memonitoring status pengajuan berkas final. Pastikan mengecek secara berkala.</li>
                      </ol>
                      Berikut panduan berupa video: <br><br>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/MEKxAQFqxVY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    </div>
                  </div>
        -->
        

 

          </div>      
        <div class="col-md-4">
          <?php
            include 'config.php';
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
            $sql  = $conn->query("SELECT * FROM tb_user_mhs WHERE id_user_mhs = $id");
            $data = mysqli_fetch_assoc($sql);
            $email_lain = $data['email_lain'];
            $no_wa = $data['no_wa'];

            if( (empty($email_lain)) || (empty($no_wa)) ){
              echo '
            <div class="box box-widget" style="margin-bottom: 10px;background-color: #FDFDFD">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                Email dan No Whatsapp Anda belum di isi
              </div>
              </div>
              ';
            }
            ?>
          <div class="box box-success">
          <div class="box-header with-border">
            <h5 class="box-title">Tugas Akhir / PA</h5>
          </div>
          <div class="box-body">
             <table id="load" class="table table-hover">
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE `id_mhs` = $id;");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_dosen = $data["id_dosen"];
                        if (isset($data)){
                        echo '<tr>';
                        $sql2  = $conn->query("SELECT * FROM `tb_user` WHERE `id_user` = $id_dosen ;");
                        $data2 = mysqli_fetch_assoc($sql2);
                        if($data['judul'] == '-'){
                          $judul = " <i>Harap lengkapi judul tugas akhir anda</i>";
                        }
                        else{
                          $judul = $data['judul'];
                        }
                        echo '<td >';
                        echo '<b>Judul :</b> '.$judul. '<br> <i>Pembimbing: '.$data2['nama'].'</i> <br> ';
                        echo '<b>Status:</b> <span class="label label-primary">Tahap '.$data['status'].'</span>';
                        echo '</td>';
                        echo '</tr>';
                        }
                        
                        $no++;
                      }
              ?>  
               </tbody>
        </table>

            <hr>


          </div>
          <!-- /.box-body -->
        </div>
        </div>
        <div class="col-md-4">
     
          <div class="box box-success">
          <div class="box-header with-border">
            <h5 class="box-title">Jadwal Sidang Tugas Akhir / PA</h5>
          </div>
          <div class="box-body">
             <table id="load" class="table table-hover">
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE `id_tugas_akhir` = $id ORDER BY id_jadwal DESC LIMIT 1;;");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $penguji_1 = $data["penguji_1"];
                        $penguji_2 = $data["penguji_2"];
                        if (isset($data)){
                        echo '<tr>';
                        $sql2  = $conn->query("SELECT * FROM `tb_user` WHERE `id_user` = $penguji_1 ;");
                        $data2 = mysqli_fetch_assoc($sql2);
                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE `id_user` = $penguji_2 ;");
                        $data3 = mysqli_fetch_assoc($sql3);

                        echo '<td >';
                        echo '<b>Judul :</b> '.$judul. '<br> <b><i>Penguji 1: '.$data2['nama'].'</i> <br> <i>Penguji 2: '.$data3['nama'].'</i> </b><br>';
                        echo '<b>Status:</b> Tahap '.$data['jenis_sidang'].'<br>';
                        if($data['tanggal'] == "1st January 1970"){
                          echo '<b>Tanggal Sidang:</b> <span class="label label-success">-</span><br>';
                        }else{
                          echo '<b>Tanggal Sidang:</b> <span class="label label-success">'.$data['tanggal'].'</span><br>';
                        }                       
                        echo '<b>Jam Sidang:</b> <span class="label label-primary">'.$data['jam_sidang'].'</span>';
                        echo '</td>';
                        echo '</tr>';
                        }                   
                        $no++;
                      }
              ?>  
               </tbody>
        </table>

            <hr>


          </div>
          <!-- /.box-body -->
        </div>
        </div>
      </div>    
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.footer -->
  <?php
      include('footer.php');
  ?>



</div>
<!-- ./wrapper -->
<style>
.height-info{
    height: 920px;
}
.icon-menu{
    margin-top:5px;
    width:50%;
}
@media  screen and (max-width: 780px) {
  .height-info{
      height: 500px;
  }
  .icon-menu{
      margin-top:5px;
        width:80%;
    }
}
.btn-menu{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#3c8dbc;
    font-size:12px;
}
.btn-menu:hover{
    background-color: #fff;
    border-color:#3c8dbc;
    color:#3c8dbc;
    font-size:12px;
}
.btn-menu:focus{
    background-color: #fff;
    border-color:#3c8dbc;
    color:#3c8dbc;
    font-size:12px;
}
.btn-menu-disabled{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#BDBFC1;
    font-size:12px;
}
.btn-menu-disabled:hover{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#BDBFC1;
    font-size:12px;
}
.btn-menu-disabled:focus{
    background-color: #fff;
    border-color:#f5f5f5;
    color:#BDBFC1;
    font-size:12px;
}
</style>
  
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
