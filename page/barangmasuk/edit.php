<?php 
include_once '../../header.php';
    
    $id = $_GET['e']; 
    if(isset($_POST['edit'])){ 
        $no = $_POST['no_transaksi'];
        $tgl = $_POST['tgl_masuk'];
        $nama_mat = $_POST['nama_barang'];
        $jml = $_POST['jumlah'];
        $jns_mat = $_POST['jenis_barang'];
        $kode = $_POST['kode_suplier'];
        $kode_brg = $_POST['kode_barang'];

        $edit = $con->query("UPDATE tb_barang_masuk SET no_transaksi = '$no', tgl_masuk = '$tgl', nama_barang = '$nama_mat', jumlah = '$jml', jenis_barang='$jns_mat', kode_suplier='$kode', kode_barang='$kode_brg' WHERE id_barang = '$id'"); 

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
                        $query = $con->query(" SELECT * FROM tb_barang_masuk WHERE id_barang ='$id'");
                        while($row=$query->fetch_array()){
                    ?>
                        <div class="form-body">
                            <div class="row p-t-20">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Transaksi</b></label>
                                        <input name="no_transaksi" type="text" class="form-control" required value="<?php echo $row['no_transaksi']; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Masuk</b></label>
                                        <input name="tgl_masuk" type="date" class="form-control" required value="<?php echo $row['tgl_masuk']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama Barang</b></label>
                                        <input name="nama_barang" type="text" class="form-control" required value="<?php echo $row['nama_barang']; ?>">
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
                                        <label class="control-label"><b>Jenis Barang</b></label>
                                        <select class="form-control" name="jenis_barang">
                                            <option value="--Pilih--"<?php if($row['jenis_barang'] == '--Pilih--'){ echo "selected";} ?>>--Pilih--</option>
                                            <option value="Baru"<?php if($row['jenis_barang'] == 'Baru'){ echo "selected";} ?>>Baru</option>
                                            <option value="Habis Pakai"<?php if($row['jenis_barang'] == 'Habis Pakai'){ echo "selected";} ?>>Habis Pakai</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Suplier</b></label>
                                        <?php 
                                            $query1 = mysqli_query ($con, "SELECT * FROM tb_suplier");
                                         ?>
                                        <select name="kode_suplier" class="form-control" required>
                                            <?php 
                                                while ($row1=$query1->fetch_array()){
                                             ?>
                                            <option selected="<?php echo $row['kode_suplier']; ?>"  value="<?php echo $row1['kode_suplier']; ?>"><?php echo $row1['kode_suplier']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Barang</b></label>
                                        <input name="kode_barang" type="text" class="form-control" required value="<?php echo $row['kode_barang']; ?>">
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