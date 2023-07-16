<?php
include("config.php");
$username = $_SESSION['username'];
$sqlanggota = mysqli_query($conn, "SELECT count(*) AS username FROM anggota WHERE username = '$username'  ");
$fetchanggota = mysqli_fetch_array($sqlanggota);
$sqltabungan = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_tabungan + jlh_sukarela) AS jlh_tabungan FROM tabungan WHERE username= '$username'"));
$sqlpinjaman = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_pinjam) AS jlh_pinjam FROM pinjaman WHERE username = '$username' "));

$totaltabungan = $sqltabungan['jlh_tabungan']; 
$totalpinjaman = $sqlpinjaman['jlh_pinjam'] ;





?>

<html>

<body>
    <div class="col-lg-12">
        <h1>Dashboard <small>Koperasi</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>

        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="announcement-heading"><h3><?= $fetchanggota['username'] ?></h3></p>
                                <p class="announcement-text">Total Jumlah Member</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="announcement-heading"> <h3> <?= number_format($totaltabungan) ?> </h3></p>
                                <p class="announcement-text">Total Jumlah Tabungan</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa fa-dollar fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-right">
                                <p class="announcement-heading"> <h3> <?= number_format($totalpinjaman) ?> </h3></p>
                                <p class="announcement-text">Total Jumlah Pinjaman</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
       
</body>

</html>