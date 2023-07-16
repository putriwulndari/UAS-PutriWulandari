<html>
    <body>
    <div class="col-lg-12">
        <h1>Transaksi<small> Simpan dan Pinjam</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> List  Member</li>
        </ol>
    </div>

    <div class="col-12 mt-3">
        <?php
        include('config.php');
            $result = mysqli_query($conn, 'SELECT * FROM anggota ');
           
            if ($result->num_rows) {
                ?>
        <table class="table table-striped   table-hover  ">
            <thead class="">
                <tr class="info">
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    
                while ($item = $result->fetch_object()) {
                    ?>
                <tr>

                    <td>
                        <?= $i; ?>
                    </td>

                    <td>
                        <?= $item->username; ?>
                    </td>
                    <td>
                        <?= $item->nama; ?>
                    </td>
                    <td>
                        <?= $item->pekerjaan; ?>
                    </td>
                    <td>
                        <?= $item->waktu; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="indexadmin.php?page=forminputsimpanan&xd=lihat&username=<?= $item->username?> ">Input Simpanan</a> <a
                            class="btn btn-warning btn-xs" href="indexadmin.php?page=forminputpinjaman&xd=lihat&username=<?= $item->username?>">Input Pinjaman</a>
    </div>
    </td>
    </td>
    </tr>
    <?php
                        $i++;
                        
                }
               
                ?>
    </tbody>

    </table>
    
    <?php
                
            } else
                echo 'Datanya tidak ada';
            ?>
    </body>
</html>