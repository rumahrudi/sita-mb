<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekapitulasi-Penilaian-Bimbingan-Baru.xls");
?>

<div class="container-fluid">
  <h1>List Penilaian Bimbingan Baru</h1>       
  <p>Rekapitulasi Penilaian Bimbingan </p>

<table id="load" class="table table-hover">
          <thead>
                <tr>
                 <th>ID</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Judul</th>
                  <th>Pembimbing</th>
                  <th>#1</th>
                  <th>#2</th>
                  <th>#3</th>
                  <th>#4</th>
                  <th>#5</th>
                  <th>#6</th>
                  <th>#7</th>
                  <th>#8</th>
                  <th>#9</th>
                </tr>
              </thead>
               <tbody>
                <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $id = $_SESSION['id_user'];
                    $sql  = $conn->query("SELECT * FROM `tb_penilaian_ta2_baru`");
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
                        echo '<td >'.$data['nilai_9'].'</td>';                                             
                        echo '</tr>';
                        $no++;
                      }
              ?>  
               </tbody>
        </table>
</div>