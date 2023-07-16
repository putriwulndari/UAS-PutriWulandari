
<?php
$awal=$_POST['awal'];
$akhir=$_POST['akhir'];
include "config.php";

require('pdf/fpdf.php');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->MultiCell(19.5,0.5,'',0,'L'); 
$pdf->SetX(4);   
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->SetX(4); 
$pdf->MultiCell(19.5,0.5,'  " KOPERASI SIMPAN PINJAM "',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'   Evander & Faisal ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'  ',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.2,0.7,"Laporan Seluruh Simpanan Bulan ".$awal."/".$akhir."",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"\nDi cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(3, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Username', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Jenis Simpanan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Besar Simpanan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Anggota', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Tanggal Entri', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
	$query = mysqli_query($conn, "SELECT * from simpanan WHERE tgl_trx BETWEEN '$awal' and '$akhir'");
	$no=1;	
	while($data=mysqli_fetch_array($query)){
$kd_a=$data['username'];
    		$anggota=mysqli_fetch_array(mysqli_query($conn, "SELECT nama from anggota where username='$kd_a'"));
$pdf->Cell(3, 0.8, $no, 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['username'], 1, 0, 'C');
$pdf->Cell(5, 0.8, $data['jenis_simpan'], 1, 0, 'C');
$pdf->Cell(4, 0.8, number_format($data['jlh_simpan']), 1, 0, 'C');
$pdf->Cell(4, 0.8, $anggota['nama'], 1, 0, 'C');
$pdf->Cell(5, 0.8, $data['tgl_trx'], 1, 1, 'C');

$no++;}

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->MultiCell(19.5,0.5,'',0,'L'); 
$pdf->SetX(4);   
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->SetX(4); 
$pdf->MultiCell(19.5,0.5,'  " KOPERASI SIMPAN PINJAM "',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'   Evander & Faisal ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'  ',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.2,0.7,"Laporan Seluruh Pinjaman Bulan ".$awal."/".$akhir."",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"\nDi cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(3, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Username', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Kode Pinjaman', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Besar Pinjaman', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Anggota', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Tanggal Entri', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
	$query = mysqli_query($conn, "SELECT * from pinjaman WHERE tgl_trx BETWEEN '$awal' and '$akhir'");
	$no=1;	
	while($data=mysqli_fetch_array($query)){
$kd_a=$data['username'];
    		$anggota=mysqli_fetch_array(mysqli_query($conn, "SELECT nama from anggota where username='$kd_a'"));
$pdf->Cell(3, 0.8, $no, 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['username'], 1, 0, 'C');
$pdf->Cell(5, 0.8, $data['kode_pinjam'], 1, 0, 'C');
$pdf->Cell(4, 0.8, number_format($data['jlh_pinjam']), 1, 0, 'C');
$pdf->Cell(4, 0.8, $anggota['nama'], 1, 0, 'C');
$pdf->Cell(5, 0.8, $data['tgl_trx'], 1, 1, 'C');



$no++;}


$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->MultiCell(19.5,0.5,'',0,'L'); 
$pdf->SetX(4);   
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->SetX(4); 
$pdf->MultiCell(19.5,0.5,'  " KOPERASI SIMPAN PINJAM "',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'   Evander & Faisal ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'  ',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.2,0.7,"Laporan Seluruh Penarikan Bulan ".$awal."/".$akhir."",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"\nDi cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(3, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Username', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Besar Tarikan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Anggota', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Tanggal Entri', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
	$query = mysqli_query($conn, "SELECT * from pengambilan WHERE tgl_trx BETWEEN '$awal' and '$akhir'");
	$no=1;	
	while($data=mysqli_fetch_array($query)){
$kd_a=$data['username'];
    		$anggota=mysqli_fetch_array(mysqli_query($conn, "SELECT nama from anggota where username='$kd_a'"));
$pdf->Cell(3, 0.8, $no, 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['username'], 1, 0, 'C');
$pdf->Cell(4, 0.8, number_format($data['jlh_ambil']), 1, 0, 'C');
$pdf->Cell(4, 0.8, $anggota['nama'], 1, 0, 'C');
$pdf->Cell(5, 0.8, $data['tgl_trx'], 1, 1, 'C');
$no++;}


$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->MultiCell(19.5,0.5,'',0,'L'); 
$pdf->SetX(4);   
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->SetX(4); 
$pdf->MultiCell(19.5,0.5,'  " KOPERASI SIMPAN PINJAM "',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'   Evander & Faisal ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'  ',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.2,0.7,"Laporan Seluruh Anggota Bulan ".$awal."/".$akhir."",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"\nDi cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(3, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Anggota', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'NIK', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Pekerjaan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'No Hp', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Entri', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
	$query = mysqli_query($conn, "SELECT * from anggota WHERE waktu BETWEEN '$awal' and '$akhir'");
	$no=1;	
	while($data=mysqli_fetch_array($query)){
$kd_a=$data['username'];
    		$anggota=mysqli_fetch_array(mysqli_query($conn, "SELECT nama from anggota where username='$kd_a'"));
$pdf->Cell(3, 0.8, $no, 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['nama'], 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['nik'], 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['pekerjaan'], 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['alamat'], 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['no_hp'], 1, 0, 'C');
$pdf->Cell(4, 0.8, $data['waktu'], 1, 1, 'C');
$no++;}
$pdf->Output("Laporan perbulan.pdf","I");

?>



