<body style="background-color: #eeeeee">
  <ol class="breadcrumb">
  <li><a href="?page=home">Beranda</a></li>
  <li><a href="?page=datapendaftaran">Pendaftaran</a></li>
  <li class="active">Edit Pendaftaran</li>
</ol>
<div class="panel panel-primary" style="margin-top:20px;width: 100%">
  <div class="panel-heading"><h2 style="margin:10px">Tambah Pendaftaran Siswa</h2></div> <br>
<div class="container" style="width: 100%">
  <form class="form-horizontal" action="system/tambah.php" method="POST">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Lengkap :</label>
      <div class="col-sm-10">
        <input type="" class="form-control" placeholder="Cth. Budi Handoko" id="" name="nama_lengkap" required="required">
      </div>
   </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="">Tempat Tanggal Lahir :</label>
      <div class="col-sm-10">
        <input type="text" placeholder="Cth. Jakarta" class="form-control" id="" name="tempat_lahir" required="required"><br>
        <input type="date" class="form-control" id="" name="tgl_lahir" required="required">
   
      </div>
    </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Jenis Kelamin : </label>
      <div class="control-label col-sm-2" for="">
        <input id='jeniskel1' type="radio" name="jk" value="Laki-Laki" >Laki-Laki
        <input id='jeniskel2' type="radio" name="jk" value="Perempuan">Perempuan
      </div>
    </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">Agama :</label>
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
      <label class="control-label col-sm-2" for="">No Telepon :</label>
      <div class="col-sm-10">
        <input type="tel" placeholder="Cth. 085735375xxx" class="form-control" id="tlp" name="telp" required="required">
      </div>
     </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="">Alamat</label>
      <div class="col-sm-10">
        <textarea rows="5" cols="160" name="alamat" placeholder="Cth. Jl. Kuningan Indah No.12 RT 01 RW 02, Bojong Kulur, Gunung Putri, Bogor" id="alamat"></textarea>
      </div>
     </div><br>

     <div class="form-group">
      <label class="control-label col-sm-2" > * Orang Tua/ Wali *</label>
    </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nm" name="nama_wali" required="required" placeholder="Cth. Saputra">
      </div>
     </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">Pekerjaan :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="" name="pekerjaan_wali" required="required" placeholder="Cth. Pegawai Negeri Sipil">
      </div>
     </div><br>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">* Sekolah Asal * </label>
      </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="" >Nama Sekolah :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="" name="sekolah_asal" required="required" placeholder="Cth. SDN 05 Pagi">
      </div>
     </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="">Tahun Lulus :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="" name="tahun_lulus" required="required" placeholder="Cth. 2017">
      </div>
     </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn-success" style="width:18%; height: 33px"><span class="glyphicon glyphicon-save"> Simpan Data</span></button>
        <a href="<?php echo $_SESSION['lastpage'] ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-share-alt"> Kembali</span></button></a>
      </div>
    </div>
    <input type="hidden" name="tipe" value="pendaftaran">
  </form>
</div>

</body>
</html>

</div>
</body>