<?php
include('config.php');
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    
    $datamember = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql)< 1){
        echo "Data tidak ada";
    }
}

if(isset($_POST['Simpan'])){
    $id = $_POST['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $akses = $_POST['akses'];
    $status = $_POST['status'];

    $sqlusers = mysqli_query($conn, "UPDATE users SET  akses = '$akses', status = '$status'  WHERE username = '$username'");
    
    if($sqlusers){
        echo '<script>alert("Edit Berhasil!");</script>';
        echo '<script>window.location="indexadmin.php?page=datauser";</script>';

    }else {
        echo '<script>alert("Edit Gagal!");</script>';
    }
}


?>

<html>
    <body>
        <div class="col-lg-12">
        <h1>Edit Data<small> Users</small></h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-edit"></i> User</li>
                    </ol>
                    <a class = "btn btn-info " href="indexadmin.php?page=datauser">Kembali</a>
                    <h4 class="text-center mb-3">Edit Hak Akses  </h4>
                    
                    <form class="form" method="POST" action="">
                        <div class="error" style="display: none"></div>
                        <input type="hidden" name="username" value="<?php echo $datamember['username'];?>" />
                        

                        <div class="form-group">
                            <label>Username  Anggota</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $datamember['username'];?>" disabled="disabled" />
                        </div>

                        <div class="form-group">
                            <label>Password  Anggota</label>
                            <input type="text" class="form-control" name="password" value="<?php echo $datamember['password'];?>" disabled="disabled" />
                        </div>

                        <div class="form-group">
                            <label>Hak Akses</label>
                            <select class="form-control" name="akses"  value="<?php echo $datamember['akses'];?>">
                                <option value="admin">Admin</option>
                                <option value="cs">Customer Service</option>
                                <option value="member">Member</option>
                            </select>

                            <div class="form-group">
                            <label>Status </label>
                            <select class="form-control" name="status"  value="<?php echo $datamember['status'];?>">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non Aktif</option>
                                
                            </select>

                            <br>

                            <div class="form-group mt-4">
                                <input type="submit" class="btn btn-primary" value = "Simpan" name="Simpan">
                                <input type="reset" class="btn btn-danger" value="Batal">
                                <br>

                            </div>
</form>
        </div>
    </body>
</html>