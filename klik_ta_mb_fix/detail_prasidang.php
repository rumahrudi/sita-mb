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
        $sql = "SELECT * FROM `tb_pra_sidang` WHERE id_pra_sidang = $id";
        $result = $conn->query($sql);
        foreach ($result as $baris) { 
          $id_mhs = $baris['id_mhs'];
          $catatan_dokumen = $baris['catatan_dokumen'];
          $catatan_aplikasi = $baris['catatan_aplikasi'];
          $draft_dokumen = $baris['draft_dokumen'];
          $demo_aplikasi = $baris['demo_aplikasi'];
          $tgl_pra_sidang = $baris['tgl_pra_sidang'];
          $status = $baris['status'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$id_mhs'");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$id_mhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $nama_mhs = $data5['nama'];
                        $nim_mhs = $data5['nim'];

                        $sql6  = $conn->query("SELECT * FROM `tb_laporan_ta` WHERE `id_mhs` = $id_mhs ;");
                        $data6 = mysqli_fetch_assoc($sql6);
?>
        <!-- MEMBUAT FORM -->
        <form class="form-horizontal" action="proses_jadwalsidang.php?aksi=set_jadwal" method="post">
            <input type="hidden" name="id_jadwal" value="<?php echo $id; ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">

                <div class="form-group ">
                  <div class="col-sm-12">
                  <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $nim_mhs .' - ' . $nama_mhs; ?>" disabled>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="col-sm-12">
                  <input type="text" class="form-control form-control-sm" id="judul" name="judul" value="<?php echo $data2['judul'];?>" disabled><br>
                  <input type="text" class="form-control form-control-sm" id="judul_inggris" name="judul_inggris" value="<?php echo $data2['judul_inggris'];?>" disabled>
                  </div>
                </div>
                <hr>
                <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Catatan Dokumen</button>
                          </span>
                          <input type="text" id="catatan_dokumen" name="catatan_dokumen" class="form-control" value="<?php echo $catatan_dokumen; ?>" readonly>
                          <span class="input-group-btn">
                            <a class="btn btn-default" href="viewer.php?file=<?php echo base64_encode($draft_dokumen); ?>" role="button" target="_blank">Lihat</a>
                          </span>
                        </div> 	
                <br>
                <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Catatan Aplikasi</button>
                          </span>
                          <input type="text" id="catatan_aplikasi" name="catatan_aplikasi" class="form-control" value="<?php echo $catatan_aplikasi; ?>" readonly>
                          <span class="input-group-btn">
                          <a class="btn btn-default" href="<?php echo $demo_aplikasi; ?>" role="button" target="_blank">Demo</a>
                          </span>
                        </div> 	
                <br>
                
                <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Tanggal Prasidang</button>
                          </span>
                          <input type="date" id="tgl_pra_sidang" name="tgl_pra_sidang" class="form-control" value="<?php echo $tgl_pra_sidang; ?>" readonly>
                        </div> 	
                        <br>
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Status Prasidang</button>
                          </span>
                          <input type="text" id="status" name="status" class="form-control" value="<?php echo $status; ?>" readonly>
                        </div> 	  			  
        </form>
        <?php 
		} 
	}
    $conn->close();
?>