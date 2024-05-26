
<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
 include 'config.php';
 daftarSaksi($_GET['search']);
}
 
function daftarSaksi($search){
 global $conn;
 
 if ($conn->connect_error) {
     die("Koneksi Gagal: " . $conn->connect_error);
 }
 
 $sql = "SELECT * FROM tb_user WHERE nama LIKE '%$search%' ORDER BY nama ASC";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
     $list = array();
     $key=0;
     while($row = $result->fetch_assoc()) {
         $list[$key]['id'] = $row['id_user'];
         $list[$key]['text'] = $row['nama']; 
     $key++;
     }
     echo json_encode($list);
 } else {
     echo "hasil kosong";
 }
 $conn->close();
}
 
?>