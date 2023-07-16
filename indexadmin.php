<?php 
	session_start();
    if($_SESSION['akses']== ""){
        echo '<script>alert("Anda bukan admin, login terlebih dahulu");</script>';
        echo '<script>window.location="login.php";</script>';
    }

$a = $_SESSION['akses'];

	
  
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

    <title>SIM Koperasi</title>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Navigasi</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index<?php echo $a?>.php">SIM Koperasi</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index<?php echo $a?>.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Input Data
                             <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown "><a href="indexadmin.php?page=inputanggota">Input Data Anggota</a></li>
                            <li><a href="indexadmin.php?page=simpanan">Transaksi</a></li>
                            <li><a href="indexadmin.php?page=tabungan&xd=lihat">Tabungan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-table"></i> Data
                            Form <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown "><a href="indexadmin.php?page=datamember">Data Anggota</a></li>
                            <li><a href="indexadmin.php?page=datauser">Data Users</a></li>
                            
                           
                            
                        </ul>
                    </li>
                    
                    
                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file"></i> Laporan <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown "><a href="indexadmin.php?page=laporansimpanan">Laporan Simpanan</a></li>
                            <li class="dropdown "><a href="indexadmin.php?page=laporanpinjaman">Laporan Pinjaman</a></li>
                            <li class="dropdown "><a href="indexadmin.php?page=laporanpenarikan">Laporan Penarikan</a></li>
                            <li class="dropdown "><a href="indexadmin.php?page=laporananggota">Laporan Anggota</a></li>
                            <li class="dropdown "><a href="indexadmin.php?page=bulanan">Laporan Bulanan</a></li>
                           
                           
                            
                        </ul>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                            <?php echo $_SESSION['username']; ?>
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="row">
            <?php
                
                $page = (isset($_GET['page']))? $_GET['page'] : "main";
                switch ($page) {
                    case 'inputanggota' : include "inputanggota.php"; break;
                    case 'datamember' : include "datamember.php"; break;
                    case 'hapus' : include "hapus.php"; break;
                    case 'details' : include "details.php"; break;
                    case 'update' : include "update.php"; break;
                    case 'datauser' : include "datauser.php"; break;
                    case 'updateuser' : include "updateuser.php"; break;
                    case 'simpanan' : include "simpanan.php"; break;
                    case 'forminputsimpanan' : include "forminputsimpanan.php"; break;
                    case 'forminputpinjaman' : include "forminputpinjaman.php"; break;
                    case 'laporansimpanan' : include "laporansimpanan.php"; break;
                    case 'tabungan' : include "tabungan.php"; break;
                    case 'laporananggota' : include "laporananggota.php"; break;
                    case 'laporanpinjaman' : include "laporanpinjaman.php"; break;
                    case 'inputpinjaman' : include "inputpinjaman.php"; break;
                    case 'bulanan' : include "bulanan.php"; break;
                    case 'laporanpenarikan' : include "laporanpenarikan.php"; break;
                    case 'main' : 
                    default : include 'dashboard.php';
                }
                
                ?>
            </div><!-- /.row -->
        

        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

</body>

</html>