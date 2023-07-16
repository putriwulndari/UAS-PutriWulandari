<?php
include "config.php";
$jenis_pinjam = $_POST['jenis_pinjam'];

if($jenis_pinjam!=""){
	$sql = "SELECT *
			FROM jenispinjaman
			WHERE jenis_pinjam='$jenis_pinjam'";
	$data = mysql_query($sql);
	if($d = mysql_fetch_object($data)){
		$arr = array("jenis_pinjam"=>$d->jenis_pinjam,
						"JENIS_PINJAM"=>$d->jenis_pinjam,
						"LAMA_ANGSURAN"=>$d->lama_angsuran,
						"MAKS_PINJAM"=>$d->maks_pinjam,
						"BUNGA"=>$d->bunga
						);			 	 	 	 	 	 	
	}else{
		$arr = array("JENIS_PINJAM"=>"",
						"NAMA_PINJAMAN"=>"",
						"LAMA_ANGSURAN"=>"",
						"MAKS_PINJAM"=>""
						);
	}
	$arr = json_encode($arr);
	exit($arr);
}
?>