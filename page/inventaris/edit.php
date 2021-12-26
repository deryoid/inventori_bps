<?php 
include_once '../../header.php';
   $id = $_GET['e'];   
    if(isset($_POST['edit'])){ 
        $nama_inven = $_POST['nama_inven'];
        $tanggal_perolehan = $_POST['tanggal_perolehan'];
        $sumber_dana = $_POST['sumber_dana'];
        $letak = $_POST['letak'];

        $edit = $con->query("UPDATE tb_inventaris SET nama_inven = '$nama_inven', tanggal_perolehan = '$tanggal_perolehan', sumber_dana = '$sumber_dana', letak = '$letak' WHERE id_inven = '$id'"); 

        // var_dump($edit);
        // die();

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
                    <li class="breadcrumb-item active">Edit Data Suplier</li>
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
                    <h4 class="m-b-0 text-white">Edit Data Inventaris</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <?php 
                        
                        $query = $con->query("SELECT * FROM tb_inventaris WHERE id_inven ='$id'");
                        while($row=$query->fetch_array()){
                    ?>
                        <div class="form-body">
                            <div class="row p-t-20">

                                
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><b>Nama Inventaris</b></label>
                                        <input name="nama_inven" type="text" class="form-control" required  value="<?php echo $row['nama_inven']; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Tanggal Perolehan</b></label>
                                        <input name="tanggal_perolehan" type="date" class="form-control" required  value="<?php echo $row['tanggal_perolehan']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><b>Sumber Dana</b></label>
                                        <input name="sumber_dana" type="text" class="form-control" required  value="<?php echo $row['sumber_dana']; ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="control-label"><b>Letak</b></label>
                                        <textarea class="form-control" name="letak" rows="3" required><?php echo $row['letak']; ?></textarea> 
                                    </div>
                                </div>
                                <!--/span-->

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