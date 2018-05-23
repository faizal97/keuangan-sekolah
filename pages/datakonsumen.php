<body style="background-color: #eeeeee">
<?php 
  $_SESSION['lastpage'] = $_SERVER['REQUEST_URI'];
  $sql = "SELECT * FROM tb_user";
  $result = mysqli_query($kon,$sql);
 ?>
 <ol class="breadcrumb" style="margin-left: -25px; margin-right:-35px">
  <li><a href="?page=home">Home</a></li>
  <li class="active">Data Konsumen</li>
</ol>
<div class="panel panel-primary" style="padding:10px;margin-top:10px;margin-left:-23px;width: 105%;">
  <!-- Default panel contents -->
  <div class="panel-heading" style="font-size: 22pt">Data Konsumen</div>
  <div class="panel-body">
    <a href="?page=tambahkonsumen"><button type="button" class="btn btn-primary" style="margin-left: -12px"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button></a>
    <button onclick="konfirmasiHapus('user','all')" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus Semua</button> <br>

    <label style="float:right; margin-right:-11px">Cari Data : <input type="text" name="cari"></label>
    <br><br>
<div class="container">
  <!-- Table -->
  <table class="table table-bordered" style="margin-left: -23px; width: 91%"">
    <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>Tindakan</th>
      </tr>
    </thead>
  <?php
  $no=0;
  while($row=mysqli_fetch_array($result)){
    $no++;
   ?>
     <tr>
       <td><?php echo $no ?></td>
       <td><?php echo $row['username'] ?></td>
       <td><?php echo $row['nama_depan']." ".$row['nama_belakang'] ?></td>
       <td><a href="?page=edituser&user=<?php echo $row['username'] ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
       <button id=<?php echo $row['id_user'] ?> onclick="konfirmasiHapus('user',this.id)" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td></tr>
       <?php 
     }
        ?>
   </tbody>
 </table>
</div>
</div>

<script type="text/javascript">
 function konfirmasiHapus(data,id){
   var konf = confirm("Apakah Anda Yakin Ingin Menghapus ?");
   if(konf==true){
     window.location.assign("../admin/system/hapus.php?tipe="+data+"&id="+id);
   }
 }
</script>
</div>
</div>
</body>