
<?php
$per = 5;
if(isset($_GET['p']) && $_GET['p']!=0 && !empty($_GET['p'])){
	$p = ($_GET['p']-1) * $per;
	$no = $p;
}
else {
	$p = 0;
}
?>
<body style="background-color: #eeeeee">
<?php 
  $_SESSION['lastpage'] = $_SERVER['REQUEST_URI'];
  $sql = "SELECT * FROM tb_siswa";
  $result = mysqli_query($kon,$sql);
 ?>
 <link rel="stylesheet" type="text/css" href="style/pendaftaran.css">
 <ol class="breadcrumb" style="margin-left: -25px; margin-right:-35px">
  <li><a href="?page=home">Beranda</a></li>
  <li class="active">Data Siswa</li>
</ol>
<div class="panel panel-primary" style="padding:10px;margin-top:10px;margin-left:-23px;width: 105%;">
  <!-- Default panel contents -->
  <div class="panel-heading" style="font-size: 24pt">Data Siswa</div>
  <div class="panel-body">
    <button onclick="konfirmasiHapus('user','all')" type="button" class="btn btn-danger" style="margin-left: -14px"><span class="glyphicon glyphicon-trash"></span> Hapus Semua</button> <br><br>

     <div class="form-group">
    <div class="input-group" style="width: 25%; margin-left: -14px">
     <span class="input-group-addon">Cari</span>
     <input type="text" name="search_text" id="search_text" placeholder="Cari Semua Data" class="form-control" />
    </div>
   </div>
   <br>
<div class="container" id="result" style="width: 100%">
</div>
</div>
<input type="hidden" id="p" value="<?php echo $p ?>">
<script type="text/javascript">
 function konfirmasiHapus(data,id){
   var konf = confirm("Apakah Anda Yakin Ingin Menghapus ?");
   if(konf==true){
     window.location.assign("system/hapus.php?tipe="+data+"&id="+id);
   }
 }
</script>

<script>
 $(document).ready(function(){

     var p = $("#p").val();
 load_data(p);

 function load_data(p,query)
 {
  $.ajax({
   url:"system/searchsiswa.php",
   method:"POST",
   data:{query:query,p:p},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(p,search);
  }
  else
  {
   load_data(p);
  }
 });
});
</script>
</div>
</div>
</body>