<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TugasAkhir | Manajemen Bisnis</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index2.html" class="navbar-brand"><b>SI</b>TA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?page=login">Login <span class="sr-only">(current)</span></a></li>
            <li><a href="index.php?page=jadwal_sidang">Jadwal Sidang</a></li>     
          </ul>
        </div>
        <!-- /.navbar-collapse -->
  
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
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
        <?php
        include 'config.php';
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $set_time = $conn->query("SET lc_time_names ='id_ID'");
        $tanggal_hari_ini = date("Y-m-d");
        $sql7  = $conn->query("SELECT *, DATE_FORMAT(buka_sidang, '%d %M %Y') as bukasidang_indo, DATE_FORMAT(tutup_sidang, '%d %M %Y') as tutupsidang_indo FROM tb_periode_ta ORDER BY id_periode DESC LIMIT 1;");
        $data7 = mysqli_fetch_assoc($sql7);
        $tanggal_buka = $data7['buka_sidang'];
        $tanggal_tutup = $data7['tutup_sidang'];

        if (($tanggal_hari_ini < $tanggal_buka) || ($tanggal_hari_ini > $tanggal_tutup)){
          echo '
          <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-close"></i> Pendaftaran Sidang Ditutup!</h4>
                Silahkan mendaftar sidang pada periode sidang berikutnya.           
              </div>
          ';
        }
        else{
          echo '
          <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Pendaftaran Sidang Dibuka!</h4>
                Mulai dari '.$data7['bukasidang_indo'].' hingga '.$data7['tutupsidang_indo'].'      
              </div>
          ';
        }
        ?>
       
        <div class="row" style="margin-top:10px;">

                <div class="col-md-8">
                  <div style="margin-bottom:5px;padding:5px 10px;background-color: #FDFDFD !important;border-radius:3px;">
                        <small style="font-weight:bold;color:#3c8dbc;font-size:13px;">Panduan Penggunaan SITA</small>
                    </div>
                  <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Daftar Sidang</a></li>
              <li><a href="#tab_2" data-toggle="tab">Perbaikan Sidang</a></li>
              <li><a href="#tab_4" data-toggle="tab">Berkas Final TA & Bebas Masalah</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                Untuk melakukan pendaftaran Seminar Proposal dan Sidang Akhir silakan Login ke sistem terlebih dahulu. Berikut Proses nya:
                      <ol>
                        <li>Buka menu <b>Request Approval Laporan.</b></li>
                        <li>Upload laporan yang akan diminta persetujuan nya oleh <b>Pembimbing.</b></li>
                        <li>Menunggu status laporan disetujui oleh <b>Pembimbing</b></li>
                        <li>Apabila sudah disetujui atau diterima, maka buka menu <b>Daftar Sidang.</b></li>
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
                        <li>
                          Perbaikan sidang Seminar Proposal, wajib diupload pada sistem. Adapun alurnya adalah:
                          <ul>
                            <li>MHS mengajukan perbaikan pada menu <b>Berita acara sidang. (menunggu approval pembimbing)</b></li>
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
          <div style="margin-bottom:5px;padding:5px 10px;background-color: #FDFDFD !important;border-radius:3px;">
                        <small style="font-weight:bold;color:#3c8dbc;font-size:13px;">Prasyarat Sidang</small>
                    </div>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_5" data-toggle="tab">A. Seminar Proposal</a></li>
              <li><a href="#tab_6" data-toggle="tab">B. Sidang Akhir</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_5">
               <p><strong>A. Penilaian Seminar Proposal</strong><br>
            <ol>
              <li>Telah disetujui oleh dosen pembimbing untuk mengikuti sidang seminar proposal, dibuktikan dengan approval pada saat pengajuan "request approval laporan"</li>
              <li>Dokumen yang harus dipersiapkan untuk Sidang Seminar Proposal: 
                <ul>
                  <li>Laporan proposal telah disetujui pembimbing via SITA</li>
                  <li>Catatan Logbook yang diisi via SITA</li>
                  <li>Pastikan bahwa laporan seminar proposal anda sudah memiliki cek plagiarism disatukan dengan proposal.</li>
                  <li>lampiran lain yang ditentukan oleh Koordinator PA/TA atau dosen pembimbing (jika ada info lainnya)</li>
                </ul>
              </li>
            </ol>
            </p>
            
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_6">
               <p><strong>B. Penilaian Sidang Akhir</strong><br>
            <ol>
              <li>Telah disetujui oleh dosen pembimbing untuk mengikuti sidang Akhir, dibuktikan dengan approval pada saat pengajuan "request approval laporan"</li>
              <li>Dokumen yang harus dipersiapkan untuk Sidang TA1: 
                <ul>
                  <li>Laporan Sidang Akhir telah disetujui pembimbing via SITA</li>
                  <li>Catatan Logbook yang diisi via SITA</li>
                  <li>Sidang Akhir Setelah Seminar Proposal tidak "Mewajibkan" perbaikan harus disetujui penguji namun "Mewajibkan" disetujui oleh pembimbing, namun baik nya tetap mengajukan perbaikan agar TA1 berjalan lancar.</li>
                  <li>Sidang Ulang TA1, dimana Sidang TA1 sebelumnya (via SITA), maka sidang TA1 (sidang ulang) <b>perbaikan</b> nya harus disetujui dahulu baru dapat mendaftar sidang.</li>
                </ul>
              </li>
            </ol>
            </p>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
          <!--
          <div class="box box-success">
          <div class="box-header with-border">
            <h5 class="box-title">Syarat Ujian Sidang</h5>
          </div>
          <div class="box-body">
            <p><strong>A. Syarat Sidang Proposal</strong><br>
            <ol>
              <li>Telah disetujui oleh dosen pembimbing untuk mengikuti sidang proposal, dibuktikan dengan approval pada saat pengajuan "request approval laporan"</li>
              <li>Dokumen yang harus dipersiapkan untuk Sidang Proposal: 
                <ul>
                  <li>Laporan proposal telah disetujui pembimbing via SITA</li>
                  <li>Catatan Logbook yang diisi via SITA</li>
                  <li>Pastikan bahwa laporan proposal anda sudah memiliki cek plagiarism disatukan dengan proposal.</li>
                  <li>lampiran lain yang ditentukan oleh Koordinator PA/TA atau dosen pembimbing (jika ada info lainnya)</li>
                </ul>
              </li>
            </ol>
            </p>
            <hr>
            <p><strong>B. Syarat Sidang TA1</strong><br>
            <ol>
              <li>Telah disetujui oleh dosen pembimbing untuk mengikuti sidang TA1, dibuktikan dengan approval pada saat pengajuan "request approval laporan"</li>
              <li>Dokumen yang harus dipersiapkan untuk Sidang TA1: 
                <ul>
                  <li>Laporan TA1 telah disetujui pembimbing via SITA</li>
                  <li>Catatan Logbook yang diisi via SITA</li>
                  <li>Sidang TA1 Setelah Proposal tidak "Mewajibkan" perbaikan harus disetujui, namun baik nya tetap mengajukan perbaikan agar TA1 berjalan lancar.</li>
                  <li>Sidang Ulang TA1, dimana Sidang TA1 sebelumnya (via SITA), maka sidang TA1 (sidang ulang) <b>perbaikan</b> nya harus disetujui dahulu baru dapat mendaftar sidang.</li>
                </ul>
              </li>
            </ol>
            </p>
            <hr>
            <p><strong>B. Syarat Sidang TA2</strong><br>
            <ol>
            <li>Telah disetujui oleh dosen pembimbing untuk mengikuti sidang TA2, dibuktikan dengan approval pada saat pengajuan <b>"request approval laporan"</b> dan approval Prasidang telah disetujui pada saat pengajuan <b>"request pra sidang"</b></li>
              <li>Dokumen yang harus dipersiapkan untuk Sidang TA2: 
                <ul>
                  <li>Laporan TA2 telah disetujui pembimbing via SITA</li>
                  <li>Pra sidang yang telah disetujui via SITA</li>
                  <li>Catatan Logbook yang diisi via SITA</li>
                  <li>Pastikan bahwa perbaikan Sidang TA1 telah disetujui oleh penguji</li>
                  <li>Sidang Ulang TA2, dimana Sidang TA2 sebelumnya (via SITA), maka sidang TA2 (sidang ulang) <b>perbaikan</b> nya harus disetujui dahulu baru dapat mendaftar sidang.</li>
                </ul>
              </li>
            </ol>
            </p>
          </div>
          
        </div>
        -->
        </div>
      </div>

                

        
        
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php
      include('footer.php');
  ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
