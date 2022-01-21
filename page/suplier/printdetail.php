<?php
require "../../_config/config.php";

$kode = $_GET['e']; 
$query = $con->query("SELECT * FROM tb_suplier WHERE id_suplier = '$kode'");
$row  = $query->fetch_array();

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
    <title>Suplier</title>
</head>

<body>
<img src="<?=base_url()?>/assets/images/bps.png" align="left" width="90" height="90">
    <p align="center"><b>
        <font size="5" align="center">BADAN PUSAT STATISTIK</font> <br>
        <font size="5" align="center">KABUPATEN BARITO KUALA</font><br>
        <font size="2" align="center">Jalan Jenderal Sudirman Nomor 72, Marabahan 70513 Telepon (0511) 4799057, Faksimile (0511) 4799057, <br>
    email: bps6304@bps.go.id, website: baritokualakab.bps.go.id </font><br>
        <br>
        <hr size="2px" color="black">
        </b></p>
    <!-- Kop Here ! -->
    <h3>
        <center><br>
            Data Suplier<br>
        </center>
    </h3><br><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box" align="left">
                <div class="table-responsive text-center">
                    <table border="1" cellspacing="0" width="100%" style="text-align: left">
                        <thead>
                            <b>
                               

                                <tr>
                                    <p>
                                        <th width="30%">Kode Suplier </th>
                                        <th>
                                        <?= $row['kode_suplier'] ?>
                                        </th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Nama Toko</th>
                                        <th>
                                        <?= $row['nama_toko'] ?>
                                        </th>
                                    </p>
                                </tr>
                                <tr>

                                    <p>
                                        <th>Nama Suplier</th>
                                        <th>
                                        <?= $row['nama_suplier']; ?>
                                        </th>
                                    </p>
                                </tr>
                                <tr>

                                    <p>
                                        <th>Telp </th>
                                        <th>
                                        <?= $row['telp'] ?>
                                        </th>
                                    </p>
                                </tr>
                                <tr>

                                    <p>
                                        <th>Alamat </th>
                                        <th>
                                        <?= $row['alamat'] ?>
                                        </th>
                                    </p>
                                </tr>

                            </b>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>

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

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
    ?>


    </div>
    <table border="0" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="width: 30%;"></th>
                <th style="width: 30%;"></th>
                <th style="width: 80px">
                <div id="123" class="pull-right" style="float: center;">
                    <h5>
                    Banjarmasin,  <?php echo tgl_indo(date('Y-m-d')); ?><br>
                    Mengetahui,<br>
                    <br>
                    <br>
                    <br>
                    Eddy Erwan Nopianoor S.Si, M.P.

                    </h5>

                    </div>
                </th>
            </tr>
        </thead>
    </table>
 


</body>

</html>