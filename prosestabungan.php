<?php
include("config.php");
$username=$_GET['username'];
$jlh_ambil=$_GET['jlh_ambil'];
$saldo=$_GET['saldo'];
$jlh_sukarela=$_GET['jlh_ambil'];
$date=date("Y-m-d");
if($jlh_sukarela>$saldo)
{ ?>
	<script>alert("Maaf Saldo tidak cukup");window.location="indexadmin.php?page=tabungan&xd=lihat";</script>
<?php }
else
{
	$dfop=mysqli_query($conn, "INSERT into pengambilan values('', '$username', '$jlh_ambil','$date')");
	$sisa=$saldo-$jlh_sukarela;
	mysqli_query($conn, "UPDATE tabungan set jlh_sukarela ='$sisa' WHERE username='$username' ");?>
<script>
window.location="indexadmin.php?page=tabungan&xd=hahay&username=<?php echo $username; ?>";</script>
<?php }
?>