<link rel="stylesheet" href="dist/css/app.css">
<script src="dist/js/sweetalert2.all.min.js"></script>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include "config.php";

if($_GET['aksi'] == "ajukan"){
	 session_start();
    $token_session = $_SESSION['token'];
    $token_post    = mysqli_real_escape_string($conn,$_POST['token']);

    if ($token_session === $token_post) {

    $id_dosen = mysqli_real_escape_string($conn,$_POST['id_dosen']);
    $id_user = mysqli_real_escape_string($conn,$_POST['id_user']);
		$judul 		= mysqli_real_escape_string($conn,$_POST['judul']);
		$deskripsi = mysqli_real_escape_string($conn,$_POST['deskripsi']);
		$tanggal_pengajuan = date("Y-m-d");

		if($id_user && $judul && $deskripsi && $tanggal_pengajuan){

			$sql = "INSERT INTO `tb_pengajuan_pembimbing` (`id_pengajuan`, `id_dosen`, `id_mhs`, `judul`, `deskripsi`, `tanggal`, `status`) VALUES (NULL, '$id_dosen', '$id_user ', '$judul', '$deskripsi','$tanggal_pengajuan', 'Diajukan')";

			$result = $conn->query($sql) or die("Cannot write");

			if($result){
		     //echo '<script language="javascript">alert("Informasi berhasil ditambahkan."); document.location="index.php?page=list_info";</script>';
				echo "
                                <script type='text/javascript'>
                                setTimeout(function () { 
                                Swal.fire({
                                  type: 'success',
                                  title: 'Pengajuan pembimbing telah ditambahkan',
                                  showConfirmButton: false
                                });  
                                     },10); 
                                     window.setTimeout(function(){ 
                                      window.location.replace('index.php?page=list_dosen');
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
                                    title: 'Pengajuan pembimbing  gagal telah ditambahkan',
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


if($_GET['aksi'] == "ubah_status"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_pengajuan = mysqli_real_escape_string($conn,$_GET['id_pengajuan']);

                        if ($token_session === $token_post) {

                        $status_kkt  = mysqli_real_escape_string($conn,$_GET['status']);
                                              
                        if($status_kkt && $id_pengajuan){
                              ////proses


                              $in = $conn->query("UPDATE `tb_pengajuan_pembimbing` SET 
                                `status` = '$status_kkt' 
                                WHERE `tb_pengajuan_pembimbing`.`id_pengajuan` = $id_pengajuan;");

                                if($in){

                                if($status_kkt == "Disetujui"){

                                  $sql2  = $conn->query("SELECT * FROM `tb_pengajuan_pembimbing` WHERE `id_pengajuan` = $id_pengajuan ;");
                                  $data2 = mysqli_fetch_assoc($sql2);

                                  $id_dosen = $data2['id_dosen'];
                                  $id_mhs = $data2['id_mhs'];
                                  $judul = $data2['judul'];
                                  $deskripsi = $data2['deskripsi'];

                                  $on = $conn->query("INSERT INTO `tb_tugas_akhir` (`id_dosen`, `id_mhs`, `judul`, `deskripsi`) VALUES ('$id_dosen', '$id_mhs', '$judul', '$deskripsi');");
                                }

                                echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Pengajuan bimbingan ".$status_kkt."',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=list_pengajuan');
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
                                          title: 'Pengajuan bimbingan gagal ditambahkan',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=list_pengajuan');
                                             } ,3000); 
                                            </script>
                                      "; 
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=list_pengajuan";</script>';
                        }
                        } else {
                         echo '<script language="javascript">alert("Error: CSRF Protection"); document.location="logout.php";</script>';
                        }
}

if($_GET['aksi'] == "assign_pembimbing_satu"){

   session_start();
                        $token_session = $_SESSION['token'];
                        $token_post    = mysqli_real_escape_string($conn,$_GET['token']);
                        $id_mhs     = mysqli_real_escape_string($conn,$_GET['id_mhs']);

                        if ($token_session === $token_post) {

                        $pembimbing_satu             = mysqli_real_escape_string($conn,$_GET['id_dosen']);
                                              
                        if($id_mhs){

                          $sql3  = $conn->query("SELECT * FROM tb_tugas_akhir WHERE id_mhs = '$id_mhs'");
                          $data3 = mysqli_fetch_assoc($sql3);
                          $id_dosenn = $data3['id_dosen']; 

                            if (isset($data3)){
                              $in = $conn->query("UPDATE `tb_tugas_akhir` SET `id_dosen` = '$pembimbing_satu' WHERE `tb_tugas_akhir`.`id_mhs` = '$id_mhs';");
                            }
                            else{
                              $in = $conn->query("INSERT INTO `tb_tugas_akhir` (`id_mhs`, `id_dosen`, `judul`, `judul_inggris`, `deskripsi`, `status`) VALUES ('$id_mhs', '$pembimbing_satu',  '-', '-', '-', 'Proposal');");
                            }
                              ////proses biodata
                              
                                if($in){
                                //echo '<script language="javascript">document.location="index.php?page=assign_pembimbing_mhs";</script>';  
                                  echo "
                                    <script type='text/javascript'>
                                     setTimeout(function () { 
                                        Swal.fire({
                                          type: 'success',
                                          title: 'Penugasan pembimbing berhasil',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=assign_pembimbing_mhs');
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
                                          title: 'Penugasan pembimbing gagal',
                                          showConfirmButton: false
                                        });  
                                             },10); 
                                             window.setTimeout(function(){ 
                                              window.location.replace('index.php?page=assign_pembimbing_mhs');
                                             } ,2000); 
                                            </script>
                                      ";
                                }
                              }
                        else{
                         echo '<script language="javascript">alert("Error: Data tidak boleh kosong"); document.location="index.php?page=assign_pembimbing_mhs";</script>';
                        }
                        } else {
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


?>