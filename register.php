<?php

include("config.php");

if (isset($_POST['daftar'])){
    $username	= $_POST['username'];
	$password	= md5($_POST['password']);
	$nama		= $_POST['nama'];
	$nik		= $_POST['nik'];
	$tgl_lahir	= $_POST['tgl_lahir'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$pekerjaan	= $_POST['pekerjaan'];
	$alamat		= $_POST['alamat'];
	$email		= $_POST['email'];
	$no_hp		= $_POST['no_hp'];

	
	$checkuser = mysqli_query($conn, "SELECT * FROM users where username = '$username'") or die (mysqli_error($conn));
    
	if (mysqli_num_rows($checkuser) > 0){
		
		echo '<script>alert("Username Sudah ada");</script>';
	} else {
		$inputanggota	="INSERT INTO anggota (username, nama, nik, tgl_lahir, jenis_kelamin, pekerjaan, alamat, email, no_hp, waktu)
		VALUES ('$username', '$nama','$nik','$tgl_lahir','$jenis_kelamin','$pekerjaan','$alamat','$email','$no_hp', now())";
        $queryanggota =mysqli_query($conn, $inputanggota);

        $inputuser	="INSERT INTO users (username,password,akses,status) VALUES ('$username' ,'$password','member', 'aktif')";
        $queryuser = mysqli_query($conn, $inputuser);

        $pokok = mysqli_query($conn, "INSERT INTO simpanan (username, jenis_simpan,jlh_simpan, entry, tgl_masuk) VALUES ('$username', 'pokok', '10000', '$entry', now())");
        $tabungan = mysqli_query($conn, "INSERT INTO tabungan (username, nama,  tgl_mulai, jlh_tabungan) VALUES ('$username', '$nama',  now(), '10000') ");
	}

	if ($queryanggota ){
		echo '<script>alert("Daftar Berhasil!");</script>';
		echo '<script>window.location="login.php";</script>';
		
	}else{
		echo '<script>window.location="register.php";</script>';
	}

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Form Register</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body >
    <div class="login-page">
        <div class="form">
            <form method="POST" action="" class="login-form">
                <h1>Daftar </h1>
                <div class="form-group">
                            <label >Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik" required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>

                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input type="number" class="form-control" name="no_hp" required>
                            </div>
                
                <button name = "daftar">Daftar</button>
                <p class="message">Sudah punya akun? <a href="login.php">Login disini</a></p>
            </form>
        </div>
    </div>
</body>

</html>