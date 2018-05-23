<link rel="stylesheet" href="style/datalaporan.css">
<?php
// error_reporting(0);
include '../connection/connection.php';
include '../template/bootstrapcss.php';
include '../template/bootstrapjs.php';
$item = $_GET['item'];
if(!empty($_GET['b'])){
    $b = $_GET['b'];
}
if(!empty($_GET['t'])){
    $t = $_GET['t'];
}
$bulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
$pembayaran = "  SELECT tb_pembayaran.*,tb_biaya.*,tb_siswa.* FROM tb_pembayaran
INNER JOIN tb_biaya
ON tb_pembayaran.id_biaya = tb_biaya.id_biaya
INNER JOIN tb_siswa
ON tb_pembayaran.id_siswa = tb_siswa.id_siswa";

    switch ($item) {
        case 'siswa':
            $judul = "Data Siswa";
            $sql = "SELECT * FROM tb_siswa";
            $periode = '';
            break;
        case 'spp':
            $judul = "Data SPP";
            $tabel = 'tb_pembayaran';
            $sql = $pembayaran." WHERE nama_biaya LIKE '%spp%' AND month(tgl_bayar)='".$b."' AND year(tgl_bayar)='".$t."'";
            break;
        case 'gedung':
            $judul = "Data Uang Gedung";
            $tabel = 'tb_pembayaran';
            $sql = $pembayaran." WHERE nama_biaya LIKE '%gedung%' AND month(tgl_bayar)='".$b."' AND year(tgl_bayar)='".$t."'";
            break;
        case 'kegiatan':
            $judul = "Data Kegiatan";
            $tabel = 'tb_pembayaran';
            $sql = $pembayaran." WHERE nama_biaya LIKE '%kegiatan%' AND month(tgl_bayar)='".$b."' AND year(tgl_bayar)='".$t."'";
            break;
        case 'all':
            $judul = "Data Keseluruhan";
            $tabel = 'tb_pembayaran';
            $sql = $pembayaran." WHERE year(tgl_bayar)='".$t."'";
            break;
        default:
            echo "Data Tidak Ditemukan";
            exit();
            break;
    }
?>
<!-- awal tampilan atas -->
<div id="atas" style="margin-top: 0px">
<div class="awal">
    <hr>
<img src="../images/logo.png" width="30%" heigh="30%" style="margin-top:30px; float:left">
<label style="font-size:20pt; font-family: time news romans">SEKOLAH MENENGAH PERTAMA </label><br>
<label style="font-size:20pt; font-family: time news romans; margin-left:120px">ALFAYOLANS</label><br>
<label style="font-size:12pt; font-family: time news romans; font-weight: normal; margin-left:250px">JL. Swadaya Raya No.48. Duren Sawit - Jakarta Timur </label><br>
<label style="font-size:12pt; font-family: time news romans; font-weight: normal; margin-left: 250px">Telp : 021-80883067   email : smpalfayolans@gmail.com</label>
<hr><hr style="margin-top: -10px">
<h3 align="center">Laporan <?php echo $judul ?></h3>

<?php if(!empty($b) || !empty($t)) { ?>
<h3 align="center">Bulan
<?php } ?>

<?php 
if(!empty($b)){
    echo $bulan[$b];
}
echo "&nbsp;";
if(!empty($t)){
    echo $t;
}
?>
</h3>
</div>
</div><br><br>
<!-- akhir tampilan atas -->
<?php
$result = mysqli_query($kon,$sql);
if($item=='siswa'){
    $jumlah = mysqli_num_rows($result);
    ?>

<!-- awal tampilan laporan siswa -->
<div id="isi">
    <h4>Jumlah Siswa : <?php echo $jumlah ?> Siswa</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>T.T.L.</th>
            <th>Jenis Kelamin</th>
            <th>No Telp</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=0;while($row = mysqli_fetch_array($result)){$no++; ?>
        <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row['nis'] ?></td>
        <td><?php echo $row['nama_lengkap'] ?></td>
        <td><?php echo $row['tgl_lahir'] ?></td>
        <td><?php echo $row['jk'] ?></td>
        <td><?php echo $row['telp'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- akhir tampilan laporan siswa -->

    <?php
}
else if($item=='all'){
    $jenis = ['spp','gedung','kegiatan'];
    $judul = ['SPP','Uang Gedung','Kegiatan'];
    $total = array();
    foreach ($jenis as $key => $value) {
        $$value = $sql." AND nama_biaya LIKE '%".$value."%'";
        $result = mysqli_query($kon,$$value);
        $jumlah=0;
        while($row=mysqli_fetch_array($result)){
            $jumlah += $row['jml_bayar'];
        }
        array_push($total,$jumlah);
    }
    ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Biaya</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total_semua = 0;
        foreach ($judul as $key => $nama) {
            $total_semua += $total[$key];
        ?>
<!-- awal isi tabel keuangan keseluruhan -->
        <tr>
            <td><?php echo $nama ?></td>
            <td><?php echo "Rp. ".number_format($total[$key]) ?></td>
        </tr>
<!-- akhir isi tabel keuangan keseluruhan -->
        <?php
        }
        ?>
    </tbody>
    <thead>
    <tr>
        <td align="center"><strong>TOTAL</strong></td>
        <td><strong><?php echo "Rp. ".number_format($total_semua) ?></strong></td>
    </tr>
</thead>
</table>
    <?php
}
else{
   ?>
<table class="table table-bordered">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Jumlah</th>
    </tr>
</thead>
<tbody>
<?php
$no=0;
$total = 0;
while ($row=mysqli_fetch_array($result)) {
    $no++;
    if($no>5){
        break;
    }
    $total += $row['jml_bayar'];
?>
<!-- awal isi tabel spp, gedung , kegiatan -->

<tr>
    <td><?php echo $no ?></td>
    <td><?php echo $row['nama_lengkap'] ?></td>
    <td><?php echo "Rp. ".number_format($row['jml_bayar']) ?></td>
</tr>
<!-- akhir isi tabel spp,gedung,kegiatan -->
<?php
}
?>
</tbody>
<thead>
    <tr>
        <td colspan="2" align="center"><strong>TOTAL</strong></td>
        <td><strong><?php echo "Rp. ".number_format($total) ?></strong></td>
    </tr>
</thead>
</table>
   <?php
}
?>

<!-- awal tampilan bawah -->

<div id="bawah" >
<em>Keuangan Sekolah <?php echo Date("Y") ?></em>
</div>
<!-- akhir tampilan bawah -->

<script>
$(document).ready(()=>window.print());
</script>