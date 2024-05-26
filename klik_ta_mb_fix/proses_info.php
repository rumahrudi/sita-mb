<link rel="stylesheet" href="dist/css/app.css">
<script src="dist/js/sweetalert2.all.min.js"></script>

<?php
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include "config.php";

if($_GET['aksi'] == "insert"){
	 session_start();
     $token_session = $_SESSION['token'];
     $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

        if ($token_session === $token_post) {

		$judul 		= mysqli_real_escape_string($conn,$_POST['judul']);
		$isi_notice = mysqli_real_escape_string($conn,$_POST['isi_notice']);
		$tanggal 	= mysqli_real_escape_string($conn,$_POST['tanggal']);

		if($judul && $isi_notice && $tanggal){

			$sql = "INSERT INTO `tb_info` (`id_info`, `title_info`, `isi_info`, `tanggal_info`) VALUES (NULL, '$judul', '$isi_notice ', '$tanggal')";

			$result = $conn->query($sql) or die("Cannot write");

			if($result){
		     //echo '<script language="javascript">alert("Informasi berhasil ditambahkan."); document.location="index.php?page=list_info";</script>';
				echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Informasi telah ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=list_info');
                                     } ,3000); 
                                    </script>
                                  ";
			}else{
                                  //echo '<script language="javascript">alert("User Gagal di update"); document.location="index.php?page=list_peneliti";</script>';
                echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Informasi gagal telah ditambahkan',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_info');
                                       } ,3000); 
                                      </script>
                                  ";  
                                }
		}else{
           echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_peneliti";</script>';
        }	
		}else {
            echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
        }		
}


if($_GET['aksi'] == "update"){

	session_start();
     $token_session = $_SESSION['token'];
     $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

	if ($token_session === $token_post) {

		$id_info		= mysqli_real_escape_string($conn,$_POST['id_info']); 

			$judul 		= mysqli_real_escape_string($conn,$_POST['judul']);
			$isi_notice = mysqli_real_escape_string($conn,$_POST['isi_notice']);
			$tanggal 	= mysqli_real_escape_string($conn,$_POST['tanggal']);

			if($judul && $isi_notice && $tanggal){
				$in = $conn->query("UPDATE `tb_info` SET 
					`title_info` = '$judul', 
					`isi_info` = '$isi_notice', 
					`tanggal_info` = '$tanggal'
					WHERE `tb_info`.`id_info` = $id_info");
				if($in){
				//echo '<script language="javascript">alert("Data BERHASIL diubah.");  document.location="index.php?page=list_info";</script>';
					echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Informasi telah diperbaharui',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=list_info');
                                     } ,3000); 
                                    </script>
                                  ";
				}else{
				//echo '<script language="javascript">alert("Ubah data GAGAL. Silahkan Ulangi."); document.location="index.php?page=list_info"; </script>';
					echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Informasi gagal telah diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_info');
                                       } ,3000); 
                                      </script>
                                  ";  
                                }
				
				}else{
				echo '<script language="javascript">alert("harap tidak ada yang kosong"); document.location="index.php?page=list_info"; </script>';
				}
	}else {
            echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
        }
}

if($_GET['aksi'] == "update_tutup_buka"){

  session_start();
     $token_session = $_SESSION['token'];
     $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

  if ($token_session === $token_post) {

    $id_tutup_buka    = mysqli_real_escape_string($conn,$_POST['id_tutup_buka']); 

      $tanggal_buka  = mysqli_real_escape_string($conn,$_POST['tanggal_buka']);
      $tanggal_tutup  = mysqli_real_escape_string($conn,$_POST['tanggal_tutup']);

      if($id_tutup_buka && $tanggal_buka && $tanggal_tutup){
        $in = $conn->query("UPDATE `tb_tutup_buka_usulan` SET 
          `tanggal_buka` = '$tanggal_buka', 
          `tanggal_tutup` = '$tanggal_tutup'
          WHERE `tb_tutup_buka_usulan`.`id_tutup_buka` = $id_tutup_buka");
        if($in){
        //echo '<script language="javascript">alert("Data BERHASIL diubah.");  document.location="index.php?page=list_info";</script>';
          echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Informasi telah diperbaharui',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=tutup_buka_usulan');
                                     } ,3000); 
                                    </script>
                                  ";
        }else{
        //echo '<script language="javascript">alert("Ubah data GAGAL. Silahkan Ulangi."); document.location="index.php?page=list_info"; </script>';
          echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Informasi gagal telah diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=tutup_buka_usulan');
                                       } ,3000); 
                                      </script>
                                  ";  
                                }
        
        }else{
        echo '<script language="javascript">alert("harap tidak ada yang kosong"); document.location="index.php?page=list_info"; </script>';
        }
  }else {
            echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
        }
}



