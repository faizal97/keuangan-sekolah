<?php 
include "../connection/connection.php";
include "../system/sqlcommand.php";
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($kon, $_POST["query"]);
 $query = "
  SELECT * FROM tb_admin 
  WHERE user_admin LIKE '%".$search."%'
  OR nama_depan LIKE '%".$search."%' 
  OR nama_belakang LIKE '%".$search."%' 
  OR status_admin LIKE '%".$search."%'
  LIMIT ".$_POST['p'].",5 
 ";
}
else
{
 $query = "
  SELECT * FROM tb_admin ORDER BY id_admin LIMIT ".$_POST['p'].",5
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
     <th>Username</th>
     <th>Nama</th>
     <th>Status</th>
     <th>tindakan</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $no++;
  $output .= '
   <tr>
    <td> '.$no.'</td>
    <td>'.$row["user_admin"].'</td>
    <td>'.$row["nama_depan"]." ".$row["nama_belakang"].'</td>
    <td>'.$row["status_admin"].'</td>
    <td><a href="?page=editadmin&id='.$row["id_admin"].'"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a><br>
       <button type="button" id='.$row["id_admin"].' onclick=konfirmasiHapus("admin",this.id) class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td>
   </tr>
  ';
 }
 $pagi = pagination($kon,'tb_admin',$_POST['p'],5,'dataadmin');
 $output.="</table>".$pagi;
 echo $output;
}
else
{
 echo '<h2 align=center>Data Tidak Ditemukan</h2';
}

?>