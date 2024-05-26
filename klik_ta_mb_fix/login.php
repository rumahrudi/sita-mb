<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <title>SITA | Log in</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  


  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <link rel="stylesheet" href="dist/css/app.css">
  <script src="dist/js/sweetalert.min.js"></script>

  <style>
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0; 
            }
            .login-page,.register-page{
                background:#fff
            }
        </style>

  <script src="dist/js/angular.min.js"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!--<img src="img/logo2.png" height="60%" width="180" class="rounded" alt="..."><br>-->
    <a href="index.php?page=home"><b>SI</b>TA</a>
    <h5>Sistem Informasi Tugas Akhir Manajemen Bisnis</h5>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <form action="" method="post" >
      <div class="form-group has-feedback">
        <input type="text" name="username" id="username" class="form-control" placeholder="ID Learning"  autocomplete="off" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
      </div>
      <input type="hidden" name="token" value="9Kylnkoreo7zASjqMh4eEx0Hx9b4h5e2"></input>
       <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="Login" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading" >Sign In</button>
        </div>

         <script type="text/javascript">
          
          $('.btn').on('click', function() {
              var $this = $(this);
            $this.button('loading');
              setTimeout(function() {
                 $this.button('reset');
             }, 5000);
          });
        </script>

    </form>


    <div class="social-auth-links text-center">
    <?php
    include 'config.php';
    include 'Bcrypt.php';
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

    if($_POST['login']){
      
      $user = mysqli_real_escape_string($conn,$_POST['username']);
      $pass = mysqli_real_escape_string($conn,$_POST['password']);
      $token = mysqli_real_escape_string($conn,$_POST['password']);
      //$token = base64_decode($token);

      $data = array(
                "username"        => $_POST['username'],
                "password"        => $_POST['password'],
                "token"           => $_POST['token'],
            );

            $ch = curl_init('http://sid.polibatam.ac.id/apilogin/web/api/auth/login');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch));

            //echo "<pre>";
            //print_r($result);
            //echo "</pre>";

            echo "Status    : ".$result->status.'<br>';
            echo "Message   : ".$result->message.'<br>';

            if($result->status == "success") {

                //echo "ID        : ".$result->data->id.'<br>';
                //echo "Username  : ".$result->data->username.'<br>';
                //echo "Name      : ".$result->data->name.'<br>';
                //echo "Email     : ".$result->data->email.'<br>';
                //echo "Jabatan   : ".$result->data->jabatan.'<br>';
                $nik = $result->data->nim_nik_unit;
                $nama = $result->data->name;
                $email = $result->data->email;
                $jabatan = $result->data->jabatan;

                if($user && $pass){
                  if($jabatan == "Dosen"){
                    $cek = $conn->query("SELECT * FROM tb_user WHERE nik = '$nik'");
                    $data = mysqli_fetch_assoc($cek);
                    $user_nik = $data['nik'];
                    $user_role = $data['jabatan'];
                    $user_id = $data['id_user'];
                    $nama = $data['nama'];
                  
                    session_start();
                    $_SESSION['user_nik'] = $user_nik;
                    $_SESSION['user_jabatan'] = $user_role;
                    $_SESSION['user_reviewer'] = $user_reviewer;
                    $_SESSION['id_user'] = $user_id;
                    $_SESSION['nama'] = $nama;
                    
                    $length = 32;
                    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
                  }
                  if($jabatan == "Mahasiswa"){
                    $cek = $conn->query("SELECT * FROM tb_user_mhs WHERE nim = '$nik'");
                    $data = mysqli_fetch_assoc($cek);
                    $user_nik = $data['nim'];
                    $user_role = $data['jabatan'];
                    $user_id = $data['id_user_mhs'];
                    $nama = $data['nama'];
                    $status_mhs = $data['status'];
                  
                    session_start();
                    $_SESSION['user_nik'] = $user_nik;
                    $_SESSION['user_jabatan'] = $user_role;
                    $_SESSION['user_reviewer'] = $user_reviewer;
                    $_SESSION['id_user'] = $user_id;
                    $_SESSION['nama'] = $nama;
                    $_SESSION['status_mhs'] = $status_mhs;
                    
                    $length = 32;
                    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
                  }
                  if($jabatan == "Pegawai"){
                    $cek = $conn->query("SELECT * FROM tb_user WHERE nik = '$nik'");
                    $data = mysqli_fetch_assoc($cek);
                    $user_nik = $data['nik'];
                    $user_role = $data['jabatan'];
                    $user_id = $data['id_user'];
                    $nama = $data['nama'];
                  
                    session_start();
                    $_SESSION['user_nik'] = $user_nik;
                    $_SESSION['user_jabatan'] = $user_role;
                    $_SESSION['user_reviewer'] = $user_reviewer;
                    $_SESSION['id_user'] = $user_id;
                    $_SESSION['nama'] = $nama;
                    
                    $length = 32;
                    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
                  }
                if(mysqli_num_rows($cek) != 0){                   
                    if($user_role == "Dosen"){
                      echo "
                      <script type='text/javascript'>
                       setTimeout(function () { 
                       swal({
                                  title: 'Login Berhasil',
                                  text:  'Harap tunggu anda akan diarahkan ke page Dashboard',
                                  type: 'success',
                                  timer: 2000,
                                  showConfirmButton: true
                              });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=dashboard');
                       } ,3000); 
                      </script>
                      ";
                    }     
                    if($user_role == "Mahasiswa"){
                      if($status_mhs == "Aktif"){
                        echo "
                        <script type='text/javascript'>
                         setTimeout(function () { 
                         swal({
                                    title: 'Login Berhasil',
                                    text:  'Harap tunggu anda akan diarahkan ke page Dashboard Mahasiswa',
                                    type: 'success',
                                    timer: 2000,
                                    showConfirmButton: true
                                });  
                         },10); 
                         window.setTimeout(function(){ 
                          window.location.replace('index.php?page=dashboard2');
                         } ,3000); 
                        </script>
                        ";
                      }
                      if($status_mhs == "Lulus"){
                        echo "
                        <script type='text/javascript'>
                         setTimeout(function () { 
                         swal({
                                    title: 'Login Berhasil',
                                    text:  'Harap tunggu anda akan diarahkan ke page Dashboard Mahasiswa',
                                    type: 'success',
                                    timer: 2000,
                                    showConfirmButton: true
                                });  
                         },10); 
                         window.setTimeout(function(){ 
                          window.location.replace('index.php?page=dashboard2');
                         } ,3000); 
                        </script>
                        ";
                      }
                      elseif ($status_mhs == "Non-aktif"){
                        echo "
                        <script type='text/javascript'>
                         setTimeout(function () { 
                         swal({
                                    title: 'Login Berhasil',
                                    text:  'Akun di nonaktifkan',
                                    type: 'success',
                                    timer: 2000,
                                    showConfirmButton: true
                                });  
                         },10); 
                         window.setTimeout(function(){ 
                          window.location.replace('index.php?page=home');
                         } ,3000); 
                        </script>
                        ";
                      }
                     
                    } 
                    if($user_role == "Admin"){
                      echo "
                      <script type='text/javascript'>
                       setTimeout(function () { 
                       swal({
                                  title: 'Login Berhasil',
                                  text:  'Harap tunggu anda akan diarahkan ke page Dashboard Admin',
                                  type: 'success',
                                  timer: 2000,
                                  showConfirmButton: true
                              });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=admin');
                       } ,3000); 
                      </script>
                      ";
                    }   
                    if($user_role == "TU"){
                      echo "
                      <script type='text/javascript'>
                       setTimeout(function () { 
                       swal({
                                  title: 'Login Berhasil',
                                  text:  'Harap tunggu anda akan diarahkan ke page Dashboard Tata Usaha',
                                  type: 'success',
                                  timer: 2000,
                                  showConfirmButton: true
                              });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=tu');
                       } ,3000); 
                      </script>
                      ";
                    }  

                }
                else{
                  if($jabatan == "Dosen"){
                 // $in = $conn->query("INSERT INTO `tb_user` (`id_user`, `nik`, `nama`, `email`, `jabatan`) VALUES (NULL, '$nik', '$nama', '$email', '$jabatan');");   
                 //   if($in){
                 //     session_start();
                 //     $_SESSION['user_nik'] = $nik;
                  //    $_SESSION['user_jabatan'] = $jabatan;
                      //$_SESSION['id_user'] = $user_id;
                //      $_SESSION['nama'] = $nama;
                      
                 //     $length = 32;
                  //    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);

                      echo "
                      <script type='text/javascript'>
                       setTimeout(function () { 
                       swal({
                                  title: 'Login Berhasil',
                                  text:  'Namun dosen belum didaftarkan di sistem, silahkan hubungi Koordinator TA',
                                  type: 'success',
                                  timer: 3000,
                                  showConfirmButton: true
                              });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=home');
                       } ,3000); 
                      </script>
                      ";
                  //  }
                  }
                  if($jabatan == "Mahasiswa"){
                  //$in = $conn->query("INSERT INTO `tb_user_mhs` (`id_user_mhs`, `nim`, `nama`, `email`, `jabatan`) VALUES (NULL, '$nik', '$nama', '$email', '$jabatan');");   
                  //  if($in){
                  //    session_start();
                  //    $_SESSION['user_nik'] = $nik;
                   //   $_SESSION['user_jabatan'] = $jabatan;
                      //$_SESSION['id_user'] = $user_id;
                  //    $_SESSION['nama'] = $nama;
                      
                 //     $length = 32;
                  //    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);

                      echo "
                      <script type='text/javascript'>
                       setTimeout(function () { 
                       swal({
                                  title: 'Login Berhasil',
                                  text:  'Namun mahasiswa belum didaftarkan di sistem, Hubungi koordinator TA.',
                                  type: 'success',
                                  timer: 3000,
                                  showConfirmButton: true
                              });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=home');
                       } ,3000); 
                      </script>
                      ";
                   // }
                  }   
                }

                }
              }else{
                echo '<div class="error">ERROR: Yang bertanda * tidak boleh kosong.</div>';
              }
                    
    }
      
    
    ?>
    </div>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
