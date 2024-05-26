
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export List Jadwal Sidang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container-fluid ">
  <h1>List Jadwal Sidang</h1>      
  <p>List Jadwal Sidang <a href="export_to_excel.php?periode=<?php echo $_GET['periode']; ?>" class="btn btn-info btn-sm" role="button">Export to Excel</a></p>
  <div class="table-responsive">
  <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                 <th>No</th>
                  <th >Jenis Usulan</th>
                  <th >NIM</th>
                  <th >Nama</th>
                  <th >No WA</th>
                  <th >Judul</th>
                  <th >Status Persetujuan</th>
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

                        $sql8  = $conn->query("SELECT * FROM tb_jadwal_sidang WHERE id_tugas_akhir = $id_mhs ORDER BY id_jadwal DESC LIMIT 1;");
                        $data8 = mysqli_fetch_assoc($sql8);
                        $id_jadwal = $data8['id_jadwal']; //181
                        $penguji_1 = $data8['penguji_1']; // 1
                        $penguji_2 = $data8['penguji_2']; // 7
                        $jenis_sidang = $data8['jenis_sidang'];

                        $sql7  = $conn->query("SELECT * FROM tb_penilaian_sidang WHERE id_jadwal = $id_jadwal AND id_dosen = $penguji_1;");
                        $data7 = mysqli_fetch_assoc($sql7);
                        $sidang_ulang = $data7['sidang_ulang'];
                        $status = $data7['status'];

                        $sql71  = $conn->query("SELECT * FROM tb_penilaian_sidang WHERE id_jadwal = $id_jadwal AND id_dosen = $penguji_2;");
                        $data71 = mysqli_fetch_assoc($sql71);
                        $sidang_ulang1 = $data71['sidang_ulang'];
                        $status1 = $data71['status'];

                        echo '<tr>';
                        echo '<td >'.$no.'</td>';
                        echo '<td >'.$data['jenis_sidang'].'</td>';
                        echo '<td >'.$nim_mhs.'</td>';
                        echo '<td >'.$nama_mhs.'</td>';
                        echo '<td >'.$no_wa.'</td>';
                        echo '<td >'.$data2['judul'].'</td>';
                        echo '<td >'.$status.'</td>';
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
              </div>   
</div>