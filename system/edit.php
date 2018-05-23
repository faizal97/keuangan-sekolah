<?php
session_start();
include '../connection/connection.php';
include 'sqlcommand.php';

if(!isset($_POST['tipe']) || empty($_POST['tipe'])){
echo "Kesalahan pada input data ke sistem";
echo "<br> Mohon Cek Kembali data yang di proses.";
exit();
}

$tipe = $_POST['tipe'];

if($tipe=='admin'){
	$result = edit_sql($kon,'tb_admin',array('id_admin','user_admin','nama_depan','nama_belakang','status_admin'),array($_POST['old_id'],$_POST['username'],$_POST['nama_depan'],$_POST['nama_belakang'],$_POST['status']));
}
else if($tipe=='pendaftaran'){
	$result = edit_sql($kon,'tb_pendaftaran',array('no_pendaftaran','tahun_ajaran','nama_lengkap','agama','tempat_lahir','tgl_lahir','jk','alamat','telp','nama_wali','pekerjaan_wali','sekolah_asal','tahun_lulus'),array($_POST['no_pendaftaran'],$_POST['tahun_ajaran'],$_POST['nama_lengkap'],$_POST['agama'],$_POST['tempat_lahir'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['alamat'],$_POST['telp'],$_POST['nama_wali'],$_POST['pekerjaan_wali'],$_POST['sekolah_asal'],$_POST['tahun_lulus']));
}
else if($tipe=='siswa'){
	$result = edit_sql($kon,'tb_siswa',array('nis','tahun_ajaran','nama_lengkap','agama','tempat_lahir','tgl_lahir','jk','alamat','telp','nama_wali','pekerjaan_wali','sekolah_asal','tahun_lulus'),array($_POST['nis'],$_POST['tahun_ajaran'],$_POST['nama_lengkap'],$_POST['agama'],$_POST['tempat_lahir'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['alamat'],$_POST['telp'],$_POST['nama_wali'],$_POST['pekerjaan_wali'],$_POST['sekolah_asal'],$_POST['tahun_lulus']));
}
else if ($tipe=='biaya'){
	$result = edit_sql($kon,'tb_biaya',array('id_biaya','nama_biaya','jml_bayar'),array($_POST['old_id'],$_POST['nama_biaya'],$_POST['jml_bayar']));
}
if($result){
	echo 'Data Telah Terupdate!';
	echo "<META http-equiv='refresh' content='1;".$_SESSION['lastpage']."'>";
}
else{
	echo "Data Gagal Terupdate!";
	echo "<META http-equiv='refresh' content='1;".$_SESSION['lastpage']."'>";
}


?>
