<?php
include "config.php";
session_start();
$id = $_SESSION['id_user'];

if(isset($_POST['email'])){
   $id_periode = $_POST['email'];

   $query = "select count(*) as cntUser from tb_laporan_ta where id_periode='".$id_periode."' AND id_mhs = ".$id."";

   $result = mysqli_query($conn,$query);
   $response = "<small id='passwordHelpBlock' class='form-text text-muted'>Bisa me-request approval Laporan TA</small>";
   $cek = "<script>$('#btn-add').prop('disabled', false);</script> ";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<small id='passwordHelpBlock1' class='form-text text-muted'>Anda suda me-request approval Laporan TA di periode ini.</small>";
          $cek = "<script>$('#btn-add').prop('disabled', true);</script> ";
      } 
   }

   echo $response;
   echo $cek;
   die;
}
?>