<link rel="stylesheet" href="dist/css/app.css">
<script src="dist/js/sweetalert2.all.min.js"></script>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include "config.php";

use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;

                        require_once "library/PHPMailer.php";
                        require_once "library/Exception.php";
                        require_once "library/OAuth.php";
                        require_once "library/POP3.php";
                        require_once "library/SMTP.php";

function kirimEmail($nama_mhs, $nama_dosen, $email_dosen, $jenis_notifikasi) {
  
                        session_start();
                        $token_session = '94a08da1fecbb6e8b46990538c7b50b2';
                        $token_post    = '94a08da1fecbb6e8b46990538c7b50b2';

                        if ($token_session === $token_post) {

                        $mail = new PHPMailer;

                        //Enable SMTP debugging.
                        //$mail->SMTPDebug = 3;
                        $mail->SMTPDebug = 0;
                        //Set PHPMailer to use SMTP.
                        $mail->isSMTP();
                        //Set SMTP host name
                        $mail->Host = "tls://smtp.gmail.com"; //host mail server
                        //Set this to true if SMTP host requires authentication to send email
                        $mail->SMTPAuth = true;
                        //Provide username and password
                        $mail->Username = "notifikasi.sita@gmail.com";   //nama-email smtp
                        $mail->Password = "Dinkdonk99!";           //password email smtp
                        //If SMTP requires TLS encryption then set it
                        $mail->SMTPSecure = "ssl";
                        //Set TCP port to connect to
                        $mail->Port = 587;

                        $mail->From = "notifikasi.sita@gmail.com"; //email pengirim
                        $mail->FromName = "SITA - Sistem Informasi TA"; //nama pengirim

                        $nama_penerima = $nama_dosen;

                        $mail->addAddress($email_dosen, $nama_penerima); //email penerima

                        $mail->isHTML(true);

                        $mail->Subject = $jenis_notifikasi; //subject
                        $mail->Body    = 'Hai, '.$nama_dosen.',  silahkan cek SITA ada '.$jenis_notifikasi.' dari '.$nama_mhs.'.'; //isi email
                        $mail->AltBody = "PHP mailer"; //body email

                        if(!$mail->send())
                        {
                        //echo "Mailer Error: " . $mail->ErrorInfo;
                        }
                        else
                        {
                        //echo "Message has been sent successfully";
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}


if($_GET['aksi'] == "update"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_mhs     = mysqli_real_escape_string($conn,$_POST['id_user']);

                        if ($token_session === $token_post) {

                        $judul             = mysqli_real_escape_string($conn,$_POST['judul']);
                        $judul_inggris             = mysqli_real_escape_string($conn,$_POST['judul_inggris']);
                        $deskripsi         = mysqli_real_escape_string($conn,$_POST['deskripsi']);
                                              
                        if($judul && $deskripsi){

                          $in = $conn->query("UPDATE `tb_tugas_akhir` SET `judul` = '$judul', `judul_inggris` = '$judul_inggris', `deskripsi` = '$deskripsi' WHERE `tb_tugas_akhir`.`id_mhs` = '$id_mhs';");
                              
                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Identitas TA berhasil diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=identitas_ta');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Identitas TA gagal diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=identitas_ta');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=identitas_ta";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "ubah_status_sidang"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_ta     = mysqli_real_escape_string($conn,$_GET['id_ta']);

                        if ($token_session === $token_post) {

                        $status             = mysqli_real_escape_string($conn,$_GET['status']);
                        //$deskripsi         = mysqli_real_escape_string($conn,$_GET['deskripsi']);
                                              
                        if($status && $id_ta){

                          $in = $conn->query("UPDATE `tb_tugas_akhir` SET `status` = '$status' WHERE `tb_tugas_akhir`.`id_mhs` = '$id_ta';");
                              
                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Set Status Sidang berhasil diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=list_judul_pembimbing');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Set Status Sidang gagal diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=list_judul_pembimbing');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_judul_pembimbing";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "ubah_group"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_mhs     = mysqli_real_escape_string($conn,$_GET['id_mhs']);

                        if ($token_session === $token_post) {

                        $group             = mysqli_real_escape_string($conn,$_GET['group']);
                        //$deskripsi         = mysqli_real_escape_string($conn,$_GET['deskripsi']);
                                              
                        if($group && $id_mhs){

                          $in = $conn->query("UPDATE `tb_user_mhs` SET `group` = '$group' WHERE `tb_user_mhs`.`id_user_mhs` = $id_mhs;");
                              
                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Set Status group berhasil diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=list_mhs');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Set Status Group gagal diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=list_mhs');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_mhs";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "ubah_status"){

  session_start();
                       $token_session = $_SESSION['token'];
                       $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                       $id_mhs        = mysqli_real_escape_string($conn,$_GET['id_mhs']);

                       if ($token_session === $token_post) {

                       $status             = mysqli_real_escape_string($conn,$_GET['status']);
                       //$deskripsi         = mysqli_real_escape_string($conn,$_GET['deskripsi']);
                                             
                       if($status && $id_mhs){

                         $in = $conn->query("UPDATE `tb_user_mhs` SET `status` = '$status' WHERE `tb_user_mhs`.`id_user_mhs` = $id_mhs;");
                             
                               if($in){
                               //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                               echo "
                                   <script type='text/javascript'>
                                    setTimeout(function () { 
                                       Swal.fire({
                                         type: 'success',
                                         title: 'Set Status berhasil diperbaharui',
                                         showConfirmButton: false
                                       });  
                                            },10); 
                                            window.setTimeout(function(){ 
                                             window.location.replace('index.php?page=list_mhs');
                                            } ,2000); 
                                           </script>
                                     "; 
                               }
                               else
                               {
                                 //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                 //echo("Error description: " . $conn -> error);
                                 echo "
                                   <script type='text/javascript'>
                                    setTimeout(function () { 
                                       Swal.fire({
                                         type: 'error',
                                         title: 'Set Status gagal diperbaharui',
                                         showConfirmButton: false
                                       });  
                                            },10); 
                                            window.setTimeout(function(){ 
                                             window.location.replace('index.php?page=list_mhs');
                                            } ,2000); 
                                           </script>
                                     ";
                               }
                             }
                       else{
                        echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_mhs";</script>';
                       }
                       } else {
                        echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                       }
}

if($_GET['aksi'] == "tambah_anggota"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_mhs     = mysqli_real_escape_string($conn,$_POST['id_mhs']);

                        if ($token_session === $token_post) {

                        $id_user             = mysqli_real_escape_string($conn,$_POST['id_userr']);
                        $uraian             = mysqli_real_escape_string($conn,$_POST['uraian']);
                                              
                        if($id_user && $uraian){
                          
                        if($id_mhs != $id_user){

                          $in = $conn->query("INSERT INTO `tb_anggota_tugas_akhir` (`id_tugas_akhir`, `id_mhs`, `uraian_tugas`) VALUES ('$id_mhs', '$id_user', '$uraian');");

                        }
                        

                         

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Anggota TA berhasil diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=identitas_ta');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Anggota TA gagal diperbaharui atau Anda Tidak Bisa mendaftarkan diri anda sendiri sebagai anggota',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=identitas_ta');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=identitas_ta";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "delete_anggota"){
  session_start();
  $token = $_SESSION['token'];
  $id = $_GET['id'];

    $cek = $conn->query("SELECT * FROM tb_anggota_tugas_akhir WHERE id_mhs ='$id'");
    if(mysqli_num_rows($cek) != 0){
    $del = $conn->query("DELETE FROM tb_anggota_tugas_akhir WHERE id_mhs ='$id' ");
      if($del){
      echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Anggota TA berhasil dihapus',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                             window.location.replace('index.php?page=identitas_ta');
                                             } ,3000); 
                                            </script>
                                      ";  
      }else{
       echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Anggota TA gagal dihapus',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=identitas_ta');
                                             } ,3000); 
                                            </script>
                                      "; 
      }
    }else{
    echo '<script language="javascript">alert("Anggota tidak ditemukan."); document.location="index.php?page=edit_anggota_pengabdian&id_usulan='.$id_usulan_s.'&token='.$token_session.'";</script>';
                      }
}

if($_GET['aksi'] == "delete_laporan"){
  session_start();
  $token = $_SESSION['token'];
  $id = $_GET['id'];
  $id = base64_decode($id);

    $cek = $conn->query("SELECT * FROM tb_laporan_ta WHERE id_laporan ='$id'");
    if(mysqli_num_rows($cek) != 0){
    $del = $conn->query("DELETE FROM `tb_laporan_ta` WHERE `tb_laporan_ta`.`id_laporan` = $id");
      if($del){
      echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan TA berhasil dihapus',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.history.back();
                                             } ,3000); 
                                            </script>
                                      ";  
      }else{
       echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Laporan TA gagal dihapus',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.history.back();
                                             } ,3000); 
                                            </script>
                                      "; 
      }
    }else{
    echo '<script language="javascript">alert("Laporan tidak ditemukan."); window.history.back();</script>';
                      }
}

