<?php
include "fpdf.php";
include "../inc/koneksi.php";

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];

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
$pdf->Cell(50,5,'Data - Data Donasi','0','1','C',false);
$pdf->Ln(3);

$pdf->setfont('Arial','B',7);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(20,6,'Id Donasi',1,0,'C');
$pdf->Cell(20,6,'Id Galang',1,0,'C');
$pdf->Cell(20,6,'Id User',1,0,'C');
$pdf->Cell(50,6,'Jumlah',1,0,'C');
$pdf->Cell(30,6,'Tanggal',1,0,'C');
$pdf->Cell(40,6,'Metode Pembayaran',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysql_query("select * from tb_donasi where tanggal between '$tgl_awal' and '$tgl_akhir'");
while ($data = mysql_fetch_array($sql)){
	$no++;
	$pdf->Ln(4);
	$pdf->setfont('Arial','',7);
	$pdf->Cell(10,4,$no.".",1,0,'C');
	$pdf->Cell(20,4,$data['id_galang'],1,0,'C');
	$pdf->Cell(20,4,$data['id_donasi'],1,0,'C');
	$pdf->Cell(20,4,$data['id_user'],1,0,'C');
	$pdf->Cell(50,4,$data['jumlah'],1,0,'C');
	$pdf->Cell(30,4,$data['tanggal'],1,0,'C');
	$pdf->Cell(40,4,$data['bank'],1,0,'C');
}
$pdf->Output();
?>