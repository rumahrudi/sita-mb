<?php
include "config.php";

// Search result

    $searchText = $_POST['nik'];
    //$searchText = '3411911053';
    $sql2  = $conn->query("SELECT * FROM tb_user_mhs WHERE nim = '$searchText'");
    $data = mysqli_fetch_assoc($sql2);

    $id_user = $data['id_user_mhs'];
    $name = $data['nama'];
    $email = $data['email'];
    $jabatan = $data['jabatan'];

    $search_arr[] = array("id" => $id_user, "name" => $name, "email" => $email, "jabatan" => $jabatan);

    echo json_encode($search_arr);



?>