if($_GET['aksi'] == "tambah"){
session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_mhs     = mysqli_real_escape_string($conn,$_POST['id_mhs']);

                        if ($token_session === $token_post) {

                        $tanggal_logbook    = mysqli_real_escape_string($conn,$_POST['tanggal_logbook']);
                        $kegiatan           = mysqli_real_escape_string($conn,$_POST['kegiatan']);
                        $kemajuan_ta        = mysqli_real_escape_string($conn,$_POST['kemajuan_ta']);
                                              
                        if($tanggal_logbook && $kegiatan && $kemajuan_ta){

                         $in = $conn->query("INSERT INTO `tb_logbook_ta` (`id_logbook`, `id_mhs`, `kemajuan_ta`, `kegiatan`, `tanggal`) VALUES (NULL, '$id_mhs', '$kemajuan_ta', '$kegiatan', '$tanggal_logbook');");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Logbook berhasil ditambahkan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=logbook_bimbingan');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Logbook gagal ditambahkan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=logbook_bimbingan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=logbook_bimbingan";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "update_logbook"){
session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_logbook     = mysqli_real_escape_string($conn,$_POST['id_logbook']);

                        if ($token_session === $token_post) {

                        $tanggal_logbook    = mysqli_real_escape_string($conn,$_POST['tanggal_logbook']);
                        $kegiatan           = mysqli_real_escape_string($conn,$_POST['kegiatan']);
                        $kemajuan_ta        = mysqli_real_escape_string($conn,$_POST['kemajuan_ta']);
                                              
                        if($tanggal_logbook && $kegiatan && $kemajuan_ta){

                         $in = $conn->query("UPDATE `tb_logbook_ta` SET
                           `kemajuan_ta` = '$kemajuan_ta ',
                           `kegiatan` = '$kegiatan', 
                           `tanggal` = '$tanggal_logbook'
                           WHERE `tb_logbook_ta`.`id_logbook` = $id_logbook;");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Logbook berhasil diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=logbook_bimbingan');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Logbook gagal diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=logbook_bimbingan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=logbook_bimbingan";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "request_approval_laporan"){
                        session_start();
                        $token_session = $_SESSION['token'];
                        $nim = $_SESSION['user_nik'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $pilih_sidang    = mysqli_real_escape_string($conn,$_POST['pilih_sidang']);
                        $periode_sidang  = mysqli_real_escape_string($conn,$_POST['skema']);
                        $periode         = str_replace(' ', '', $periode_sidang);
                        $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
                        $tanggal         = date("Ymd");

                        $file_laporan         = $_FILES["laporan"]["name"];
                        $file_magang          = $_FILES["laporan_magang"]["name"];

                        $extension_laporan    = end(explode(".", $file_laporan));
                        $extension_magang     = end(explode(".", $file_magang));

                        $ekstensi_diperbolehkan = array('pdf','PDF');  

                        $nama_mhs  = mysqli_real_escape_string($conn,$_POST['nama_mhs']);               
                        $nama_dosen  = mysqli_real_escape_string($conn,$_POST['nama_dosen']);               
                        $email_dosen  = mysqli_real_escape_string($conn,$_POST['email_dosen']);  
                        $jenis_notifikasi = "Request Approval Laporan TA";

                          if($pilih_sidang && $periode_sidang && $id_mhs){

                            $folderPath = "uploads/tugas_akhir/$nim";
                            $exist = is_dir($folderPath);
                            if(!$exist) {
                              mkdir("$folderPath");
                              chmod("$folderPath", 0775);
                            }

                            $target_path = "uploads/tugas_akhir/temp_uploads/";
                            $target_path .= basename( $_FILES['laporan']['name']);
                            $target_path_3 = "uploads/tugas_akhir/temp_uploads/";
                            $target_path_3 .= basename( $_FILES['laporan_magang']['name']);

                            if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

                            if(move_uploaded_file($_FILES['laporan']['tmp_name'], $target_path)) {
                                    $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan']['name']);

                                    $new_filename1     = $id_mhs .'_laporan_'. $periode . '_' . $tanggal .'.'.  $extension_laporan;
                                    $destination_laporan      = "$folderPath/$new_filename1";

                                    rename($temp_location, $destination_laporan);   
                            }
                            }else{
                            echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            }

                            if((isset($file_magang)) || (in_array($extension_magang, $ekstensi_diperbolehkan) === true) ){
                            if(move_uploaded_file($_FILES['laporan_magang']['tmp_name'], $target_path_3)) {
                                    $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan_magang']['name']);

                                    $new_filename3     = $id_mhs .'_laporanmagang_'. $periode . '_' . $tanggal .'.'.  $extension_magang;
                                    $destination_magang      = "$folderPath/$new_filename3";

                                    rename($temp_location, $destination_magang);   
                            }
                            }else{
                            echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 3 '.$file_magang.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            }


                            $in = $conn->query("INSERT INTO `tb_laporan_ta` (`id_laporan`, `id_mhs`, `id_periode`, `jenis_sidang`, `file_laporan`, `file_magang`, `status`) VALUES (NULL, '$id_mhs', '$periode_sidang', '$pilih_sidang', '$destination_laporan', '$destination_magang', 'Diajukan');");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
                                kirimEmail($nama_mhs, $nama_dosen, $email_dosen, $jenis_notifikasi);
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan Berhasil Diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=request_approval_laporan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Laporan gagal diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=request_approval_laporan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                          else{
                           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=request_approval_laporan";</script>';
                          }

                                        
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "update_request_approval_laporan"){
                        session_start();
                        $token_session = $_SESSION['token'];
                        $nim = $_SESSION['user_nik'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_laporan    = mysqli_real_escape_string($conn,$_POST['id_laporan']);

                        $file_laporan         = $_FILES["laporan"]["name"];
                        //$file_magang          = $_FILES["laporan_magang"]["name"];

                        $extension_laporan    = end(explode(".", $file_laporan));
                        //$extension_magang     = end(explode(".", $file_magang));

                        $ekstensi_diperbolehkan = array('pdf','PDF');  

                        $nama_mhs  = mysqli_real_escape_string($conn,$_POST['nama_mhs']);               
                        $nama_dosen  = mysqli_real_escape_string($conn,$_POST['nama_dosen']);               
                        $email_dosen  = mysqli_real_escape_string($conn,$_POST['email_dosen']);  
                        $jenis_notifikasi = "Request Approval Laporan TA";

                          if($id_laporan && $file_laporan && $extension_laporan){

                            $folderPath = "uploads/tugas_akhir/$nim";
                            $exist = is_dir($folderPath);
                            if(!$exist) {
                              mkdir("$folderPath");
                              chmod("$folderPath", 0775);
                            }
                            unlink($file_laporan);
                            $target_path = "uploads/tugas_akhir/temp_uploads/";
                            $target_path .= basename( $_FILES['laporan']['name']);
                            //$target_path_3 = "uploads/tugas_akhir/temp_uploads/";
                            //$target_path_3 .= basename( $_FILES['laporan_magang']['name']);

                            if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

                            if(move_uploaded_file($_FILES['laporan']['tmp_name'], $target_path)) {
                                    $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan']['name']);

                                    $new_filename1     = $id_mhs .'_laporan_'. $periode . '_' . $tanggal .'.'.  $extension_laporan;
                                    $destination_laporan      = "$folderPath/$new_filename1";

                                    rename($temp_location, $destination_laporan);   
                            }
                            }else{
                            echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            }




                            $in = $conn->query("UPDATE `tb_laporan_ta` SET `file_laporan` = '$destination_laporan', `status` = 'Diajukan' WHERE `tb_laporan_ta`.`id_laporan` = $id_laporan;");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
                                kirimEmail($nama_mhs, $nama_dosen, $email_dosen, $jenis_notifikasi);
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan Berhasil Diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=request_approval_laporan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Laporan gagal diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=request_approval_laporan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                          else{
                           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=request_approval_laporan";</script>';
                          }

                                        
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "request_approval_prasidang"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $pilih_sidang    = mysqli_real_escape_string($conn,$_POST['pilih_sidang']);
  $periode_sidang  = mysqli_real_escape_string($conn,$_POST['skema']);
  $link_demo  = mysqli_real_escape_string($conn,$_POST['link_demo']);
  $periode         = str_replace(' ', '', $periode_sidang);
  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tgl_prasidang         = mysqli_real_escape_string($conn,$_POST['tgl_prasidang']);

  $file_laporan         = $_FILES["laporan"]["name"];

  $extension_laporan    = end(explode(".", $file_laporan));

  $ekstensi_diperbolehkan = array('pdf','PDF');  

  $nama_mhs  = mysqli_real_escape_string($conn,$_POST['nama_mhs']);               
  $nama_dosen  = mysqli_real_escape_string($conn,$_POST['nama_dosen']);               
  $email_dosen  = mysqli_real_escape_string($conn,$_POST['email_dosen']);  
  $jenis_notifikasi = "Request Approval Laporan TA";

    if($link_demo && $periode_sidang && $id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['laporan']['name']);

      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

      if(move_uploaded_file($_FILES['laporan']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan']['name']);

              $new_filename1     = $id_mhs .'_draft_laporan_'. $periode . '_' . $tanggal .'.'. $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
      }

      $in = $conn->query("INSERT INTO `tb_pra_sidang` (`id_pra_sidang`, `id_mhs`, `id_periode`, `draft_dokumen`, `catatan_dokumen`, `demo_aplikasi`, `catatan_aplikasi`, `tgl_pra_sidang`, `status`) VALUES (NULL, '$id_mhs', '$periode_sidang', '$destination_laporan', '-', '$link_demo', '-', '$tgl_prasidang', 'Diajukan');");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          kirimEmail($nama_mhs, $nama_dosen, $email_dosen, $jenis_notifikasi);
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Prasidang Berhasil Diajukan',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=request_pra_sidang');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'error',
                    title: 'Prasidang gagal diajukan',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=request_pra_sidang');
                       } ,2000); 
                      </script>
                ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=request_pra_sidang";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "update_request_approval_laporan_magang"){
                        session_start();
                        $token_session = $_SESSION['token'];
                        $nim = $_SESSION['user_nik'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_laporan    = mysqli_real_escape_string($conn,$_POST['id_laporan']);

                        $file_laporan         = $_FILES["laporan"]["name"];
                        $file_magang          = $_FILES["laporan_magang"]["name"];

                        $extension_laporan    = end(explode(".", $file_laporan));
                        $extension_magang     = end(explode(".", $file_magang));

                        $ekstensi_diperbolehkan = array('pdf','PDF');  

                        $nama_mhs  = mysqli_real_escape_string($conn,$_POST['nama_mhs']);               
                        $nama_dosen  = mysqli_real_escape_string($conn,$_POST['nama_dosen']);               
                        $email_dosen  = mysqli_real_escape_string($conn,$_POST['email_dosen']);  
                        $jenis_notifikasi = "Request Approval Laporan TA";

                          if($id_laporan && $file_laporan && $extension_laporan){

                            $folderPath = "uploads/tugas_akhir/$nim";
                            $exist = is_dir($folderPath);
                            if(!$exist) {
                              mkdir("$folderPath");
                              chmod("$folderPath", 0775);
                            }

                            unlink($file_laporan);
                            unlink($file_magang);

                            $target_path = "uploads/tugas_akhir/temp_uploads/";
                            $target_path .= basename( $_FILES['laporan']['name']);
                            $target_path_3 = "uploads/tugas_akhir/temp_uploads/";
                            $target_path_3 .= basename( $_FILES['laporan_magang']['name']);

                            if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

                            if(move_uploaded_file($_FILES['laporan']['tmp_name'], $target_path)) {
                                    $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan']['name']);

                                    $new_filename1     = $id_mhs .'_laporan_'. $periode . '_' . $tanggal .'.'.  $extension_laporan;
                                    $destination_laporan      = "$folderPath/$new_filename1";

                                    rename($temp_location, $destination_laporan);   
                            }
                            }else{
                            echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            }

                            if((isset($file_magang)) || (in_array($extension_magang, $ekstensi_diperbolehkan) === true) ){
                            if(move_uploaded_file($_FILES['laporan_magang']['tmp_name'], $target_path_3)) {
                                    $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan_magang']['name']);

                                    $new_filename3     = $id_mhs .'_laporanmagang_'. $periode . '_' . $tanggal .'.'.  $extension_magang;
                                    $destination_magang      = "$folderPath/$new_filename3";

                                    rename($temp_location, $destination_magang);   
                            }
                            }else{
                            echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 3 '.$file_magang.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            }

                            $in = $conn->query("UPDATE `tb_laporan_ta` SET `file_laporan` = '$destination_laporan', `file_magang` = '$destination_magang', `status` = 'Diajukan' WHERE `tb_laporan_ta`.`id_laporan` = $id_laporan;");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
                                kirimEmail($nama_mhs, $nama_dosen, $email_dosen, $jenis_notifikasi);
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan Berhasil Diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=request_approval_laporan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Laporan gagal diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=request_approval_laporan');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                          else{
                           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=request_approval_laporan";</script>';
                          }

                                        
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "approval_laporan"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_laporan       = mysqli_real_escape_string($conn,$_GET['id_laporan']);
                        $id_laporan = base64_decode($id_laporan);

                        if ($token_session === $token_post) {

                        $status  = mysqli_real_escape_string($conn,$_GET['status']);
                                              
                        if($status && $id_laporan){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_laporan_ta` SET 
                                `status` = '$status' 
                                WHERE `tb_laporan_ta`.`id_laporan` = $id_laporan;");

                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan TA/PA ".$status."',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=approval_laporan');
                                             } ,3000); 
                                            </script>
                                      ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Persetujuan laporan gagal ditambahkan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=approval_laporan');
                                             } ,3000); 
                                            </script>
                                      "; 
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=approval_laporan";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "set_nilai"){

  session_start();
                       $token_session = $_SESSION['token'];
                       $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                       $id_mhs       = mysqli_real_escape_string($conn,$_GET['id_mhs']);
                       $id_mhs = base64_decode($id_mhs);

                       if ($token_session === $token_post) {

                       $status  = mysqli_real_escape_string($conn,$_GET['status']);
                                             
                       if($status && $id_mhs){
                             ////proses biodata
                             $in = $conn->query("INSERT INTO `tb_set_input_nilai` (`id_mhs`, `status`, `tanggal`) VALUES ('$id_mhs', 'Sudah', CURRENT_TIMESTAMP);");

                               if($in){
                                echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=list_berkas_final_admin";</script>';  
                               }
                               else
                               {
                                echo '<script language="javascript">alert("Error: Gagal"); document.location="index.php?page=list_berkas_final_admin";</script>'; 
                               }
                             }
                       else{
                        echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_berkas_final_admin";</script>';
                       }
                       } else {
                        echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                       }
}

if($_GET['aksi'] == "update_set_nilai"){

  session_start();
                       $token_session = $_SESSION['token'];
                       $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                       $id_mhs       = mysqli_real_escape_string($conn,$_GET['id_mhs']);
                       $id_mhs = base64_decode($id_mhs);

                       if ($token_session === $token_post) {

                       $status  = mysqli_real_escape_string($conn,$_GET['status']);
                                             
                       if($status && $id_mhs){
                             ////proses biodata
                             $in = $conn->query("UPDATE `tb_set_input_nilai` SET `status` = '$status', `tanggal` = CURRENT_TIMESTAMP WHERE `tb_set_input_nilai`.`id_mhs` = $id_mhs;");

                               if($in){
                                echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=list_berkas_final_admin";</script>';  
                               }
                               else
                               {
                                echo '<script language="javascript">alert("Error: Gagal"); document.location="index.php?page=list_berkas_final_admin";</script>';
                               }
                             }
                       else{
                        echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_berkas_final_admin";</script>';
                       }
                       } else {
                        echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                       }
}

if($_GET['aksi'] == "penilaian_sidang"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_jadwal              = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
                        $id_ta                  = mysqli_real_escape_string($conn,$_POST['id_ta']);
                        $periode                = mysqli_real_escape_string($conn,$_POST['periode']);
                        $id_dosen               = $_SESSION['id_user'];
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        $rekomendasi            = mysqli_real_escape_string($conn,$_POST['rekomendasi']);
                        $komentar               = mysqli_real_escape_string($conn,$_POST['komentar']);
                        $tanggal_penilaian      = date("Y-m-d");
                                              
                        if($id_jadwal){
                              $in = $conn->query("INSERT INTO `tb_penilaian_sidang` (`id_jadwal`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `sidang_ulang`, `catatan_perbaikan`, `file_perbaikan`, `status`) VALUES ('$id_jadwal', '$id_dosen', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$rekomendasi', '$komentar', '-', 'Belum Perbaikan');");
                              
                              $on = $conn->query("UPDATE `tb_tugas_akhir` SET `status` = '$status' WHERE `tb_tugas_akhir`.`id_mhs` = '$id_ta';");

                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'error',
                                  title: 'Penilaian gagal ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
                                     } ,3000); 
                                    </script>
                                  ";
                                  //echo("Error description: " . $conn -> error);
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "update_penilaian_sidang"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_jadwal              = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
                        $id_dosen               = $_SESSION['id_user'];
                        $periode                = mysqli_real_escape_string($conn,$_POST['periode']);
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        $rekomendasi            = mysqli_real_escape_string($conn,$_POST['rekomendasi']);
                        $komentar               = mysqli_real_escape_string($conn,$_POST['komentar']);
                        //$tanggal_penilaian      = date("Y-m-d");
                                              
                        if($komentar){

                              $in = $conn->query("UPDATE `tb_penilaian_sidang` SET 
                                `nilai_1` = '$nilai_1', 
                                `nilai_2` = '$nilai_2', 
                                `nilai_3` = '$nilai_3', 
                                `nilai_4` = '$nilai_4', 
                                `nilai_5` = '$nilai_5', 
                                `nilai_6` = '$nilai_6', 
                                `nilai_7` = '$nilai_7', 
                                `sidang_ulang` = '$rekomendasi', 
                                `catatan_perbaikan` = '$komentar' 
                                WHERE `tb_penilaian_sidang`.`id_jadwal` = '$id_jadwal' AND `tb_penilaian_sidang`.`id_dosen` = '$id_dosen';");
                              
                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah diperbaharui',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'error',
                                  title: 'Penilaian gagal diperbaharui',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
                                     } ,3000); 
                                    </script>
                                  ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "penilaian_sidang_anggota"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_jadwal              = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
                        $id_ta                  = mysqli_real_escape_string($conn,$_POST['id_ta']);
                        $id_mhs                 = mysqli_real_escape_string($conn,$_POST['id_mhs']);
                        $periode                = mysqli_real_escape_string($conn,$_POST['periode']);
                        $id_dosen               = $_SESSION['id_user'];
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        //$rekomendasi            = mysqli_real_escape_string($conn,$_POST['rekomendasi']);
                        $komentar               = mysqli_real_escape_string($conn,$_POST['komentar']);
                        $tanggal_penilaian      = date("Y-m-d");
                                              
                        if($id_jadwal){
                              $in = $conn->query("INSERT INTO `tb_penilaian_sidang_anggota` (`id_jadwal`, `id_dosen`, `id_ta`, `id_mhs`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `catatan_perbaikan`) VALUES ('$id_jadwal', '$id_dosen ', '$id_ta', '$id_mhs', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$komentar');");
                              
                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'error',
                                  title: 'Penilaian gagal ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
                                     } ,3000); 
                                    </script>
                                  ";
                                  //echo("Error description: " . $conn -> error);
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "update_penilaian_sidang_anggota"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_jadwal              = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
                        $id_ta                  = mysqli_real_escape_string($conn,$_POST['id_ta']);
                        $id_mhs                 = mysqli_real_escape_string($conn,$_POST['id_mhs']);
                        $id_dosen               = $_SESSION['id_user'];
                        $periode                = mysqli_real_escape_string($conn,$_POST['periode']);
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        $rekomendasi            = mysqli_real_escape_string($conn,$_POST['rekomendasi']);
                        $komentar               = mysqli_real_escape_string($conn,$_POST['komentar']);
                        //$tanggal_penilaian      = date("Y-m-d");
                                              
                        if($komentar){

                              $in = $conn->query("UPDATE `tb_penilaian_sidang_anggota` SET 
                                `nilai_1` = '$nilai_1', 
                                `nilai_2` = '$nilai_2', 
                                `nilai_3` = '$nilai_3', 
                                `nilai_4` = '$nilai_4', 
                                `nilai_5` = '$nilai_5', 
                                `nilai_6` = '$nilai_6', 
                                `nilai_7` = '$nilai_7', 
                                `catatan_perbaikan` = '$komentar' 
                                WHERE `tb_penilaian_sidang_anggota`.`id_jadwal` = '$id_jadwal' AND `tb_penilaian_sidang_anggota`.`id_dosen` = '$id_dosen' AND `tb_penilaian_sidang_anggota`.`id_ta` = '$id_ta' AND `tb_penilaian_sidang_anggota`.`id_mhs` = '$id_mhs';");
                              
                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah diperbaharui',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo("Error description: " . $conn -> error);
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "penilaian_sidang_baru"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_jadwal              = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $id_ta                  = mysqli_real_escape_string($conn,$_POST['id_ta']);
  $periode                = mysqli_real_escape_string($conn,$_POST['periode']);
  $jenis_sidang           = mysqli_real_escape_string($conn,$_POST['jenis_sidang']);
  $jenis_sidang           = urldecode($jenis_sidang);
  $id_dosen               = $_SESSION['id_user'];
  $nim_mhs                = mysqli_real_escape_string($conn,$_POST['nim']);
  $rekomendasi            = mysqli_real_escape_string($conn,$_POST['rekomendasi']);
  $komentar               = mysqli_real_escape_string($conn,$_POST['komentar']);
  $tanggal_penilaian      = date("Y-m-d");
                        
  if($id_jadwal){

    if($jenis_sidang == 'Seminar Proposal'){

      $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
      $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
      $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
      $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
      $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
      $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
      $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
      $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
      $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
      $nilai_10               = mysqli_real_escape_string($conn,$_POST['nilai_10']);
      $nilai_11               = mysqli_real_escape_string($conn,$_POST['nilai_11']);
      $nilai_12               = mysqli_real_escape_string($conn,$_POST['nilai_12']);

      $in = $conn->query("INSERT INTO `tb_penilaian_sidang_baru` (`id_jadwal`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`, `nilai_9`, `nilai_10`, `nilai_11`, `nilai_12`, `nilai_13`, `nilai_14`, `nilai_15`, `sidang_ulang`, `catatan_perbaikan`, `file_perbaikan`, `status`) VALUES ('$id_jadwal', '$id_dosen', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$nilai_8', '$nilai_9', '$nilai_10', '$nilai_11', '$nilai_12', '0', '0', '0', '$rekomendasi', '$komentar', '-', 'Belum Perbaikan');");

      if($rekomendasi == 'tidak'){
        $status = 'TA 1';
      }
        
      $on = $conn->query("UPDATE `tb_tugas_akhir` SET `status` = '$status' WHERE `tb_tugas_akhir`.`id_mhs` = '$id_ta';");

    }

    if($jenis_sidang == 'Sidang Akhir'){

        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
        $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
        $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
        $nilai_10               = mysqli_real_escape_string($conn,$_POST['nilai_10']);
        $nilai_11               = mysqli_real_escape_string($conn,$_POST['nilai_11']);
        $nilai_12               = mysqli_real_escape_string($conn,$_POST['nilai_12']);
        $nilai_13               = mysqli_real_escape_string($conn,$_POST['nilai_13']);
  
        $in = $conn->query("INSERT INTO `tb_penilaian_sidang_baru` (`id_jadwal`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`, `nilai_9`, `nilai_10`, `nilai_11`, `nilai_12`, `nilai_13`, `nilai_14`, `nilai_15`, `sidang_ulang`, `catatan_perbaikan`, `file_perbaikan`, `status`) VALUES ('$id_jadwal', '$id_dosen', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$nilai_8', '$nilai_9', '$nilai_10', '$nilai_11', '$nilai_12', '$nilai_13', '0', '0', '$rekomendasi', '$komentar', '-', 'Belum Perbaikan');");
    }
        

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Penilaian telah ditambahkan',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Penilaian gagal ditambahkan',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
               } ,3000); 
              </script>
            ";
          //  echo("Error description: ".$jenis_sidang." " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "update_penilaian_sidang_baru"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_jadwal              = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $id_dosen               = $_SESSION['id_user'];
  $periode                = mysqli_real_escape_string($conn,$_POST['periode']);
  $jenis_sidang           = mysqli_real_escape_string($conn,$_POST['jenis_sidang']);
  $rekomendasi            = mysqli_real_escape_string($conn,$_POST['rekomendasi']);
  $komentar               = mysqli_real_escape_string($conn,$_POST['komentar']);
  //$tanggal_penilaian      = date("Y-m-d");
                        
  if($id_jadwal){

    if($jenis_sidang == 'Seminar Proposal'){

      $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
      $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
      $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
      $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
      $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
      $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
      $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
      $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
      $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
      $nilai_10               = mysqli_real_escape_string($conn,$_POST['nilai_10']);
      $nilai_11               = mysqli_real_escape_string($conn,$_POST['nilai_11']);
      $nilai_12               = mysqli_real_escape_string($conn,$_POST['nilai_12']);

      $in = $conn->query("UPDATE `tb_penilaian_sidang_baru` SET 
          `nilai_1` = '$nilai_1', 
          `nilai_2` = '$nilai_2', 
          `nilai_3` = '$nilai_3', 
          `nilai_4` = '$nilai_4', 
          `nilai_5` = '$nilai_5', 
          `nilai_6` = '$nilai_6', 
          `nilai_7` = '$nilai_7', 
          `nilai_8` = '$nilai_8', 
          `nilai_9` = '$nilai_9', 
          `nilai_10` = '$nilai_10', 
          `nilai_11` = '$nilai_11', 
          `nilai_12` = '$nilai_12', 
          `sidang_ulang` = '$rekomendasi', 
          `catatan_perbaikan` = '$komentar' 
          WHERE `tb_penilaian_sidang_baru`.`id_jadwal` = '$id_jadwal' AND `tb_penilaian_sidang_baru`.`id_dosen` = '$id_dosen';");

      if($rekomendasi == 'tidak'){
        $status = 'TA 1';
      }else{
        $status = 'Proposal';
      }
        
      $on = $conn->query("UPDATE `tb_tugas_akhir` SET `status` = '$status' WHERE `tb_tugas_akhir`.`id_mhs` = '$id_ta';");

    }

    if($jenis_sidang == 'Sidang Akhir'){

      $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
        $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
        $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
        $nilai_10                = mysqli_real_escape_string($conn,$_POST['nilai_10']);
        $nilai_11                = mysqli_real_escape_string($conn,$_POST['nilai_11']);
        $nilai_12                = mysqli_real_escape_string($conn,$_POST['nilai_12']);
        $nilai_13                = mysqli_real_escape_string($conn,$_POST['nilai_13']);

      $in = $conn->query("UPDATE `tb_penilaian_sidang_baru` SET 
      `nilai_1` = '$nilai_1', 
      `nilai_2` = '$nilai_2', 
      `nilai_3` = '$nilai_3', 
      `nilai_4` = '$nilai_4', 
      `nilai_5` = '$nilai_5', 
      `nilai_6` = '$nilai_6', 
      `nilai_7` = '$nilai_7', 
      `nilai_8` = '$nilai_8', 
      `nilai_9` = '$nilai_9', 
      `nilai_10` = '$nilai_10', 
      `nilai_11` = '$nilai_11', 
      `nilai_12` = '$nilai_12', 
      `nilai_13` = '$nilai_13', 
      `sidang_ulang` = '$rekomendasi', 
      `catatan_perbaikan` = '$komentar' 
      WHERE `tb_penilaian_sidang_baru`.`id_jadwal` = '$id_jadwal' AND `tb_penilaian_sidang_baru`.`id_dosen` = '$id_dosen';");

    }

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Penilaian telah diperbaharui',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Penilaian gagal diperbaharui',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=penilaian_sidang&periode=".base64_encode($periode)."');
               } ,3000); 
              </script>
            ";
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "upload_perbaikan_penguji"){
                        session_start();
                        $token_session = $_SESSION['token'];
                        $id_mhs = $_SESSION['id_user'];
                        $nim = $_SESSION['user_nik'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $penguji_1          = mysqli_real_escape_string($conn,$_POST['penguji_1']);
                        $penguji_2          = mysqli_real_escape_string($conn,$_POST['penguji_2']);
                        $id_jadwal          = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
                        $tanggal            = date("Ymd");

                        $file_laporan         = $_FILES["laporan_perbaikan"]["name"];

                        $extension_laporan    = end(explode(".", $file_laporan));

                        $ekstensi_diperbolehkan = array('pdf','PDF');     
                        
                        $nama_mhs  = mysqli_real_escape_string($conn,$_POST['nama_mhs']);               
                        $nama_dosen  = mysqli_real_escape_string($conn,$_POST['nama_dosen']);               
                        $email_dosen  = mysqli_real_escape_string($conn,$_POST['email_dosen']);  
                        $jenis_notifikasi = "Request Approval Pembimbing Terkait Perbaikan Sidang Laporan TA";

                          if($file_laporan){

                            $folderPath = "uploads/tugas_akhir/$nim";
                            $exist = is_dir($folderPath);
                            if(!$exist) {
                              mkdir("$folderPath");
                              chmod("$folderPath", 0775);
                            }

                            $target_path = "uploads/tugas_akhir/temp_uploads/";
                            $target_path .= basename( $_FILES['laporan_perbaikan']['name']);

                            if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

                            if(move_uploaded_file($_FILES['laporan_perbaikan']['tmp_name'], $target_path)) {
                                    $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan_perbaikan']['name']);
                                    $new_filename1     = $id_mhs .'_laporan_perbaikan_'. $id_jadwal .'.'.  $extension_laporan;
                                    $destination_laporan      = "$folderPath/$new_filename1";
                                    rename($temp_location, $destination_laporan);   
                            }
                            }else{
                            echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            }

                            $in = $conn->query("UPDATE `tb_penilaian_sidang` SET 
                              `file_perbaikan` = '$destination_laporan', 
                              `status` = 'Diajukan' 
                              WHERE `tb_penilaian_sidang`.`id_jadwal` = $id_jadwal AND `tb_penilaian_sidang`.`id_dosen` = $penguji_1;");

                            $on = $conn->query("UPDATE `tb_penilaian_sidang` SET 
                              `file_perbaikan` = '$destination_laporan', 
                              `status` = 'Diajukan' 
                              WHERE `tb_penilaian_sidang`.`id_jadwal` = $id_jadwal AND `tb_penilaian_sidang`.`id_dosen` = $penguji_2;");

                                if($in && $on){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                kirimEmail($nama_mhs, $nama_dosen, $email_dosen, $jenis_notifikasi);

                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan perbaikan berhasil diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                               window.location.replace('index.php?page=berita_acara_sidang');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Laporan gagal diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=berita_acara_sidang');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                          else{
                           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berita_acara_sidang";</script>';
                          }

                                        
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "upload_perbaikan_penguji_baru"){
  session_start();
  $token_session = $_SESSION['token'];
  $id_mhs = $_SESSION['id_user'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $penguji_1          = mysqli_real_escape_string($conn,$_POST['penguji_1']);
  $penguji_2          = mysqli_real_escape_string($conn,$_POST['penguji_2']);
  $id_jadwal          = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $tanggal            = date("Ymd");

  $file_laporan         = $_FILES["laporan_perbaikan"]["name"];

  $extension_laporan    = end(explode(".", $file_laporan));

  $ekstensi_diperbolehkan = array('pdf','PDF');     
  
  $nama_mhs  = mysqli_real_escape_string($conn,$_POST['nama_mhs']);               
  $nama_dosen  = mysqli_real_escape_string($conn,$_POST['nama_dosen']);               
  $email_dosen  = mysqli_real_escape_string($conn,$_POST['email_dosen']);  
  $jenis_notifikasi = "Request Approval Pembimbing Terkait Perbaikan Sidang Laporan TA";

    if($file_laporan){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['laporan_perbaikan']['name']);

      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

      if(move_uploaded_file($_FILES['laporan_perbaikan']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan_perbaikan']['name']);
              $new_filename1     = $id_mhs .'_laporan_perbaikan_'. $id_jadwal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";
              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
      }

      $in = $conn->query("UPDATE `tb_penilaian_sidang_baru` SET 
        `file_perbaikan` = '$destination_laporan', 
        `status` = 'Diajukan' 
        WHERE `tb_penilaian_sidang_baru`.`id_jadwal` = $id_jadwal AND `tb_penilaian_sidang_baru`.`id_dosen` = $penguji_1;");

      $on = $conn->query("UPDATE `tb_penilaian_sidang_baru` SET 
        `file_perbaikan` = '$destination_laporan', 
        `status` = 'Diajukan' 
        WHERE `tb_penilaian_sidang_baru`.`id_jadwal` = $id_jadwal AND `tb_penilaian_sidang_baru`.`id_dosen` = $penguji_2;");

          if($in && $on){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
          kirimEmail($nama_mhs, $nama_dosen, $email_dosen, $jenis_notifikasi);

          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Laporan perbaikan berhasil diajukan',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                         window.location.replace('index.php?page=berita_acara_sidang');
                       } ,2000); 
                      </script>
                "; 
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'error',
                    title: 'Laporan gagal diajukan',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berita_acara_sidang');
                       } ,2000); 
                      </script>
                ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berita_acara_sidang";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "approval_perbaikan_penguji"){
  session_start();
  $token_session = $_SESSION['token'];
  $id_dosen = $_SESSION['id_user'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  //$id_dosen        = mysqli_real_escape_string($conn,$_GET['id_dosen']);
  //$id_jadwal       = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
  //$status          = mysqli_real_escape_string($conn,$_GET['status']);

  $id_mhs        = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_jadwal       = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $status          = mysqli_real_escape_string($conn,$_POST['status']);
 
       
                          if($status){

                            $in = $conn->query("UPDATE `tb_penilaian_sidang` SET 
                              `status` = '$status' 
                              WHERE `tb_penilaian_sidang`.`id_jadwal` = $id_jadwal AND `tb_penilaian_sidang`.`id_dosen` = $id_dosen;");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan perbaikan berhasil ".$status."',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=diskusi_revisi&id_jadwal=".base64_encode($id_jadwal)."&id_mhs=".$id_mhs."');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Approval Perbaikan gagal diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=diskusi_revisi&id_jadwal=".base64_encode($id_jadwal)."&id_mhs=".$id_mhs."');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                          else{
                           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
                          }                             
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "approval_perbaikan_penguji_baru"){
  session_start();
  $token_session = $_SESSION['token'];
  $id_dosen = $_SESSION['id_user'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  //$id_dosen        = mysqli_real_escape_string($conn,$_GET['id_dosen']);
  //$id_jadwal       = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
  //$status          = mysqli_real_escape_string($conn,$_GET['status']);

  $id_mhs        = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_jadwal       = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $status          = mysqli_real_escape_string($conn,$_POST['status']);
 

    if($status){

      $in = $conn->query("UPDATE `tb_penilaian_sidang_baru` SET 
        `status` = '$status' 
        WHERE `tb_penilaian_sidang_baru`.`id_jadwal` = $id_jadwal AND `tb_penilaian_sidang_baru`.`id_dosen` = $id_dosen;");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Laporan perbaikan berhasil ".$status."',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                         window.location.replace('index.php?page=diskusi_revisi&id_jadwal=".base64_encode($id_jadwal)."&id_mhs=".$id_mhs."');
                       } ,2000); 
                      </script>
                "; 
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'error',
                    title: 'Approval Perbaikan gagal diajukan',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=diskusi_revisi&id_jadwal=".base64_encode($id_jadwal)."&id_mhs=".$id_mhs."');
                       } ,2000); 
                      </script>
                ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
    }                             
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "tambah_diskusi_dosen"){
  session_start();
  $token_session = $_SESSION['token'];
  $id_dosen = $_SESSION['id_user'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  //$id_dosen        = mysqli_real_escape_string($conn,$_GET['id_dosen']);
  //$id_jadwal       = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
  //$status          = mysqli_real_escape_string($conn,$_GET['status']);

  $id_mhs        = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_jadwal       = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $komentar_revisi = mysqli_real_escape_string($conn,$_POST['komentar_revisi']);
  
    if($komentar_revisi){

      $on = $conn->query("INSERT INTO `tb_diskusi_penguji` (`id_diskusi`, `id_jadwal`, `id_dosen`, `id_mhs`, `tanggal`) VALUES (NULL, '$id_jadwal', '$id_dosen', '$id_mhs', CURRENT_TIMESTAMP);");

      $sql_id_file = $conn->query("SELECT max(id_diskusi) AS max_id_file FROM tb_diskusi_penguji WHERE id_jadwal = $id_jadwal AND id_dosen = $id_dosen;");
      $data_idfile= mysqli_fetch_assoc($sql_id_file);
      $id_file_max = $data_idfile['max_id_file']; 

            $oon = $conn->query("INSERT INTO `tb_isi_diskusi` (`id_isi_diskusi`, `id_diskusi`, `id_dosen`, `id_mhs`, `isi`,`tanggal`) VALUES (NULL, '$id_file_max', '$id_dosen', '0', '$komentar_revisi',CURRENT_TIMESTAMP);");

          if($on){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  

          echo '<script language="javascript">alert("Komentar dikirim"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo '<script language="javascript">alert("Komentar gagal dikirim"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
          }
        }
    else{
      echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
    }                             
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "balas_diskusi_dosen"){
  session_start();
  $token_session = $_SESSION['token'];
  $id_dosen = $_SESSION['id_user'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  //$id_dosen        = mysqli_real_escape_string($conn,$_GET['id_dosen']);
  //$id_jadwal       = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
  //$status          = mysqli_real_escape_string($conn,$_GET['status']);

  $id_diskusi        = mysqli_real_escape_string($conn,$_POST['id_diskusi']);
  $id_mhs        = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_jadwal       = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $komentar_revisi = mysqli_real_escape_string($conn,$_POST['komentar_revisi']);
  
    if($komentar_revisi){

          $on = $conn->query("INSERT INTO `tb_isi_diskusi` (`id_isi_diskusi`, `id_diskusi`, `id_dosen`, `id_mhs`, `isi`,`tanggal`) VALUES (NULL, '$id_diskusi', '$id_dosen', '0', '$komentar_revisi',CURRENT_TIMESTAMP);");

          if($on){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  

          echo '<script language="javascript">alert("Komentar dikirim"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo '<script language="javascript">alert("Komentar gagal dikirim"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
          }
        }
    else{
      echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=diskusi_revisi&id_jadwal='.base64_encode($id_jadwal).'&id_mhs='.$id_mhs.'";</script>';
    }                             
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "balas_diskusi_penguji"){
  session_start();
  $token_session = $_SESSION['token'];
  $id_mhs = $_SESSION['id_user'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  //$id_dosen        = mysqli_real_escape_string($conn,$_GET['id_dosen']);
  //$id_jadwal       = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
  //$status          = mysqli_real_escape_string($conn,$_GET['status']);

  $id_diskusi        = mysqli_real_escape_string($conn,$_POST['id_diskusi']);
  //$id_mhs        = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_jadwal       = mysqli_real_escape_string($conn,$_POST['id_jadwal']);
  $penguji_1       = mysqli_real_escape_string($conn,$_POST['penguji_1']);
  $penguji_2       = mysqli_real_escape_string($conn,$_POST['penguji_2']);
  $komentar_revisi = mysqli_real_escape_string($conn,$_POST['komentar_revisi']);
  
    if($komentar_revisi){

          $on = $conn->query("INSERT INTO `tb_isi_diskusi` (`id_isi_diskusi`, `id_diskusi`, `id_dosen`, `id_mhs`, `isi`,`tanggal`) VALUES (NULL, '$id_diskusi', '0', '$id_mhs', '$komentar_revisi',CURRENT_TIMESTAMP);");

          if($on){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  

          echo '<script language="javascript">alert("Komentar dikirim"); document.location="index.php?page=revisi_sidang&id_jadwal='.base64_encode($id_jadwal).'&penguji1='.base64_encode($penguji_1).'&penguji2='.base64_encode($penguji_2).'";</script>';
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo '<script language="javascript">alert("Komentar gagal dikirim"); document.location="index.php?page=revisi_sidang&id_jadwal='.base64_encode($id_jadwal).'&penguji1='.base64_encode($penguji_1).'&penguji2='.base64_encode($penguji_2).'";</script>';
          }
        }
    else{
      echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=revisi_sidang&id_jadwal='.base64_encode($id_jadwal).'&penguji1='.base64_encode($penguji_1).'&penguji2='.base64_encode($penguji_2).'";</script>';
    }                             
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}


if($_GET['aksi'] == "approval_perbaikan_pembimbing"){
                        session_start();
                        $token_session = $_SESSION['token'];
                        $id_mhs = $_SESSION['id_user'];
                        $nim = $_SESSION['user_nik'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);

                        if ($token_session === $token_post) {

                        //$id_dosen        = mysqli_real_escape_string($conn,$_GET['id_dosen']);
                        $id_jadwal       = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
                        $status          = mysqli_real_escape_string($conn,$_GET['status']);

                        $sql50  = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE id_jadwal = '$id_jadwal' ;");
                        $data50 = mysqli_fetch_assoc($sql50);
                        $id_mhs = $data50['id_tugas_akhir'];
                        $idjadwal = $data50['id_jadwal'];
                        $penguji_1 = $data50['penguji_1'];
                        $penguji_2 = $data50['penguji_2'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$id_mhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $nama_mhs = $data5['nama'];

                        $sql51  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_1' ;");
                        $data51 = mysqli_fetch_assoc($sql51);
                        $namadosen1 = $data51['nama'];
                        $emaildosen1 = $data51['email'];

                        $sql52  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_2' ;");
                        $data52 = mysqli_fetch_assoc($sql52);
                        $namadosen2 = $data52['nama'];
                        $emaildosen2 = $data52['email'];

                        $jenis_notifikasi = "Request Approval Penguji Terkait Perbaikan Sidang Laporan TA";
       
                          if($status){

                            $in = $conn->query("UPDATE `tb_penilaian_sidang` SET 
                              `status` = '$status' 
                              WHERE `tb_penilaian_sidang`.`id_jadwal` = $id_jadwal;");
                              
                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                if($status == "Disetujui Pembimbing"){
                                kirimEmail($nama_mhs, $namadosen1, $emaildosen1, $jenis_notifikasi);
                                kirimEmail($nama_mhs, $namadosen2, $emaildosen2, $jenis_notifikasi);
                                }
                                
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Laporan perbaikan berhasil ".$status."',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                               window.location.replace('index.php?page=approval_perbaikan_pembimbing');
                                             } ,2000); 
                                            </script>
                                      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  //echo("Error description: " . $conn -> error);
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Approval Perbaikan gagal diajukan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=approval_perbaikan_pembimbing');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                          else{
                           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=approval_perbaikan_pembimbing";</script>';
                          }                             
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "approval_perbaikan_pembimbing_baru"){
  session_start();
  $token_session = $_SESSION['token'];
  $id_mhs = $_SESSION['id_user'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_GET['token']);

  if ($token_session === $token_post) {

  //$id_dosen        = mysqli_real_escape_string($conn,$_GET['id_dosen']);
  $id_jadwal       = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
  $status          = mysqli_real_escape_string($conn,$_GET['status']);

  $sql50  = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE id_jadwal = '$id_jadwal' ;");
  $data50 = mysqli_fetch_assoc($sql50);
  $id_mhs = $data50['id_tugas_akhir'];
  $idjadwal = $data50['id_jadwal'];
  $penguji_1 = $data50['penguji_1'];
  $penguji_2 = $data50['penguji_2'];

  $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$id_mhs' ;");
  $data5 = mysqli_fetch_assoc($sql5);
  $nama_mhs = $data5['nama'];

  $sql51  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_1' ;");
  $data51 = mysqli_fetch_assoc($sql51);
  $namadosen1 = $data51['nama'];
  $emaildosen1 = $data51['email'];

  $sql52  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_2' ;");
  $data52 = mysqli_fetch_assoc($sql52);
  $namadosen2 = $data52['nama'];
  $emaildosen2 = $data52['email'];

  $jenis_notifikasi = "Request Approval Penguji Terkait Perbaikan Sidang Laporan TA";

    if($status){

      $in = $conn->query("UPDATE `tb_penilaian_sidang_baru` SET 
        `status` = '$status' 
        WHERE `tb_penilaian_sidang_baru`.`id_jadwal` = $id_jadwal;");
        
          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
          if($status == "Disetujui Pembimbing"){
          kirimEmail($nama_mhs, $namadosen1, $emaildosen1, $jenis_notifikasi);
          kirimEmail($nama_mhs, $namadosen2, $emaildosen2, $jenis_notifikasi);
          }
          
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Laporan perbaikan berhasil ".$status."',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                         window.location.replace('index.php?page=approval_perbaikan_pembimbing');
                       } ,2000); 
                      </script>
                "; 
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'error',
                    title: 'Approval Perbaikan gagal diajukan',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=approval_perbaikan_pembimbing');
                       } ,2000); 
                      </script>
                ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=approval_perbaikan_pembimbing";</script>';
    }                             
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "penilaian_ta1"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
                        $id_dosen               = $_SESSION['id_user'];
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
                                              
                        if($id_mhs && $id_dosen){
                              $in = $conn->query("INSERT INTO `tb_penilaian_ta1` (`id_mhs`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`) VALUES ('$id_mhs', '$id_dosen', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$nilai_8');");

                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'error',
                                  title: 'Penilaian gagal ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";
                                  //echo("Error description: " . $conn -> error);
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "penilaian_ta1_baru"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_dosen               = $_SESSION['id_user'];
  $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
  $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
  $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
  $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
  $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
  $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
  $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
  $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
  $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
  $nilai_10                = mysqli_real_escape_string($conn,$_POST['nilai_10']);
  $nilai_11                = mysqli_real_escape_string($conn,$_POST['nilai_11']);
                        
  if($id_mhs && $id_dosen){
        $in = $conn->query("INSERT INTO `tb_penilaian_ta1_baru` (`id_mhs`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`,`nilai_9`,`nilai_10`,`nilai_11`) VALUES ('$id_mhs', '$id_dosen', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$nilai_8', '$nilai_9', '$nilai_10', '$nilai_11');");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Penilaian telah ditambahkan',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan_baru');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Penilaian gagal ditambahkan',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "update_penilaian_ta1"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
                        $id_dosen               = $_SESSION['id_user'];
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
                                              
                        if($id_mhs && $id_dosen){
                              $in = $conn->query("UPDATE `tb_penilaian_ta1` SET 
                                `nilai_1` = '$nilai_1', 
                                `nilai_2` = '$nilai_2', 
                                `nilai_3` = '$nilai_3', 
                                `nilai_4` = '$nilai_4',
                                `nilai_5` = '$nilai_5', 
                                `nilai_6` = '$nilai_6', 
                                `nilai_7` = '$nilai_7', 
                                `nilai_8` = '$nilai_8' 
                                WHERE `tb_penilaian_ta1`.`id_mhs` = '$id_mhs' AND `tb_penilaian_ta1`.`id_dosen` = '$id_dosen';");

                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah diubah',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'error',
                                  title: 'Penilaian gagal diubah',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";
                                  //echo("Error description: " . $conn -> error);
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "update_penilaian_ta1_baru"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_dosen               = $_SESSION['id_user'];
  $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
  $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
  $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
  $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
  $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
  $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
  $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
  $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
  $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
  $nilai_10                = mysqli_real_escape_string($conn,$_POST['nilai_10']);
  $nilai_11                = mysqli_real_escape_string($conn,$_POST['nilai_11']);
                        
  if($id_mhs && $id_dosen){
        $in = $conn->query("UPDATE `tb_penilaian_ta1_baru` SET 
          `nilai_1` = '$nilai_1', 
          `nilai_2` = '$nilai_2', 
          `nilai_3` = '$nilai_3', 
          `nilai_4` = '$nilai_4',
          `nilai_5` = '$nilai_5', 
          `nilai_6` = '$nilai_6', 
          `nilai_7` = '$nilai_7', 
          `nilai_8` = '$nilai_8', 
          `nilai_9` = '$nilai_9', 
          `nilai_10` = '$nilai_10', 
          `nilai_11` = '$nilai_11' 
          WHERE `tb_penilaian_ta1_baru`.`id_mhs` = '$id_mhs' AND `tb_penilaian_ta1_baru`.`id_dosen` = '$id_dosen';");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Penilaian telah diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan_baru');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Penilaian gagal diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan_baru');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "penilaian_ta2"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
                        $id_dosen               = $_SESSION['id_user'];
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
                        $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
                        $nilai_10                = mysqli_real_escape_string($conn,$_POST['nilai_10']);
                                              
                        if($id_mhs && $id_dosen){
                              $in = $conn->query("INSERT INTO `tb_penilaian_ta2` (`id_mhs`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`, `nilai_9`, `nilai_10`) VALUES ('$id_mhs', '$id_dosen', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$nilai_8', '$nilai_9', '$nilai_10');");

                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'error',
                                  title: 'Penilaian gagal ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";
                                  //echo("Error description: " . $conn -> error);
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "penilaian_ta2_baru"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_dosen               = $_SESSION['id_user'];
  $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
  $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
  $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
  $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
  $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
  $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
  $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
  $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
  $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
                        
  if($id_mhs && $id_dosen){
        $in = $conn->query("INSERT INTO `tb_penilaian_ta2_baru` (`id_mhs`, `id_dosen`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`,`nilai_9`,`nilai_10`,`nilai_11`,`nilai_12`,`nilai_13`) VALUES ('$id_mhs', '$id_dosen', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5', '$nilai_6', '$nilai_7', '$nilai_8', '$nilai_9', '0','0','0','0');");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Penilaian telah ditambahkan',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan_baru');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Penilaian gagal ditambahkan',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan_baru');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "update_penilaian_ta2"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
                        $id_dosen               = $_SESSION['id_user'];
                        $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
                        $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
                        $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
                        $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
                        $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
                        $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
                        $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
                        $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
                        $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
                        $nilai_10                = mysqli_real_escape_string($conn,$_POST['nilai_10']);
                                              
                        if($id_mhs && $id_dosen){
                              $in = $conn->query("UPDATE `tb_penilaian_ta2` SET 
                                `nilai_1` = '$nilai_1', 
                                `nilai_2` = '$nilai_2', 
                                `nilai_3` = '$nilai_3', 
                                `nilai_4` = '$nilai_4',
                                `nilai_5` = '$nilai_5', 
                                `nilai_6` = '$nilai_6', 
                                `nilai_7` = '$nilai_7', 
                                `nilai_8` = '$nilai_8', 
                                `nilai_9` = '$nilai_9', 
                                `nilai_10` = '$nilai_10' 
                                WHERE `tb_penilaian_ta2`.`id_mhs` = '$id_mhs' AND `tb_penilaian_ta2`.`id_dosen` = '$id_dosen';");

                                if($in){
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Penilaian telah diubah',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";   
                                }
                                else
                                {
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'error',
                                  title: 'Penilaian gagal diubah',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=nilai_bimbingan');
                                     } ,3000); 
                                    </script>
                                  ";
                                  //echo("Error description: " . $conn -> error);
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "update_penilaian_ta2_baru"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $id_dosen               = $_SESSION['id_user'];
  $nilai_1                = mysqli_real_escape_string($conn,$_POST['nilai_1']);
  $nilai_2                = mysqli_real_escape_string($conn,$_POST['nilai_2']);
  $nilai_3                = mysqli_real_escape_string($conn,$_POST['nilai_3']);
  $nilai_4                = mysqli_real_escape_string($conn,$_POST['nilai_4']);
  $nilai_5                = mysqli_real_escape_string($conn,$_POST['nilai_5']);
  $nilai_6                = mysqli_real_escape_string($conn,$_POST['nilai_6']);
  $nilai_7                = mysqli_real_escape_string($conn,$_POST['nilai_7']);
  $nilai_8                = mysqli_real_escape_string($conn,$_POST['nilai_8']);
  $nilai_9                = mysqli_real_escape_string($conn,$_POST['nilai_9']);
                        
  if($id_mhs && $id_dosen){
        $in = $conn->query("UPDATE `tb_penilaian_ta2_baru` SET 
          `nilai_1` = '$nilai_1', 
          `nilai_2` = '$nilai_2', 
          `nilai_3` = '$nilai_3', 
          `nilai_4` = '$nilai_4',
          `nilai_5` = '$nilai_5', 
          `nilai_6` = '$nilai_6', 
          `nilai_7` = '$nilai_7', 
          `nilai_8` = '$nilai_8', 
          `nilai_9` = '$nilai_9'
          WHERE `tb_penilaian_ta2_baru`.`id_mhs` = '$id_mhs' AND `tb_penilaian_ta2_baru`.`id_dosen` = '$id_dosen';");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Penilaian telah diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan_baru');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Penilaian gagal diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=nilai_bimbingan_baru');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=penilaian_sidang&periode='.$periode.'";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "upload_final"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tanggal         = date("Ymd");

  $file_laporan         = $_FILES["halaman_judul"]["name"];
  $extension_laporan    = end(explode(".", $file_laporan));
  $ekstensi_diperbolehkan = array('pdf','PDF');  


    if($id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['halaman_judul']['name']);
      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){
      if(move_uploaded_file($_FILES['halaman_judul']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['halaman_judul']['name']);

              $new_filename1     = $id_mhs .'_Judul_'. $tanggal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai '.$file_laporan.'"); document.location="index.php?page=berkas_final";</script>';
      }

      $in = $conn->query("INSERT INTO `tb_berkas_final` (`id_mhs`, `file_judul`, `file_pengesahan`, `file_plagiarisme`, `file_poster`, `file_laporan_akhir`, `file_dokumen_perancangan`, `file_tkt`, `file_katsinov`, `link_produk`, `data_sertifikasi`, `status`, `tanggal_upload`, `komentar`) VALUES ($id_mhs, '$destination_laporan', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Belum lengkap', '$tanggal', '-');");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Halaman judul Berhasil Diupload',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berkas_final');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire({
              type: 'error',
              title: 'Halaman judul Gagal Diupload',
              showConfirmButton: false
            });  
                  },10); 
                  window.setTimeout(function(){ 
                  window.location.replace('index.php?page=berkas_final');
                  } ,3000); 
                </script>
            ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "upload_update_final"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tanggal         = date("Ymd");

  $file_laporan         = $_FILES["halaman_judul"]["name"];
  $extension_laporan    = end(explode(".", $file_laporan));
  $ekstensi_diperbolehkan = array('pdf','PDF');  


    if($id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['halaman_judul']['name']);
      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){
      if(move_uploaded_file($_FILES['halaman_judul']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['halaman_judul']['name']);

              $new_filename1     = $id_mhs .'_Judul_'. $tanggal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai '.$file_laporan.'"); document.location="index.php?page=berkas_final";</script>';
      }

      $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `file_judul` = '$destination_laporan' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Halaman judul Berhasil Diupload',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berkas_final');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire({
              type: 'error',
              title: 'Halaman judul Gagal Diupload',
              showConfirmButton: false
            });  
                  },10); 
                  window.setTimeout(function(){ 
                  window.location.replace('index.php?page=berkas_final');
                  } ,3000); 
                </script>
            ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "upload_pengesahan"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tanggal         = date("Ymd");

  $file_laporan         = $_FILES["file_pengesahan"]["name"];
  $extension_laporan    = end(explode(".", $file_laporan));
  $ekstensi_diperbolehkan = array('pdf','PDF');  


    if($id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['file_pengesahan']['name']);
      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){
      if(move_uploaded_file($_FILES['file_pengesahan']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['file_pengesahan']['name']);

              $new_filename1     = $id_mhs .'_Sah_' . $tanggal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai '.$file_laporan.'"); document.location="index.php?page=berkas_final";</script>';
      }

      $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `file_pengesahan` = '$destination_laporan' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Halaman Pengesahan Berhasil Diupload',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berkas_final');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire({
              type: 'error',
              title: 'Halaman Pengesahan Gagal Diupload',
              showConfirmButton: false
            });  
                  },10); 
                  window.setTimeout(function(){ 
                  window.location.replace('index.php?page=berkas_final');
                  } ,3000); 
                </script>
            ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "upload_plagiarisme"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tanggal         = date("Ymd");

  $file_laporan         = $_FILES["file_plagiarisme"]["name"];
  $extension_laporan    = end(explode(".", $file_laporan));
  $ekstensi_diperbolehkan = array('pdf','PDF');  


    if($id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['file_plagiarisme']['name']);
      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){
      if(move_uploaded_file($_FILES['file_plagiarisme']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['file_plagiarisme']['name']);

              $new_filename1     = $id_mhs .'_Cek_' . $tanggal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai '.$file_laporan.'"); document.location="index.php?page=berkas_final";</script>';
      }

      $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `file_plagiarisme` = '$destination_laporan' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Halaman plagiarisme Berhasil Diupload',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berkas_final');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire({
              type: 'error',
              title: 'Halaman plagiarisme Gagal Diupload',
              showConfirmButton: false
            });  
                  },10); 
                  window.setTimeout(function(){ 
                  window.location.replace('index.php?page=berkas_final');
                  } ,3000); 
                </script>
            ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "upload_poster"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tanggal         = date("Ymd");

  $file_laporan         = $_FILES["file_poster"]["name"];
  $extension_laporan    = end(explode(".", $file_laporan));
  $ekstensi_diperbolehkan = array('pdf','PDF');  


    if($id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['file_poster']['name']);
      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){
      if(move_uploaded_file($_FILES['file_poster']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['file_poster']['name']);

              $new_filename1     = $id_mhs .'_Pos_' . $tanggal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai '.$file_laporan.'"); document.location="index.php?page=berkas_final";</script>';
      }

      $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `file_poster` = '$destination_laporan' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Halaman Poster Berhasil Diupload',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berkas_final');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire({
              type: 'error',
              title: 'Halaman Poster Gagal Diupload',
              showConfirmButton: false
            });  
                  },10); 
                  window.setTimeout(function(){ 
                  window.location.replace('index.php?page=berkas_final');
                  } ,3000); 
                </script>
            ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "upload_laporan_akhir"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tanggal         = date("Ymd");

  $file_laporan         = $_FILES["file_laporan_akhir"]["name"];
  $extension_laporan    = end(explode(".", $file_laporan));
  $ekstensi_diperbolehkan = array('pdf','PDF');  


    if($id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['file_laporan_akhir']['name']);
      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){
      if(move_uploaded_file($_FILES['file_laporan_akhir']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['file_laporan_akhir']['name']);

              $new_filename1     = $id_mhs .'_Lap_' . $tanggal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai '.$file_laporan.'"); document.location="index.php?page=berkas_final";</script>';
      }

      $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `file_laporan_akhir` = '$destination_laporan' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Halaman Laporan Akhir Berhasil Diupload',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berkas_final');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire({
              type: 'error',
              title: 'Halaman Laporan Akhir Gagal Diupload',
              showConfirmButton: false
            });  
                  },10); 
                  window.setTimeout(function(){ 
                  window.location.replace('index.php?page=berkas_final');
                  } ,3000); 
                </script>
            ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}


if($_GET['aksi'] == "upload_dokumen_perancangan"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs          = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $tanggal         = date("Ymd");

  $file_laporan         = $_FILES["file_dokumen_perancangan"]["name"];
  $extension_laporan    = end(explode(".", $file_laporan));
  $ekstensi_diperbolehkan = array('pdf','PDF');  
  


    if($id_mhs){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      $target_path = "uploads/tugas_akhir/temp_uploads/";
      $target_path .= basename( $_FILES['file_dokumen_perancangan']['name']);
      if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){
      //$fileError = $_FILES["file_dokumen_perancangan"]["error"]; 
      if(move_uploaded_file($_FILES['file_dokumen_perancangan']['tmp_name'], $target_path)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['file_dokumen_perancangan']['name']);

              $new_filename1     = $id_mhs .'_Rancang_' . $tanggal .'.'.  $extension_laporan;
              $destination_laporan      = "$folderPath/$new_filename1";

              rename($temp_location, $destination_laporan);  
              
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai '.$file_laporan.'"); document.location="index.php?page=berkas_final";</script>';
      }

      $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `file_dokumen_perancangan` = '$destination_laporan' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Halaman Dokumen Perancangan Berhasil Diupload',
                    showConfirmButton: false
                  });  
                       },10); 
                       window.setTimeout(function(){ 
                        window.location.replace('index.php?page=berkas_final');
                       } ,2000); 
                      </script>
                ";
          }
          else
          {
            //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
            //echo("Error description: " . $conn -> error);
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire({
              type: 'error',
              title: 'Halaman Dokumen Perancangan Gagal Diupload',
              showConfirmButton: false
            });  
                  },10); 
                  window.setTimeout(function(){ 
                  window.location.replace('index.php?page=berkas_final');
                  } ,3000); 
                </script>
            ";
          }
        }
    else{
     echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
    }

                  
  
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }
}

