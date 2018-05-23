<?php
include '../connection/connection.php';
$a = $_GET['act'];
$id = $_GET['id'];

if($a=='terima'){
    $sql = "UPDATE tb_pendaftaran SET keterangan='LUNAS' WHERE no_pendaftaran='$id'";
    $result = mysqli_query($kon,$sql);
    $sql = "SELECT * FROM tb_pendaftaran WHERE no_pendaftaran='$id'";
    $result = mysqli_query($kon,$sql);
    $row = mysqli_fetch_array($result);
    $sql = "INSERT INTO tb_siswa VALUES('$id','$id','$row[tahun_ajaran]','$row[nama_lengkap]','$row[tempat_lahir]','$row[tgl_lahir]','$row[jk]','$row[alamat]','$row[agama]','$row[telp]','$row[nama_wali]','$row[pekerjaan_wali]','$row[sekolah_asal]','$row[tahun_lulus]')";
    $result = mysqli_query($kon,$sql);
    // echo $sql;
}
else if($a=="tolak"){
    $sql = "DELETE FROM tb_pendaftaran WHERE no_pendaftaran='$id'";
    $result = mysqli_query($kon,$sql);
}
header("Location: ../");
?>