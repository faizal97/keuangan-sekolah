
<?php 
include "../connection/connection.php";
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($kon, $_POST["query"]);
 $query = "
  SELECT * FROM tb_pembayaran
  WHERE id_pembayaran LIKE '%".$search."%'
  OR tgl_bayar LIKE '%".$search."%' 
  OR jml_bayar LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM tb_pembayaran ORDER BY id_pembayaran
 ";
}
$result = mysqli_query($kon, $query);
$no = 0;
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" style="margin-left:-30px; width:90%">
   <table class="table table-bordered">
    <tr>
     <th>No</th>
     <th>No Pembayaran</th>
     <th>Nama Siswa</th>
     <th>Jenis Pembayaran</th>
     <th>Jumlah Pembayaran</th>
     <th>Tindakan</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $no++;
  $output .= '
   <tr>
    <td> '.$no.'</td>
    <td>'.$row["id_pembayaran"].'</td>
    <td>'.$row["nama_lengkap"].'</td>
    <td>'.$row["nama_biaya"].'</td>
    <td><label style="font-weight:normal">Rp '.$row["jml_bayar"].'</label></td>
    <td><a href="?page=editbiaya&id='.$row["id_biaya"].'<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a> <button type="button" id='.$row["id_biaya"].' onclick="konfirmasiHapus("biaya",this.id)" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo '<h2 align=center>Data Tidak Ditemukan</h2';
}

?>