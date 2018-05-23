<?php
include 'system/sqlcommand.php';
$per = 5;
if(isset($_GET['p']) && $_GET['p']!=0 && !empty($_GET['p'])){
	$p = ($_GET['p']-1) * $per;
	$no = $p;
}
else {
	$p = 0;
	$no = $p;
}
?>
                <link rel="stylesheet" type="text/css" href="style/home.css">
                <body style="background-color: #eeeeee">
				<div class="row">
					
                    <div class="col-lg-12">
                      <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
     <div class="panel panel-primary">
	<div class="panel body">

	<div class="jajar">

	<div class="kebawah">
	<div style="padding-left:10px">
		<div class="kotak klik">
		<a href="index.php?page=datapendaftaran"><img src="images/daftar.png" style="width:100%"></a><br><br><br>
		<a href="index.php?page=datapendaftaran"><button type="button" class="btn btn-primary btn-lg sharp">Pendaftaran Siswa</button></a>


		</div>
		</div>
		</div>
	<div class="kebawah">
		<div class="kotak klik">
		<a href="index.php?page=datasiswa"><img src="images/siswa.png" style="width:100%"></a><br><br><br>
		<a href="index.php?page=datasiswa"><button type="button" class="btn btn-primary1 btn-lg sharp">Data Siswa</button></a>

		</div>

		</div>

		<div class="kebawah">
		<div class="kotak klik">
		<a href="index.php?page=datapembayaran"><img src="images/bayar.png" style="width:100%"></a><br><br><br>
		<a href="index.php?page=datapembayaran"><button type="button" class="btn btn-primary2 btn-lg sharp">Pembayaran</button></a>

		</div>
		</div>

		<div class="kebawah">
		<div class="kotak klik">
		<a href="index.php?page=laporankeseluruhan"><img src="images/laporan.png" style="width:100%"></a><br><br><br>
		<a href="index.php?page=laporankeseluruhan"><button type="button" class="btn btn-danger btn-lg sharp">Laporan</button></a>
		</div>
		</div>
		</div>

	</div>
</div>
<div class="panel panel-primary">
	
		
<?php
	$sql = "SELECT * FROM tb_pendaftaran WHERE keterangan='PENDING' LIMIT $p,$per";
	$result = mysqli_query($kon,$sql);
?>
				<table class="table table-bordered">
					
					<thead>
					<div class="panel-heading"><h1>Penerimaan Siswa</h1></div>
					
						<tr>
							<div class="panel-body">
							<th>No</th>
							<th>No Pendaftaran</th>
							<th>Tahun Ajaran</th>
							<th>Nama Lengkap</th>
							<th>Agama</th>
							<th>T.T.L.</th>
							<th>Jenis Kelamin</th>
							<th style="text-align: center">Alamat</th>
							<th>No. Telepon</th>
							<th colspan="2" style="text-align: center">Tindakan</th>
						</tr>
					</thead>
					<tbody>
					<?php while($row=mysqli_fetch_array($result)){$no++;  ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row['no_pendaftaran'] ?></td>
							<td><?php echo $row['tahun_ajaran'] ?></td>
							<td><?php echo $row['nama_lengkap'] ?></td>
							<td><?php echo $row['agama'] ?></td>
							<td><?php echo $row['tempat_lahir'].", ".$row['tgl_lahir'] ?></td>
							<td><?php echo $row['jk'] ?></td>
							<td><?php echo $row['alamat'] ?></td>
							<td><?php echo $row['telp'] ?></td>
							<td><a href="system/penerimaan.php?act=terima&id=<?php echo $row['no_pendaftaran'] ?>"><button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Terima</button></a></td>
							<td><a href="system/penerimaan.php?act=tolak&id=<?php echo $row['no_pendaftaran'] ?>"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Tolak</button></a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>

</div>
</div>
<script type="text/javascript" src="scripts/home.js"></script>
<?php echo pagination($kon,'tb_pendaftaran',$p,$per,'home',"WHERE keterangan='pending'") ?>

</body>