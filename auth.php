<?php 
// mengaktifkan session php
session_start();


include 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$status = $_POST['status'];


$sql = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' and password='$password' and status ='aktif'");

// menghitung jumlah data yang ditemukan
$check = mysqli_fetch_array($sql);
if ($check['username'] && $password==$check['password']){

    // jika sesuai, maka buat session
        $_SESSION['username'] = $check['username'];
		$_SESSION['nama'] = $check['nama'];
        $_SESSION['akses'] = $check['akses'];
        if($check['akses']=="admin"){
            header("location:indexadmin.php");
        }else if ($check['akses'] == "cs"){
            header("location:indexcs.php");
        
        }else if($check['akses']=="member"){
            header("location:indexmember.php");
        }
}else{
	echo '<script>alert("Username atau Password salah, Atau nonaktif");</script>';
	echo '<script>window.location="login.php";</script>';
}
?>