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
        <font size="5" align="center">KABUPATEN BARITO KUALA</font><br>
        <font size="2" align="center">Jalan Jenderal Sudirman Nomor 72, Marabahan 70513 Telepon (0511) 4799057, Faksimile (0511) 4799057, <br>
    email: bps6304@bps.go.id, website: baritokualakab.bps.go.id </font><br>
        <br>
        <hr size="2px" color="black">
        </b></p>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Stok</th>
                                                <th>Tanggal Masuk</th>                                            
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query ($con, "SELECT kode_barang, nama_barang, jenis_barang, stok, DATE_FORMAT(tgl_masuk, '%d-%m-%Y')as tgl_masuk  FROM tb_stok");
                                            while ($row=$query->fetch_array()){        
                                            ?>  
                                            <tr>
                                                <td><?php echo $row['kode_barang']; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['jenis_barang']; ?></td>
                                                <td><?php echo $row['stok']; ?></td>
                                                <td><?php echo $row['tgl_masuk']; ?></td>
                                                <!-- <td>
                                                    <button type="button" class="btn btn-secondary" aria-haspopup="true" aria-expanded="true">
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 5px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    </div>
                                                    <a onclick="return confirm ('Anda yakin ingin menghapus data?');" class="dropdown-item" href="hapus.php?d=<?php echo $row[0]; ?>"><i class="fa fa-trash"></i> Hapus</a>
                                                    </button>
                                                </td> -->
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