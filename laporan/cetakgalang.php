<?php
include "fpdf.php";
include "../inc/koneksi.php";

//
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
$pdf->Cell(50,5,'Data - Data Galang Dana','0','1','C',false);
$pdf->Ln(3);

$pdf->setfont('Arial','B',7);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(12,6,'Id Galang',1,0,'C');
$pdf->Cell(40,6,'Judul',1,0,'C');
$pdf->Cell(20,6,'Kategori',1,0,'C');
$pdf->Cell(40,6,'Lokasi',1,0,'C');
$pdf->Cell(30,6,'Target',1,0,'C');
$pdf->Cell(20,6,'Deadline',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysql_query("select * from tb_galang where deadline between '$tgl_awal' and '$tgl_akhir'");
while ($data = mysql_fetch_array($sql)){
	$no++;
	$pdf->Ln(4);
	$pdf->setfont('Arial','',7);
	$pdf->Cell(8,4,$no.".",1,0,'C');
	$pdf->Cell(12,4,$data['id_galang'],1,0,'C');
	$pdf->Cell(40,4,$data['judul'],1,0,'C');
	$pdf->Cell(20,4,$data['kategori'],1,0,'C');
	$pdf->Cell(40,4,$data['lokasi'],1,0,'C');
	$pdf->Cell(30,4,$data['target'],1,0,'C');
	$pdf->Cell(20,4,$data['deadline'],1,0,'C');
}
$pdf->Output();
?>