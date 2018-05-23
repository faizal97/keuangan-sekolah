<?php 
session_start();
include '../connection/connection.php';
include 'sqlcommand.php';

if(!isset($_GET['tipe']) || empty($_GET['tipe'])){
echo "Kesalahan pada input data ke sistem";
echo "<br> Mohon Cek Kembali data yang di proses.";
exit();
}
$tipe = $_GET['tipe'];
$id = $_GET['id'];
if ($tipe=='admin') {
	if($id=='all'){
		$result = hapus_sql($kon,'tb_admin');
	}
	else{
	$result = hapus_sql($kon,'tb_admin','id_admin',$id);
}
}
else if ($tipe=='pendaftaran') {
	if($id=='all'){
		$result = hapus_sql($kon,'tb_pendaftaran');
	}
	else{
		$result = hapus_sql($kon,'tb_pendaftaran','no_pendaftaran',$id);
}
}

else if ($tipe=='biaya') {
	if($id=='all'){
		$result = hapus_sql($kon,'tb_biaya');
	}
	else{
		$result = hapus_sql($kon,'tb_biaya','id_biaya',$id);
}
}
else if ($tipe=='siswa') {
	if($id=='all'){
		$result = hapus_sql($kon,'tb_siswa');
	}
	else{
		$result = hapus_sql($kon,'tb_siswa','id_siswa',$id);
}
}
else if ($tipe=='pembayaran') {
	if($id=='all'){
		$result = hapus_sql($kon,'tb_pembayaran');
	}
	else{
		$result = hapus_sql($kon,'tb_pembayaran','id_pembayaran',$id);
}
}

if($result){
	echo 'Data Telah Terhapus!';
	echo "<META http-equiv='refresh' content='1;".$_SESSION['lastpage']."'>";
}
else{
	echo "Data Gagal Terhapus!";
	echo "<META http-equiv='refresh' content='1;".$_SESSION['lastpage']."'>";
}

 ?>