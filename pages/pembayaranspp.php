<body style="background-color: #eeeeee">
<?php 
  $_SESSION['lastpage'] = $_SERVER['REQUEST_URI'];
  $sql = "SELECT * FROM tb_pembayaran";
  $result = mysqli_query($kon,$sql);
 ?>
 <ol class="breadcrumb" style="margin-left: -25px; margin-right:-35px">
  <li><a href="?page=home">Home</a></li>
  <li class="active">Data Pembayaran SPP</li>
</ol>
<div class="panel panel-primary" style="padding:10px;margin-top:10px;margin-left:-23px;width: 105%;">
  <!-- Default panel contents -->
  <div class="panel-heading" style="font-size: 24pt">Data Pembayaran SPP</div>
  <div class="panel-body">
    <a href="?page=tambahbiaya"><button type="button" class="btn btn-primary" style="margin-left: -12px"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button></a>
    <button onclick="konfirmasiHapus('biaya','all')" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus Semua</button> <br>

    <div class="container">
   <br />
   <div class="form-group">
    <div class="input-group" style="width: 25%; margin-left: -30px">
     <span class="input-group-addon">Cari</span>
     <input type="text" name="search_text" id="search_text" placeholder="Cari Semua Data" class="form-control" />
    </div>
   </div>
   <br />
  </div>
<div class="container" id="result">
  
</div>
</div>

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

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"system/searchbiaya.php",
   method:"POST",
   data:{query:query},
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
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
</div>
</div>
</body>