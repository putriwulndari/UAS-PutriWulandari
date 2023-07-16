<?php
include('config.php');
if(isset($_GET['username'])){
    $username = $_GET['username'];
    
}else{
    die("Error, Tidak ada Data yang dipilih");
}

?>
<div class="col-lg-12">
    <h1>List Penarikan<small> </small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-edit"></i> Pinjaman</li>
    </ol>
    <h4 class="text-center mb-3">List Tarikan <b><i><?= $username ?></i></b></h4>
    
    <table class="table table-striped   table-hover  ">
    <thead class="">
    <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Jumlah Penarikan</th>
                    <th>Tanggal Transaksi</th>
                  
                    

                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;

                   $qtable = mysqli_query($conn, "SELECT * FROM pengambilan WHERE username = '$username' ORDER BY no DESC"); 
                    while ($ptable = mysqli_fetch_array($qtable)){
                    ?>
                    <tr>
                    <td><?php echo $i?></td>
			        <td><?php echo $ptable['username'];?></td>
			        <td>Rp. <?php echo $ptable['jlh_ambil'];?></td>
                    <td><?php echo $ptable['tgl_trx'];?></td>
                    </tr>
                    <?php
                    $i++;}?>

                    <tr class="info">
                        <td colspan = "3" align = "center">Total</td>
                        <td >Rp. <?php $tot = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(jlh_ambil) as jlh_ambil from pengambilan where username = '$username'")); echo number_format($tot['jlh_ambil']);  ?></td>
                    </tr>      
                    
                   

                    </tbody>
                    </table>
   