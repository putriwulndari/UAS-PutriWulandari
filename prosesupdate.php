<?php

include("config.php");

$id = $_POST['id'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];


$sqlanggota = mysqli_query($conn, "UPDATE anggota SET nama = '$nama', nik = '$nik', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', pekerjaan = '$pekerjaan', alamat = '$alamat', email = '$email', no_hp = '$no_hp'  WHERE id = '$id'");

if ($sqlanggota){
    echo '<script>alert("Edit data Berhasil!");</script>';
    header('Location:indexadmin.php?page=datamember');
}
else {
    echo "Data gagal diubah";
}

?>