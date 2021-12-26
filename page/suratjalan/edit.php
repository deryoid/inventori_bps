<?php 
include_once '../../header.php';
    
    if(isset($_POST['edit'])){ 
        $no = $_POST['no_surat'];
        $tgl = $_POST['tgl_jalan'];
        $nama_sop = $_POST['nama_sopir'];
        $np = $_POST['no_pol'];
        $almt_tjn = $_POST['alamat_tujuan'];
        $no_tk = $_POST['no_transaksi_ke'];
        $nama_mat = $_POST['nama_material'];
        $jml = $_POST['jumlah'];
        $jns_mat = $_POST['jenis_material'];
        $kode_prk = $_POST['kode_proyek'];

        $edit = $con->query("UPDATE tb_surat_jalan SET no_surat = '$no', tgl_jalan = '$tgl', nama_sopir = '$nama_sop', no_pol = '$np', alamat_tujuan='$almt_tjn', no_transaksi_ke='$no_tk', nama_material='$nama_mat', jumlah='$jml', jenis_material='$jns_mat', kode_proyek='$kode_prk' WHERE no_transaksi = '$no'"); 

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
                    <li class="breadcrumb-item active">Edit Data Surat Jalan</li>
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
                    <h4 class="m-b-0 text-white">Edit Data Surat Jalan</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <?php 
                        $no = $_GET['e']; 
                        $query = $con->query(" SELECT * FROM tb_surat_jalan WHERE no_surat ='$no'");
                        while($row=$query->fetch_array()){
                    ?>
                        <div class="form-body">
                            <div class="row p-t-20">
                                <input name="no_surat" type="hidden" class="form-control" required value="<?php echo $row['no_surat']; ?>">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Surat</b></label>
                                        <input name="no_surat" type="text" class="form-control" required value="<?php echo $row['no_surat']; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Jalan</b></label>
                                        <input name="tgl_jalan" type="date" class="form-control" required value="<?php echo $row['tgl_jalan']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama Sopir</b></label>
                                        <input name="nama_sopir" type="text" class="form-control" required value="<?php echo $row['nama_sopir']; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Polisi</b></label>
                                        <input name="no_pol" type="text" class="form-control" required value="<?php echo $row['no_pol']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Alamat Tujuan</b></label>
                                       <textarea class="form-control" name="alamat_tujuan" rows="3"><?php echo $row['alamat_tujuan']; ?></textarea> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Transaksi Material Keluar</b></label>
                                        <?php 
                                            $query  = mysqli_query ($con, "SELECT * FROM tb_material_keluar");
                                            $jsArray = "var dtnm = new Array();";
                                         ?>
                                        <select name="no_transaksi_ke" id="no_transaksi_ke" onchange="changeValue(this.value)" class="form-control" required>
                                            <option value=""> Silahkan Pilih </option>
                                            <?php 
                                                while ($row2=$query->fetch_array()){
                                             ?>
                                            <option selected="<?php echo $row['no_transaksi_ke']; ?>"  value="<?php echo $row2['no_transaksi_ke']; ?>"><?php echo $row2['no_transaksi_ke']; ?></option>
                                            <?php 
                                                $jsArray .= "dtnm['" . $row2['no_transaksi_ke'] . "'] = {
                                                    nama_material:'" . addslashes($row2['nama_material']) . "', jumlah:'" . addslashes($row2['jumlah']) . "',jenis_material:'" . addslashes($row2['jenis_material']) . "'};";
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama</b></label>
                                        <input name="nama_material" id="nama_material" type="text" class="form-control" required value="<?php echo $row2['nama_material']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jumlah</b></label>
                                        <input name="jumlah" id="jumlah" type="text" class="form-control" required value="<?php echo $row2['jumlah']; ?>">
                                    </div>
                                </div>


                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jenis Material</b></label>
                                        <input name="jenis_material" id="jenis_material" type="text" class="form-control" required value="<?php echo $row2['jenis_material']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Proyek</b></label>
                                        <?php 
                                            $query1 = mysqli_query ($con, "SELECT * FROM tb_proyek");
                                         ?>
                                        <select name="kode_proyek" class="form-control" required>
                                            <?php 
                                                while ($row1=$query1->fetch_array()){
                                             ?>
                                            <option selected="<?php echo $row['kode_proyek']; ?>"  value="<?php echo $row1['kode_proyek']; ?>"><?php echo $row1['kode_proyek']; ?></option>
                                            <?php } ?>
                                        </select>
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
        <script type="text/javascript">
    <?php 
        echo $jsArray; 
    ?>
    function changeValue(no_transaksi_ke) {
        document.getElementById('nama_material').value = dtnm[no_transaksi_ke].nama_material;
        document.getElementById('jumlah').value = dtnm[no_transaksi_ke].jumlah;
        document.getElementById('jenis_material').value = dtnm[no_transaksi_ke].jenis_material;
    }
</script>  
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
<?php include_once '../../footer.php';?>