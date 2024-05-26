<?php
session_start();

$nik = $_SESSION['user_nik'];
$role = $_SESSION['user_jabatan'];
$nama = $_SESSION['nama'];

echo $role;
echo $nama;
echo $nik;
?>