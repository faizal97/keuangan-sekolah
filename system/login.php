<?php 
session_start();
include '../connection/connection.php';

if(!isset($_POST['username']) || !isset($_POST['password'])){
	header("Location: ../");
}

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM tb_admin WHERE user_admin='".$user."'";
$result = mysqli_query($kon,$sql);

if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_assoc($result);
	$db_user = $row['user_admin'];
	$db_pass = $row['pass_admin'];
	$db_salt = $row['salt_admin'];
	$db_status = $row['status_admin'];
	$pass = hash('sha512',$db_salt . $pass);

	if($db_pass === $pass){
		$_SESSION['admin'] = $db_user;
		$_SESSION['key'] = $pass;
		$_SESSION['status'] = $db_status;
	}
}
header('Location: ../');

 ?>