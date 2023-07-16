<?php
include('config.php');
if(isset($_GET['username'])){
    $username = $_GET['username'];
    
}else{
    die("Error, Tidak ada Data yang dipilih");
}





?>
<div class="col-lg-12">
    <h1>List Pinjaman<small> </small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-edit"></i> Pinjaman</li>
    </ol>
    <h4 class="text-center mb-3">List Pinjaman <b><i><?= $username ?></i></b></h4>
    
    <table class="table table-striped   table-hover  ">
    <thead class="">
    <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Tanggal Transaksi</th>
                    <th>Keterangan</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                   $qtable = mysqli_query($conn, "SELECT * FROM pinjaman WHERE username = '$username' ORDER BY no DESC"); 
                    while ($ptable = mysqli_fetch_array($qtable)){
                    ?>
                    <tr>
                    <td><?php echo $i?></td>
			        <td><?php echo $ptable['username'];?></td>
			        <td>Rp. <?php echo $ptable['jlh_pinjam'];?></td>
                    <td><?php echo $ptable['tgl_trx'];?></td>
                    <td><?php echo $ptable['ket'];?></td>
                    </tr>
                    <?php
                    $i++;}?>

                    <tr class="info">
                        <td colspan = "4" align = "center">Total</td>
                        <td >Rp. <?php $tot = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(jlh_pinjam) as jlh_pinjam from pinjaman where username = '$username'")); echo number_format($tot['jlh_pinjam']);  ?></td>
                    </tr>      
                    
                   

                    </tbody>
                    </table>
   