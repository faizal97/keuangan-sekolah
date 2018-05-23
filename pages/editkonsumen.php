<?php 
  include 'system/sqlcommand.php';
  $result = mysqli_query($kon,$sql);
  $row = mysqli_fetch_array($result);
 ?>
<div class="panel panel-primary" style="margin-top:20px; width: 100%">
  <div class="panel-heading"><h2 style="margin:10px">Edit Konsumen</h2></div> <br>
<div class="container" style="width: 100%">
  <form class="form-horizontal" action="system/edit.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Depan:</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="nama_depan" value="<?php echo $row['username'] ?>" required="required">
      </div>
   </div>
       <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Belakang:</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="nama_belakang" required="required">
      </div>
   </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Username:</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="username" required="required">
      </div>
   </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="">Password :</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="nmbunga" name="password" required="required">
      </div>
     </div>


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn-success" style="width:18%; height: 33px"><span class="glyphicon glyphicon-save"> Simpan Data</span></button>
        <a href="<?php echo $_SESSION['lastpage'] ?>"><button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-share-alt"> Kembali</span></button></a>
      </div>
    </div>
    <input type="hidden" name="tipe" value="admin">
    <input type="hidden" name="old_id" value="<?php echo $row['id_admin'] ?>">
</form>
</div>
</div>
