<body style="background-color: #eeeeee">
<?php
  include 'system/sqlcommand.php';
  $sql = show_sql('tb_pendaftaran',null,null,'no_pendaftaran',$_GET['id']);
  $result = mysqli_query($kon,$sql);
  $row = mysqli_fetch_array($result);
 ?>
 <ol class="breadcrumb">
  <li><a href="?page=home">Beranda</a></li>
  <li><a href="?page=datapendaftaran">Data Pendaftaran</a></li>
  <li class="active">Edit Pendaftaran</li>
</ol>
<div class="panel panel-primary" style="margin-top:20px; width: 100%">
  <div class="panel-heading"><h2 style="margin:10px">Edit Pendaftaran Siswa</h2></div> <br>
<div class="container" style="width: 100%">
  <form class="form-horizontal" action="system/edit.php" method="POST">

       <div class="form-group">
      <label class="control-label col-sm-2" for="">No Pendaftaran :</label>
      <div class="col-sm-10">
        <input type="pendaftaran" class="form-control" id="" name="no_pendaftaran" readonly required="required" value="<?php echo $row['no_pendaftaran'] ?>">
      </div>
   </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">Tahun Ajaran :</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="tahun_ajaran" required="required" value="<?php echo $row['tahun_ajaran'] ?>" readonly>
      </div>

   </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Lengkap :</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="nama_lengkap" required="required" value="<?php echo $row['nama_lengkap'] ?>">
      </div>
   </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="">Tempat :</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="tempat_lahir" required="required" value="<?php echo $row['tempat_lahir']?>"><br>
        <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row['tgl_lahir'] ?>">
      </div>
    </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="" name="jk" value="<?php echo $row['jk'] ?>">Jenis Kelamin : </label>
      <div class="control-label col-sm-10" for="" style="text-align: left">
        <input id='jeniskel1' type="radio" name="jk" value="Laki-Laki" <?php if($row['jk']=='Laki-Laki'){echo "checked='checked'";} ?>>Laki-Laki
        <input id='jeniskel2' type="radio" name="jk" value="Perempuan" <?php if($row['jk']=='Perempuan'){echo "checked='checked'";} ?> >Perempuan
      </div>
    </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="" name="agama" value="<?php echo $row['agama'] ?>">Agama :</label>
      <div class="col-sm-10">
        <select name="agama">
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Hindu">Hindu</option>
        <option value="Budha">Budha</option>
        <option value="Lainnya">Lainnya</option>
        </select>
      </div>
     </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="" >No Telepon :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="" name="telp" required="required" value="<?php echo $row['telp'] ?>">
      </div>
     </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="">Alamat</label>
      <div class="col-sm-10">
        <textarea rows="5" cols="160" name="alamat" required="required"><?php echo $row['alamat'] ?></textarea>
      </div>
     </div><br>

     <div class="form-group">
      <label class="control-label col-sm-2" >* Orang Tua/ Wali *</label>
    </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="" name="nama_wali" required="required" value="<?php echo $row['nama_wali'] ?>">
      </div>
     </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">Pekerjaan :</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="pekerjaan_wali" required="required" value="<?php echo $row['pekerjaan_wali'] ?>">
      </div>
     </div><br>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">* Sekolah Asal * </label>
      </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Sekolah :</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="sekolah_asal" required="required" value="<?php echo $row['sekolah_asal'] ?>">
      </div>
     </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">Tahun Lulus :</label>
      <div class="col-sm-10">
        <input type="" class="form-control" id="" name="tahun_lulus" required="required" value="<?php echo $row['tahun_lulus'] ?>">
      </div>
     </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn-success" style="width:18%; height: 33px"><span class="glyphicon glyphicon-save"> Simpan Data</span></button>
        <a href="<?php echo $_SESSION['lastpage'] ?>"><button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-share-alt"> Kembali</span></button></a>
      </div>
    </div>
    <input type="hidden" name="tipe" value="pendaftaran">
    <input type="hidden" name="old_id" value="<?php echo $row['no_pendaftaran'] ?>">
</form>
</div>
</div>
</body>