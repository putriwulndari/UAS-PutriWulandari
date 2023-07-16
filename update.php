<?php
include('config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM anggota WHERE id='$id'");
    
    $datamember = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql)< 1){
        echo "Data tidak ada";
    }
}


?>


<html>
    <body>
    <div class="col-lg-12">
                    <h1>Edit Data<small> Anggota</small></h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-edit"></i> Anggota</li>
                    </ol>
                    <a class = "btn btn-info " href="indexadmin.php?page=datamember">Kembali</a>
                    <h4 class="text-center mb-3"> Edit Data Anggota </h4>
                      
                    <form class="form" method="POST" action="prosesupdate.php">
                        
                        <div class="error" style="display: none"></div>
                        <input type="hidden" name="id" value="<?php echo $datamember['id'];?>" />
                        
                      
                        <div class="form-group">
                            <label>Username  Anggota</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $datamember['username'];?>" disabled="disabled" />
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap Anggota</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $datamember['nama'];?>" required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik"  value="<?php echo $datamember['nik'];?>"required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $datamember['tgl_lahir'];?>" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" value="<?php echo $datamember['jenis_kelamin'];?>">
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>

                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" value="<?php echo $datamember['pekerjaan'];?>" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $datamember['alamat'];?>" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $datamember['email'];?>" required>
                            </div>

                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input type="tel" class="form-control" name="no_hp" maxlength="12" value="<?php echo $datamember['no_hp'];?>" required>
                            </div>
                            
                            
                            

                            <br>

                            <div class="form-group mt-4">
                                <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                <input type="reset" class="btn btn-danger" value="Batal">
                                <br>

                            </div>
                    </form>
                </div>
    </body>
</html>