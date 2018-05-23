<link rel="stylesheet" href="style/data.css">
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
  $sql = "SELECT * FROM tb_pembayaran";
  $result = mysqli_query($kon,$sql);
 ?>
 <ol class="breadcrumb" style="margin-left: -25px; margin-right:-35px">
  <li><a href="?page=home">Beranda</a></li>
  <li class="active">Pembayaran</li>
</ol>
<div class="panel panel-primary" style="padding:10px;margin-top:10px;margin-left:-23px;width: 105%;">
  <!-- Default panel contents -->
  <div class="panel-heading" style="font-size: 24pt"> Pembayaran 
  <?php 
  if($_GET['item']=='spp'){
    echo strtoupper($_GET['item']);
  }
    else{
      echo ucwords($_GET['item']);
    }
?></div>
  <div class="panel-body">
    <a href="?page=tambahbayar&item=<?php echo $_GET['item'] ?>"><button type="button" class="btn btn-primary" style="margin-left: -12px"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button></a> 

    <div class="container">
   <br/>
   <div class="form-group">
    <div class="input-group" style="width: 25%; margin-left: -30px">
     <span class="input-group-addon">Cari</span>
     <input type="text" name="search_text" id="search_text" placeholder="Cari Semua Data" class="form-control" />
    </div>
   </div>
   <br />
  </div>
  <input type="hidden" id="jenis" value="<?php echo $_GET['item'] ?>">
<div class="container" id="result">
</div>
</div>
<input type="hidden" id="p" value="<?php echo $p ?>">
<input type="hidden" id="page" value="<?php echo $_GET['page'] ?>">
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
    var j = $("#jenis").val();
    var p = $("#p").val();
    var page = $("#page").val();
 load_data(j,p,page);

 function load_data(jenis,p,page,query)
 {
  $.ajax({
   url:"system/searchbayar.php",
   method:"POST",
   data:{query:query,jenis:jenis,p:p,page:page},
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
   load_data(j,p,page,search);
  }
  else
  {
   load_data(j,p,page);
  }
 });
});
</script>
</div>
</div>
</body>