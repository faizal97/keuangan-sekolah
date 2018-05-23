<?php 
error_reporting();
$kon = mysqli_connect("localhost","root","","db_sekolah");

if(!$kon){
	echo "Gagal Konek Database!";
	exit();
}

 ?>