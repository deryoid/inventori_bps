<?php  
include_once '../../header.php';         
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
                                <li class="breadcrumb-item active">Data Suplier</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><b>Data Suplier</b></h4>
                                <br>
                                <a href="tambah.php" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" title="Tambah Data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
                                <a href="print.php" target="blank" class="btn btn-inverse" title="Print Data"><i class="fa fa-print" aria-hidden="true"></i> Print Data</a>
                                <div class="table-responsive m-t-40">
                                    <table id="suplier" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Kode Suplier</th>
                                                <th>Nama Toko</th>
                                                <th>Nama Suplier</th>
                                                <th>Telpon</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query ($con, "SELECT * FROM tb_suplier");
                                            while ($row=$query->fetch_array()){        
                                            ?>  
                                            <tr>
                                                <td><?php echo $row['kode_suplier']; ?></td>
                                                <td><?php echo $row['nama_toko']; ?></td>
                                                <td><?php echo $row['nama_suplier']; ?></td>
                                                <td><?php echo $row['telp']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class=" mdi mdi-menu"></i>
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 5px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" target="blank" href="printdetail.php?e=<?php echo $row[0]; ?>"><i class="fa fa-print"></i> Print</a>   
                                                    <a class="dropdown-item" href="edit.php?e=<?php echo $row[0]; ?>"><i class="fa fa-edit"></i> Edit</a>
                                                        <a onclick="return confirm ('Anda yakin ingin menghapus data?');" class="dropdown-item" href="hapus.php?d=<?php echo $row[0]; ?>"><i class="fa fa-trash"></i> Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php               
                                            }             
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- Row -->
                    <!-- Row -->
          
                    <!-- Row -->

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
<?php include_once '../../footer.php';?>