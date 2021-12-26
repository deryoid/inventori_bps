<?php 
include_once '../../header.php';
if(isset($_POST['simpan'])){ 
        $no = $_POST['no_transaksi'];
        $tgl = $_POST['tgl_masuk'];
        $nama_mat = $_POST['nama_barang'];
        $jml = $_POST['jumlah'];
        $jns_mat = $_POST['jenis_barang'];
        $kode = $_POST['kode_suplier'];
        $kode_brg = $_POST['kode_barang'];

        $tambah = $con->query("INSERT INTO tb_barang_masuk (no_transaksi, tgl_masuk, nama_barang, jumlah, jenis_barang, kode_suplier, kode_barang ) VALUES ('$no', '$tgl', '$nama_mat', '$jml', '$jns_mat', '$kode','$kode_brg')"); 

        // var_dump($tambah);die();

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
                    <li class="breadcrumb-item active">Tambah Data barang Masuk</li>
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
                    <h4 class="m-b-0 text-white">Tambah Data Barang Masuk</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Transaksi</b></label>
                                        <input name="no_transaksi" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Masuk</b></label>
                                        <input name="tgl_masuk" type="date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama Barang</b></label>
                                        <input name="nama_barang" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jumlah</b></label>
                                        <input name="jumlah" type="text" class="form-control" required> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jenis barang</b></label>
                                        <select class="form-control" name="jenis_barang">
                                            <option>--Pilih--</option>
                                            <option>Baru</option>
                                            <option>Habis Pakai</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Suplier</b></label>
                                        <?php 
                                            $query = mysqli_query ($con, "SELECT * FROM tb_suplier");
                                         ?>
                                        <select name="kode_suplier" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <?php 
                                                while ($row=$query->fetch_array()){
                                             ?>
                                            <option value="<?php echo $row['kode_suplier']; ?>"><?php echo $row['kode_suplier']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Barang/barang</b></label>
                                        <input name="kode_barang" type="text" class="form-control" required>
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