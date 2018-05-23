<?php 
include "../connection/connection.php";
include "../system/sqlcommand.php";
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($kon, $_POST["query"]);
 $query = "
  SELECT * FROM tb_biaya
  WHERE id_biaya LIKE '%".$search."%'
  OR nama_biaya LIKE '%".$search."%' 
  OR jml_bayar LIKE '%".$search."%'
  LIMIT ".$_POST['p'].",5 
 ";
}
else
{
 $query = "
  SELECT * FROM tb_biaya ORDER BY id_biaya LIMIT ".$_POST['p'].",5
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
     <th>Jumlah Biaya</th>
     <th>Tindakan</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $no++;
  $output .= '
   <tr>
    <td> '.$no.'</td>
    <td>'.$row["nama_biaya"].'</td>
    <td><label style="font-weight:normal">Rp '.number_format($row["jml_bayar"],0,",",".").'</label></td>
    <td><a href="?page=editbiaya&id='.$row["id_biaya"].'"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a> <button type="button" id='.$row["id_biaya"].' onclick=konfirmasiHapus("biaya",this.id) class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td>
   </tr>
  ';
 }
 $pagi = pagination($kon,'tb_biaya',$_POST['p'],5,'databiaya');
 $output.="</table>".$pagi;
 echo $output;
}
else
{
 echo '<h2 align=center>Data Tidak Ditemukan</h2';
}

?>