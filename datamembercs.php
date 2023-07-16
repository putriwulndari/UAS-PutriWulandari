<html>

<body>
    <div class="col-lg-12">
        <h1>Laporan<small> Anggota</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-table"></i> Laporan List Anggota</li>
        </ol>
    </div>

    <div class="col-12 mt-3">
    <h4 class="text-center mb-3">Laporan List Anggota </h4>
        <table class="table table-striped   table-hover  ">
            <thead class="">
                <tr class="info">
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No HP</th>
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
                  <td><?php echo $data['username'] ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['nik'] ?></td>
                  <td><?php echo $data['tgl_lahir'] ?></td>
                  <td><?php echo $data['jenis_kelamin'] ?></td>
                  <td><?php echo $data['pekerjaan'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['no_hp'] ?></td>
                  
              </tr>
          
         
      <?php
      $no++;}
      ?> 
          </tr>
          </tbody>
          </table>
        