<html>

<body>
    <div class="col-lg-12">
        <h1>Laporan<small> Simpan</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Laporan Simpanan Member</li>
        </ol>
    </div>

    <div class="col-12 mt-3">
    <h4 class="text-center mb-3">Laporan Transaksi Simpan </h4>
        <table class="table table-striped   table-hover  ">
            <thead class="">
                <tr class="info">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pokok</th>
                    <th>Wajib</th>
                    <th>Sukarela</th>
                    <th>Total Simpanan</th>
                </tr>
            </thead>
            <?php
      include("config.php");
      $no=1;
      $kueri = mysqli_query($conn, "SELECT * FROM anggota");
      while($data=mysqli_fetch_array($kueri)){
        $username = $data['username'];
     
      ?>
          <tbody>
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <?php  $pokok=mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_simpan) as pokok from simpanan WHERE username = '$username' and jenis_simpan='pokok' "))  ?>
                  <td> Rp. <?php echo number_format($pokok['pokok']);?> </td>
                  <?php  $wajib=mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_simpan) as wajib from simpanan WHERE username = '$username' and jenis_simpan='wajib' ")) ?>
                  <td> Rp. <?php  echo number_format($wajib['wajib']); ?></td>
                  <?php  $sukarela=mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(jlh_simpan) as sukarela from simpanan WHERE username = '$username' and jenis_simpan='sukarela' ")) ?>
                  <td>Rp. <?php echo number_format($sukarela['sukarela']) ?></td>
                  <?php $tot = $pokok['pokok'] + $wajib['wajib'] + $sukarela['sukarela'] ?>
                  <td>Rp. <?php echo number_format($tot) ?></td>
          
         
      <?php
      $no++;}
      ?> 
          </tr>
          </tbody>
          </table>
        