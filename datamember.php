<?php 
include("config.php");
?>

<html>

<body>
    <div class="col-lg-12">
        <h1>Report Data<small> Anggota</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Anggota</li>
        </ol>
    </div>

    <a class="btn btn-success mb-2" href="indexadmin.php?page=inputanggota">Input Anggota</a>

    <div class="col-12 mt-3">
        <?php
            $result = mysqli_query($conn, 'SELECT * FROM anggota ');
           
            if ($result->num_rows) {
                ?>
        <table class="table table-striped   table-hover  ">
            <thead class="">
                <tr class="info">
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Action</th>

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
                        <?= $item->nik; ?>
                    </td>
                    <td>
                        <?= $item->no_hp; ?>
                    </td>

                    <td>
                        <?= $item -> email; ?>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="indexadmin.php?page=details&id=<?= $item->id?>">Details</a> <a
                            class="btn btn-warning" href="indexadmin.php?page=update&id=<?= $item->id?>">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Yakin mau hapus <?= $item -> username?> ?')"
                            href="indexadmin.php?page=hapus&username=<?= $item -> username?>&id=<?= $item -> id?>">Hapus</a>
    </div>
    </td>
    </td>
    </tr>
    <?php
                        $i++;
                        $a = $i-1;
                }
               
                ?>
    </tbody>

    </table>
    <a>Jumlah Member : <?php echo $a ?> </a>
    <?php
                
            } else
                echo 'Datanya tidak ada';
            ?>
    
</body>

</html>