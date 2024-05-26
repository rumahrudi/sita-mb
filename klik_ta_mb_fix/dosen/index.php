<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
$nama = $_SESSION['nama'];
?>

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
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">



  <script src="../bower_components/jquery/dist/jquery.min.js"></script>

  <link rel="stylesheet" href="../dist/css/app.css">
  <script src="../dist/js/sweetalert.min.js"></script>

  <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0;
    }

    .login-page,
    .register-page {
      background: #fff
    }
  </style>

  <link href="../bower_components/select2/select2.min.css" rel="stylesheet" />
  <link href="../bower_components/select2/select2-bootstrap.min.css" rel="stylesheet" />
  <script src="../bower_components/select2/select2.min.js"></script>

  <script type="text/javascript">
    $(function() {
      $('.select2').select2({
        minimumInputLength: 3,
        allowClear: true,
        placeholder: 'masukkan nama dosen',
        ajax: {
          dataType: 'json',
          url: 'daftarMhs.php',
          delay: 800,
          data: function(params) {
            return {
              search: params.term
            }
          },
          processResults: function(data, page) {
            return {
              results: data
            };
          },
        }
      }).on('select2:select', function(evt) {
        var data = $(".select2 option:selected").text();
        alert("Data yang dipilih adalah " + data);
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <!--<img src="img/logo2.png" height="60%" width="180" class="rounded" alt="..."><br>-->
      <a href="index.php?page=home"><b>SI</b>TA</a>
      <h5>Sistem Informasi Tugas Akhir Teknik Informatika <?php echo $nama; ?></h5>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <form action="" method="post">
        <div class="form-group has-feedback">
          <select name="id_mhs" class="form-control select2" style="width: 100%">
            <option>Pilih Dosen</option>
          </select>
        </div>

        <input type="hidden" name="token" value="9Kylnkoreo7zASjqMh4eEx0Hx9b4h5e2"></input>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="Login" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading">Sign In</button>
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
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

        if ($_POST['login']) {
          
          $id_mhs = mysqli_real_escape_string($conn, $_POST['id_mhs']);

          $cek = $conn->query("SELECT * FROM tb_user WHERE id_user = '$id_mhs'");
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

          if ($cek) {
            echo "
                        <script type='text/javascript'>
                         setTimeout(function () { 
                         swal({
                                    title: 'Login Berhasil',
                                    text:  'Harap tunggu anda akan diarahkan ke page Dashboard Dosen ".$nama."',
                                    type: 'success',
                                    timer: 2000,
                                    showConfirmButton: true
                                });  
                         },10); 
                         window.setTimeout(function(){ 
                          window.location.replace('../index.php?page=dashboard');
                         } ,3000); 
                        </script>
                        ";
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
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>

</html>