<?php 
include_once '../../header.php';
if(isset($_POST['simpan'])){ 
        $no = $_POST['no_transaksi_ke'];
        $tgl = $_POST['tgl_keluar'];
        $jml = $_POST['jumlah'];
        $pj = $_POST['penanggung_jawab'];
        $kode_brg = $_POST['kode_barang'];

        $tambah = $con->query("INSERT INTO tb_barang_keluar (no_transaksi_ke, tgl_keluar, jumlah, penanggung_jawab, kode_barang ) VALUES ('$no', '$tgl', '$jml', '$pj','$kode_brg')"); 

        if ($tambah) {     
        echo "<script>alert('Data berhasil disimpan')</script>";     
        echo "<meta http-equiv='refresh' content='0; url=data.php'>";   
        } else {     
        echo "Data anda gagal disimpan. Ulangi sekali lagi";     
        echo "<meta http-equiv='refresh' content='0; url=tambah.php'>";   
        }
}

?>
<!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
    <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active">Tambah Data Barang Keluar</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Tambah Data Barang Keluar</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Transaksi</b></label>
                                        <input name="no_transaksi_ke" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Keluar</b></label>
                                        <input name="tgl_keluar" type="date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Barang</b></label>
                                        <?php 
                                            $query = mysqli_query ($con, "SELECT * FROM tb_stok");
                                         ?>
                                        <select name="kode_barang" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <?php 
                                                while ($row=$query->fetch_array()){
                                             ?>
                                            <option value="<?php echo $row['kode_barang']; ?>"><?php echo $row['kode_barang']; ?> / <?php echo $row['nama_barang']; ?> /<?php echo $row['jenis_barang']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jumlah</b></label>
                                        <input name="jumlah" type="text" class="form-control" required> 
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Penanggung Jawab</b></label>
                                        <input name="penanggung_jawab" type="text" class="form-control" required>
                                    </div>
                                </div>

                         

                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-inverse" name="simpan"> <i class="fa fa-check"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger" name="reset">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
<?php include_once '../../footer.php';?>