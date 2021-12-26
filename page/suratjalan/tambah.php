<?php 
include_once '../../header.php';
if(isset($_POST['simpan'])){ 
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
        

        $tambah = $con->query("INSERT INTO tb_surat_jalan (no_surat, tgl_jalan, nama_sopir, no_pol, alamat_tujuan, no_transaksi_ke, nama_material, jumlah, jenis_material, kode_proyek ) VALUES ('$no', '$tgl', '$nama_sop', '$np', '$almt_tjn', '$no_tk', '$nama_mat', '$jml', '$jns_mat', '$kode_prk')"); 

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
                    <li class="breadcrumb-item active">Tambah Data Surat Jalan</li>
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
                    <h4 class="m-b-0 text-white">Tambah Data Surat Jalan</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <input name="id_instansi" type="hidden" class="form-control" required>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Surat</b></label>
                                        <input name="no_surat" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Jalan</b></label>
                                        <input name="tgl_jalan" type="date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama Sopir</b></label>
                                        <input name="nama_sopir" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Polisi</b></label>
                                        <input name="no_pol" type="text" class="form-control" required> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Alamat Tujuan</b></label>
                                         <textarea class="form-control" name="alamat_tujuan" rows="3" required></textarea> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>No.Transaksi Material Keluar</b></label>
                                        <?php 
                                            $query = mysqli_query ($con, "SELECT * FROM tb_material_keluar");
                                            $jsArray = "var dtnm = new Array();";
                                         ?>
                                        <select name="no_transaksi_ke" id="no_transaksi_ke" onchange="changeValue(this.value)" class="form-control" required>
                                            <option value=""> Silahkan Pilih </option>
                                            <?php 
                                                while ($row1=$query->fetch_array()){
                                             ?>
                                            <option value="<?php echo $row1['no_transaksi_ke']; ?>"><?php echo $row1['no_transaksi_ke']; ?></option>
                                            <?php 
                                                $jsArray .= "dtnm['" . $row1['no_transaksi_ke'] . "'] = {
                                                    nama_material:'" . addslashes($row1['nama_material']) . "', jumlah:'" . addslashes($row1['jumlah']) . "',jenis_material:'" . addslashes($row1['jenis_material']) . "'};";
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama</b></label>
                                        <input name="nama_material" id="nama_material" type="text" class="form-control" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jumlah</b></label>
                                        <input name="jumlah" id="jumlah" type="text" class="form-control" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label"><b>Jenis Material</b></label>
                                        <input name="jenis_material" id="jenis_material" type="text" class="form-control" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label"><b>Kode Proyek</b></label>
                                        <?php 
                                            $query = mysqli_query ($con, "SELECT * FROM tb_proyek");
                                         ?>
                                        <select name="kode_proyek" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <?php 
                                                while ($row=$query->fetch_array()){
                                             ?>
                                            <option value="<?php echo $row['kode_proyek']; ?>"><?php echo $row['kode_proyek']; ?></option>
                                            <?php } ?>
                                        </select>
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
<script type="text/javascript">
    <?php 
        echo $jsArray; 
    ?>
    function changeValue(no_transaksi_ke) {
        document.getElementById('nama_material').value = dtnm[no_transaksi_ke].nama_material;
        document.getElementById('jumlah').value = dtnm[no_transaksi_ke].jumlah;
        document.getElementById('jenis_material').value = dtnm[no_transaksi_ke].jenis_material;
    }
    //  <?php 
    //     echo $jsArray1; 
    // ?>
    // function changeValue(no_transaksi_ke) {
    //     document.getElementById('jumlah').value = dtnm[no_transaksi_ke].jumlah;
    // }
    //  <?php 
    //     echo $jsArray2; 
    // ?>
    // function changeValue(no_transaksi_ke) {
    //     document.getElementById('jenis_material').value = dtnm[no_transaksi_ke].jenis_material;
    // }
</script>

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
<?php include_once '../../footer.php';?>