if($_GET['aksi'] == "link_produk"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $link_produk                  = mysqli_real_escape_string($conn,$_POST['link_produk']);
                        
  if($id_mhs && $link_produk){
    $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `link_produk` = '$link_produk' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Link Produk telah diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=berkas_final');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Link Produk gagal diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=berkas_final');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "data_sertifikasi"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $data_sertifikasi                  = mysqli_real_escape_string($conn,$_POST['data_sertifikasi']);
                        
  if($id_mhs && $data_sertifikasi){
    $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = 'Belum lengkap', `data_sertifikasi` = '$data_sertifikasi' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Data Sertifikasi telah diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=berkas_final');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Data Sertifikasi gagal diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=berkas_final');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=berkas_final";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "update_status_berkas_tu"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $status_verifikasi       = mysqli_real_escape_string($conn,$_POST['status_verifikasi']);
  $komentar       = mysqli_real_escape_string($conn,$_POST['komentar']);
                        
  if($id_mhs && $status_verifikasi){
    $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = '$status_verifikasi', `komentar` = '$komentar' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Status Verifikasi telah diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=list_berkas_final');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Status Verifikasi gagal diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=list_berkas_final');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_berkas_final";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "update_status_berkas_mhs"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $status_verifikasi       = mysqli_real_escape_string($conn,$_POST['status_verifikasi']);
  //$komentar       = mysqli_real_escape_string($conn,$_POST['komentar']);
                        
  if($id_mhs && $status_verifikasi){
    $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = '$status_verifikasi' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Berkas Final Diajukan Ke Pembimbing',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=berkas_final');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Berkas Final Gagal Diajukan Ke Pembimbing',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=berkas_final');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_berkas_final";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "update_status_berkas_dosen"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $status_verifikasi       = mysqli_real_escape_string($conn,$_POST['status_verifikasi']);
  $komentar       = mysqli_real_escape_string($conn,$_POST['komentar']);
                        
  if($id_mhs && $status_verifikasi){
    $in = $conn->query("UPDATE `tb_berkas_final` SET `status` = '$status_verifikasi', `komentar` = '$komentar' WHERE `tb_berkas_final`.`id_mhs` = $id_mhs;");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Status Verifikasi telah diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=list_berkas_final_dosen');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Status Verifikasi gagal diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=list_berkas_final_dosen');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_berkas_final_dosen";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "create_qrcode"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_dosen               = $_SESSION['id_user'];
  $id_mhs                  = mysqli_real_escape_string($conn,$_POST['id_mhs']);
  $perihal       = mysqli_real_escape_string($conn,$_POST['perihal']);
  $komentar       = mysqli_real_escape_string($conn,$_POST['komentar']);
  $tanggal         = date("Ymd");
                        
  if($id_mhs && $perihal){
    $in = $conn->query("INSERT INTO `tb_qr_sign` (`id_sign`, `id_user`, `id_user_mhs`, `perihal`, `tanggal`) VALUES (NULL, '$id_dosen', '$id_mhs', '$perihal', '$tanggal');");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Berhasil dibuat',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=qr_sign');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            
            echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=qr_sign";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "update_status_prasidang"){

  session_start();
  $token_session = $_SESSION['token'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $id_pra_sidang           = mysqli_real_escape_string($conn,$_POST['id_pra_sidang']);
  $status_verifikasi       = mysqli_real_escape_string($conn,$_POST['status_verifikasi']);
  $komentar_laporan        = mysqli_real_escape_string($conn,$_POST['komentar_laporan']);
  $komentar_aplikasi       = mysqli_real_escape_string($conn,$_POST['komentar_aplikasi']);
                        
  if($id_pra_sidang && $komentar_aplikasi){
    $in = $conn->query("UPDATE `tb_pra_sidang` SET `catatan_dokumen` = '$komentar_laporan', `catatan_aplikasi` = '$komentar_aplikasi', `status` = '$status_verifikasi' WHERE `tb_pra_sidang`.`id_pra_sidang` = $id_pra_sidang;");

          if($in){
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'success',
            title: 'Status Prasidang telah diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=approval_prasidang');
               } ,3000); 
              </script>
            ";   
          }
          else
          {
            echo "
              <script type='text/javascript'>
               setTimeout(function () { 
          Swal.fire({
            type: 'error',
            title: 'Status Prasidang gagal diubah',
            showConfirmButton: false
          });  
               },10); 
               window.setTimeout(function(){ 
                window.location.replace('index.php?page=approval_prasidang');
               } ,3000); 
              </script>
            ";
            //echo("Error description: " . $conn -> error);
          }
        }
  else{
   echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=approval_prasidang";</script>';
  }
  } else {
   echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
  }

}

if($_GET['aksi'] == "delete_jadwal"){

  $id = $_GET['id'];
  $periode = $_GET['periode'];
    $cek = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE id_jadwal = '$id'");
    if(mysqli_num_rows($cek) != 0){
    $del = $conn->query("DELETE FROM `tb_jadwal_sidang` WHERE `tb_jadwal_sidang`.`id_jadwal` = '$id'");
    if($del){
    echo '<script language="javascript"> document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';
    }else{
    echo '<script language="javascript"> document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';
    }
    }else{
    echo '<script language="javascript"> document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';
                      }
}

?>