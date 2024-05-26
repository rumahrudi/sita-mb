<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekapitulasi-judul-pembimbing.xls");
?>

<div class="container-fluid">
  <h1>List Penilaian Bimbingan TA2</h1>       
  <p>Rekapitulasi Penilaian Bimbingan TA2 </p>

  <table id="load" class="table table-hover">
          <thead>
                <tr>
                 <th>ID</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Pembimbing</th>
                  <th>Judul</th>
                  <th width="20%">Status Sidang</th>
                </tr>
              </thead>
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT * FROM tb_user_mhs WHERE status = 'Aktif' ORDER BY nim ASC");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_mhs = $data['id_user_mhs'];
                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['nim'].'</td>';
                        echo '<td >'.$data['nama'].'</td>';

                        $sql3  = $conn->query("SELECT * FROM tb_tugas_akhir WHERE id_mhs = '$id_mhs'");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $iddosen = $data3['id_dosen'];
                        $id_ta = $data3['id_mhs'];
                        
                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen = $data4['nama'];

                        echo '<td >'.$namadosen.'</td>';
                        if(empty($data3['judul'])){

                        }
                        echo '<td >'.$data3['judul'].'</td>';
                        echo '<td >
                        '.$data3['status'].'
                        </td>';
                        echo '</tr>';
                        $no++;
                      }
              ?>  
               </tbody>
        </table>
</div>