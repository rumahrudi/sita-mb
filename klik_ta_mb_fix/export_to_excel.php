<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekapitulasi-Jadwal-Sidang.xls");
?>

<div class="container-fluid">
  <h1>List Jadwal Sidang</h1>       
  <p>Rekapitulasi Jadwal Sidang </p>

  <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                 <th>No</th>
                  <th >Jenis Usulan</th>
                  <th >NIM</th>
                  <th >Nama</th>
                  <th >No WA</th>
                  <th >Judul</th>
                  <th >Pembimbing</th>
                  <th >Penguji 1</th>
                  <th >Penguji 2</th>
                  <th >Tanggal Sidang</th>
                  <th >Jam Sidang</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                $periode = base64_decode($_GET['periode']);
                $no=1;
                     $sql = $conn->query("SELECT * FROM `tb_jadwal_sidang` WHERE periode_sidang = '$periode'");
                      while($data = mysqli_fetch_assoc($sql)){
                        $periodsidang = $data['periode_sidang'];
                        $idjadwal = $data['id_jadwal'];
                        $id_mhs = $data['id_tugas_akhir'];

                        $idmhs= $data['id_tugas_akhir'];
                        $iddosen = $data['penguji_1'];
                        $iddosen2 = $data['penguji_2'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                        $data2 = mysqli_fetch_assoc($sql2);
                        $id_pembimbing = $data2['id_dosen'];

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$id_mhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $nama_mhs = $data5['nama'];
                        $nim_mhs = $data5['nim'];
                        $no_wa = $data5['no_wa'];

                        $sql6  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$id_pembimbing' ;");
                        $data6 = mysqli_fetch_assoc($sql6);
                        $pembimbing = $data6['nama'];

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['jenis_sidang'].'</td>';
                        echo '<td >'.$nim_mhs.'</td>';
                        echo '<td >'.$nama_mhs.'</td>';
                        echo '<td >'.$no_wa.'</td>';
                        echo '<td >'.$data2['judul'].'</td>';
                        echo '<td >'.$pembimbing.'</td>';
                        echo '<td >'.$namadosen.'</td>';
                        echo '<td >'.$namadosen2.'</td>';
                        echo '<td >'.$data['tanggal_sidang'].'</td>';
                        echo '<td >'.$data['jam_sidang'].'</td>';                    
                        echo '</tr>';
                        $no++;

                       
                      }
              ?>  
               </tbody>
              </table>
              </table>
</div>