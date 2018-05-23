<?php
session_start(); 
include '/connection/connection.php';

if(!isset($_SESSION['admin']) || !isset($_SESSION['key'])){
	include 'pages/login.php';
	exit();
}else{
	$sql = "SELECT * FROM tb_admin WHERE user_admin='".$_SESSION['admin']."'";
	$result = mysqli_query($kon,$sql);

	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		$db_pass = $row['pass_admin'];

	if($db_pass !== $_SESSION['key']){
		include 'pages/login.php';
		exit();
		}
	}
}
	include 'template/header.php';
	include 'template/menu.php';
	include 'template/footer.php';

 ?>