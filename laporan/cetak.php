<?php
include "fpdf.php";
include "../inp/connect.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->setfont('Arial', 'B', 16);
$pdf->Cell(0,5,'Mama Alif Catering','0','1','C',false);
$pdf->setfont('Arial','i',8);
$pdf->Cell(0,5,'Pondok Ungu Permai Sektor V Blok M5/21, Babelan, Bekasi Utara','0','1','C',false);
$pdf->Cell(0,2,'copyright @novinoo 2017','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->setfont('Arial','B',12);
$pdf->Cell(50,5,'Pesanan Catering','0','1','C',false);
$pdf->Ln(3);

$pdf->setfont('Arial','B',7);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(15,6,'Kode Order',1,0,'C');
$pdf->Cell(25,6,'Nama',1,0,'C');
$pdf->Cell(15,6,'Kode Menu',1,0,'C');
$pdf->Cell(8,6,'Porsi',1,0,'C');
$pdf->Cell(14,6,'Tanggal',1,0,'C');
$pdf->Cell(30,6,'Alamat',1,0,'C');
$pdf->Cell(30,6,'Area',1,0,'C');
$pdf->Cell(12,6,'Bank',1,0,'C');
$pdf->Cell(12,6,'Kurir',1,0,'C');
$pdf->Cell(30,6,'Total',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysql_query("select a.*,b.harga*a.porsi as total from tb_pesan a join tb_menu b on a.id_menu=b.id_menu where status != 2");
while ($data = mysql_fetch_array($sql)){
	$no++;
	$pdf->Ln(4);
	$pdf->setfont('Arial','',7);
	$pdf->Cell(8,4,$no.".",1,0,'C');
	$pdf->Cell(15,4,$data['id_order'],1,0,'L');
	$pdf->Cell(25,4,$data['nama'],1,0,'L');
	$pdf->Cell(15,4,$data['id_menu'],1,0,'L');
	$pdf->Cell(8,4,$data['porsi'],1,0,'L');
	$pdf->Cell(14,4,$data['tanggal'],1,0,'L');
	$pdf->Cell(30,4,$data['alamat'],1,0,'L');
	$pdf->Cell(30,4,$data['area'],1,0,'L');
	$pdf->Cell(12,4,$data['bank'],1,0,'L');
	$pdf->Cell(12,4,$data['kurir'],1,0,'L');
	$pdf->Cell(30,4,$data['total'],1,0,'L');

}
$pdf->Output();
?>