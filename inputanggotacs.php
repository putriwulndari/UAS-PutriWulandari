<?php 
	
    
include("config.php");
  if (isset($_POST['simpan']) ) {
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
    $akses = $_POST['akses'];
    $entry = $_SESSION['username'];

 

    // check username ganda

    $check = mysqli_query($conn, "SELECT * FROM users  where username = '$username'") or die (mysqli_error($conn));
    
	if (mysqli_num_rows($check) > 0){
		
		echo '<script>alert("Username Sudah ada");</script>';
	} else {
		$inputanggota	="INSERT INTO anggota (username, nama, nik, tgl_lahir, jenis_kelamin, pekerjaan, alamat, email, no_hp, entry, waktu)
		VALUES ('$username', '$nama','$nik','$tgl_lahir','$jenis_kelamin','$pekerjaan','$alamat','$email','$no_hp', '$entry', now())";
        $queryanggota =mysqli_query($conn, $inputanggota);

        $inputuser	="INSERT INTO users (username,password, entry ,akses) VALUES ('$username' ,'$password', '$entry', '$akses')";
        $queryuser = mysqli_query($conn, $inputuser);

        $pokok = mysqli_query($conn, "INSERT INTO simpanan (username, jenis_simpan,jlh_simpan, entry, tgl_masuk) VALUES ('$username', 'pokok', '10000', '$entry', now())");
        $tabungan = mysqli_query($conn, "INSERT INTO tabungan (username, nama, tgl_mulai, jlh_tabungan) VALUES ('$username', '$nama', now(), '10000') ");
    }

	if ($queryanggota ){
		echo '<script>alert("Input Anggota Berhasil!");</script>';
        echo '<script>window.location="indexcs.php?page=inputanggotacs";</script>';
		
		
	}else{
        echo '<script>alert("Input Gagal!");</script>';
        echo '<script>window.location="indexcs.php?page=inputanggotacs";</script>';
		
	}



}

?>


<html>
    <body>
    <div class="col-lg-12">
                    <h1>Input Data<small> Anggota</small></h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-edit"></i> Anggota</li>
                    </ol>
                    <h4 class="text-center mb-3">Input Data Anggota </h4>
                    <form class="form" method="POST" action="">
                        <div class="error" style="display: none"></div>

                        <div class="form-group">
                            <label>Username</label>
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
                                <input type="tel" class="form-control" name="no_hp" maxlength="12" required>
                            </div>

                            <div class="form-group">
                            <label>Hak Akses</label>
                            <select class="form-control" name="akses">
                                
                                <option value="cs">Customer Service</option>
                                <option value="member">Member</option>
                            </select>


                            <br>

                            <div class="form-group mt-4">
                                <input type="submit" class="btn btn-primary" value="Simpan"name="simpan">
                                <input type="reset" class="btn btn-danger" value="Batal">
                                <br>

                            </div>
                    </form>
                </div>
    </body>
</html>