<?php
include('config.php');
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $xd = $_GET['xd'];
    
}else{
    die("Error, Tidak ada Data yang dipilih");
}
?>

<?php
if ($xd=='lihat'){
    $username = $_GET['username'];


$anggota=mysqli_fetch_array(mysqli_query($conn, "SELECT nama from anggota where username='$username'")); ?>
	<div class="row mt">
  <div class="col-lg-12">
  <div class="col-lg-12">
    <h1>Laporan Trasaksi<small> Pinjam</small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-edit"></i> Pinjaman</li>
    </ol><a class = "btn btn-info " href="indexadmin.php?page=simpanan">Kembali</a>
    <span style="float:right;"><a class="btn btn-success" href="indexadmin.php?page=inputpinjaman&username=<?=$username?>">Input data</a></span>
        
        </h4>
<h4 class="text-center mb-3">Laporan Transaksi Pinjam <b><i><?php echo $username?></i></b> </h4>
    <table class="table table-striped   table-hover  ">
    <thead class="">
    <tr>
                    <th>No</th>
                    <th>Waktu Transaksi</th>
                    <th>Username</th>
                    <th>Kode Pinjaman</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Entry</th>
                    <th>Keterangan</th>
                    

                </tr>
            </thead>
            <tbody>
    <?php $sql=mysqli_query($conn, "SELECT * from pinjaman where username='$username' order by no desc");
    $no=1;
    while($data=mysqli_fetch_array($sql))
    	{
            ?>
            <tr>
            <td><?=$no?></td>
            <td><?=$data['tgl_trx']?></td>
            <td><?=$data['username']?></td>
            <td><?=$data['kode_pinjam']?></td>
            <td><?=$data['jlh_pinjam']?></td>
            <td><?=$data['entry']?></td>
            <td><?=$data['ket']?></td>
            </tr>
            <?php
    	$no++;}?> 
            <tr class="info">
                    <td colspan="4" align="center">Total</td>
                    <td colspan="3">Rp. <?php $tot=mysqli_fetch_array(mysqli_query($conn, "SELECT sum(jlh_pinjam ) as jlh_pinjam from pinjaman where username = '$username'")); echo number_format($tot['jlh_pinjam']);?> </td>
            </tr>
    		
	</tbody>   
	</table></form></div></div></div>
</div>
<?php }

    ?>