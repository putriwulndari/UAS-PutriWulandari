
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
?>

<div class="col-lg-12">
    <h1>Laporan Trasaksi<small> Simpan</small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-edit"></i> Simpanan</li>
    </ol><a class = "btn btn-info " href="indexadmin.php?page=simpanan">Kembali</a>
    <span style="float:right;">
<?php 
$jquery=mysqli_query($conn, "SELECT * FROM jenissimpanan");
$no=1;
while($jfetch=mysqli_fetch_array($jquery))
{ 
 if($jfetch['jenis_simpan']=='wajib')
 {
 	$baru=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM simpanan where username='$username' and jenis_simpan='wajib' order by no desc "));
 	$data=$baru['tgl_masuk'];
 	$now=date("Y-m-d");
 	if($data==$now)
 	{
 		echo '<a class="btn btn-danger" href="indexadmin.php?page=forminputsimpanan&xd=simpan&username='.$username.'&jenis_simpan='.$jfetch['jenis_simpan'].'"><i class="fa fa-warning></i> Wajib '.$data.'</a> ';
 	}
 	else if($data<$now)
 	{
 		echo '<a class="btn btn-danger" href="indexadmin.php?page=forminputsimpanan&xd=simpan&username='.$username.'&jenis_simpan='.$jfetch['jenis_simpan'].'"><i class="fa fa-warning"></i> Wajib '.$data.'</a> ';
 	}
 	else if($data>$now)
 	{
        echo '<a class="btn btn-danger" disabled="disabled" href="indexadmin.php?page=forminputadmin&xd=simpan&username='.$username.'&jenis_simpan='.$jfetch['jenis_simpan'].'"><i class="fa fa-warning"></i> Wajib '.$data.'</a> ';
 	}
 }
 else if($jfetch['jenis_simpan']=='sukarela')
 {
 	echo '<a class="btn btn-success" href="indexadmin.php?page=forminputsimpanan&xd=simpan&username='.$username.'&jenis_simpan='.$jfetch['jenis_simpan'].'"><i class="fa fa-money""></i> Sukarela</a> ';
 }
 $no++;
}
?>
 
</span></h4>

    <h4 class="text-center mb-3">Laporan Transaksi Simpan <b><i><?php echo $username?></i></b> </h4>
    <table class="table table-striped   table-hover  ">
    <thead class="">
    <tr>
                    <th>No</th>
                    <th>Waktu Transaksi</th>
                    <th>Jenis Simpanan</th>
                    <th>Jumlah Simpanan</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                   $qtable = mysqli_query($conn, "SELECT * FROM simpanan WHERE username = '$username' ORDER BY no DESC"); 
                    while ($ftable = mysqli_fetch_array($qtable)){
                    ?>
                    <tr>
                    <td><?php echo $i?></td>
			        <td><?php echo $ftable['tgl_trx'];?></td>
			        <td><?php echo $ftable['jenis_simpan'];?></td>
                    <td>Rp. <?php echo $ftable['jlh_simpan'];?></td>
                    </tr>
                <?php
                $i++;}
                ?>
                    <tr class="info">
                    <td colspan="3" align="center">Total</td>
                    <td>Rp. <?php $tot=mysqli_fetch_array(mysqli_query($conn, "SELECT sum(jlh_simpan ) as jlh_simpan from simpanan where username = '$username'")); echo number_format($tot['jlh_simpan']);?> </td>
                    </tr>
                    </tbody>
                    </table>
<?php
}elseif($xd=='simpan'){
    $username=$_GET['username'];
    $jenis_simpan=$_GET['jenis_simpan'];
    $nama=mysqli_fetch_array(mysqli_query($conn, "SELECT * from jenissimpanan where jenis_simpan='$jenis_simpan'"));
    $qubah=mysqli_query($conn, "SELECT * FROM anggota WHERE username='$username'");
    $data2=mysqli_fetch_array($qubah);
?>

<div class="row mt">
 <div class="col-lg-12">
    <div class="form-panel" style="width:50%;">
        <h4 class="mb"> Transaksi Simpanan</h4>
<form action="prosestransaksi.php?pros=simpan" method="post" id="form" name="mainform" onSubmit="validasiSimpan()">
    <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" size="34" title="Username harus diisi" readonly="" class="form-control" value="<?php echo $data2['username'];?>">
        </div>
    <div class="form-group">
        <label>Nama Anggota</label>
        <input type="text" name="nama" size="54" class="form-control" readonly value="<?php echo $data2['nama'];?>"/>
    </div>
    <div class="form-group">
        <label>pekerjaan</label>
       <input type="text" name="pekerjaan" class="form-control" size="54" readonly value="<?php echo $data2['pekerjaan'];?>"/>
    </div>
    <div class="form-group">
        <label>Jenis Simpanan</label>
        <select name="jenis_simpan" class="form-control" id="jenis_simpan" onChange="show(this.value)" class="required" title="Jenis Simpan harus diisi">
            <option value="<?php echo $jenis_simpan;?>"><?php echo $nama['jenis_simpan'];?></option>
  
        </select>
    </div>
    
    <?php if($nama['jenis_simpan']=='sukarela')
    {
    ?>
    <div class="form-group">
        <label>Jumlah Simpanan</label>
        <input type="text" onkeypress="return isNumberKey(event);" value="<?php echo $nama['jlh_simpan'];?>" name="jlh_simpans" class="form-control" id="jlh_simpan" size="54"/>
    </div>
    <div class="form-group">
        <label>Jumlah Simpanan</label>
        <input type="hidden" onkeypress="return isNumberKey(event);"  name="jlh_sukarela" class="form-control" id="jlh_sukarela" size="54"/>
    </div>
    <?php } 
    else { ?>
    <div class="form-group">
        <label>Jumlah Simpanan</label>
        <input type="text" onkeypress="return isNumberKey(event);"  value="<?php echo $nama['jlh_simpan'];?>" name="jlh_simpan" class="form-control" id="jlh_simpan" size="54" readonly/>
    </div>
    <?php } ?>
    <div class="form-group">
        <label>User Entry</label>
        <input type="text" name="entry" class="form-control" size="54" value="<?php echo $_SESSION['username'];?>" readonly >
    </div>
    <div class="form-group">
        <label>Tanggal Entry</label>
        <input type="text" name="tgl_entri" class="form-control" size="54" value="<?php echo date("Y-m-d");?>" readonly />
    </div>
    <button class="btn btn-danger"><span class='fa fa-check'></span> Simpan</button>
     </form>

</div>
</div>
</div>
<?php
}
?>                    