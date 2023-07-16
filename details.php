<?php

include "config.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
    else {
        die ("Username Tidak ada! ");	
        }
	

    $query = mysqli_query($conn, "SELECT * FROM anggota WHERE id = '$id'");
    $tampil = mysqli_fetch_array($query);

    
    $nama = $tampil['nama'];
	$username = $tampil['username'];
    $nik = $tampil['nik'];
    $tgl_lahir = $tampil['tgl_lahir'];
    $jenis_kelamin = $tampil['jenis_kelamin'];
    $pekerjaan = $tampil['pekerjaan'];
    $alamat = $tampil['alamat'];
    $email = $tampil['email'];
    $no_hp = $tampil['no_hp'];
	$entry = $tampil['entry'];
	$waktu = $tampil['waktu'];
    
?>



<html>
<body>
<div class="col-lg-12">
        <h1>Details Data<small> Anggota</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Anggota</li>
        </ol>
    </div>
    <table class="table table-striped ">
        <tr>
            
            
        </tr>
        <tr bgcolor="#DFE6EF" height="30">
            <td>&nbsp;</td>
            <td><b>Details Data Anggota <u><i><?=$nama?></i></u></b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
			<td>&nbsp;</td>
			<td><a class = "btn btn-info " href="indexadmin.php?page=datamember">Kembali</a></td>
			<td>&nbsp;</td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Username  Anggota</td>
			<td>:&nbsp;<?=$username?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Nama Lengkap Anggota</td>
			<td>:&nbsp;<?=$nama?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>NIK</td>
			<td>:&nbsp;<?=$nik?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Tanggal Lahir</td>
			<td>:&nbsp;<?=$tgl_lahir?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Jenis Kelamin</td>
			<td>:&nbsp;<?=$jenis_kelamin?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Pekerjaan</td>
			<td>:&nbsp;<?=$pekerjaan?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Alamat</td>
			<td>:&nbsp;<?=$alamat?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Email</td>
			<td>:&nbsp;<?=$email?></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Nomor HP</td>
			<td>:&nbsp;<?=$no_hp?></td>
		</tr>
	
		<tr height="46">
			<td>&nbsp;</td>
			<td>User_Entry</td>
			<td>:&nbsp;<?=$entry?></td>
		</tr>

		<tr height="46">
			<td>&nbsp;</td>
			<td>Tanggal Pembuatan</td>
			<td>:&nbsp;<?=$waktu?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="32">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>


    
</body>

</html>