<?php 
// FUNCTION UPDATE DATA
function edit_sql($kon,$table,$arr_data,$arr_dataValue){
 $sql = 'UPDATE '.$table;
 for($i=0;$i<=sizeof($arr_data)-1;$i++){
 	if($i==0){
 		$sql .= " SET ".$arr_data[$i]."='".$arr_dataValue[$i]."'";
 		continue;
 	}
 	if($i!=sizeof($arr_data)){
 		$sql .= ',';
 	}
 	$sql .= $arr_data[$i]."='".$arr_dataValue[$i]."'";
 }
 $sql .= " WHERE ".$arr_data[0]."='".$arr_dataValue[0]."'";
return mysqli_query($kon,$sql);}

// FUNCTION TAMPIL DATA
function show_sql($table,$sort='',$by='',$primary='',$primaryValue='',$likeData='',$limitStart='',$limitData=''){
$sql = "SELECT * FROM ".$table;
if (!empty($primary)){
	$sql .= " WHERE ".$primary;
	if(!empty($primaryValue) || is_int($primaryValue)){
		$sql .= "='".$primaryValue."'";
	}elseif(!empty($likeData) || is_int($likeData)){
		$sql .= " LIKE '%".$likeData."%'";
	}
}

if(!empty($limitStart) || is_int($limitStart)){
	$sql .= " LIMIT ".(string)$limitStart.",".(string)$limitData;
}
if(!empty($sort)){
$sql .= " ORDER BY ".$by." ".strtoupper($sort);
}

return $sql;
}
 
//FUNCTION TAMBAH DATA
function tambah_sql($kon,$table,$arr_data,$arr_dataValue){
$sql = "INSERT INTO ".$table."(";
for($i=0;$i<=sizeof($arr_data)-1;$i++){
	$sql .= $arr_data[$i];
	if($i!=sizeof($arr_data)-1){
		$sql .= ",";
	}else{
		$sql .= ")";
	}
 }
 $sql .= " VALUES(";
 for($i=0;$i<=sizeof($arr_dataValue)-1;$i++){
 	$sql .= "'".$arr_dataValue[$i]."'";
 	if($i!=sizeof($arr_dataValue)-1){
 		$sql .= ",";
 	}else{
 		$sql .= ")";
 	}
 }
return mysqli_query($kon,$sql);
//  return $sql;
}


function makeId($maxchar,$front,$id){
	$counter = (($maxchar-strlen($front))-strlen($id));
	$nol ="";
	for($i=1;$i<=$counter;$i++){
		$nol .= "0";
	}
	return $front.$nol.$id;
}

function makePass($pass,$saltLength,$hashType){
	$salt = bin2hex(openssl_random_pseudo_bytes($saltLength,$cstrong));
	$salted = $salt.$pass;
	$hashed_salt = hash($hashType,$salted);
	return array($hashed_salt,$salt);
}
// Function Hapus SQL
function hapus_sql($kon,$table,$primary='',$primaryValue=''){
$sql = 'DELETE FROM '.$table;
if(!empty($primary)){
	$sql .=' WHERE '.$primary."='".$primaryValue."'";
}
return mysqli_query($kon,$sql);
}

//Function Pagination
function pagination($kon,$tabel,$page=1,$per=5,$page='',$where=''){
	$sql = "SELECT * FROM $tabel $where";
	$result = mysqli_query($kon,$sql);
	$jml = mysqli_num_rows($result);
	$maxpage = floor($jml / $per);
	if($jml % $per != 0){
		$maxpage++;
	}
	$output = "<nav aria-label='PAGE PAGINATION'><ul class='pagination'>";
	for($i=1;$i<=$maxpage;$i++){
		$prev = $i - 1;
		$next = $i + 1;
		if($i==1){
			$output .= "<li class='pages-item'><a class='page-link' href='?page=$page&p=$prev'>Previous</a></li>";
		}
	$output .= "<li class='pages-item'><a class='page-link' href='?page=$page&p=$i'>$i</a></li>";
	if($i==$maxpage){
		$output .= "<li class='pages-item'><a class='page-link' href='?page=$page&p=$next'>Next</a></li>";
	}
	}
	return $output;
}
 

 ?>