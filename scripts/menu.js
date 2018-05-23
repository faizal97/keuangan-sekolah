let arr_bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
let arr_hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu','Minggu'];
let perdetik = setInterval(tanggal,1000);
tanggal();
function tanggal() {
let tgl = new Date();
let tgl_skrg = arr_hari[tgl.getDay()] + ", " + tgl.getDate() + " " + arr_bulan[tgl.getMonth()] + " " + tgl.getFullYear() + " " + ("0" + tgl.getHours()).slice(-2) + ":" + ("0" + tgl.getMinutes()).slice(-2) + ":" + ("0" + tgl.getSeconds()).slice(-2);
let tampil = document.getElementById('tgl-skrg').innerHTML = tgl_skrg;
}
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
let dropd_data = document.getElementById('toggle-menu-data');
let dropd_lap = document.getElementById('toggle-menu-laporan');
let dropd_bayar = document.getElementById('toggle-menu-pembayaran');
let child_data = document.getElementsByClassName('child-data');
let child_lap = document.getElementsByClassName('child-laporan');
let child_bayar = document.getElementsByClassName('child-bayar');
dropd_data.onclick = ()=>{
for(e of child_data){
	if(e.style.display=='none'){
	e.style.display ='block';
		}
	else{
	e.style.display='none';
		}
	}
}
dropd_lap.onclick = ()=>{
for(e of child_lap){
	if(e.style.display=='none'){
	e.style.display ='block';
		}
	else{
	e.style.display='none';
		}
	}
}
dropd_bayar.onclick = ()=>{
for(e of child_bayar){
	if(e.style.display=='none'){
	e.style.display ='block';
		}
	else{
	e.style.display='none';
		}
	}
}