<?php
include("config.php");
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $sql = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM anggota WHERE username = '$username'"));
    $uname = $sql['username'];
    $nama = $sql['nama']; 
    $tgl_trx = date("Y-m-d");
}    

if(isset($_POST['Pinjam'])){
    $username = $_POST['username'];
    $jlh_pinjam = $_POST['jlh_pinjam'];
    $ket = $_POST['ket']; 
    $entry =$_SESSION['username'];
    $kode_pinjam = $_POST['kode_pinjam'];
    $tgl_trx = date("Y-m-d");

    $ssql = mysqli_query ($conn, "INSERT INTO pinjaman VALUES ('', '$username', '$kode_pinjam', '$jlh_pinjam', '$entry', '$tgl_trx', '$ket')");

    if ($ssql){
        echo '<script>alert("Input Pinjaman Berhasil!");</script>';?>
        
        <script>
             window.location="indexadmin.php?page=forminputpinjaman&xd=lihat&username=<?=$username?>"
        </script>
        
        <?php
    }
  
}

?>




<div class="col-lg-12">
    <h1>Input Pinjaman<small> </small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-edit"></i> Pinjaman</li>

        <form action="" method="POST">
            <div class="error" style="display: none"></div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" value="<?=$uname?>" name="username" disabled="disabled">
                <input type="hidden" class="form-control" value="<?=$uname?>" name="username">
            </div>

            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="Date" class="form-control" value="<?=$tgl_trx?>" name="tgl_trx"  disabled="disabled">
            </div>
            <div class="form-group">
                            <label>Kode Pinjam</label>
                            <select class="form-control" name="kode_pinjam">
                                <option value="XP01">XP01</option>
                                <option value="XP02">XP02</option>
                                <option value="XP03">XP03</option>
                            </select>

            <div class="form-group">
                <label>Jumlah Pinjaman</label>
                <input type="number" class="form-control" name="jlh_pinjam" required>
            </div>

            <div class="form-group">
                <label>Keterangan Pinjaman</label>
                <input type="text" class="form-control" name="ket">
            </div>

            <div class="form-group mt-4">
                <input type="submit" class="btn btn-primary" value="Pinjam" name="Pinjam">
                <input type="reset" class="btn btn-danger" value="Batal">
                <br>

            </div>

        </form>