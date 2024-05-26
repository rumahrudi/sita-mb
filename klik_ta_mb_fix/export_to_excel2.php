<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekapitulasi-Penilaian-Sidang.xls");
?>

<div class="container-fluid">
  <h1>List Penilaian Sidang</h1>       
  <p>Rekapitulasi Penilaian Sidang </p>

  <table id="load" class="table table-hover">
              <thead>
                <tr>
                 <th>No</th>
                  <th width="10%">Jenis Usulan</th>
                  <th width="10%">NIM</th>
                  <th width="25%">Nama & Judul</th>
                  <th >Penguji 1 & 2</th>
                  <th >Tanggal Sidang</th>
                  <th >Sidang Ulang Penguji 1</th>
                  <th >Nilai 1</th>
                  <th >Nilai 2</th>
                  <th >Nilai 3</th>
                  <th >Nilai 4</th>
                  <th >Nilai 5</th>
                  <th >Nilai 6</th>
                  <th >Nilai 7</th>
                  <th >Nilai 8</th>
                  <th >Nilai 9</th>
                  <th >Nilai 10</th>
                  <th >Nilai 11</th>
                  <th >Nilai 12</th>
                  <th >Nilai 13</th>
                  <th >Catatan Penguji 1</th>
                  <th >Sidang Ulang Penguji 2</th>
                  <th >Nilai 1</th>
                  <th >Nilai 2</th>
                  <th >Nilai 3</th>
                  <th >Nilai 4</th>
                  <th >Nilai 5</th>
                  <th >Nilai 6</th>
                  <th >Nilai 7</th>
                  <th >Nilai 8</th>
                  <th >Nilai 9</th>
                  <th >Nilai 10</th>
                  <th >Nilai 11</th>
                  <th >Nilai 12</th>
                  <th >Nilai 13</th>
                  <th >Catatan Penguji 2</th>
                </tr>
              </thead>
               <tbody>
                <?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
                session_start();
                $periode = base64_decode($_GET['periode']);
                $month = date('m');
                $no=1;
                     $sql = $conn->query("SELECT *, DATE_FORMAT(`tanggal_sidang`, '%D %M %Y') as `tanggal` FROM `tb_jadwal_sidang` WHERE periode_sidang = '$periode'");
                       while($data = mysqli_fetch_assoc($sql)){
                        $periodsidang = $data['periode_sidang'];
                        $periodsidang = base64_encode($periodsidang);
                        $idjadwal = $data['id_jadwal'];
                        $id_ta = $data['id_tugas_akhir'];

                        $idmhs= $data['id_tugas_akhir'];
                        $iddosen = $data['penguji_1'];
                        $iddosen2 = $data['penguji_2'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                        $data2 = mysqli_fetch_assoc($sql2);

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$idmhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $namamhs = $data5['nama'];
                        $no_wa = $data5['no_wa'];
                        $nim = $data5['nim'];

                        $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen' ;");
                        $data6 = mysqli_fetch_assoc($sql6);
                        $nilai_1 = $data6['nilai_1'];
                          $nilai_2 = $data6['nilai_2'];
                          $nilai_3 = $data6['nilai_3'];
                          $nilai_4 = $data6['nilai_4'];
                          $nilai_5 = $data6['nilai_5'];
                          $nilai_6 = $data6['nilai_6'];
                          $nilai_7 = $data6['nilai_7'];
                          $nilai_8 = $data6['nilai_8'];
                          $nilai_9 = $data6['nilai_9'];
                          $nilai_10 = $data6['nilai_10'];
                          $nilai_11 = $data6['nilai_11'];
                          $nilai_12 = $data6['nilai_12'];
                          $nilai_13 = $data6['nilai_13'];
                        $komentar = $data6['catatan_perbaikan'];
                        $sidang_ulang = $data6['sidang_ulang'];

                        $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang_baru` WHERE id_jadwal = '$idjadwal' AND id_dosen = '$iddosen2' ;");
                        $data7 = mysqli_fetch_assoc($sql7);
                        $nilai_1222 = $data7['nilai_1'];
                        $nilai_22 = $data7['nilai_2'];
                        $nilai_32 = $data7['nilai_3'];
                        $nilai_42 = $data7['nilai_4'];
                        $nilai_52 = $data7['nilai_5'];
                        $nilai_62 = $data7['nilai_6'];
                        $nilai_72 = $data7['nilai_7'];
                        $nilai_82 = $data7['nilai_8'];
                        $nilai_92 = $data7['nilai_9'];
                        $nilai_102 = $data7['nilai_10'];
                        $nilai_112 = $data7['nilai_11'];
                        $nilai_122 = $data7['nilai_12'];
                        $nilai_132 = $data7['nilai_13'];
                        $komentar2 = $data7['catatan_perbaikan'];
                        $sidang_ulang2 = $data7['sidang_ulang'];
                        //$id_mhs =$data7['id_mhs'];

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['jenis_sidang'].'</td>';
                        echo '<td >'.$nim.'</td>';
                        echo '<td >'.$namamhs.'<br><i>'.$data2['judul'].'</i></td>';
                        echo '<td >'.$namadosen.' <br> '.$namadosen2.'</td>';
                        echo '<td >'.$data['tanggal'].' <br> '.$data['jam_sidang'].'</td>';
                        echo '<td >'.$sidang_ulang.'</td>';
                        echo '<td >'.$nilai_1.'</td>';
                        echo '<td >'.$nilai_2.'</td>';
                        echo '<td >'.$nilai_3.'</td>';
                        echo '<td >'.$nilai_4.'</td>';
                        echo '<td >'.$nilai_5.'</td>';
                        echo '<td >'.$nilai_6.'</td>';
                        echo '<td >'.$nilai_7.'</td>';
                        echo '<td >'.$nilai_8.'</td>';
                        echo '<td >'.$nilai_9.'</td>';
                        echo '<td >'.$nilai_10.'</td>';
                        echo '<td >'.$nilai_11.'</td>';
                        echo '<td >'.$nilai_12.'</td>';
                        echo '<td >'.$nilai_13.'</td>';
                        echo '<td >'.$komentar.'</td>';
                        echo '<td >'.$sidang_ulang2.'</td>';
                        echo '<td >'.$nilai_1222.'</td>';
                        echo '<td >'.$nilai_22.'</td>';
                        echo '<td >'.$nilai_32.'</td>';
                        echo '<td >'.$nilai_42.'</td>';
                        echo '<td >'.$nilai_52.'</td>';
                        echo '<td >'.$nilai_62.'</td>';
                        echo '<td >'.$nilai_72.'</td>';
                        echo '<td >'.$nilai_82.'</td>';
                        echo '<td >'.$nilai_92.'</td>';
                        echo '<td >'.$nilai_102.'</td>';
                        echo '<td >'.$nilai_112.'</td>';
                        echo '<td >'.$nilai_122.'</td>';
                        echo '<td >'.$nilai_132.'</td>';
                        echo '<td >'.$komentar2.'</td>';
                        echo '</tr>';
                        $no++;                   
                      }
              ?>  
               </tbody>
              </table>
</div>