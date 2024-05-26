<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekapitulasi-Penilaian-TA1.xls");
?>

<div class="container-fluid">
  <h1>List Penilaian Bimbingan TA1</h1>       
  <p>Rekapitulasi Penilaian Bimbingan TA1 </p>

<table id="load" class="table table-hover">
          <thead>
                <tr>
                 <th>ID</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Judul</th>
                  <th>Pembimbing</th>
                  <th>Progress penelitian mingguan (15%)</th>
                  <th>Kemandirian (15%)</th>
                  <th>Penguasaan Materi (30%)</th>
                  <th>Motivasi (15%)</th>
                  <th>Kemampuan Komunikasi</th>
                  <th>Studi Literatur (35%)</th>
                  <th>Kedalaman analisis/perancangan (35%)</th>
                  <th>Tata Tulis/Tata Bahasa (30%)</th>
                </tr>
              </thead>
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT * FROM `tb_penilaian_ta1`");
                    $no = 1;
                      while($data = mysqli_fetch_assoc($sql)){
                        $id_mhs = $data['id_mhs'];

                        $sql2  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = $id_mhs");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql3  = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = $id_mhs");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $id_dosen = $data3['id_dosen'];

                        if(empty($data3)){
                        $sql5  = $conn->query("SELECT * FROM `tb_anggota_tugas_akhir` WHERE id_mhs = $id_mhs");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $id_ta = $data5['id_tugas_akhir'];
                        $sql3  = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = $id_ta");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $id_dosen = $data3['id_dosen'];
                        }

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = $id_dosen");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $nama_dosen = $data4['nama'];

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data2['nim'].'</td>';
                        echo '<td >'.$data2['nama'].'</td>';                        
                        echo '<td >'.$data3['judul'].'</td>';                        
                        echo '<td >'.$data4['nama'].'</td>';                        
                        echo '<td >'.$data['nilai_1'].'</td>';                        
                        echo '<td >'.$data['nilai_2'].'</td>';                        
                        echo '<td >'.$data['nilai_3'].'</td>';                        
                        echo '<td >'.$data['nilai_4'].'</td>';                        
                        echo '<td >'.$data['nilai_5'].'</td>';                        
                        echo '<td >'.$data['nilai_6'].'</td>';                        
                        echo '<td >'.$data['nilai_7'].'</td>';                        
                        echo '<td >'.$data['nilai_8'].'</td>';                        
                        echo '</tr>';
                        $no++;
                      }
              ?>  
               </tbody>
        </table>
</div>