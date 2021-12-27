<?php
require "../../_config/config.php";

$no = 1;
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

?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA </title>
</head>

<body>
<img src="<?=base_url()?>/assets/images/bps.png" align="left" width="90" height="90">
    <p align="center"><b>
        <font size="5" align="center">BADAN PUSAT STATISTIK</font> <br>
        <font size="5" align="center">KABUPATEN BARITO KUALA</font><br><br><br>
        <hr size="2px" color="black">
        </b></p>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Inventaris</th>
                                                <th>Tanggal</th>
                                                <th>Sumber Dana</th>
                                                <th>Letak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no =1;
                                            $query = mysqli_query ($con, "SELECT * FROM tb_inventaris");
                                            while ($row=$query->fetch_array()){        
                                            ?>  
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['nama_inven']; ?></td>
                                                <td><?php echo $row['tanggal_perolehan']; ?></td>
                                                <td><?php echo $row['sumber_dana']; ?></td>
                                                <td><?php echo $row['letak']; ?></td>
                                            </tr>
                                            <?php               
                                            }             
                                            ?>
                                        </tbody>
                </table>

            </div>
        </div>
    </div>
    <br>
    <br>
  <div id="123" class="pull-right" style="float: right;">
    <h5>
      Mengetahui,<br>
      <br>
      <br>
      <br>
      Eddy Erwan Nopianoor S.Si, M.P.

    </h5>

    </div>
    <table>
        <thead>
            <tr>
                <td style="height: 600px;"></td>
            </tr>
        </thead>
    </table>
    <footer class="footer" align="center">Jalan Jenderal Sudirman Nomor 72, Marabahan 70513 Telepon (0511) 4799057, Faksimile (0511) 4799057, <br>
    email: bps6304@bps.go.id, website: baritokualakab.bps.go.id 
    </footer>
   

</body>


</html>

<script>
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
</script>