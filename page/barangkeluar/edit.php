<?php 
include_once '../../header.php';
$id = $_GET['e'];
    if(isset($_POST['edit'])){ 
        $no = $_POST['no_transaksi_ke'];
        $tgl = $_POST['tgl_keluar'];
        $jml = $_POST['jumlah'];
        $pj = $_POST['penanggung_jawab'];
        $kode_brg = $_POST['kode_barang'];

        $edit = $con->query("UPDATE tb_barang_keluar SET no_transaksi_ke = '$no', tgl_keluar = '$tgl',  jumlah = '$jml',  penanggung_jawab='$pj', kode_barang ='$kode_brg' WHERE id_barangk = '$id'"); 

        if ($edit) {     
        echo "<script>alert('Data berhasil diubah')</script>";     
        echo "<meta http-equiv='refresh' content='0; url=data.php'>";   
        } else {     
        echo "Data anda gagal diubah. Ulangi sekali lagi";     
        echo "<meta http-equiv='refresh' content='0; url=edit.php'>";   
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
                    <li class="breadcrumb-item active">Edit Data Barang Masuk</li>
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
                    <h4 class="m-b-0 text-white">Edit Data Barang Masuk</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <?php 
                        
                        $query = $con->query(" SELECT * FROM tb_barang_keluar WHERE id_barangk ='$id'");
                        while($row=$query->fetch_array()){
                    ?>
                        <div class="form-body">
                            <div class="row p-t-20">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Transaksi</b></label>
                                        <input name="no_transaksi_ke" type="text" class="form-control" required value="<?php echo $row['no_transaksi_ke']; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Keluar</b></label>
                                        <input name="tgl_keluar" type="date" class="form-control" required value="<?php echo $row['tgl_keluar']; ?>">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Barang</b></label>
                                        <?php 
                                            $query1 = mysqli_query ($con, "SELECT * FROM tb_barang_keluar AS tbk
                                            LEFT JOIN tb_stok AS s ON tbk.kode_barang = s.kode_barang ");
                                         ?>
                                        <select name="kode_barang" class="form-control" required>
                                            <?php 
                                                while ($row1=$query1->fetch_array()){
                                             ?>
                                            <option selected="<?php echo $row['kode_barang']; ?>"  value="<?php echo $row1['kode_barang']; ?>"><?php echo $row1['kode_barang']; ?> / <?php echo $row1['nama_barang']; ?> /<?php echo $row1['jenis_barang']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jumlah</b></label>
                                        <input name="jumlah" type="text" class="form-control" required value="<?php echo $row['jumlah']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Penanggung Jawab</b></label>
                                        <input name="penanggung_jawab" type="text" class="form-control" required value="<?php echo $row['penanggung_jawab']; ?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-inverse" name="edit"> <i class="fa fa-check"></i> Edit</button>
                            <button type="reset" class="btn btn-danger" name="reset">Batal</button>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        </div>

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
<?php include_once '../../footer.php';?>