<?php
include("config.php");
$xd = $_GET['xd'];
?>




<?php

if(($xd=='lihat'))
{
    
    
?>

<div class="col-lg-12">
        <h1>Tabungan<small> Anggota</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> List  Tabungan</li>
        </ol>
    </div>

    <div class="col-12 mt-3">
    <h4 class="text-center mb-3">Laporan Tabungan </h4>
    <table class="table table-striped   table-hover  ">
            <thead class="">
                <tr class="info">
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jumlah Tabungan</th>
                    <th>Jumlah Tabungan yang bisa diambil </th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                
                $tquery = mysqli_query($conn, "SELECT * FROM tabungan ORDER BY no DESC");
                $no = 1;
                while($tfetch=mysqli_fetch_array($tquery)){
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $tfetch['username'] ?></td>
                    <td><?php echo $tfetch['nama'] ?></td>
                    <td>Rp. <?php echo $tfetch['jlh_tabungan'] ?></td>
                    <td>Rp. <?php echo $tfetch['jlh_sukarela'] ?></td>
                    
                    <td><a class="btn btn-danger btn-xs" href="indexadmin.php?page=tabungan&xd=hahay&username=<?php echo $tfetch['username'];?>"><i class="fa fa-dollar"></i> Ambil Uang</a></td>
                </tr>

                <?php
                $no++;}
                ?>


                <tr class = "info">
                    <td colspan = "3" align= "center">Total tabungan</td>
                    <td></td>
                    <td colspan = "2">Rp.<?php $tot = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_tabungan + jlh_sukarela) as jlh_tabungan FROM tabungan")); echo number_format($tot['jlh_tabungan']) ?> </td>

                </tr>
            </tbody>


<?php
}else if($xd=='hahay')
{
$username = $_GET['username'];
$nama = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM anggota where username = '$username'"));
$lo=$_GET['username'];
?>
<div class="col-lg-12">
        <h1>Tabungan<small> Anggota</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> List  Tabungan</li>
        </ol>
    </div>
    <span style="float:right;">
<form action="prosestabungan.php" method="get">
<input type="hidden" value="<?php echo $lo; ?>" name="username"> <input type="hidden"> 
<?php $array=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tabungan where username='$lo' ")); ?>
<input type="text" style="width:150px;height:30px;" readonly="readonly" id="txt1" onkeyup="sum();" name="saldo" value="<?php echo $array['jlh_sukarela'];?>"/>

<script>
        function sum() {
              var txtFirstNumberValue = document.getElementById('txt1').value;
              var txtSecondNumberValue = document.getElementById('txt2').value;
              var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
              if (!isNaN(result)) {
                 document.getElementById('txt3').value = result;
              }
              else{
                 document.getElementById('txt3').value = txtFirstNumberValue;
              }
        }
        function isNumberKey(evt)
        {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
        }
</script>
       <input type="text" placeholder="ambil uang" style="width:150px;height:30px;" id="txt2" onkeyup="sum();" placeholder="" onkeypress="return isNumberKey(event)" name="jlh_ambil"/>
  <input type="text" placeholder="sisa uang" style="width:150px;height:30px;" id="txt3" onkeyup="sum();" onkeypress="return isNumberKey(event)"/>
   <button class="btn btn-danger"><i class="fa fa-dollar"></i> Ambil Uang</button>
</form>
</span>


<h4 class="text-center mb-3">Laporan Tabungan <b><i><?php echo $username?></i></b> </h4>
    <table class="table table-striped   table-hover  ">
    <thead class="">
    <tr class = "info">
                    <th>No</th>
                    <th>Username</th>
                    <th>Jumlah Ambil</th>
                    <th>Tanggal Transaksi</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                $qambil = mysqli_query($conn, "SELECT * FROM pengambilan WHERE username = '$username' ORDER BY no DESC");
                $no=1;
                while($data = mysqli_fetch_array($qambil)){
                ?>

                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['jlh_ambil'] ?></td>
                    <td><?php echo $data['tgl_trx'] ?></td>
                    
                </tr>
                <?php
                $no++;}
                ?>

                <tr class = "info">
                    <td colspan = "3" align= "center">Total Penarikan</td>
                    <td colspan = "2">Rp.<?php $tot = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_ambil) as jlh_ambil FROM pengambilan WHERE username = '$username'")); echo number_format($tot['jlh_ambil']) ?> </td>

                </tr>
                
                </tbody>
                </table>

<?php
}else if($aksi=='ambiluang')
{
  $lo=$_GET['username'];
?>
<div class="row mt">
     <div class="col-lg-12">
        <div class="form-panel" style="width:50%;">
            <h4 class="mb"><span class='glyphicon glyphicon-briefcase'></span> Ambil Uang</h4>
    <form action="prosestabungan.php" method="get">
      <div class="form-group">
            <label>Kode Tabungan</label>
            <input type="text" name="username" readonly class="form-control" value="<?php echo $lo;?>">
        </div>
        <div class="form-group">
            <label>Saldo</label>
            <?php $array=mysqli_fetch_array(mysqli_query($conn, "SELECT *FROM tabungan where username='$lo'")); ?>
            <input type="text" id="txt1" onkeyup="sum();" name="saldo" class="form-control" readonly value="<?php echo $array['jlh_tabungan'];?>"/>
        </div>
        <script>
        function sum() {
              var txtFirstNumberValue = document.getElementById('txt1').value;
              var txtSecondNumberValue = document.getElementById('txt2').value;
              var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
              if (!isNaN(result)) {
                 document.getElementById('txt3').value = result;
              }
              else{
                 document.getElementById('txt3').value = txtFirstNumberValue;
              }
        }
        function isNumberKey(evt)
        {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
        }
        </script>
        <div class="form-group">
            <label>Besar Pengambilan</label>
           <input type="text" id="txt2" onkeyup="sum();" onkeypress="return isNumberKey(event)" name="jlh_ambil" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Sisa Saldo</label>
           <input type="text" id="txt3" class="form-control" readonly />
        </div>
        <button class="btn btn-danger"><span class='glyphicon glyphicon-check'></span> Ambil Uang</button>
          </form>

</div>
</div>
</div>

<?php }
?>


