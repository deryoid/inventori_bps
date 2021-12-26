<?php
error_reporting(0);

require_once("../../assets/fpdf17/fpdf.php");

class FPDF_AutoWrapTable extends FPDF {
      private $data = array();
      private $options = array(
          'filename' => '',
          'destinationfile' => '',
          'paper_size'=>'A4',
          'orientation'=>'L'
      );

    function __construct($data = array(), $options = array()) {
        parent::__construct();
        $this->data = $data;
        $this->options = $options;
    }

    public function rptDetailData () {
        $border = 0;
        $this->AddPage();
        $this->SetAutoPageBreak(true,60);
        $this->AliasNbPages();
        $left = 25;

        # untuk menuliskan nama bulan dengan format Indonesia
        $bln = array(
          '01' => 'Januari',
          '02' => 'Februari',
          '03' => 'Maret',
          '04' => 'April',
          '05' => 'Mei',
          '06' => 'Juni',
          '07' => 'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember'
        );

        include '../../_config/config.php';

        $sql = mysqli_query($con, "SELECT * FROM tb_proyek");
        

        $garis = "_________________________________________________________________________________________________";

        $this->Image('../../assets/images/bsb.jpg', 70, 10, 60,0);
        $this->Image('../../assets/images/bsbcop.jpg', 265, 2, 470,0);
        $this->SetFont('times','B','10'); //Font Arial, Tebal/Bold, ukuran font 16
        $this->Cell(1,50, '', '0', 1, 'L');
        $this->SetFont('times','B','20'); //Font Arial, Tebal/Bold, ukuran font 16
        $this->Cell(0,25, $garis, '0', 1, 'C');
        $this->SetFont('times','B','16');
        $this->Cell(1,15, '', '0', 1, 'L');

        $this->SetFont("", "B", 14);
        $this->SetX($left); $this->Cell(0, 20, 'LAPORAN DATA PROYEK', 0, 1,'C');
        $this->SetFont("", "", 9);
        $this->Ln(10);

        $h = 18;
        $left = 40;
        $top = 80;

        #tableheader
        $this->SetFillColor(0, 126, 192);  
        $this->SetTextColor(255); //warna tulisan putih
        $this->SetDrawColor(44, 25, 112); //warna border  
        $left = $this->GetX();

        $this->SetFont("", "B", 10);
        $this->Cell(40,$h,'No.',1,0,'C',true);
        $this->SetX($left += 40); $this->Cell(85, $h, 'Kode Proyek', 1, 0, 'C',true);
        $this->SetX($left += 85); $this->Cell(140, $h, 'Nama Proyek', 1, 0, 'C',true);
        $this->SetX($left += 140); $this->Cell(170, $h, 'Telpon', 1, 0, 'C',true);
        $this->SetX($left += 170); $this->Cell(220, $h, 'Alamat', 1, 0, 'C',true);
        $this->SetX($left += 220); $this->Cell(225, $h, 'Contact Person', 1, 0, 'C',true);
        $this->Ln(18);
        $this->SetFont('Arial','',10);
        $this->SetWidths(array(40,85,140,170,220,225));
        $this->SetAligns(array('C','C','C','C','C','C'));
        $no = 1; 
        $this->SetFillColor(255);
        $this->SetTextColor(0);


        #data dari database
        while($data = mysqli_fetch_array($sql))
        {
          $this->Row(
            array($no++,
            $data['kode_proyek'],
            $data['nama_proyek'],
            $data['telp'],
            $data['alamat'],
            $data['cp'],
          ));
        }

        #tabel footer
        $this->Ln(30);
        $this->SetFont("", "", 10);
        $this->SetX(600); $this->Cell(0, 15, 'Banjarmasin, '.date('d').' '.$bln[date('m')].' '.date('Y').'', 0, 1,'C');
        $this->Ln(50);
        $this->SetX(600); $this->Cell(0, 20, 'Pemimpin', 0, 1,'C');
    } 


    public function printPDF () {
        if ($this->options['paper_size'] == "A4") {
            $a = 8.3 * 72; //1 inch = 72 pt
            $b = 13.0 * 72;
            $this->FPDF($this->options['orientation'], "pt", array($a,$b));
        } else {
            $this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
        }

        $this->SetAutoPageBreak(false);
        $this->AliasNbPages();
        $this->SetFont("helvetica", "B", 10);
        //$this->AddPage();

        $this->rptDetailData();
        $this->Output($this->options['filename'],$this->options['destinationfile']);
      }

    private $widths;
    private $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=15*$nb;

        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();

            //Draw the border
            $this->Rect($x,$y,$w,$h);

            //Print the text
            $this->MultiCell($w,15,$data[$i],0,$a);

            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }

        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;

        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
} //end of class

//pilihan
$options = array(
    'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
    'destinationfile' => '', //I=inline browser (default), F=local file, D=download
    'paper_size'=>'A4',    //paper size: F4, A3, A4, A5, Letter, Legal
    'orientation'=>'L' //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
?>