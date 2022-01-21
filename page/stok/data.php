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
                                <li class="breadcrumb-item active">Stok</li>
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
                                <h4 class="card-title"><b>Stok</b></h4>
                                <br>
                                 <a href="print.php" target="blank" class="btn btn-inverse" title="Print Data"><i class="fa fa-print" aria-hidden="true"></i> Print Data</a>
                                 <!-- <a href="print.php" class="btn btn-default waves-effect m-b-5" data-toggle="modal" data-target="#print_tgl" title="Print Data"><i class="mdi mdi-timetable" aria-hidden="true"></i> Data Stok Material Pertanggal</a> -->
                                    <table id="stok" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Stok</th>
                                                <th>Tanggal Masuk</th>                                            
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query ($con, "SELECT kode_barang, nama_barang, jenis_barang, stok, DATE_FORMAT(tgl_masuk, '%d-%m-%Y')as tgl_masuk  FROM tb_stok");
                                            while ($row=$query->fetch_array()){        
                                            ?>  
                                            <tr>
                                                <td><?php echo $row['kode_barang']; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['jenis_barang']; ?></td>
                                                <td><?php echo $row['stok']; ?></td>
                                                <td><?php echo $row['tgl_masuk']; ?></td>
                                                <td>
                                                <a class="btn btn-default" target="blank" href="printdetail.php?e=<?php echo $row[0]; ?>"><i class="fa fa-print"></i> Print</a>
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
                    </div>

                    <!-- Row -->
                    <!-- Row -->
          
                    <!-- Row -->

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                                 <form action="printstoktgl.php" method="POST" target="blank">
                                    <div id="print_tgl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Cari Data Stok Material berdasarkan tanggal</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="col-md-5">
                                                         <div class="form-group">
                                                            <input type="date" name="tglmulai" class="form-control">
                                                              <br>s/d<br>
                                                              <input type="date" name="tglselesai" class="form-control">
                                                        </div>
                                                    </div>
 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="cetak" class="btn btn-primary waves-effect waves-light">Cetak</button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Keluar</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </form>

<?php include_once '../../footer.php';?>