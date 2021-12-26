<?php 
include_once '../../header.php';
if(isset($_POST['simpan'])){ 
        $nama_inven = $_POST['nama_inven'];
        $tanggal_perolehan = $_POST['tanggal_perolehan'];
        $sumber_dana = $_POST['sumber_dana'];
        $letak = $_POST['letak'];

        $tambah = $con->query("INSERT INTO tb_inventaris (nama_inven, tanggal_perolehan, sumber_dana, letak) VALUES ('$nama_inven', '$tanggal_perolehan', '$sumber_dana', '$letak')"); 

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
                    <li class="breadcrumb-item active">Tambah Data Inventaris</li>
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
                    <h4 class="m-b-0 text-white">Tambah Data Inventaris</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row p-t-20">
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama Inventaris</b></label>
                                        <input name="nama_inven" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Perolehan</b></label>
                                        <input name="tanggal_perolehan" type="date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Sumber Dana</b></label>
                                        <input name="sumber_dana" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label"><b>Letak</b></label>
                                        <textarea class="form-control" name="letak" rows="3" required></textarea> 
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