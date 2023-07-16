<?php
include ("config.php");
$kode_simpan = $_POST['kode_simpan'];

if($kode_simpan!=""){
	$sql = "SELECT * 
			FROM jenissimpanan 
			WHERE kode_simpan='$kode_simpan'";
	$data = mysql_query($sql);
	if($d = mysql_fetch_object($data)){
		$arr = array("jlh_simpan"=>$d->jlh_simpan);
	}else{
		$arr = array("jlh_simpan"=>"");
	}
	$arr = json_encode($arr);
	exit($arr);
}
?>
