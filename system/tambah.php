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
	$nama_depan = explode(' ',$_POST['nama_depan']);
	$num = 1;
	$sql = show_sql('tb_admin');;
	$result = mysqli_query($kon,$sql);
	while($row = mysqli_fetch_array($result)){
		$loopId = substr($row['id_admin'],2,6);
		$intId =(integer)$loopId;
		if($num==$intId){
			if($num==mysqli_num_rows($result)){
				$num++;
				$newId = $num;
				continue;
			}
			$num++;
			continue;
		}else{
			$newId = $num;
		}
	}
	if(!isset($newId) || empty($newId)){
		$newId = 1;
	}

	$newId = makeId(8,11,$newId);


	//password
	$pass = makePass($_POST['password'],64,'sha512');
	$result = tambah_sql($kon,'tb_admin',array('id_admin','user_admin','nama_depan','nama_belakang','pass_admin','status_admin','salt_admin'),array($newId,$_POST['username'],$nama_depan[0],$_POST['nama_belakang'],$pass[0],$_POST['status'],$pass[1]));
}
else if($tipe=='pendaftaran'){
	$keterangan = "PENDING";
	$tahun_ajaran = date("Y");
	$num = 1;
	$sql = show_sql('tb_pendaftaran');
	$result = mysqli_query($kon,$sql);
	while($row = mysqli_fetch_array($result)){
		$loopId = substr($row['no_pendaftaran'],2,8);
		$intId =(integer)$loopId;
		if($num==$intId){
			if($num==mysqli_num_rows($result)){
				$num++;
				$newId = $num;
				break;
			}
			$num++;
			continue;
		}else{
			$newId = $num;
		}
	}
	if(!isset($newId) || empty($newId)){
		$newId = 1;
	}
	$newId = makeId(10,substr($tahun_ajaran,2,2),$newId);

	//password
	$result = tambah_sql($kon,'tb_pendaftaran',array('no_pendaftaran','tahun_ajaran','nama_lengkap','agama','tempat_lahir','tgl_lahir','jk','alamat','telp','nama_wali','pekerjaan_wali','sekolah_asal','tahun_lulus','keterangan'),array($newId,$tahun_ajaran,$_POST['nama_lengkap'],$_POST['agama'],$_POST['tempat_lahir'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['alamat'],$_POST['telp'],$_POST['nama_wali'],$_POST['pekerjaan_wali'],$_POST['sekolah_asal'],$_POST['tahun_lulus'],$keterangan));
}

else if($tipe=='biaya'){
	$num = 1;
	$sql = show_sql('tb_biaya');
	$result = mysqli_query($kon,$sql);
	while($row = mysqli_fetch_array($result)){
		$loopId = substr($row['id_biaya'],2,6);
		$intId =(integer)$loopId;
		if($num==$intId){
			if($num==mysqli_num_rows($result)){
				$num++;
				$newId = $num;
				continue;
			}
			$num++;
			continue;
		}else{
			$newId = $num;
		}
	}
	if(!isset($newId) || empty($newId)){
		$newId = 1;
	}

	$newId = makeId(8,11,$newId);

	$result = tambah_sql($kon,'tb_biaya',array('id_biaya','nama_biaya','jml_bayar'),array($newId,$_POST['nama_biaya'],$_POST['jml_bayar']));
}

else if($tipe=='pembayaran'){
	$sql = "SELECT * FROM tb_biaya WHERE id_biaya='".$_POST['id_biaya']."'";
	$result = mysqli_query($kon,$sql);
	$row = mysqli_fetch_array($result);
	$jml_bayar = $row['jml_bayar'];
	$num = 1;
	$sql = show_sql('tb_pembayaran');
	$result = mysqli_query($kon,$sql);
	while($row = mysqli_fetch_array($result)){
		$loopId = substr($row['id_pembayaran'],2,6);
		$intId =(integer)$loopId;
		if($num==$intId){
			if($num==mysqli_num_rows($result)){
				$num++;
				$newId = $num;
				continue;
			}
			$num++;
			continue;
		}else{
			$newId = $num;
		}
	}
	if(!isset($newId) || empty($newId)){
		$newId = 1;
	}

	$newId = makeId(8,11,$newId);

	$result = tambah_sql($kon,'tb_pembayaran',array('id_pembayaran','id_biaya','id_siswa','jml_bayar','tgl_bayar'),array($newId,$_POST['id_biaya'],$_POST['id_siswa'],$jml_bayar,$_POST['tgl_bayar']));
	// echo $result;
}

if($result){
	echo 'Data Telah Tersimpan!';
	echo "<META http-equiv='refresh' content='1;".$_SESSION['lastpage']."'>";
}
else{
	echo "Data Gagal Tersimpan!";
	echo "<META http-equiv='refresh' content='1;".$_SESSION['lastpage']."'>";
}




 ?>