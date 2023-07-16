<?php 
include("config.php");
?>

<html>

<body>
    <div class="col-lg-12">
        <h1>Report Data<small> Users</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Users</li>
        </ol>
    </div>

    <a class="btn btn-success mb-2" href="indexadmin.php?page=inputanggota">Input User</a>

    <div class="col-12 mt-3">
        <?php
            $result = mysqli_query($conn, 'SELECT * FROM users ');
           
            if ($result->num_rows) {
                ?>
        <table class="table table-striped   table-hover  ">
            <thead class="">
                <tr class="info">
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Hak Akses</th>
                    <th>Status</th>
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
                        <?= $item->password; ?>
                    </td>
                    <td>
                        <?= $item->akses; ?>
                    </td>

                    <td>
                        <?= $item->status; ?>
                    </td>

                    <td>
                    <a class="btn btn-warning"
                            href="indexadmin.php?page=updateuser&username=<?= $item->username?>">Edit</a>
                    </td>



                </tr>
                <?php
                        $i++;
                        $a = $i-1;
                }
               
                ?>
            </tbody>

        </table>
        <a>Jumlah Users : <?php echo $a ?> </a>
        <?php
                
            } else
                echo 'Datanya tidak ada';
            ?>
    </div>
    </div>

    </div>
    </form>
    </div>
</body>

</html>