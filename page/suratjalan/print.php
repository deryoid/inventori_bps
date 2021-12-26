<?php
    include ('../../_config/config.php');  

    ob_start();


    //memanggil fpdf
    require_once ("../../assets/fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage('P','LEGAL','C');
    $tgl = "Banjarmasin" .date(", d F Y");
    $garis = "_______________";
    $garis2 = "__________________________________________________________________________________";
    $lapor = "SURAT JALAN";


    $pdf->Image('../../assets/images/bsb.jpg', 40, 4, 20,26);
    $pdf->Image('../../assets/images/bsbcop.jpg', 60, 4, 100,30);
    $pdf->SetFont('times','B','8'); //Font Arial, Tebal/Bold, ukuran font 16

    $pdf->SetFont('times','','12');
    $pdf->Cell(1,23, " ", '0', 1, 'L');
    $pdf->SetFont('times','B','14');
    $pdf->Cell(0,1, $garis2, '0', 1, 'C');
    $pdf->Cell(0,1, $garis2, '0', 1, 'C');
    $pdf->Cell(0,12, $lapor, '0', 1, 'C');
    $pdf->Cell(0,-12, $garis, '0', 1, 'C');
    $pdf->Cell(0,20, "", '0', 1, 'C'); 



    //mengambil data dari tabel
    $id = $_GET['sj']; 
    $sql  = $con->query("SELECT * FROM tb_surat_jalan WHERE no_surat='$id'");
    while($row=$sql->fetch_array()){

        $pdf->SetFont('times','','12');

        $pdf->cell(50,6,"Nomor Surat", '0', 0,0);
        $pdf->cell(8,6,":",'0', 0,0);
        $pdf->MultiCell(65,6, $row['no_surat'],0, 100);        

        $pdf->cell(51,6,"Tanggal Jalan", '0', 0,0);
        $pdf->cell(7,6,":",'0', 0,0);
        $pdf->MultiCell(65,6, $row['tgl_jalan'],0, 100); 

        $pdf->cell(49,6,"Nama Sopir.", '0', 0,0);
        $pdf->cell(9,6,":", '0', 0,0);
        $pdf->MultiCell(59,6, $row['nama_sopir'],0, 100);

        $pdf->cell(44.5,6,"No. Polisi", '0', 0,0);
        $pdf->cell(13.4,6,":", '0', 0,0);
        $pdf->MultiCell(68.3,6, $row['no_pol'],0, 100);

        $pdf->cell(53,6,"Alamat Tujuan", '0', 0,0);
        $pdf->cell(5,6,":", '0', 0,0);
        $pdf->MultiCell(68.3,6, $row['alamat_tujuan'],0, 100);

        $pdf->cell(53,6,"Nama Material", '0', 0,0);
        $pdf->cell(5,6,":", '0', 0,0);
        $pdf->MultiCell(68.3,6, $row['nama_material'],0, 100);

        $pdf->cell(39.2,6,"Jumlah", '0', 0,0);
        $pdf->cell(19,6,":", '0', 0,0);
        $pdf->MultiCell(68.3,6, $row['jumlah'],0, 100);

        $pdf->cell(51,6,"Jenis Material", '0', 0,0);
        $pdf->cell(7,6,":", '0', 0,0);
        $pdf->MultiCell(68.3,6, $row['jenis_material'],0, 100);

        $pdf->cell(49,6,"Kode Proyek", '0', 0,0);
        $pdf->cell(9,6,":", '0', 0,0);
        $pdf->MultiCell(68.3,6, $row['kode_proyek'],0, 100);

        $pdf->Cell(0,7, "", '0', 1, 'C'); 


        $pdf->Cell(0,0, '', '', 1, '');
        $pdf->SetFont('times','','11');
        $pdf->Cell(185,5, $tgl, '0', 1, 'R');
        $pdf->Cell(170,5, 'Mengetahui,', '0', 1, 'R');
        $pdf->Cell(0,15, '', '0', 1, 'R');
        $pdf->Cell(167,5, 'Pimpinan','0', 1, 'R');
        $pdf->Cell(0,20, '', '', 1, 'R');



    }







$pdf->Output();                                                     
?>                   