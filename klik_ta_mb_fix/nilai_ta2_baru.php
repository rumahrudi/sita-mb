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
  <title>SITA | Penilaian TA2 Pembimbing Baru</title>
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


</head>
<body class="hold-transition skin-blue-light sidebar-mini" onload="jQuery()">

<!-- Site wrapper -->
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
                  <a href="index.php?page=nilai_bimbingan" class="btn-loading"><i class="fa fa-arrow-left" style="margin-right:10px;"></i></a>
                    <h3 class="box-title" style="font-weight:bold;font-size:14px;text-transform:uppercase;">
                        <a href="index.php?page=profile" class="btn-loading hidden-lg">
                            <i class="fa fa-arrow-left" style="margin-right:10px;"></i>
                        </a>
                        Penilaian Sidang Tugas Akhir oleh Pembimbing
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

                $sql10  = $conn->query("SELECT * FROM `tb_penilaian_ta2_baru` WHERE id_mhs = '$id_ta' AND id_dosen = '$id';");
                $data10 = mysqli_fetch_assoc($sql10);
                $nilai_1 = $data10['nilai_1'];
                $nilai_2 = $data10['nilai_2'];
                $nilai_3 = $data10['nilai_3'];
                $nilai_4 = $data10['nilai_4'];
                $nilai_5 = $data10['nilai_5'];
                $nilai_6 = $data10['nilai_6'];
                $nilai_7 = $data10['nilai_7'];
                $nilai_8 = $data10['nilai_8'];    
                $nilai_9 = $data10['nilai_9'];    
                $nilai_10 = $data10['nilai_10'];    
                $nilai_11 = $data10['nilai_11'];    
                $nilai_12 = $data10['nilai_12'];    
                $nilai_13 = $data10['nilai_13'];    

                $sql_log  = $conn->query("SELECT COUNT(`id_logbook`) as jumlah_log FROM `tb_logbook_ta` WHERE `id_mhs` = $id_ta;");
                $data_log = mysqli_fetch_assoc($sql_log);
                $jumlah_log = $data_log['jumlah_log'];
                
                ?>

                <?php
                if(empty($data10)){
                  echo '
                  <form role="form" class="form-horizontal" action="proses_ta.php?aksi=penilaian_ta2_baru" method="post" onsubmit="return confirm("Anda akan memberikan penilaian TA1 terhadap mahasiswa bimbingan anda, Periksa kembali nilai yang anda berikan, apabila anda sudah yakin, lanjutkan?");">
                       <input type="hidden" id="token" name="token" value="'.$token.'">
                       <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id_ta.'">
                       <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama / NIM Mahasiswa : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="jenis_sidang" id="jenis_sidang" class="form-control" value="'.$nama_mhs.' / '.$nim_mhs.'" readonly>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Judul Tugas Akhir : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="judul" id="judul" class="form-control" value="'.$judul.'" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Deskripsi: </label>
                                <div class="col-sm-9">
                                 <p>'.$deskripsi.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Penilaian Bimbingan: </label>
                                <div class="col-sm-9">
                                   <table class="table table-striped">
                                    <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kriteria Penilaian</th>
                                      <th>Nilai</th>
                                      <th>Nilai</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <td colspan="4"><b>Proses Bimbingan (40%)</b></td>
                                    </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>
                                         Jumlah Logbook Bimbingan ('.$jumlah_log.') tercatat.
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_1" id="nilai_1" class="form-control" required="" min="70" max="100" ></td>
                                      </tr>
                                      <tr>
                                        <td>2</td>
                                        <td>
                                        Kedisipilinan proses bimbingan
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_2" id="nilai_2" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                      <tr>
                                      <td colspan="4"><b>Isi Riset / Konten (60%)</b></td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>
                                        Relevansi Topik dengan Keilmuan
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_3" id="nilai_3" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                      <tr>
                                        <td>2</td>
                                        <td>
                                        Kedalaman Isu Penelitian
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_4" id="nilai_4" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                      <tr>
                                        <td>3</td>
                                        <td>
                                        Kajian Teori dan Literatur
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_5" id="nilai_5" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                      <tr>
                                        <td>4</td>
                                        <td>
                                        Metode Penelitian
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_6" id="nilai_6" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                      <tr>
                                        <td>5</td>
                                        <td>
                                        Pembahasan
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_7" id="nilai_7" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                      <tr>
                                        <td>6</td>
                                        <td>
                                        Tata Tulis dan Tata Bahasa
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_8" id="nilai_8" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                      <tr>
                                        <td>7</td>
                                        <td>
                                        Pengutipan dan Referensi
                                        </td>
                                        <td>Nilai 70-100</td>
                                        <td><input type="number" name="nilai_9" id="nilai_9" class="form-control" required="" min="70" max="100"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="submit btn btn-primary btn-block" name="login" value="Login" >&nbsp;&nbsp;Submit&nbsp;&nbsp;</button>
                                </div>
                            </div>

                        </div>
                    </form>
                  ';
                }
                else{
                  echo '
                  <form role="form" class="form-horizontal" action="proses_ta.php?aksi=update_penilaian_ta2_baru" method="post" onsubmit="return confirm("Anda akan mengubah penilaian TA1 terhadap mahasiswa bimbingan anda, Periksa kembali nilai yang anda berikan, apabila anda sudah yakin, lanjutkan?");">
                       <input type="hidden" id="token" name="token" value="'.$token.'">
                       <input type="hidden" id="id_mhs" name="id_mhs" value="'.$id_ta.'">
                       <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama / NIM Mahasiswa : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="jenis_sidang" id="jenis_sidang" class="form-control" value="'.$nama_mhs.' / '.$nim_mhs.'" readonly>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Judul Tugas Akhir : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="judul" id="judul" class="form-control" value="'.$judul.'" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Deskripsi: </label>
                                <div class="col-sm-9">
                                 <p>'.$deskripsi.'</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Penilaian Bimbingan: </label>
                                <div class="col-sm-9">
                                   <table class="table table-striped">
                                   <thead>
                                   <tr>
                                     <th>No</th>
                                     <th>Kriteria Penilaian</th>
                                     <th>Nilai</th>
                                     <th>Nilai</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                   <td colspan="4"><b>Proses Bimbingan (40%)</b></td>
                                   </tr>
                                     <tr>
                                       <td>1</td>
                                       <td>
                                        Jumlah Logbook Bimbingan ('.$jumlah_log.') tercatat.
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_1" id="nilai_1" class="form-control" required="" min="70" max="100" value="'.$nilai_1.'"></td>
                                     </tr>
                                     <tr>
                                       <td>2</td>
                                       <td>
                                       Kedisipilinan proses bimbingan
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_2" id="nilai_2" class="form-control" required="" min="70" max="100" value="'.$nilai_2.'"></td>
                                     </tr>
                                     <tr>
                                     <td colspan="4"><b>Isi Riset / Konten (60%)</b></td>
                                     </tr>
                                     <tr>
                                       <td>1</td>
                                       <td>
                                       Relevansi Topik dengan Keilmuan
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_3" id="nilai_3" class="form-control" required="" min="70" max="100" value="'.$nilai_3.'"></td>
                                     </tr>
                                     <tr>
                                       <td>2</td>
                                       <td>
                                       Kedalaman Isu Penelitian
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_4" id="nilai_4" class="form-control" required="" min="70" max="100" value="'.$nilai_4.'"></td>
                                     </tr>
                                     <tr>
                                       <td>3</td>
                                       <td>
                                       Kajian Teori dan Literatur
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_5" id="nilai_5" class="form-control" required="" min="70" max="100" value="'.$nilai_5.'"></td>
                                     </tr>
                                     <tr>
                                       <td>4</td>
                                       <td>
                                       Metode Penelitian
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_6" id="nilai_6" class="form-control" required="" min="70" max="100" value="'.$nilai_6.'"></td>
                                     </tr>
                                     <tr>
                                       <td>5</td>
                                       <td>
                                       Pembahasan
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_7" id="nilai_7" class="form-control" required="" min="70" max="100" value="'.$nilai_7.'"></td>
                                     </tr>
                                     <tr>
                                       <td>6</td>
                                       <td>
                                       Tata Tulis dan Tata Bahasa
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_8" id="nilai_8" class="form-control" required="" min="70" max="100" value="'.$nilai_8.'"></td>
                                     </tr>
                                     <tr>
                                       <td>7</td>
                                       <td>
                                       Pengutipan dan Referensi
                                       </td>
                                       <td>Nilai 70-100</td>
                                       <td><input type="number" name="nilai_9" id="nilai_9" class="form-control" required="" min="70" max="100" value="'.$nilai_9.'"></td>
                                     </tr>
                                  </table>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="submit btn btn-primary btn-block" name="login" value="Login" >&nbsp;&nbsp;Update&nbsp;&nbsp;</button>
                                </div>
                            </div>

                        </div>
                    </form>
                  ';
                }
                ?>
                    
                </div>
            </div>
            <div class="box box-solid box-penjelasan">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title">Informasi</h3>
                    <div class="box-tools pull-right box-minus" style="display:none;">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <p> Jumlah bimbingan (diambil dari kartu bimbingan) dengan kriteria jumlah pertemuan: < 14: 80; 15-20: 85; 21-25: 90; 26-30: 95; > 30: 100 </p>
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
