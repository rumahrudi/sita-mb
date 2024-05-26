<?php
session_start();

$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_role'];
$reviewer = $_SESSION['user_reviewer'];
$id = $_SESSION['id_user'];
$token = $_SESSION['token'];

if(!$_SESSION['id_user']){
  header("Location: index.php?page=login");
}
if(($_SESSION['user_role'] != "dosen") AND ($_SESSION['user_role'] != "staffp3m") AND ($_SESSION['user_role'] != "ketuap3m") AND ($_SESSION['user_role'] != "laboran")){
                  echo '<script language="javascript">alert("Anda bukan Ketua KKT");history.back();</script>';
}

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
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>SIMP3M | List Usulan Penelitian</title>
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
<body class="hold-transition skin-purple-light sidebar-mini">

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
  <!-- Left side column. contains the logo and sidebar -->
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
      <!-- /.footer -->
      <?php
      if($role == "staffp3m"){
          include('sidebar_staff.php');
      }

      if($role == "ketuap3m"){
          include('sidebar_staff.php');
      }
      if($role == "dosen"){
           include('sidebar.php');
      }
      if($role == "laboran"){
           include('sidebar.php');
      }
         
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
                include 'config.php'; 
                $id_usulan = $_GET['id_usulan'];
                $id_usulan = base64_decode($id_usulan);

                $sql3="SELECT * FROM tb_usulan_penelitian WHERE `id_usulan` = '".$id_usulan."' ";
                $result3 = $conn->query($sql3);
                $row3 = mysqli_fetch_array($result3);

                if(empty($row3)){
                   echo '<script language="javascript">;history.back();</script>';
                }

                $judul = $row3['judul'];
                $id_user = $row3['id_user'];
                $luaran_wajib = $row3['luaran_wajib'];
                $luaran_tambahan = $row3['luaran_tambahan'];
                $luaran_tambahan2 = $row3['luaran_tambahan2'];
                $luaran_tambahan3 = $row3['luaran_tambahan3'];
                $ket_wajib = $row3['ket_wajib'];
                $ket_tambahan1 = $row3['ket_tambahan1'];
                $ket_tambahan2 = $row3['ket_tambahan2'];
                $ket_tambahan3 = $row3['ket_tambahan3'];

                $skema = $row3['skema'];
                $bidang_ilmu = $row3['bidang_ilmu'];
                $jangka_waktu = $row3['jangka_waktu'];
                $lokasi = $row3['lokasi'];
                $id_kkt = $row3['id_kkt'];

                $sql5="SELECT * FROM tb_kkt WHERE `id_kkt` = '".$id_kkt."' ";
                $result5 = $conn->query($sql5);
                $row5 = mysqli_fetch_array($result5);
                $nama_kkt = $row5['nama_kkt'];
                $kode_kkt = $row5['kode_kkt'];

                $sql4="SELECT * FROM tb_identitas_peneliti WHERE `id_user` = '".$id_user."' ";
                $result4 = $conn->query($sql4);
                $row4 = mysqli_fetch_array($result4);
                $nama = $row4['nama'];
                $bidang_ilmu = $row4['bidang_ilmu'];
                $jabatan_struktural = $row4['jabatan_struktural'];
                $jabatan_akademik = $row4['jabatan_akademik'];
                $prodi = $row4['prodi'];
                $alamat = $row4['alamat'];
                $no_hp = $row4['no_hp'];
                $email = $row4['email'];
                ?>
  <!-- Content Wrapper. Contains page content -->
       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usulan Proposal Penelitian
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">Detail Usulan</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        Untuk preview yang lebih baik, harap melihat melalui desktop atau PC atau melalui laptop.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-file"></i> Usulan Proposal Penelitian.
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          <h4>Identitas Penelitian</h4>
          <dl class="dl-horizontal">
                <dt style="text-align: left;">Judul Penelitian</dt>
                <dd><?php echo $judul; ?></dd>
                <dt style="text-align: left;">Peneliti Utama</dt>
                <dd><?php echo $nama; ?></dd>
                <dt style="text-align: left;">Bidang Keilmuan</dt>
                <dd><?php echo $bidang_ilmu; ?></dd>
                <dt style="text-align: left;">Jabatan Struktural</dt>
                <dd><?php echo $jabatan_struktural; ?></dd>
                <dt style="text-align: left;">Jabatan Fungsional</dt>
                <dd><?php echo $jabatan_akademik; ?></dd>
                <dt style="text-align: left;">Unit Kerja</dt>
                <dd><?php echo $prodi; ?></dd>
                <dt style="text-align: left;">Alamat</dt>
                <dd><?php echo $alamat; ?></dd>
                <dt style="text-align: left;">Telpon</dt>
                <dd><?php echo $no_hp; ?></dd>
                <dt style="text-align: left;">Email</dt>
                <dd><?php echo $email; ?></dd>
              </dl>
        </div>
        <div class="col-sm-6 invoice-col">
          <h4>-</h4>
          <dl class="dl-horizontal">
                <dt style="text-align: left;">Luaran Wajib</dt>
                <dd><?php echo $luaran_wajib; ?> ( <em><?php echo $ket_wajib; ?></em> )</dd>
                <dt style="text-align: left;">Luaran Tambahan 1</dt>
                <dd><?php echo $luaran_tambahan; ?> ( <em><?php echo $ket_tambahan1; ?></em> )</dd>
                <dt style="text-align: left;">Luaran Tambahan 2</dt>
                <dd><?php echo $luaran_tambahan2; ?> ( <em><?php echo $ket_tambahan2; ?></em> )</dd>
                <dt style="text-align: left;">Luaran Tambahan 3</dt>
                <dd><?php echo $luaran_tambahan3; ?> ( <em><?php echo $ket_tambahan2; ?></em> )</dd>
                <dt style="text-align: left;">Skema</dt>
                <dd><?php echo $skema; ?></dd>
                <dt style="text-align: left;">Bidang Ilmu</dt>
                <dd><?php echo $bidang_ilmu; ?></dd>
                <dt style="text-align: left;">Jangka Waktu</dt>
                <dd><?php echo $jangka_waktu; ?></dd>
                <dt style="text-align: left;">Lokasi</dt>
                <dd><?php echo $lokasi; ?></dd>
                <dt style="text-align: left;">KKT</dt>
                <dd><?php echo $kode_kkt; echo ' - '; echo $nama_kkt; ?></dd>
              </dl>
        </div>


      </div>
      <hr>
      <!-- /.row -->
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <h4>Anggota Penelitian</h4>
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Bidang Ilmu</th>
              <th>Alokasi Waktu</th>
              <th>Uraian Tugas</th>
            </tr>
            </thead>
            <tbody>
            <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_tim  = $conn->query("SELECT * FROM `tb_anggota_usulan_penelitian` WHERE id_usulan = '$id_usulan'");
                    $no = 1;
                      while($data_tim = mysqli_fetch_assoc($sql_tim)){
                        $id_user_tim = $data_tim['id_user'];

                        $sql6="SELECT * FROM tb_identitas_peneliti WHERE `id_user` = '".$id_user_tim."' ";
                        $result6 = $conn->query($sql6);
                        $row6 = mysqli_fetch_array($result6);
                        $nama_tim = $row6['nama'];
                        $bidangilmu_tim = $row6['bidang_ilmu'];
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$nama_tim.'</td>';
                        echo '<td >'.$bidangilmu_tim.'</td>';
                        echo '<td >'.$data_tim['alokasi_waktu'].'</td>';
                        echo '<td >'.$data_tim['uraian_tugas'].'</td>';
                        echo '</tr>';
                        $no++;
                      }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <hr>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <h4>Anggota Penelitian Mahasiswa</h4>
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Alokasi Waktu</th>
              <th>Uraian Tugas</th>
            </tr>
            </thead>
            <tbody>
            <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_tim  = $conn->query("SELECT * FROM `tb_anggota_mhs_usulan_penelitian` WHERE id_usulan = '$id_usulan'");
                    $no = 1;
                      while($data_tim = mysqli_fetch_assoc($sql_tim)){
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data_tim['nim'].'</td>';
                        echo '<td >'.$data_tim['nama_mhs'].'</td>';
                        echo '<td >'.$data_tim['alokasi'].'</td>';
                        echo '<td >'.$data_tim['uraian'].'</td>';
                        echo '</tr>';
                        $no++;
                      }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <hr>
    
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <h4>RAB Penelitian</h4>
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Jenis Pengeluaran</th>
              <th>Item</th>
              <th>Satuan</th>
              <th>Volume</th>
              <th style="text-align:right;">Harga Satuan</th>
              <th style="text-align:right;">Sub Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_rab  = $conn->query("SELECT * FROM `tb_rab_usulan_penelitian` WHERE id_usulan = '$id_usulan' AND jenis_pengeluaran = 'Honor'");
                    $no = 1;
                      while($data_rab = mysqli_fetch_assoc($sql_rab)){
                        $jenis_pengeluaran = $data_rab['jenis_pengeluaran'];
                        $item = $data_rab['item'];
                        $satuan = $data_rab['satuan'];
                        $volume = $data_rab['volume'];
                        $harga_satuan = $data_rab['harga_satuan'];
                        $total_satuan = $volume * $harga_satuan;
                        $total_seluruh = $total_seluruh + $total_satuan;
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$jenis_pengeluaran.'</td>';
                        echo '<td >'.$item.'</td>';
                        echo '<td >'.$satuan.'</td>';
                        echo '<td >'.$volume.'</td>';
                        echo '<td align="right">Rp. '.number_format($harga_satuan,2,',','.').'</td>';
                        echo '<td align="right">Rp. '.number_format($total_satuan,2,',','.').'</td>';
                        echo '</tr>';
                        $no++;
                      }
              ?>

              <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_ra3  = $conn->query("SELECT * FROM `tb_rab_usulan_penelitian` WHERE id_usulan = '$id_usulan' AND jenis_pengeluaran = 'Bahan habis pakai'");
                      while($data_rab3 = mysqli_fetch_assoc($sql_ra3)){
                        $jenis_pengeluaran3 = $data_rab3['jenis_pengeluaran'];
                        $item3 = $data_rab3['item'];
                        $satuan3 = $data_rab3['satuan'];
                        $volume3 = $data_rab3['volume'];
                        $harga_satuan3 = $data_rab3['harga_satuan'];
                        $total_satuan3 = $volume3 * $harga_satuan3;
                        $total_seluruh3 = $total_seluruh3 + $total_satuan3;
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$jenis_pengeluaran3.'</td>';
                        echo '<td >'.$item3.'</td>';
                        echo '<td >'.$satuan3.'</td>';
                        echo '<td >'.$volume3.'</td>';
                        echo '<td align="right">Rp. '.number_format($harga_satuan3,2,',','.').'</td>';
                        echo '<td align="right">Rp. '.number_format($total_satuan3,2,',','.').'</td>';
                        echo '</tr>';
                        $no++;
                      }
              ?>

              <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_rab2  = $conn->query("SELECT * FROM `tb_rab_usulan_penelitian` WHERE id_usulan = '$id_usulan' AND jenis_pengeluaran = 'Perjalanan'");
                      while($data_rab2 = mysqli_fetch_assoc($sql_rab2)){
                        $jenis_pengeluaran2 = $data_rab2['jenis_pengeluaran'];
                        $item2 = $data_rab2['item'];
                        $satuan2 = $data_rab2['satuan'];
                        $volume2 = $data_rab2['volume'];
                        $harga_satuan2 = $data_rab2['harga_satuan'];
                        $total_satuan2 = $volume2 * $harga_satuan2;
                        $total_seluruh2 = $total_seluruh2 + $total_satuan2;
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$jenis_pengeluaran2.'</td>';
                        echo '<td >'.$item2.'</td>';
                        echo '<td >'.$satuan2.'</td>';
                        echo '<td >'.$volume2.'</td>';
                        echo '<td align="right">Rp. '.number_format($harga_satuan2,2,',','.').'</td>';
                        echo '<td align="right">Rp. '.number_format($total_satuan2,2,',','.').'</td>';
                        echo '</tr>';
                        $no++;
                      }
              ?>

              <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $sql_rab4 = $conn->query("SELECT * FROM `tb_rab_usulan_penelitian` WHERE id_usulan = '$id_usulan' AND jenis_pengeluaran = 'Lain-lain'");
                      while($data_rab4 = mysqli_fetch_assoc($sql_rab4)){
                        $jenis_pengeluaran4 = $data_rab4['jenis_pengeluaran'];
                        $item4 = $data_rab4['item'];
                        $satuan4 = $data_rab4['satuan'];
                        $volume4 = $data_rab4['volume'];
                        $harga_satuan4 = $data_rab4['harga_satuan'];
                        $total_satuan4 = $volume4 * $harga_satuan4;
                        $total_seluruh4 = $total_seluruh4 + $total_satuan4;
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$jenis_pengeluaran4.'</td>';
                        echo '<td >'.$item4.'</td>';
                        echo '<td >'.$satuan4.'</td>';
                        echo '<td >'.$volume4.'</td>';
                        echo '<td align="right">Rp. '.number_format($harga_satuan4,2,',','.').'</td>';
                        echo '<td align="right">Rp. '.number_format($total_satuan4,2,',','.').'</td>';
                        echo '</tr>';
                        $no++;
                      }
              ?>
              
              <?php
              $total_all = $total_seluruh + $total_seluruh2 + $total_seluruh3;
              $persen_honor = ($total_seluruh / $total_all) * 100;
              $persen_perjalanan = ($total_seluruh2 / $total_all) * 100;
              $persen_bahan = ($total_seluruh3 / $total_all) * 100;
              $persen_lain2 = ($total_seluruh4 / $total_all) * 100;
              ?>
            </tbody>
            <tfoot>
            <tr class="totals-row">
              <td colspan="5" class="wide-cell"></td>
              <td style="text-align:right;"><strong>Total (Rp)</strong></td>
              <td coslpan="1"  align="right"><?php echo number_format($total_all,2,',','.'); ?></td>
            </tr>
          </tfoot>
          </table>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Detail RAB sebagai berikut: <b> Honor (<?php echo number_format($persen_honor,2,',','.'); ?> %) </b> , <b> Bahan Habis Pakai (<?php echo number_format($persen_bahan,2,',','.'); ?> %) </b> , <b> Perjalanan (<?php echo number_format($persen_perjalanan,2,',','.'); ?> %) </b> , <b> Lain-lain (<?php echo number_format($persen_lain2,2,',','.'); ?> %) </b>
          </p>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <h4>Subtansi Proposal Penelitian</h4>
          <?php
          include 'config.php';
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
          $sql7  = $conn->query("SELECT * FROM tb_file_subtansi_usulan_penelitian WHERE id_usulan = '$id_usulan'");
          $data7 = mysqli_fetch_assoc($sql7);
          $file1 = $data7['file_substansi'];
          $file1 = base64_encode($file1);
          $file2 = $data7['lampiran_1'];
          $file2 = base64_encode($file2);
          $file3 = $data7['lampiran_2'];
          $file3 = base64_encode($file3);
          $file4 = $data7['lampiran_3'];
          $file4 = base64_encode($file4);
          $id_usulan_s = base64_encode($id_usulan);
          ?>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Klik link berikut untuk melihat Proposal Penelitian <a target="_blank" class="btn btn-default btn-xs" href="viewer.php?file=<?php echo $file1; ?>" role="button"><i class="fa fa-eye"></i> Lihat</a>
          </p>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <h4>Dokumen Pendukung</h4>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Klik link berikut untuk melihat CV / Biodata Peneliti <a target="_blank" class="btn btn-default btn-xs" href="viewer.php?file=<?php echo $file2; ?>" role="button"><i class="fa fa-eye"></i> Lihat</a>
          </p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Klik link berikut untuk melihat Surat Pernyataan <a target="_blank" class="btn btn-default btn-xs" href="viewer.php?file=<?php echo $file3; ?>" role="button"><i class="fa fa-eye"></i> Lihat</a>
          </p>
          <?php
          if($file4 !== "tes"){
            echo '<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Klik link berikut untuk melihat Bukti Kerjasama/MoU <a target="_blank" class="btn btn-default btn-xs" href="viewer.php?file='.$file4.'" role="button"><i class="fa fa-eye"></i> Lihat</a>';
          }
          ?>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <h4>Download Semua Dokumen File</h4>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Klik link berikut untuk meng-unduh semua file tersedia <a target="_blank" class="btn btn-default btn-xs" href="view.php?id_usulan=<?php echo $id_usulan ?>" role="button"><i class="fa fa-download"></i> Unduh</a>
          </p>
        </div>
      </div>
      <div class="row no-print">
        <div class="col-xs-12">
         <a target="_blank" class="btn btn-primary" href="cetak_usulan.php?id_usulan=<?php echo base64_encode($id_usulan); ?>" role="button"><i class="fa fa-print"></i> Print</a>
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
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
