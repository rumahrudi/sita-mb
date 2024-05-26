<link rel="stylesheet" href="dist/css/app.css">
<script src="dist/js/sweetalert2.all.min.js"></script>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include 'config.php';
include 'Bcrypt.php';

if($_GET['aksi'] == "tambah"){

                      session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $nik             = mysqli_real_escape_string($conn,$_POST['nik']);
                        $nama            = mysqli_real_escape_string($conn,$_POST['nama']);
                        $role            = mysqli_real_escape_string($conn,$_POST['jabatan']);
                        $email         = mysqli_real_escape_string($conn,$_POST['email']);
                                              
                        if($nik && $role && $nama){
                              ////proses biodata
                               $in = $conn->query("INSERT INTO `tb_user` (`id_user`, `nik`, `nama`, `email`, `jabatan`) VALUES (NULL, '$nik', '$nama', '$email', '$role');");  


                                if($in){

                                 echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Pengguna telah didaftarkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=list_dosen');
                                     } ,3000); 
                                    </script>
                                  ";
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("User Gagal ditambah"); document.location="index.php?page=list_peneliti";</script>';
                                  echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Pengguna gagal didaftarkan',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_dosen');
                                       } ,3000); 
                                      </script>
                                  "; 
                                }
                              }
                        else{
                         //echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_peneliti";</script>';
                                  echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Data isian tidak boleh kosong',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_dosen');
                                       } ,3000); 
                                      </script>
                                  "; 
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "tambah_mhs"){

                      session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $nik             = mysqli_real_escape_string($conn,$_POST['nik']);
                        $nama            = mysqli_real_escape_string($conn,$_POST['nama']);
                        $role            = mysqli_real_escape_string($conn,$_POST['jabatan']);
                        $email           = mysqli_real_escape_string($conn,$_POST['email']);
                                              
                        if($nik && $role && $nama){
                              ////proses biodata
                               $in = $conn->query("INSERT INTO `tb_user_mhs` (`id_user_mhs`, `nim`, `nama`, `email`, `jabatan`,`status`,`no_wa`,`email_lain`) VALUES (NULL, '$nik', '$nama', '$email', '$role','Aktif','-','-');");  

                                if($in){

                                 echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Pengguna telah didaftarkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=list_mhs');
                                     } ,3000); 
                                    </script>
                                  ";
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("User Gagal ditambah"); document.location="index.php?page=list_peneliti";</script>';
                                  echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Pengguna gagal didaftarkan',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_mhs');
                                       } ,3000); 
                                      </script>
                                  "; 
                                }
                              }
                        else{
                         //echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_peneliti";</script>';
                                  echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Data isian tidak boleh kosong',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_mhs');
                                       } ,3000); 
                                      </script>
                                  "; 
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "import_tambah_mhs"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);

                        if ($token_session === $token_post) {
              

                        if(isset($_POST['import'])){ // Jika user mengklik tombol Import
                          $nama_file_baru = 'data.xlsx';
                          
                          // Load librari PHPExcel nya
                          require_once 'PHPExcel/PHPExcel.php';
                          
                          $excelreader = new PHPExcel_Reader_Excel2007();
                          $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
                          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                          
                          // Buat query Insert
                          
                          
                          $numrow = 1;
                          foreach($sheet as $row){
                           $nik = $row['A']; // Ambil data NIS

                              //cek api
                              $searchText = $nik;
                              //$searchText = '113105';
                              $ch = curl_init('http://sid.polibatam.ac.id/apilogin/web/api/auth/cek-id?id='.$searchText.'');
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                              $result = json_decode(curl_exec($ch));

                              if($result->status == "success") {
                                $nik= $result->data->nim_nik_unit;
                                $name= $result->data->name;
                                $email=$result->data->email;
                                $jabatan=$result->data->jabatan;
                               }

                              $in = $conn->query("INSERT INTO `tb_user_mhs` (`id_user_mhs`, `nim`, `nama`, `email`, `jabatan`,`status`) VALUES (NULL, '$nik', '$name', '$email', '$role','Aktif');");
                            
                            $numrow++; // Tambah 1 setiap kali looping
                        }

                        header('location: index.php?page=list_mhs'); // Redirect ke halaman awal  
                        }          
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "tambah_kompetensi"){

                      session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_user             = mysqli_real_escape_string($conn,$_POST['id_user']);
                        $kompetensi             = mysqli_real_escape_string($conn,$_POST['provinsi']);
                                              
                        if($id_user && $kompetensi){
                              ////proses biodata
                               $in = $conn->query("INSERT INTO `tb_kompetensi` (`id_kompetensi`, `id_user`, `kompetensi`) VALUES (NULL, '$id_user', '$kompetensi');");  

                                if($in){
                                  echo '<script language="javascript">document.location="index.php?page=identitas";</script>';
                                }
                                else
                                {
                                  echo '<script language="javascript">alert(" Gagal ditambah"); document.location="index.php?page=identitas";</script>';
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=identitas";</script>';
                                 
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}


if($_GET['aksi'] == "update_identitas"){

	 session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_user    = mysqli_real_escape_string($conn,$_POST['id_user']);
                        if ($token_session === $token_post) {

                        $nama               = mysqli_real_escape_string($conn,$_POST['nama']);
                        $email              = mysqli_real_escape_string($conn,$_POST['email']);
                                              
                        if($nama && $email && $id_user){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_user` SET 
                                `nama` = '$nama', 
                                `email` = '$email'
                                 WHERE `tb_user`.`id_user` = $id_user;");

                                if($in){
                                //echo '<script language="javascript">alert("Identitas Berhasil di perbaharui"); document.location="index.php?page=identitas";</script>';
                                echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'success',
                                    title: 'Identitas berhasil diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=identitas');
                                       } ,3000); 
                                      </script>
                                  ";
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("Identitas Gagal di update"); document.location="index.php?page=identitas";</script>';
                                   echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Identitas gagal diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=identitas');
                                       } ,3000); 
                                      </script>
                                  ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=identitas";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "update_identitas_mhs"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_user    = mysqli_real_escape_string($conn,$_POST['id_user']);
                        if ($token_session === $token_post) {

                        $nama               = mysqli_real_escape_string($conn,$_POST['nama']);
                        $email              = mysqli_real_escape_string($conn,$_POST['email']);
                        $email_lain         = mysqli_real_escape_string($conn,$_POST['email_lain']);
                        $no_wa              = mysqli_real_escape_string($conn,$_POST['no_wa']);
                                              
                        if($nama && $email && $id_user){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_user_mhs` SET 
                                `nama` = '$nama', 
                                `email` = '$email',
                                `email_lain` = '$email_lain',
                                `no_wa` = '$no_wa'
                                 WHERE `tb_user_mhs`.`id_user_mhs` = $id_user;");

                                if($in){
                                //echo '<script language="javascript">alert("Identitas Berhasil di perbaharui"); document.location="index.php?page=identitas";</script>';
                                echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'success',
                                    title: 'Identitas berhasil diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=identitas_mhs');
                                       } ,3000); 
                                      </script>
                                  ";
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("Identitas Gagal di update"); document.location="index.php?page=identitas";</script>';
                                   echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Identitas gagal diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=identitas_mhs');
                                       } ,3000); 
                                      </script>
                                  ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=identitas_mhs";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "update_identitas_pribadi"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_user    = mysqli_real_escape_string($conn,$_POST['id_user']);
                        if ($token_session === $token_post) {

                        $alamat             = mysqli_real_escape_string($conn,$_POST['alamat']);
                        $tempat_lahir       = mysqli_real_escape_string($conn,$_POST['tempat']);
                        $tanggal_lahir      = mysqli_real_escape_string($conn,$_POST['tanggal']);
                        $no_ktp             = mysqli_real_escape_string($conn,$_POST['no_ktp']);
                        $no_hp              = mysqli_real_escape_string($conn,$_POST['no_hp']);
                        
                                              
                        if($alamat && $tempat_lahir && $tanggal_lahir){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_identitas_peneliti` SET 
                                `alamat` = '$alamat', 
                                `tempat_lahir` = '$tempat_lahir', 
                                `no_ktp` = '$no_ktp', 
                                `no_hp` = '$no_hp'
                                 WHERE `tb_identitas_peneliti`.`id_user` = $id_user;");

                                if($in){
                                //echo '<script language="javascript">alert("Identitas Berhasil di perbaharui"); document.location="index.php?page=identitas";</script>';
                                echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'success',
                                    title: 'Identitas berhasil diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=identitas');
                                       } ,3000); 
                                      </script>
                                  ";   
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("Identitas Gagal di update"); document.location="index.php?page=identitas";</script>';
                                  echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Identitas gagal diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=identitas');
                                       } ,3000); 
                                      </script>
                                  "; 
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=identitas";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}
 

if($_GET['aksi'] == "delete"){

	$id = abs((int)$_GET['id']);
    $cek = $conn->query("SELECT * FROM tb_user WHERE nik ='$id'");
  	if(mysqli_num_rows($cek) != 0){
    $del = $conn->query("DELETE FROM tb_user WHERE nik ='$id'");
    $del2 = $conn->query("DELETE FROM tb_user WHERE nik ='$id'");
    if($del){
    echo '<script language="javascript">alert("Dosen berhasil dihapus."); document.location="index.php?page=list_dosen";</script>';
    }else{
    echo '<script language="javascript">alert("Dosen Gagal dihapus."); document.location="index.php?page=list_dosen";</script>';
    }
  	}else{
    echo '<script language="javascript">alert("Dosen tidak ditemukan."); document.location="index.php?page=list_dosen";</script>';
                      }
}
//http://localhost/klik_ta/proses_user.php?aksi=delete_mhs&id=3411911053

if($_GET['aksi'] == "delete_mhs"){

  $id = $_GET['id'];
    $cek = $conn->query("SELECT * FROM `tb_user_mhs` WHERE nim = '$id'");
    if(mysqli_num_rows($cek) != 0){
    $del = $conn->query("DELETE FROM tb_user_mhs WHERE nim = '$id'");
    if($del){
    echo '<script language="javascript">alert("Mahasiswa berhasil dihapus."); document.location="index.php?page=list_mhs";</script>';
    }else{
    echo '<script language="javascript">alert("Mahasiswa Gagal dihapus."); document.location="index.php?page=list_mhs";</script>';
    }
    }else{
    echo '<script language="javascript">alert("Mahasiswa tidak ditemukan."); document.location="index.php?page=list_mhs";</script>';
                      }
}

if($_GET['aksi'] == "hapus_kom"){

  $id = $_GET['id'];
    $cek = $conn->query("SELECT * FROM `tb_kompetensi` WHERE id_kompetensi = '$id'");
    if(mysqli_num_rows($cek) != 0){
    $del = $conn->query("DELETE FROM tb_kompetensi WHERE id_kompetensi = '$id'");
    if($del){
    echo '<script language="javascript"> document.location="index.php?page=identitas";</script>';
    }else{
    echo '<script language="javascript"> document.location="index.php?page=identitas";</script>';
    }
    }else{
    echo '<script language="javascript"> document.location="index.php?page=identitas";</script>';
                      }
}
?>