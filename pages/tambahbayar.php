<body style="background-color: #eeeeee">
  <ol class="breadcrumb">
  <li><a href="?page=home">Beranda</a></li>
  <li><a href="?page=databiaya">Pembayaran</a></li>
  <li class="active">Tambah pembayaran</li>
</ol>
<div class="panel panel-primary" style="margin-top:20px;width: 100%">
  <div class="panel-heading"><h2 style="margin:10px">Tambah Pembayaran
  <?php 
  if($_GET['item']=='spp'){
    echo strtoupper($_GET['item']);
  }
    else{
      echo ucwords($_GET['item']);
    }
?>
  </h2></div> <br>

<div class="container" style="width: 100%">
  <form class="form-horizontal" action="system/tambah.php" method="POST">

    <div class="form-group">
      <label class="control-label col-sm-2" for="">Jenis Biaya :</label>
      <div class="col-sm-10"> 
      <select name="id_biaya" class="form-control">
        <?php
       $sql = "SELECT * FROM tb_biaya";
       $result = mysqli_query($kon,$sql);
       foreach ($result as $row => $value) {
         echo "<option  value=".$value['id_biaya'].">".$value['nama_biaya']."</option>";
       } 
        ?>
        </select>
      </div>
   </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="">Siswa :</label>
      <div class="col-sm-10"> 
        <select name="id_siswa" class="form-control">
        <?php
       $sql = "SELECT * FROM tb_siswa";
       $result = mysqli_query($kon,$sql);
       foreach ($result as $row => $value) {
         echo "<option  value=".$value['id_siswa'].">".$value['nis']." - ".$value['nama_lengkap']."</option>";
       } 
        ?>
        </select>
      </div>
   </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="">Tanggal Bayar :</label>
      <div class="col-sm-10"> 
      <input type="date" name="tgl_bayar" class="form-control" required="required">
      </div>
   </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn-success" style="width:18%; height: 33px"><span class="glyphicon glyphicon-save"> Simpan Data</span></button>
        <a href="<?php echo $_SESSION['lastpage'] ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-share-alt"> Kembali</span></button></a>
      </div>
    </div>
    <input type="hidden" name="tipe" value="pembayaran">
  </form>
</div>

</body>
</html>

</div>
</body>