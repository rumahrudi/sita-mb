<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'config.php';
session_start();
$token = $_SESSION['token'];
   
   // melakukan pengecekan koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
 
    if($_POST['rowid']) {
        $id = mysqli_real_escape_string($conn,$_POST['rowid']);
        $sql = "SELECT * FROM `tb_jadwal_sidang` WHERE id_jadwal = $id";
        $result = $conn->query($sql);
        foreach ($result as $baris) { 
          $id_user = $baris['id_user'];
          $periode_sidang = $baris['periode_sidang'];
          $jenis_sidang = $baris['jenis_sidang'];
          $id_tugas_akhir = $baris['id_tugas_akhir'];
          $file_laporan = $baris['file_laporan'];
          $penguji_1 = $baris['penguji_1'];
          $penguji_2 = $baris['penguji_2'];
          $tanggal_sidang = $baris['tanggal_sidang'];
          $jam_sidang = $baris['jam_sidang'];

                        $idmhs= $baris['id_tugas_akhir'];
                        $iddosen = $baris['penguji_1'];
                        $iddosen2 = $baris['penguji_2'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_1';");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$penguji_2';");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$idmhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $nama_mhs = $data5['nama'];
                        $nim_mhs = $data5['nim'];

                        $sql6  = $conn->query("SELECT * FROM `tb_laporan_ta` WHERE `id_mhs` = $idmhs ;");
                        $data6 = mysqli_fetch_assoc($sql6);
?>
        <!-- MEMBUAT FORM -->
        <form class="form-horizontal" action="proses_jadwalsidang.php?aksi=set_jadwal" method="post">
            <input type="hidden" name="id_jadwal" value="<?php echo $id; ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
              <div class="form-group ">
                  <div class="col-sm-12">
                  <input type="text" class="form-control form-control-sm" id="periode_sidang" name="periode_sidang" value="<?php echo $periode_sidang; ?>">
                  </div>
                </div>
							  <div class="form-group ">
                  <div class="col-sm-12">
                  <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $jenis_sidang; ?>" disabled>
                  </div>
                </div>	
                <div class="form-group ">
                  <div class="col-sm-12">
                  <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $nim_mhs .' - ' . $nama_mhs; ?>" disabled>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="col-sm-12">
                  <p><?php echo $data2['judul']; ?></p>
                  </div>
                </div>
                <div class="form-group ">
                  <label  class="col-sm-2 control-label" for="inputEmail3">Penguji 1</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="penguji_1" required>
                              <option value="<?php echo $penguji_1; ?>"><?php echo $namadosen; ?></option>
                              <?php
                              include 'config.php';
                              error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                               $sql_kampus  = $conn->query("SELECT * FROM `tb_user` ORDER BY nama ASC");
                                while($data_kampus = mysqli_fetch_assoc($sql_kampus)){
                                  echo '<option value="'.$data_kampus['id_user'].'">'.$data_kampus['nama'].'</option>';
                                }
                              ?>
                            </select>
                  </div>
                </div> 		
                 <div class="form-group ">
                  <label  class="col-sm-2 control-label" for="inputEmail3">Penguji 2</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="penguji_2" required>
                              <option value="<?php echo $penguji_2; ?>"><?php echo $namadosen2; ?></option>
                              <?php
                              include 'config.php';
                              error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                               $sql_kampus  = $conn->query("SELECT * FROM `tb_user` ORDER BY nama ASC");
                                while($data_kampus = mysqli_fetch_assoc($sql_kampus)){
                                  echo '<option value="'.$data_kampus['id_user'].'">'.$data_kampus['nama'].'</option>';
                                }
                              ?>
                            </select>
                            <span class="help-block">Riwayat Penguji :<br>
                            <?php
                            $sql_penguji = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE id_tugas_akhir = '$idmhs'");
                            while($data_penguji = mysqli_fetch_assoc($sql_penguji)){
    
                             $idmhs= $data_penguji['id_tugas_akhir'];
                             $iddosen = $data_penguji['penguji_1'];
                             $iddosen2 = $data_penguji['penguji_2'];
                             $jenis_sidang = $data_penguji['jenis_sidang'];
     
                             $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                             $data2 = mysqli_fetch_assoc($sql2);
     
                             $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                             $data3 = mysqli_fetch_assoc($sql3);
                             $namadosen = $data3['nama'];
     
                             $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                             $data4 = mysqli_fetch_assoc($sql4);
                             $namadosen2 = $data4['nama'];
                             if($iddosen != 0){
                              echo $jenis_sidang;
                              echo " <br> ";
                              echo "<i>";
                              echo $namadosen;
                              echo " & ";
                              echo $namadosen2;
                              echo "<br>";
                              echo "</i>";
                             }
                             
                
                           }
                            ?>
                            </span>
                  </div>
                  
                </div> 

                <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Tanggal</button>
                          </span>
                          <input type="date" id="tanggal_sidang" name="tanggal_sidang" class="form-control" value="<?php echo $tanggal_sidang; ?>">
                        </div> 	
                        <br>
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default">Jam</button>
                          </span>
                          <input type="text" id="jam_sidang" name="jam_sidang" class="form-control" value="<?php echo $jam_sidang; ?>">
                        </div>		  			  
          			<div class="modal-footer">			
                      <button class="btn btn-primary btn-block" type="submit">Set Jadwal Sidang</button>
          			</div>
        </form>
        <?php 
		} 
	}
    $conn->close();
?>