<?php
include "config.php";

if(isset($_POST['username'])){
   $username = $_POST['username'];

   $query = "select count(*) as cntUser from tb_user where nik='".$username."'";

   $result = mysqli_query($conn,$query);
   $response = "<small id='passwordHelpBlock' class='form-text text-muted'>NIK dapat didaftarkan</small>";
   $cek = "<script>$('#btn-add').prop('disabled', false);</script> ";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<small id='passwordHelpBlock1' class='form-text text-muted'>NIK sudah terdaftar</small>";
          $cek = "<script>$('#btn-add').prop('disabled', true);</script> ";
      }
   
   }

   echo $response;
   echo $cek;
   die;
}