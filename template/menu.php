<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="menu.css">
<div id="menu">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="height:0px">`
    <div class="container-fluid">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="margin-right: 10px; margin-top: -40px">
            <li class="no-copy"><img src="images/logo.png" style="width: 8%; height:8%;margin-bottom: -70px"></li>
            </ul>
            <a style="padding-top:0px; padding-left:150px" class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
            <ul class="nav navbar-nav navbar-right">
                <li class="no-copy"><span id=tgl-skrg></span></li>
                <li class="no-copy"><a style="padding-top:0px" href="system/logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Keluar</a></li>

                 <li class="sidebar-brand">
                    <a href="#" class="navbar-brand" style="margin-right:10px;border:none; top:-16px">
                        <span class="fas fa-user-circle" aria-hidden="true" style="font-size: 17px;"> Halo, </span> <?php
$sql = "SELECT * FROM tb_admin WHERE user_admin='".$_SESSION['admin']."'";
$qry = mysqli_query($kon,$sql);
$row = mysqli_fetch_array($qry);
echo $row['nama_depan'];
 ?>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
</div>

<div id="wrapper" class="toggled">
    <div class="container-fluid">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <br>
                </li>
               <li class="brd">
                   <a href="?page=home" ><span class="fas fa-home" aria-hidden="true" style="margin-left:-20px; color:rgba(255, 255, 255, 0.2);"></span> <font color="#337AB7" style="font-weight: bold">BERANDA</a></font>
                </li>
                <li class="ps">
                   <a href="?page=datapendaftaran" ><span class="fas fa-book" aria-hidden="true" style="margin-left:-20px;color:rgba(255, 255, 255, 0.2);"></span> <font color="#337AB7" style="font-weight: bold">PENDAFTARAN SISWA</a></font>
                </li>
                <li id="toggle-menu-data" class="no-copy">
                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><font color="#337AB7" style="font-weight: bold"> DATA</font><span class="glyphicon glyphicon-chevron-down" style="margin-left:95px"></span>
                </li>
                <?php
                if($_SESSION['status']=='Kepala Sekolah'){
                ?>
                <li class="toggle-item child-data no-copy">
                    <a href="?page=dataadmin"><span aria-hidden="true"></span> Data Admin</a>
                </li>
                <?php } ?>
                <li class="toggle-item child-data no-copy">
                    <a href="?page=datasiswa"><span  aria-hidden="true"></span>Data Siswa</a>
                </li>
                <li class="toggle-item child-data no-copy">
                    <a href="?page=databiaya"><span aria-hidden="true"></span>Data Biaya</a>
                </li>

                <li id="toggle-menu-pembayaran" class="no-copy">
                    <span class="far fa-credit-card" aria-hidden="true"></span><font color="#337AB7" style="font-weight: bold"> PEMBAYARAN</font><span class="glyphicon glyphicon-chevron-down" style="margin-left:30px; font-weight: bold"></span>
                </li>
                <li class="toggle-item child-bayar no-copy">
                    <a href="?page=datapembayaran&item=spp"><span aria-hidden="true"></span> Pembayaran SPP</a>
                </li>
                <li class="toggle-item child-bayar no-copy">
                    <a href="?page=datapembayaran&item=gedung"><span  aria-hidden="true"></span>Pembayaran Uang Gedung</a>
                </li>
                <li class="toggle-item child-bayar no-copy">
                    <a href="?page=datapembayaran&item=kegiatan"><span aria-hidden="true"></span>Pembayaran Kegiatan</a>
                </li>
                <li class="toggle-item child-bayar no-copy">
                    <a href="?page=datapembayaran&item="><span aria-hidden="true"></span>Pembayaran Keseluruhan</a>
                </li>

                <li id="toggle-menu-laporan" class="no-copy">
                    <span class="fas fa-file-alt" aria-hidden="true" style="font-size:20px"></span><font color="#337AB7" style="font-weight: bold"> LAPORAN </font><span class="glyphicon glyphicon-chevron-down" style="margin-left:55px; "></span>
                </li>
                <li class="toggle-item child-laporan no-copy">
                  <a href="pages/datalaporan.php?item=siswa" target="_BLANK"><span  aria-hidden="true"></span> Laporan Data Siswa</a>
              </li>
                  <li class="toggle-item child-laporan no-copy">
                    <a href="#" onclick="tanyabulan('spp')" target="_BLANK"><span  aria-hidden="true"></span> Laporan SPP</a>
                </li>
                <li class="toggle-item child-laporan no-copy">
                    <a href="#" onclick="tanyabulan('gedung')" target="_BLANK"><span  aria-hidden="true"></span> Laporan Uang Gedung</a>
                </li>
                <li class="toggle-item child-laporan no-copy">
                    <a href="#" onclick="tanyabulan('kegiatan')" target="_BLANK"><span  aria-hidden="true"></span> Laporan Kegiatan</a>
                </li>
                <?php
                if($_SESSION['status']=='Kepala Sekolah'){
                ?>
                 <li class="toggle-item child-laporan no-copy">
                    <a href="#" onclick="tanyatahun('all')" target="_BLANK"><span  aria-hidden="true"></span> Laporan Keseluruhan</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php include 'template/content.php' ?>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    </div>
    <script>
    function tanyabulan(item) {
        var year = new Date().getFullYear();
        var month = new Date().getMonth();
        month++;
        var t = prompt("Masukan Tahun :",year);
        if(t!=null){
        var b = prompt("Masukan Bulan(Dalam Angka) :",month);
        }
        if (t!=null || b!=null) {
            window.open("pages/datalaporan.php?item="+item+"&t="+t+"&b="+b,"_BLANK");   
        }
    }

    function tanyatahun(item) {
        var year = new Date().getFullYear();
        var t = prompt("Masukan Tahun :",year);
        if (t!=null) {
            window.open("pages/datalaporan.php?item="+item+"&t="+t,"_BLANK");   
        }
    }
    </script>


