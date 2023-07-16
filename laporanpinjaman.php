<html>

<body>
    <div class="col-lg-12">
        <h1>Laporan<small> Pinjam</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Laporan Pinjaman Member</li>
        </ol>
    </div>

    <div class="col-12 mt-3">
    <h4 class="text-center mb-3">Laporan Transaksi Pinjaman </h4>
        <table class="table table-striped   table-hover  ">
        <span style="float:right;"> <button class="btn btn-primary"onclick="window.print()">Print </button> </span>
            <thead class="">
                <tr class="info">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Total Simpanan</th>
                </tr>
            </thead>
            <?php
      include("config.php");
      $no=1;
      $kueri = mysqli_query($conn, "SELECT * FROM anggota");
      $kueripin = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pinjaman"));
      while($data=mysqli_fetch_array($kueri)){
        $username = $data['username'];
     
      ?>
          <tbody>
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['username'] ?></td>
                  
                  <?php  $pokok=mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_pinjam) as jlh_pinjam from pinjaman WHERE username = '$username' "))  ?>
                  <?php $tot = $pokok['jlh_pinjam']  ?>
                  <td>Rp. <?php echo number_format($tot) ?></td>
          
         
      <?php
      $no++;}
      ?> 
          </tr>
          </tbody>
          </table>
        