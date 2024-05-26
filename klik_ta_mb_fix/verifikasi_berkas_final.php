<?php
session_start();
if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if(($_SESSION['user_jabatan']!="TU") AND ($_SESSION['user_jabatan']!="Admin")){
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
  <title>SITA | Verifikasi Berkas Final TU</title>
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
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard Dosen</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-home"></i> <span>Home / Dashboard</span>
        </a>
         <ul class="treeview-menu">
                    <li class=""><a href="index.php" class="btn-loading"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="index.php?page=identitas" class="btn-loading"><i class="fa fa-user"></i> <span>Identitas</span></a></li>
                    <li class=""><a href="index.php?page=identitas" class="btn-loading"><i class="fa fa-user"></i> <span>Kompetensi Dosen</span></a></li>
                  </ul>
      </li>
      <li class="active treeview">
                  <a href="#">
                     <i class="fa fa-list"></i> <span>Menu Tata Usaha</span>
                     <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                     </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class=""><a href="index.php?page=list_berkas_final" class="btn-loading"><i class="fa fa-file"></i> <span>Verifikasi Berkas Final</span></a></li>
                    
                  </ul>
               </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
       <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
            <div class="loading">
                <section class="content">
    <div class="row ">
    <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Identitas Tugas Akhir</h3>
                    
                </div><!-- /.box-header -->             

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body">
      <?php
                include 'config.php';
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                $id_mhs    = mysqli_real_escape_string($conn,$_GET['id_mhs']);
                $id_mhs    = base64_decode($id_mhs);

                $sql  = $conn->query("SELECT * FROM tb_tugas_akhir WHERE id_mhs = '$id_mhs'");
                $data = mysqli_fetch_assoc($sql);
                $id_dosen = $data['id_dosen'];
                $judul = $data['judul'];
                $judul = strtoupper($judul);
                $judul_inggris = $data['judul_inggris'];
                $judul_inggris = strtoupper($judul_inggris);
                $deskripsi = $data['deskripsi'];
                $status = $data['status'];

                $sql2  = $conn->query("SELECT * FROM `tb_user` WHERE `id_user` = $id_dosen ;");
                $data2 = mysqli_fetch_assoc($sql2);
                $nama = $data2['nama'];

                $sql21  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE `id_user_mhs` = $id_mhs ;");
                $data21 = mysqli_fetch_assoc($sql21);
                $nama_mhs = $data21['nama'];
                $nim_mhs = $data21['nim'];
                $email_aktif = $data21['email_lain'];

                $sql3  = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE `id_tugas_akhir` = $id_mhs AND jenis_sidang = 'Sidang Proposal' AND id_jadwal IN (SELECT id_jadwal FROM tb_penilaian_sidang WHERE sidang_ulang = 'Tidak')");
                $data3 = mysqli_fetch_assoc($sql3);
                $tanggal_sidang_proposal = $data3['tanggal_sidang'];

                $sql4  = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE `id_tugas_akhir` = $id_mhs AND jenis_sidang = 'Sidang TA 2 / Sidang 2 TANPA sidang magang' AND id_jadwal IN (SELECT id_jadwal FROM tb_penilaian_sidang WHERE sidang_ulang = 'Tidak')");
                $data4 = mysqli_fetch_assoc($sql4);
                $tanggal_sidang_ta2 = $data4['tanggal_sidang'];

                $sql5  = $conn->query("SELECT * FROM `tb_berkas_final` WHERE id_mhs = $id_mhs;");
                $data5 = mysqli_fetch_assoc($sql5);  
                $data_sertifikasi = $data5['data_sertifikasi'];
                ?>
       <form name="contact_form" id="contact_form" action="proses_ta.php?aksi=update" method="post">
       <div class="form-group">
                  <label>NIM</label>
                  <input type="text" name="nim_mhs" id="nim_mhs" class="form-control" value="<?php echo $nim_mhs; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" value="<?php echo $nama_mhs; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Email Aktif</label>
                  <input type="text" name="email_aktif" id="email_aktif" class="form-control" value="<?php echo $email_aktif; ?>" readonly="">
                </div>
                <div class="form-group">
                <?php
                                     error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                     $no = 1;
                                     $sql_anggota = $conn->query("SELECT * FROM tb_anggota_tugas_akhir WHERE id_tugas_akhir = '$id_mhs' ");
                                     while($data_anggota = mysqli_fetch_assoc($sql_anggota)){
                                      $id_mhs_anggota = $data_anggota['id_mhs'];
                                      $sql_nama_anggota  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE `id_user_mhs` = $id_mhs_anggota ;");
                                      $data_nama_anggota = mysqli_fetch_assoc($sql_nama_anggota);
                                      echo '
                                      
                                        <label>Nama Anggota TA '.$no.'</label>
                                        <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" value="'.$data_nama_anggota[nama].' - '.$data_nama_anggota[nim].'" readonly="">
                                       <br>
                                      ';
                                      $no++;
                                     }
                                    ?>
                                    </div>
                <div class="form-group">
                  <label>Judul TA/PA</label>
                  <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $judul; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Judul TA/PA Bahasa Inggris</label>
                  <input type="text" name="judul_inggris" id="judul_inggris" class="form-control" value="<?php echo $judul_inggris; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Dosen Pembimbing</label>
                  <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="<?php echo $nama; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Tanggal Mulai Tugas Akhir</label>
                  <input type="date" name="tanggal_sidang_proposal" id="tanggal_sidang_proposal" class="form-control" value="<?php echo $tanggal_sidang_proposal; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Tanggal Lulus Tugas Akhir</label>
                  <input type="date" name="tanggal_sidang_ta2" id="tanggal_sidang_ta2" class="form-control" value="<?php echo $tanggal_sidang_ta2; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly><?php echo $deskripsi; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Data Sertifikasi</label>
                  <textarea class="form-control" id="data_sertifikasi" name="data_sertifikasi" rows="3" readonly><?php echo $data_sertifikasi; ?></textarea>
                </div>
            </form>
    </div><!-- /.box-body -->
    <div class="box-footer" align="right" style="padding-top:13px;">
            </div>
</div>

</section>
</div><!-- /.box -->
</div>
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List Pengajuan Verifikasi Berkas Final</h3>
                    
                </div><!-- /.box-header -->             

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
        
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id_mhs    = mysqli_real_escape_string($conn,$_GET['id_mhs']);
                    $id_mhs    = base64_decode($id_mhs);
                    $sql  = $conn->query("SELECT * FROM `tb_berkas_final` WHERE id_mhs = $id_mhs;");
                    $no = 1;
                    $data = mysqli_fetch_assoc($sql);   
                    
                    echo '
                    <table class="table table-striped">
                              <tr>
                                <th style="width: 10%">#</th>
                                <th >File</th>
                                <th style="width: 20%">View File</th>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Halaman Judul</td>
                                <td>
                                <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_judul']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                                </td>
                              
                              </tr>
                              <tr>
                              <td>2.</td>
                              <td>Halaman Pengesahan</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_pengesahan']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              </tr>
                              <tr>
                              <td>3.</td>
                              <td>Bukti Cek Plagiarisme</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_plagiarisme']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              
                              </tr>
                              <tr>
                              <td>4.</td>
                              <td>Poster Tugas Akhir</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_poster']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              
                              </tr>
                              <tr>
                              <td>6.</td>
                              <td>Laporan Akhir</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_laporan_akhir']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              
                              </tr>
                              <tr>
                              <td>7.</td>
                              <td>Dokumen Perancangan</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="viewer.php?file='.base64_encode($data['file_dokumen_perancangan']).'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              
                              </tr>
                              <tr>
                              <td>8.</td>
                              <td>Pengecekan TKT</td>
                              <td>
                              Belum ada file.
                              </td>
                              
                              </tr>
                              <tr>
                              <td>9.</td>
                              <td>Pengecekan Katsinov</td>
                              <td>
                              Belum ada file.
                              </td>
                              
                              </td>
                              </tr>
                              <tr>
                              <td>10.</td>
                              <td>Link download Produk Tugas Akhir</td>
                              <td>
                              <a class="btn btn-primary btn-xs" href="'.$data['link_produk'].'" id="custId" role="button" target="_blank"><i class="fa fa-eye"></i> View</a>
                              </td>
                              
                            </tr>
                            </table>
                              ';
              ?>  
              <hr>
              <div class="box-header with-border">
                    <h3 class="box-title">Isi Form Verifikasi Berkas Final Tugas Akhir</h3>
                </div><!-- /.box-header -->   
                <br>
               <form action="proses_ta.php?aksi=update_status_berkas_tu" method="post">
                <input type="hidden" id="id_mhs" name="id_mhs" value="<?php echo $id_mhs; ?>">
                <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                <div class="form-group">
                  <label>Tanggal Pengajuan Berkas</label>
                  <input type="date" class="form-control" value="<?php echo $data['tanggal_upload']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>Pilih Status Verifikasi</label>
                  <select class="form-control" name="status_verifikasi">
                    <option><?php echo $data['status'] ?></option>
                    <option>Belum lengkap</option>
                    <option>Perlu Perbaikan</option>
                    <option>Lengkap</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Komentar</label>
                  <textarea class="form-control" rows="3" name="komentar" placeholder="Tulis disini jika ada file tertentu yang perlu diupload kembali"><?php echo $data['komentar']; ?></textarea>
                </div>
                <p class="help-block">Tulis disini jika ada file tertentu yang perlu diupload kembali</p>
                 <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>

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
