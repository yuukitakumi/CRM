<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$id_pengguna = $_POST['id_pengguna'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from pengguna where id_pengguna='$id_pengguna' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['id_pengguna'] = $id_pengguna;
	$_SESSION['status'] = "login";
	header("location:menuutama.php");
}else{
	header("location:loginpengguna.php?pesan=gagal");
}
?>