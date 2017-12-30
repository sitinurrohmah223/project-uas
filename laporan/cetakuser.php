<?php
include "fpdf.php";
include "../inc/koneksi.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->setfont('Arial', 'B', 16);
$pdf->Cell(0,5,'Kita Mampu','0','1','C',false);
$pdf->setfont('Arial','i',8);
$pdf->Cell(0,2,'copyright 2017','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->setfont('Arial','B',8);
$pdf->Cell(50,5,'Data - Data User','0','1','C',false);
$pdf->Ln(3);

$pdf->setfont('Arial','B',7);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(10,6,'Id User',1,0,'C');
$pdf->Cell(20,6,'Username',1,0,'C');
$pdf->Cell(35,6,'Nama Lengkap',1,0,'C');
$pdf->Cell(20,6,'Jenis Kelamin',1,0,'C');
$pdf->Cell(20,6,'No Telepon',1,0,'C');
$pdf->Cell(40,6,'Email',1,0,'C');
$pdf->Cell(40,6,'Alamat',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysql_query("select * from tb_user");
while ($data = mysql_fetch_array($sql)){
	$no++;
	$pdf->Ln(4);
	$pdf->setfont('Arial','',7);
	$pdf->Cell(8,4,$no.".",1,0,'C');
	$pdf->Cell(10,4,$data['id_user'],1,0,'C');
	$pdf->Cell(20,4,$data['username'],1,0,'C');
	$pdf->Cell(35,4,$data['nama_lengkap'],1,0,'C');
	$pdf->Cell(20,4,$data['jenis_kelamin'],1,0,'C');
	$pdf->Cell(20,4,$data['no_telepon'],1,0,'C');
	$pdf->Cell(40,4,$data['email'],1,0,'C');
	$pdf->Cell(40,4,$data['alamat'],1,0,'C');
}
$pdf->Output();
?>