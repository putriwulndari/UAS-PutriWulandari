<?php
include("config.php");
$username	= $_POST['username'];	
// SIMPAN
$jenis_simpan	= $_POST['jenis_simpan'];


$j=mysqli_fetch_array(mysqli_query($conn, "SELECT * from jenissimpanan where jenis_simpan='$jenis_simpan'"));
$jenis=$j['jenis_simpan'];
if($jenis=='wajib')
{
	$ambil=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM simpanan where username='$username' and jenis_simpan='wajib' order by no desc "));
	if($ambil<=0)
	{
		$mulai=date("Y-m-d");
	$banding=date('Y-m-d',strtotime('+30 day',strtotime($mulai)));
	}
	else if($ambil>0)
	{
		$mulai=$ambil['tgl_masuk'];
	$banding=date('Y-m-d',strtotime('+30 day',strtotime($mulai)));
	}
}
else
{
	$banding=date("Y-m-d");
	$jlh_sukarela = $_POST['jlh_simpans'];
	
}
$jlh_simpan		= $_POST['jlh_simpan'];
$jlh_simpans = $_POST['jlh_simpans'];
$entry			= $_POST['entry'];
$jlhsimpanan = $jlh_simpan + $jlh_simpans;




$pros=$_GET['pros'];

	switch($pros){
		case "simpan"	:
							$qtambah=mysqli_query($conn, "INSERT INTO simpanan (username, jenis_simpan, jlh_simpan, entry, tgl_masuk, tgl_trx) VALUES('$username', '$jenis_simpan', '$jlhsimpanan', '$entry', '$banding', now())");
							$sqlbaru=mysqli_fetch_array(mysqli_query($conn, "SELECT jlh_tabungan from tabungan where username='$username'"));
							$sqlsuk=mysqli_fetch_array(mysqli_query($conn, "SELECT jlh_sukarela from tabungan where username='$username'"));
							$hasil=$sqlbaru['jlh_tabungan']+$jlh_simpan;
							$hasilsuk=$sqlsuk['jlh_sukarela']+$jlh_sukarela;
							$q=mysqli_query($conn, "UPDATE tabungan SET jlh_tabungan = '$hasil', jlh_sukarela = '$hasilsuk' 
					  						WHERE username = '$username' ");?>
							<script type="text/javascript">
								window.alert("Input Simpanan Berhasil!")
                                window.location="indexadmin.php?page=forminputsimpanan&xd=lihat&username=<?=$username?>"
							</script>
							<?php
							break;

        }
?>