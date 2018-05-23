<?php
include "../connection/connection.php";
include "../system/sqlcommand.php";
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($kon, $_POST["query"]);
 $query = "
  SELECT * FROM tb_siswa
  WHERE id_siswa LIKE '%".$search."%'
  OR nis LIKE '%".$search."%'
  OR tahun_ajaran LIKE '%".$search."%'
  OR nama_lengkap LIKE '%".$search."%'
  OR agama LIKE '%".$search."%'
  OR tempat_lahir LIKE '%".$search."%'
  OR tgl_lahir LIKE '%".$search."%'
  OR jk LIKE '%".$search."%'
  OR alamat LIKE '%".$search."%'
  OR telp LIKE '%".$search."%'
  OR nama_wali LIKE '%".$search."%'
  OR pekerjaan_wali LIKE '%".$search."%'
  OR sekolah_asal LIKE '%".$search."%'
  OR tahun_lulus LIKE '%".$search."%'
  LIMIT ".$_POST['p'].",5 
 ";
}
else
{
 $query = "
  SELECT * FROM tb_siswa ORDER BY id_siswa LIMIT ".$_POST['p'].",5
 ";
}
$result = mysqli_query($kon, $query);
$no = $_POST['p'];
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" style="margin-left:-30px; width:90%">
   <table class="table table-bordered">
     <thead>
      <tr>
        <th style="vertical-align: middle;" rowspan="2">No</th>
        <th style="vertical-align: middle;" rowspan="2">NIS</th>
        <th style="vertical-align: middle;" rowspan="2">Tahun Ajaran</th>
        <th style="vertical-align: middle;" rowspan="2">Nama Lengkap</th>
        <th style="vertical-align: middle;" rowspan="2">Agama</th>
        <th style="vertical-align: middle;" rowspan="2">Tempat, Tanggal Lahir</th>
        <th style="vertical-align: middle;" rowspan="2">Jenis Kelamin</th>
        <th style="vertical-align: middle;" rowspan="2">Alamat</th>
        <th style="vertical-align: middle;" rowspan="2">No. Telepon</th>
        <th colspan="2">Orang Tua/ Wali</th>
        <th colspan="2">Sekolah Asal</th>
        <th style="vertical-align: middle;" rowspan="2">Tindakan</th>
      </tr>
      <tr>
        <td>Nama Lengkap</td>
        <td>Pekerjaan</td>
        <td>Nama Sekolah</td>
        <td>Tahun Lulus</td>
      </tr>
    </thead>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $no++;
  $output .= '
    <tr>
       <td> '.$no.'</td>
       <td> '.$row["nis"].'</td>
       <td> '.$row["tahun_ajaran"].' </td>
       <td> '.$row["nama_lengkap"].' </td>
       <td> '.$row["agama"].'</td>
       <td> '.$row["tempat_lahir"].','.$row["tgl_lahir"].' </td>
       <td> '.$row["jk"].'</td>
       <td> '.$row["alamat"].' </td>
       <td> '.$row["telp"].' </td>
       <td> '.$row["nama_wali"].' </td>
       <td> '.$row["pekerjaan_wali"].'</td>
       <td> '.$row["sekolah_asal"].' </td>
       <td> '.$row["tahun_lulus"].' </td>
       <td><a href="?page=editsiswa&id='.$row["id_siswa"].'"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a><br><br>

        <button type="button" id='.$row["id_siswa"].' onclick=konfirmasiHapus("siswa",this.id) class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td>
       </tr>
  ';
 }
 $pagi = pagination($kon,'tb_siswa',$_POST['p'],5,'datasiswa');
 $output.="</table>".$pagi;
 echo $output;
}
else
{
 echo '<h2 align=center>Data Tidak Ditemukan</h2';
}

?>
