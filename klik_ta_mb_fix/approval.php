<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible " content="IE=edge">
  <title>TugasAkhir | Teknik Informatika</title>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        
<script>
$(document).ready(function(){

   $("#email").keyup(function(){

      var email = $(this).val().trim();

      if(email != ''){

         $.ajax({
            url: 'cek_email.php',
            type: 'post',
            data: {email: email},
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

<script>
$(document).ready(function(){
 
 $('#asal_kampus').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"search.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>

    
</head>
<body class="hold-transition skin-blue-light layout-top-nav">

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

    <!-- /.modal update profile -->



  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row" style="margin-top:10px;">
          <div class="col-md-12">
              <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Detail Approval </h3>
                    </div>
                    <div class="box-body">
                    <?php
                      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                      include 'config.php';
                      session_start();
                      $id     = mysqli_real_escape_string($conn,$_GET['id']);
                      $id     = base64_decode($id);
                      
                          $sql = $conn->query("SELECT * FROM `tb_qr_sign` WHERE id_sign = $id;");
                          $data = mysqli_fetch_assoc($sql);
                          $id_mhs = $data['id_user_mhs'];
                          $id_dosen = $data['id_user'];

                          $sql2 = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = $id_mhs;");
                          $data2 = mysqli_fetch_assoc($sql2);

                          $sql3 = $conn->query("SELECT * FROM `tb_user` WHERE id_user = $id_dosen;");
                          $data3 = mysqli_fetch_assoc($sql3);
                            
                    ?>  
                     <form class="form-horizontal" role="form">

                      <input type="hidden" id="token" name="token" class="form-control" value="94a08da1fecbb6e8b46990538c7b50b2">

                      <div class="form-group">
                        <label  class="col-sm-2 control-label" for="inputEmail3">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data2['nama']; ?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-2 control-label" for="inputEmail3">NIM</label>
                        <div class="col-sm-10">
                          <input type="text" name="nim" id="nim" class="form-control" value="<?php echo $data2['nim']; ?>" readonly="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label  class="col-sm-2 control-label" for="inputEmail3">Perihal</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="3" placeholder="Deskripsikan Usaha / Produk / Layanan" name="deskripsi" id="deskripsi" readonly><?php echo $data['perihal']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-2 control-label" for="inputEmail3">Penandatangan</label>
                        <div class="col-sm-10">
                          <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data3['nama']; ?>" readonly="">
                        </div>
                      </div>
                      
                      

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          
                        </div>
                      </div>
                    </form>
                   
                    
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
<!-- /.modal -->

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
