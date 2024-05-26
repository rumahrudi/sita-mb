<link rel="stylesheet" href="dist/css/app.css">
<script src="dist/js/sweetalert2.all.min.js"></script>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include "config.php";


if($_GET['aksi'] == "daftar"){
                        session_start();
                        $token_session = $_SESSION['token'];
                        $nim = $_SESSION['user_nik'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $pilih_sidang    = mysqli_real_escape_string($conn,$_POST['pilih_sidang']);
                        $periode_sidang  = mysqli_real_escape_string($conn,$_POST['skema']);
                        $periode         = str_replace(' ', '', $periode_sidang);
                        $id_tugas_akhir  = mysqli_real_escape_string($conn,$_POST['id_tugas_akhir']);
                        $file_laporan  = mysqli_real_escape_string($conn,$_POST['file_laporan']);
                        //$id_pra_sidang  = mysqli_real_escape_string($conn,$_POST['id_pra_sidang']);
                        if(!empty($_POST['id_pra_sidang'])) {
                          $id_pra_sidang  = mysqli_real_escape_string($conn,$_POST['id_pra_sidang']);
                        }
                        else{
                          $id_pra_sidang = 0;
                        }
                          

                        //$file_laporan         = $_FILES["laporan"]["name"];
                        $file_pendukung       = $_FILES["file_pendukung"]["name"];
                        //$file_magang          = $_FILES["laporan_magang"]["name"];

                        //$extension_laporan    = end(explode(".", $file_laporan));
                        $extension_pendukung  = end(explode(".", $file_pendukung));
                        //$extension_magang     = end(explode(".", $file_magang));

                        $ekstensi_diperbolehkan = array('pdf','PDF');                 

                          if($pilih_sidang && $periode_sidang && $id_tugas_akhir){

                            $folderPath = "uploads/tugas_akhir/$nim";
                            $exist = is_dir($folderPath);
                            if(!$exist) {
                              mkdir("$folderPath");
                              chmod("$folderPath", 0775);
                            }

                            //$target_path = "uploads/tugas_akhir/temp_uploads/";
                            //$target_path .= basename( $_FILES['laporan']['name']);
                            $target_path_2 = "uploads/tugas_akhir/temp_uploads/";
                            $target_path_2 .= basename( $_FILES['file_pendukung']['name']);
                            //$target_path_3 = "uploads/tugas_akhir/temp_uploads/";
                            //$target_path_3 .= basename( $_FILES['laporan_magang']['name']);

                            //if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

                            //if(move_uploaded_file($_FILES['laporan']['tmp_name'], $target_path)) {
                            //        $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan']['name']);

                            //        $new_filename1     = $id_tugas_akhir .'_laporan_'. $periode . '_' . $nim .'.'.  $extension_laporan;
                            //        $destination_laporan      = "$folderPath/$new_filename1";

                            //        rename($temp_location, $destination_laporan);   
                            //}
                            //}else{
                            //echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            //}

                            if((isset($file_pendukung)) || (in_array($extension_pendukung, $ekstensi_diperbolehkan) === true) ){
                            if(move_uploaded_file($_FILES['file_pendukung']['tmp_name'], $target_path_2)) {
                                    $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['file_pendukung']['name']);

                                    $new_filename2     = $id_tugas_akhir .'_file_pendukung_'.  $periode . '_' . $nim .'.'.  $extension_pendukung;
                                    $destination_pendukung     = "$folderPath/$new_filename2";

                                    rename($temp_location, $destination_pendukung);   
                            }
                            }else{
                            echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 2 '.$file_pendukung.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            }

                            //if((isset($file_magang)) || (in_array($extension_magang, $ekstensi_diperbolehkan) === true) ){
                            //if(move_uploaded_file($_FILES['laporan_magang']['tmp_name'], $target_path_3)) {
                            //        $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan_magang']['name']);

                            //        $new_filename3     = $id_tugas_akhir .'_laporanmagang_'. $periode . '_' . $nim .'.'.  $extension_magang;
                            //        $destination_magang      = "$folderPath/$new_filename3";

                            //        rename($temp_location, $destination_magang);   
                            //}
                            //}else{
                            //echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 3 '.$file_magang.'"); document.location="index.php?page=usulan_penelitian";</script>';
                            //}


                            $in = $conn->query("INSERT INTO `tb_jadwal_sidang` (`id_jadwal`, `periode_sidang`, `jenis_sidang`, `id_tugas_akhir`, `file_laporan`, `id_pra_sidang`, `file_prasidang`, `penguji_1`, `penguji_2`, `tanggal_sidang`,`jam_sidang`) VALUES (NULL, '$periode_sidang', '$pilih_sidang', '$id_tugas_akhir', '$file_laporan', '$id_pra_sidang', '$destination_pendukung', '0', '0', '1970-01-01', '08.30 - Selesai');");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Pendaftaran berhasil ditambahkan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                               window.location.replace('index.php?page=dashboard2');
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
                                          title: 'Pendaftaran gagal ditambahkan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=daftar_sidang');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                          else{
                           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=daftar_sidang";</script>';
                          }

                                        
                        
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "daftarin_mhs"){
  session_start();
  $token_session = $_SESSION['token'];
  $nim = $_SESSION['user_nik'];
  $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

  $pilih_sidang    = mysqli_real_escape_string($conn,$_POST['pilih_sidang']);
  $periode_sidang  = mysqli_real_escape_string($conn,$_POST['skema']);
  $periode         = str_replace(' ', '', $periode_sidang);
  $id_tugas_akhir  = mysqli_real_escape_string($conn,$_POST['id_tugas_akhir']);
  $file_laporan  = mysqli_real_escape_string($conn,$_POST['file_laporan']);
  $id_pra_sidang  = mysqli_real_escape_string($conn,$_POST['id_pra_sidang']);

  //$file_laporan         = $_FILES["laporan"]["name"];
  $file_pendukung       = $_FILES["file_pendukung"]["name"];
  //$file_magang          = $_FILES["laporan_magang"]["name"];

  //$extension_laporan    = end(explode(".", $file_laporan));
  $extension_pendukung  = end(explode(".", $file_pendukung));
  //$extension_magang     = end(explode(".", $file_magang));

  $ekstensi_diperbolehkan = array('pdf','PDF');                 

    if($pilih_sidang && $periode_sidang && $id_tugas_akhir){

      $folderPath = "uploads/tugas_akhir/$nim";
      $exist = is_dir($folderPath);
      if(!$exist) {
        mkdir("$folderPath");
        chmod("$folderPath", 0775);
      }

      //$target_path = "uploads/tugas_akhir/temp_uploads/";
      //$target_path .= basename( $_FILES['laporan']['name']);
      $target_path_2 = "uploads/tugas_akhir/temp_uploads/";
      $target_path_2 .= basename( $_FILES['file_pendukung']['name']);
      //$target_path_3 = "uploads/tugas_akhir/temp_uploads/";
      //$target_path_3 .= basename( $_FILES['laporan_magang']['name']);

      //if((isset($file_laporan)) || (in_array($extension_laporan, $ekstensi_diperbolehkan) === true)){

      //if(move_uploaded_file($_FILES['laporan']['tmp_name'], $target_path)) {
      //        $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan']['name']);

      //        $new_filename1     = $id_tugas_akhir .'_laporan_'. $periode . '_' . $nim .'.'.  $extension_laporan;
      //        $destination_laporan      = "$folderPath/$new_filename1";

      //        rename($temp_location, $destination_laporan);   
      //}
      //}else{
      //echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 1 '.$file_laporan.'"); document.location="index.php?page=usulan_penelitian";</script>';
      //}

      if((isset($file_pendukung)) || (in_array($extension_pendukung, $ekstensi_diperbolehkan) === true) ){
      if(move_uploaded_file($_FILES['file_pendukung']['tmp_name'], $target_path_2)) {
              $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['file_pendukung']['name']);

              $new_filename2     = $id_tugas_akhir .'_file_pendukung_'.  $periode . '_' . $nim .'.'.  $extension_pendukung;
              $destination_pendukung     = "$folderPath/$new_filename2";

              rename($temp_location, $destination_pendukung);   
      }
      }else{
      echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 2 '.$file_pendukung.'"); document.location="index.php?page=usulan_penelitian";</script>';
      }

      //if((isset($file_magang)) || (in_array($extension_magang, $ekstensi_diperbolehkan) === true) ){
      //if(move_uploaded_file($_FILES['laporan_magang']['tmp_name'], $target_path_3)) {
      //        $temp_location = 'uploads/tugas_akhir/temp_uploads/' . basename( $_FILES['laporan_magang']['name']);

      //        $new_filename3     = $id_tugas_akhir .'_laporanmagang_'. $periode . '_' . $nim .'.'.  $extension_magang;
      //        $destination_magang      = "$folderPath/$new_filename3";

      //        rename($temp_location, $destination_magang);   
      //}
      //}else{
      //echo '<script language="javascript">alert("Error: Format Upload tidak sesuai 3 '.$file_magang.'"); document.location="index.php?page=usulan_penelitian";</script>';
      //}


      $in = $conn->query("INSERT INTO `tb_jadwal_sidang` (`id_jadwal`, `periode_sidang`, `jenis_sidang`, `id_tugas_akhir`, `file_laporan`, `id_pra_sidang`, `file_prasidang`, `penguji_1`, `penguji_2`, `tanggal_sidang`,`jam_sidang`) VALUES (NULL, '$periode_sidang', '$pilih_sidang', '$id_tugas_akhir', '$file_laporan', '$id_pra_sidang', '$destination_pendukung', '0', '0', '1970-01-01', '08.30 - Selesai');");

          if($in){
          //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';  
          echo "
              <script type='text/javascript'>
               setTimeout(function () { 
                  Swal.fire({
                    type: 'success',
                    title: 'Pendaftaran berhasil ditambahkan',
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
                    title: 'Pendaftaran gagal ditambahkan',
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

if($_GET['aksi'] == "set_jadwal"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_jadwal     = mysqli_real_escape_string($conn,$_POST['id_jadwal']);

                        if ($token_session === $token_post) {

                        $penguji_1             = mysqli_real_escape_string($conn,$_POST['penguji_1']);
                        $penguji_2             = mysqli_real_escape_string($conn,$_POST['penguji_2']);
                        $tanggal_sidang        = mysqli_real_escape_string($conn,$_POST['tanggal_sidang']);
                        $jam_sidang            = mysqli_real_escape_string($conn,$_POST['jam_sidang']);

                        $periode = mysqli_real_escape_string($conn,$_POST['periode_sidang']);
                        $periode = base64_encode($periode);
                                              
                        if($id_jadwal){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_jadwal_sidang` SET 
                                `penguji_1` = '$penguji_1',
                                `penguji_2` = '$penguji_2',
                                `tanggal_sidang` = '$tanggal_sidang',
                                `jam_sidang` = '$jam_sidang'
                                WHERE `tb_jadwal_sidang`.`id_jadwal` = $id_jadwal;");

                                if($in){
                                echo '<script language="javascript">alert("Berhasil"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';  
                                //echo "
                                //    <script type='text/javascript'>
                                //     setTimeout(function () { 
                                //        Swal.fire({
                                //          type: 'success',
                                //          title: 'Penugasan penguji berhasil',
                                //          showConfirmButton: false
                                //        });  
                                //             },10); 
                                //             window.setTimeout(function(){ 
                                //              window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                //             } ,3000); 
                                //            </script>
                                //      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'gagal',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                             } ,3000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.';</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "assign_penguji_satu"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_jadwal     = mysqli_real_escape_string($conn,$_GET['id_jadwal']);

                        if ($token_session === $token_post) {

                        $reviewer_satu             = mysqli_real_escape_string($conn,$_GET['id_dosen']);
                        $periode = mysqli_real_escape_string($conn,$_GET['periode']);
                        //$periode = base64_decode($periode);
                                              
                        if($id_jadwal){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_jadwal_sidang` SET 
                                `penguji_1` = '$reviewer_satu'
                                WHERE `tb_jadwal_sidang`.`id_jadwal` = $id_jadwal;");

                                if($in){
                                echo '<script language="javascript">alert("assign penguji Berhasil di pilih"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';  
                                //echo "
                                //    <script type='text/javascript'>
                                //     setTimeout(function () { 
                                //        Swal.fire({
                                //          type: 'success',
                                //          title: 'Penugasan penguji berhasil',
                                //          showConfirmButton: false
                                //        });  
                                //             },10); 
                                //             window.setTimeout(function(){ 
                                //              window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                //             } ,3000); 
                                //            </script>
                                //      "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Penugasan reviewer gagal',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                             } ,3000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.';</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "assign_penguji_dua"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_jadwal     = mysqli_real_escape_string($conn,$_GET['id_jadwal']);

                        if ($token_session === $token_post) {

                        $reviewer_satu             = mysqli_real_escape_string($conn,$_GET['id_dosen']);
                        $periode = mysqli_real_escape_string($conn,$_GET['periode']);
                        //$periode = base64_decode($periode);
                                              
                        if($id_jadwal){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_jadwal_sidang` SET 
                                `penguji_2` = '$reviewer_satu'
                                WHERE `tb_jadwal_sidang`.`id_jadwal` = $id_jadwal;");

                                if($in){
                                //echo '<script language="javascript">alert("assign reviewer Berhasil di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>';
                                echo '<script language="javascript">alert("assign penguji Berhasil di pilih"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';  
                                // echo "
                                //     <script type='text/javascript'>
                                //      setTimeout(function () { 
                                //         Swal.fire({
                                //           type: 'success',
                                //           title: 'Penugasan penguji berhasil',
                                //           showConfirmButton: false
                                //         });  
                                //              },10); 
                                //              window.setTimeout(function(){ 
                                //               window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                //              } ,3000); 
                                //             </script>
                                //       "; 
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Penugasan reviewer gagal',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                             } ,3000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.';</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "set_tanggal_sidang"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_jadwal     = mysqli_real_escape_string($conn,$_GET['id_jadwal']);

                        if ($token_session === $token_post) {

                        $tanggal_sidang             = mysqli_real_escape_string($conn,$_POST['tanggal_sidang']);
                        $periode = mysqli_real_escape_string($conn,$_GET['periode']);
                        //$periode = base64_decode($periode);
                                              
                        if($id_jadwal){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_jadwal_sidang` SET 
                                `tanggal_sidang` = '$tanggal_sidang'
                                WHERE `tb_jadwal_sidang`.`id_jadwal` = $id_jadwal;");

                                if($in){
                                echo '<script language="javascript">document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';  
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Set Tanggal Sidang gagal',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                             } ,3000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.';</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "set_jam_sidang"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_jadwal     = mysqli_real_escape_string($conn,$_GET['id_jadwal']);

                        if ($token_session === $token_post) {

                        $jam_sidang             = mysqli_real_escape_string($conn,$_POST['jam_sidang']);
                        $periode = mysqli_real_escape_string($conn,$_GET['periode']);
                        //$periode = base64_decode($periode);
                                              
                        if($id_jadwal){
                              ////proses biodata
                              $in = $conn->query("UPDATE `tb_jadwal_sidang` SET 
                                `jam_sidang` = '$jam_sidang'
                                WHERE `tb_jadwal_sidang`.`id_jadwal` = $id_jadwal;");

                                if($in){
                                echo '<script language="javascript">document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.'";</script>';  
                                }
                                else
                                {
                                  //echo '<script language="javascript">alert("assign reviewer Gagal di pilih"); document.location="index.php?page=list_usulan_penelitian_pm";</script>'; 
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'error',
                                          title: 'Set Jam Sidang gagal',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=assign_jadwal_sidang2&periode=".$periode."');
                                             } ,3000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=assign_jadwal_sidang2&periode='.$periode.';</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "tambah_periode_sidang"){

                      session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if ($token_session === $token_post) {

                        $periode_sidang             = mysqli_real_escape_string($conn,$_POST['periode_sidang']);
                        $tanggal_buka            = mysqli_real_escape_string($conn,$_POST['tanggal_buka']);
                        $tanggal_tutup            = mysqli_real_escape_string($conn,$_POST['tanggal_tutup']);
                                              
                        if($periode_sidang && $tanggal_buka && $tanggal_tutup){
                              ////proses biodata
                               $in = $conn->query("INSERT INTO `tb_periode_ta` (`id_periode`, `periode_sidang`, `buka_sidang`, `tutup_sidang`) VALUES (NULL, '$periode_sidang ', '$tanggal_buka', '$tanggal_tutup');");  


                                if($in){

                                 echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Periode Sidang telah ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=periode_sidang');
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
                                    title: 'Periode Sidang gagal ditambahkan',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=periode_sidang');
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
                                        window.location.replace('index.php?page=periode_sidang');
                                       } ,3000); 
                                      </script>
                                  "; 
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "update_periode_sidang"){

                      session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);
                        $id_periode    = mysqli_real_escape_string($conn,$_POST['id_periode']);

                        if ($token_session === $token_post) {

                        $periode_sidang             = mysqli_real_escape_string($conn,$_POST['periode_sidang']);
                        $tanggal_buka            = mysqli_real_escape_string($conn,$_POST['tanggal_buka']);
                        $tanggal_tutup            = mysqli_real_escape_string($conn,$_POST['tanggal_tutup']);
                                              
                        if($periode_sidang && $tanggal_buka && $tanggal_tutup){
                              ////proses biodata
                               $in = $conn->query("UPDATE `tb_periode_ta` SET `periode_sidang` = '$periode_sidang', `buka_sidang` = '$tanggal_buka', `tutup_sidang` = '$tanggal_tutup' WHERE `tb_periode_ta`.`id_periode` = $id_periode;");  


                                if($in){

                                 echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Periode Sidang telah diupdate',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=periode_sidang');
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
                                    title: 'Periode Sidang gagal diupdate',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=periode_sidang');
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
                                        window.location.replace('index.php?page=periode_sidang');
                                       } ,3000); 
                                      </script>
                                  "; 
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }

}

if($_GET['aksi'] == "delete_periode"){

  $id = abs((int)$_GET['id']);
    $cek = $conn->query("SELECT * FROM tb_periode_ta WHERE id_periode ='$id'");
    if(mysqli_num_rows($cek) != 0){
    $del = $conn->query("DELETE FROM tb_periode_ta WHERE id_periode ='$id'");
    if($del){
    echo '<script language="javascript">alert("Periode berhasil dihapus."); document.location="index.php?page=periode_sidang";</script>';
    }else{
    echo '<script language="javascript">alert("Periode Gagal dihapus."); document.location="index.php?page=periode_sidang";</script>';
    }
    }else{
    echo '<script language="javascript">alert("Periode tidak ditemukan."); document.location="index.php?page=periode_sidang";</script>';
                      }
}

?>