<?php
include('koneksi.php');  


//mengambil data dari tabel
$sql  = $koneksi->query("select formulir.noregistrasi,formulir.nopol,formulir .nama,formulir.tanggal,formulir.jenis,formulir.status FROM formulir");
$data = array();
while ($row= mysqli_fetch_assoc($sql)) {
	array_push($data,$row);
}
 
//mengisi judul dan header tabel
$judul1 = "PEMERINTAH PROVINSI KALIMANTAN SELATAN";
$judul2 = "B A D A N K U A N G A N D A E R A H";
$judul3 = "UNIT PELAYANAN PENDAPATAN DAERAH KOTABARU";
$subjudul1 = "Alamat : JL.Raya Stagen KM. 5 Kotabaru Telp/Fax (0518)21091";
$subjudul = "DATA LAPORAN FORMULIR UPPD SAMSAT KOTABARU";
$tgl = "KOTABARU" .date(" ,d F Y");
$men = "Mengetahui,";
$ttd = "Kepala UPPD KOTABARU";
$name = "ISMAIL,S.Sos";
$nip = "NIP.19621231 1983301 1 025";
$header = array(
array("label"=>"noregistrasi", "length"=>45, "align"=>"C"),
array("label"=>"nopol", "length"=>45, "align"=>"C"),
array("label"=>"nama", "length"=>60, "align"=>"C"),
array("label"=>"tanggal", "length"=>60, "align"=>"C"),
array("label"=>"jenis", "length"=>55, "align"=>"C"),
array("label"=>"status", "length"=>50, "align"=>"C"),
);
 
//memanggil fpdf
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage('L','LEGAL','C');


 
//tampilan Judul Laporan
$pdf->SetFont('Arial','','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,6, $judul1, '0', 1, 'C');
$pdf->SetFont('Arial','','12');
$pdf->SetFont('Arial','','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,6, $judul2, '0', 1, 'C');
$pdf->SetFont('Arial','','12');
$pdf->SetFont('Arial','B','20','I'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,6, $judul3, '0', 1, 'C');
$pdf->SetFont('Arial','','12');
$pdf->SetFont('Arial','','10'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,6, $subjudul1, '0', 1, 'C');
$pdf->SetFont('Arial','','12');
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,25, $subjudul, '0', 1, 'C');
$pdf->Image('IMG/logo2.png', 20, 5, 33,33);
$pdf->SetFont('Arial','','12');
$pdf->SetLineWidth(0.5);
$pdf->Line(10, 40, 285, 40);



 
//Header Table
$pdf->SetFont('Arial','','12','C');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}


$pdf->SetFont('Arial','','12'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(300,20, $tgl, '0', 1, 'R');

$pdf->SetFont('Arial','','12'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(290,5, $men, '0', 1, 'R');

$pdf->SetFont('Arial','','12'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(315,6, $ttd, '0', 1, 'R');

$pdf->SetFont('Arial','B','14'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(300,30, $name, '0', 1, 'R');




  
//output file pdf
$pdf->Output();
?>