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
  <title>SITA | List Mahasiswa Bimbingan</title>
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
                    <h3 class="box-title">Nilai Mahasiswa Bimbingan Baru</h3>
                    
                </div><!-- /.box-header -->             

    <section class="transaksi-lists">
    <div class="">
    <div class="box-body table-responsive">
        <table id="load" class="table table-hover" data-page-length="50">
          <thead>
                <tr>
                 <th>ID</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Judul</th>
                  <th >Seminar Proposal</th>
                  <th >Sidang Akhir</th>
                  <th width="10%">Beri Nilai</th>
                </tr>
              </thead>
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_dosen = $id");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_mhs = $data['id_mhs'];
                        $sql2  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = $id_mhs");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql3  = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE id_tugas_akhir = '$id_mhs' AND jenis_sidang = 'Seminar Proposal' ORDER BY id_jadwal DESC LIMIT 1;");
                        $data3 = mysqli_fetch_assoc($sql3);

                        $idjadwal = $data3['id_jadwal'];
                        $id_ta    = $data3['id_tugas_akhir'];
                        //$id_mhs    = $data3['id_tugas_akhir'];
                        $iddosen  = $data3['penguji_1'];
                        $iddosen2 = $data3['penguji_2'];
                        $jenis_sidang = $data3['jenis_sidang'];

                        //$sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen' ;");
                        //$data6 = mysqli_fetch_assoc($sql6);

                        $sql62  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen' ;");
                        $data62 = mysqli_fetch_assoc($sql62);                   
                        $komentar = $data62['catatan_perbaikan'];
                        $sidang_ulang = $data62['sidang_ulang'];
                           
                        //$sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen2' ;");
                        //$data7 = mysqli_fetch_assoc($sql7);

                        $sql72  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen2' ;");
                        $data72 = mysqli_fetch_assoc($sql72);
                        $komentar2 = $data72['catatan_perbaikan'];
                        $sidang_ulang2 = $data72['sidang_ulang'];
                        
                        $sql4  = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE id_tugas_akhir = '$id_mhs' AND jenis_sidang = 'Sidang Akhir' ORDER BY id_jadwal DESC LIMIT 1;");
                        $data4 = mysqli_fetch_assoc($sql4);

                        $idjadwal2 = $data4['id_jadwal'];
                        $iddosen_ta2  = $data4['penguji_1'];
                        $iddosen_ta2_2 = $data4['penguji_2'];
                        $jenis_sidang_ta2 = $data4['jenis_sidang'];

                        //$sql8  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal2' AND id_dosen = '$iddosen_ta2';");
                        //$data8 = mysqli_fetch_assoc($sql8);

                        $sql82  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal2' AND id_dosen = '$iddosen_ta2';");
                        $data82 = mysqli_fetch_assoc($sql82);

                        $komentar_ta2 = $data82['catatan_perbaikan'];
                        $sidang_ulang_ta2 = $data82['sidang_ulang'];

                        //$sql9  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal2' AND id_dosen = '$iddosen_ta2_2';");
                        //$data9 = mysqli_fetch_assoc($sql9);

                        $sql92  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal2' AND id_dosen = '$iddosen_ta2_2';");
                        $data92 = mysqli_fetch_assoc($sql92);

                        $komentar_ta2_2 = $data92['catatan_perbaikan'];
                        $sidang_ulang_ta2_2 = $data92['sidang_ulang'];

                        //$sql10  = $conn->query("SELECT * FROM `tb_penilaian_ta1` WHERE id_mhs = '$id_mhs' AND id_dosen = '$id';");
                        //$data10 = mysqli_fetch_assoc($sql10);

                        $sql102  = $conn->query("SELECT * FROM `tb_penilaian_ta1_baru` WHERE id_mhs = '$id_mhs' AND id_dosen = '$id';");
                        $data102 = mysqli_fetch_assoc($sql102);

                        //$sql11  = $conn->query("SELECT * FROM `tb_penilaian_ta2` WHERE id_mhs = '$id_mhs' AND id_dosen = '$id';");
                        //$data11 = mysqli_fetch_assoc($sql11);

                        $sql112  = $conn->query("SELECT * FROM `tb_penilaian_ta2_baru` WHERE id_mhs = '$id_mhs' AND id_dosen = '$id';");
                        $data112 = mysqli_fetch_assoc($sql112);

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data2['nim'].'</td>';
                        echo '<td >'.$data2['nama'].'</td>';
                        echo '<td >'.$data['judul'].'</td>';
                        
                        if(($sidang_ulang == 'tidak') && ($sidang_ulang2 == 'tidak')){
                          echo '<td><span class="label label-success">Lulus</span></td>';
                        }
                        elseif(($sidang_ulang == 'ya') && ($sidang_ulang2 == 'ya')){
                          echo '<td><span class="label label-danger">Sidang Ulang </span></td>';
                        }
                        else{
                          $sql_anggota  = $conn->query("SELECT * FROM `tb_anggota_tugas_akhir` WHERE `id_mhs` =  $id_mhs");
                          $data_anggota = mysqli_fetch_assoc($sql_anggota);
                          if(empty($data_anggota)){
                          echo '<td>-</td>';
                          }else{
                          echo '<td><span class="label label-primary">Anggota TA </span></td>';
                          }
                        }

                        if(($sidang_ulang_ta2 == 'tidak') && ($sidang_ulang_ta2_2 == 'tidak')){
                          echo '<td><span class="label label-success">Lulus</span></td>';
                        }
                        elseif(($sidang_ulang_ta2 == 'ya') && ($sidang_ulang_ta2_2 == 'ya')){
                          echo '<td><span class="label label-danger">Sidang Ulang </span></td>';
                        }
                        else{
                          echo '<td>-</td>';
                        }
                        
                       // if($jenis_sidang == 'Sidang TA 1 / Sidang 1'){
                          echo '<td>';
                          

                          if(empty($data112) AND empty($data11)){
                            echo '&nbsp;<a class="btn btn-primary btn-xs" href="index.php?page=nilai_ta2_baru&id_ta='.base64_encode($id_mhs).'"><i class="fa fa-check"></i> Beri Nilai Akhir</a> ';
                          }
                          else{
                            if(!empty($data11)){
                              echo '&nbsp;<a class="btn btn-success btn-xs" href="index.php?page=nilai_ta2&id_ta='.base64_encode($id_mhs).'"><i class="fa fa-edit"></i> Edit Nilai</a>';
                            }
                            else{
                              echo '&nbsp;<a class="btn btn-success btn-xs" href="index.php?page=nilai_ta2_baru&id_ta='.base64_encode($id_mhs).'"><i class="fa fa-edit"></i> Edit Nilai Akhir</a>';
                            }
                            
                          }
                          
                          
                          echo '</td>';
                      //  }
                      //  elseif($jenis_sidang == 'Sidang TA 2 / Sidang 2 TANPA sidang magang'){
                      //    echo '<td><a class="btn btn-primary btn-xs" href="index.php?page=nilai_ta2&id_ta='.base64_encode($id_mhs).'"><i class="fa fa-check"></i> Beri Nilai</a></td>';
                       // }
                       // else{
                       //   echo '<td><a class="btn btn-warning btn-xs" href="#"><i class="fa fa-close"></i> </a></td>';
                       // }
                        

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
