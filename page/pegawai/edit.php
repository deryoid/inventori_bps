<?php 
include_once '../../header.php';
    
    if(isset($_POST['edit'])){ 
        $kode = $_POST['id_pegawai'];
        $nama = $_POST['nama_pegawai'];
        $nip = $_POST['nip'];
        $tmp_lhr = $_POST['tmp_lhr'];
        $tgl_lhr = $_POST['tgl_lhr'];
        $almt = $_POST['alamat'];
        $telp = $_POST['telp'];

        $edit = $con->query("UPDATE tb_pegawai SET id_pegawai = '$kode', nama_pegawai = '$nama', nip = '$nip', tmp_lhr = '$tmp_lhr', tgl_lhr = '$tgl_lhr', telp = '$telp', alamat = '$almt' WHERE id_pegawai = '$kode'"); 

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
                    <li class="breadcrumb-item active">Edit Data Pegawai</li>
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
                    <h4 class="m-b-0 text-white">Edit Data Pegawai</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <?php 
                        $kode = $_GET['e']; 
                        $query = $con->query(" SELECT * FROM tb_pegawai WHERE id_pegawai = '$kode'");
                        while($row=$query->fetch_array()){
                    ?>
                        <div class="form-body">
                            <div class="row p-t-20">

                                <input name="id_pegawai" type="hidden" class="form-control" required value="<?php echo $row['id_pegawai']; ?>">
                                <!--/span-->
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama Pegawai</b></label>
                                        <input name="nama_pegawai" type="text" class="form-control" required value="<?php echo $row['nama_pegawai']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>NIP</b></label>
                                        <input name="nip" type="text" class="form-control" required value="<?php echo $row['nip']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tempat Lahir</b></label>
                                        <input name="tmp_lhr" type="text" class="form-control" required value="<?php echo $row['tmp_lhr']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Lahir</b></label>
                                        <input name="tgl_lhr" type="date" class="form-control" required value="<?php echo $row['tgl_lhr']; ?>"> 
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Telp</b></label>
                                        <input name="telp" type="text" class="form-control" required value="<?php echo $row['telp']; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label"><b>Alamat</b></label>
                                        <textarea class="form-control" name="alamat" rows="3"><?php echo $row['alamat']; ?></textarea> 
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