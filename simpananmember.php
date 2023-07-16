<div class="col-lg-12">
    <h1>Data Simpanan<small> Anggota</small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-table"></i> Simpanan </li>
    </ol>
</div>
<table class="table table-striped ">
    <tr>


    </tr>
    <tr bgcolor="#DFE6EF" height="30">
        <h4>
            <center><b>Simpanan Anda <u><i><?=$_SESSION['username']?></i></u></b></center>
        </h4>
        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <th>No</th>
        <th>Waktu Transaksi</th>
        <th>Jenis Simpanan</th>
        <th>Jumlah Simpanan</th>
        <th>User Entry</th>
    </tr>


    <?php
include('config.php');
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}
else {
die ("Username tidak ada!");	
}
$sql = mysqli_query($conn, "SELECT * FROM simpanan WHERE username = '$username'");
$no = 0;
while ( $fetch = mysqli_fetch_array($sql)){
    $username = $fetch['username']; 
    

    $no++;

?>
    <tr>
        <td><?=$no?></td>
        <td><?=$fetch['tgl_trx'];?></td>
        <td><?=$fetch['jenis_simpan'];?></td>
        <td><?=$fetch['jlh_simpan']?></td>
        <td><?= $fetch['entry'] ;?></td>
    </tr>

    <?php
}
?>
    <tr class="info">
                    <td colspan="3" align="center">Total</td>
                    <td>Rp. <?php $tot=mysqli_fetch_array(mysqli_query($conn, "SELECT sum(jlh_simpan) as jlh_simpan from simpanan where username = '$username'")); echo number_format($tot['jlh_simpan']);?> </td>
                    <td></td>  
                </tr>

</table>
</div>