<?php 
  $_SESSION['lastpage'] = $_SERVER['REQUEST_URI'];
  $sql = "SELECT * FROM tb_pendaftaran";
  $result = mysqli_query($kon,$sql);
 ?>
 <link rel="stylesheet" type="text/css" href="style/pendaftaran.css">
<div class="panel panel-primary" style="padding:10px;margin-top:10px;margin-left:-23px;width: 105%;">
  <!-- Default panel contents -->
  <div class="panel-heading" style="font-size: 22pt">Data Pendaftaran Siswa</div>
  <div class="panel-body">
    <a href="?page=tambahpendaftaran"><button type="button" class="btn btn-primary" style="margin-left: -12px"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button></a>
    <button onclick="konfirmasiHapus('user','all')" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus Semua</button> <br>

    <label style="float:right; margin-right:-11px">Cari Data : <input type="text" name="cari"></label>
    <br><br>
<div class="container">
  <!-- Table -->
  <table class="table table-bordered" style="margin-left: -23px; width: 91%"">
    <thead>
      <tr>
        <th style="vertical-align: middle;" rowspan="2">No</th>
        <th style="vertical-align: middle;" rowspan="2">No Pendaftaran</th>
        <th style="vertical-align: middle;" rowspan="2">Tahun Ajaran</th>
        <th style="vertical-align: middle;" rowspan="2">Nama Lengkap</th>
        <th style="vertical-align: middle;" rowspan="2">Agama</th>
        <th style="vertical-align: middle;" rowspan="2">Tempat, Tanggal Lahir</th>
        <th style="vertical-align: middle;" rowspan="2">Jenis Kelamin</th>
        <th style="vertical-align: middle;" rowspan="2">Alamat</th>
        <th style="vertical-align: middle;" rowspan="2">No. Telepon</th>
        <th colspan="2">Orang Tua/ Wali</th>
        <th colspan="2">Sekolah Asal</th>
        <th style="vertical-align: middle;" rowspan="2">Keterangan</th>
        <th style="vertical-align: middle;" rowspan="2">Tindakan</th>
      </tr>
      <tr>
        <td>Nama Lengkap</td>
        <td>Pekerjaan</td>
        <td>Nama Sekolah</td>
        <td>Tahun Lulus</td>
      </tr>
    </thead>
  <?php
  $no=0;
  while($row=mysqli_fetch_array($result)){
    $no++;
   ?>
     <tr>
       <td><?php echo $no ?></td>
       <td><?php echo $row['no_pendaftaran'] ?></td>
       <td><?php echo $row['tahun_ajaran'] ?></td>
       <td><?php echo $row['nama_lengkap'] ?></td>
       <td><?php echo $row['agama']; ?></td>
       <td><?php echo $row['tempat_lahir']." ".$row['tgl_lahir'] ?></td>
       <td><?php echo $row['jk'] ?></td>
       <td><?php echo $row['alamat'] ?></td>
       <td><?php echo $row['telp'] ?></td>
       <td><?php echo $row['nama_wali'] ?></td>
       <td><?php echo $row['pekerjaan_wali'] ?></td>
       <td><?php echo $row['sekolah_asal'] ?></td>
       <td><?php echo $row['tahun_lulus'] ?></td>
       <td><?php echo $row['keterangan'] ?></td>
       <td><a href="?page=editpendaftaran&id=<?php echo $row['no_pendaftaran'] ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
       <button id=<?php echo $row['no_pendaftaran'] ?> onclick="konfirmasiHapus('pendaftaran',this.id)" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Hapus</button></td></tr>
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
