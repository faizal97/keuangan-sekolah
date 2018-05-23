<?php 
session_start();
include "../connection/connection.php";
include "../system/sqlcommand.php";
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($kon, $_POST["query"]);
 if(empty($_POST['jenis'])){
    $hunny = $_POST['query'];
    $bunny = "OR";
}else {
    $hunny = $_POST['jenis'];
    $bunny = "AND";
}
 $query = "
  SELECT tb_pembayaran.*,tb_biaya.*,tb_siswa.* FROM tb_pembayaran
  INNER JOIN tb_biaya
  ON tb_pembayaran.id_biaya = tb_biaya.id_biaya
  INNER JOIN tb_siswa
  ON tb_pembayaran.id_siswa = tb_siswa.id_siswa
  WHERE nama_biaya LIKE '%".$hunny."%'
  ".$bunny." nama_lengkap LIKE '%".$search."%' 
  OR nis LIKE '%".$search."%' 
  OR tgl_bayar LIKE '%".$search."%'
  LIMIT ".$_POST['p'].",5
 ";
}
else
{
 $query = "
  SELECT tb_pembayaran.*,tb_biaya.*,tb_siswa.* FROM tb_pembayaran
  INNER JOIN tb_biaya
  ON tb_pembayaran.id_biaya = tb_biaya.id_biaya
  INNER JOIN tb_siswa
  ON tb_pembayaran.id_siswa = tb_siswa.id_siswa
  WHERE nama_biaya LIKE '%".$_POST['jenis']."%'
  LIMIT ".$_POST['p'].",5
 ";
}
$result = mysqli_query($kon, $query);
$no = $_POST['p'];
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" style="margin-left:-30px; width:90%">
   <table class="table table-bordered">
    <tr>
     <th>No</th>
     <th>Jenis Biaya</th>
     <th>NIS</th>
     <th>Nama Siswa</th>
     <th>Tanggal Bayar</th>
     <th>Total Bayar</th>';
     if($_SESSION['status']=='Kepala Sekolah'){
            $output.='<th>Tindakan</th>';
     }
     $output.='
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $no++;
  $output .= '
   <tr>
    <td> '.$no.'</td>
    <td>'.$row["nama_biaya"].'</td>
    <td>'.$row["nis"].'</td>
    <td>'.$row["nama_lengkap"].'</td>
    <td>'.$row["tgl_bayar"].'</td>
    <td>Rp '.number_format($row["jml_bayar"],0,",",".").'</td>';
    if($_SESSION['status']=='Kepala Sekolah'){
        $output.='<td> <button type="button" id='.$row["id_pembayaran"].' onclick=konfirmasiHapus("pembayaran",this.id) class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td>';
    }
    $output.='
   </tr>
  ';
 }
 $pagi = pagination($kon,'tb_pembayaran',$_POST['p'],5,$_POST['page']."&item=".$_POST['jenis']);
 $output.="</table>".$pagi;
 echo $output;
}
else
{
 echo '<h2 align=center>Data Tidak Ditemukan</h2';
}

?>