if($_GET['aksi'] == "delete"){
                      $id = abs((int)$_GET['id']);
                      $cek = $conn->query("SELECT * FROM tb_info WHERE id_info='$id'");
                      if(mysqli_num_rows($cek) != 0){
                        $del = $conn->query("DELETE FROM tb_info WHERE id_info='$id'");
                        if($del){
                           //echo '<script language="javascript">alert("Informasi berhasil dihapus."); document.location="index.php?page=list_info";</script>';
                        	echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Informasi telah dihapus',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=list_info');
                                     } ,3000); 
                                    </script>
                                  ";
                        }else{
                          //echo '<script language="javascript">alert("Informasi Gagal dihapus."); document.location="index.php?page=list_info";</script>';
                        	echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'Informasi gagal telah dihapus',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_info');
                                       } ,3000); 
                                      </script>
                                  ";  
                                }
                        
                      }else{
                        echo '<script language="javascript">alert("Informasi tidak ditemukan."); document.location="index.php?page=list_info";</script>';
                      }
}

if($_GET['aksi'] == "update_file"){

                        session_start();
                        $token_session = $_SESSION['token'];
                        $jenis_file = $_POST['jenis_file'];
                        $filename         = $_FILES["file"]["name"];

                        $extension        = pathinfo($filename, PATHINFO_EXTENSION);

                        $newfilename      = "PanduanPengabdian2020.".$extension;
                        
                        $ekstensi_diperbolehkan = array('pdf','PDF');
                       
                        $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

                        if(in_array($extension, $ekstensi_diperbolehkan) === true){

                        if ($token_session === $token_post) { 
                  
                        if($filename){

                                  // Define path where file will be uploaded to
                                  //   User ID is set as directory name
                                  $folderPath = "template/";

                                  // Check to see if directory already exists
                                  $exist = is_dir($folderPath);

                                  // If directory doesn't exist, create directory
                                  if(!$exist) {
                                  mkdir("$folderPath");
                                  chmod("$folderPath", 0755);
                                  }
                                  else { //echo "Folder already exists"; }
                                    $target_path = "template/temp_uploads/";
                                    $target_path .= basename( $_FILES['file']['name']);
                                    $nama_file = 'template/'.$newfilename.'';                                    

                                    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                    $temp_location = 'template/temp_uploads/' . basename( $_FILES['file']['name']);

                                    $newfilename_pd      = "PanduanPengabdian2020.".$extension;
                                    
                                    $destination         = "$folderPath$newfilename_pd";

                                    rename($temp_location, $destination);
        
                                    echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'File berhasil diperbaharui',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=list_file');
                                             } ,3000); 
                                            </script>
                                        ";
                                    
                                    }
                               else
                               {
                                //echo '<script language="javascript">alert("Poto Gagal diupload."); document.location="index.php?page=identitas";</script>';
                                echo "
                                      <script type='text/javascript'>
                                       setTimeout(function () { 
                                  Swal.fire({
                                    type: 'error',
                                    title: 'File gagal diperbaharui',
                                    showConfirmButton: false
                                  });  
                                       },10); 
                                       window.setTimeout(function(){ 
                                        window.location.replace('index.php?page=list_file');
                                       } ,3000); 
                                      </script>
                                  ";
                               }

                          }
                        }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong edit"); document.location="index.php?page=identitas";</script>';
                        }
                        } else {
                          // ERROR - INVALID TOKEN
                          echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
                      }
                        
                      } 
?>