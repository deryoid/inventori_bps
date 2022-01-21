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
                                <li class="breadcrumb-item active">Data Barang Keluar</li>
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
                                <h4 class="card-title"><b>Data Barang Keluar</b></h4>
                                <br>
                                <a href="tambah.php" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" title="Tambah Data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
                                <a href="print.php" target="blank" class="btn btn-inverse" title="Print Data"><i class="fa fa-print" aria-hidden="true"></i> Print Data</a>
                                <div class="table-responsive m-t-40">
                                    <table id="materialkeluar" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.Transaksi</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Jenis Barang</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Kode Barang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query ($con, "SELECT * FROM tb_barang_keluar AS tbk
                                            LEFT JOIN tb_stok AS s ON tbk.kode_barang = s.kode_barang 
                                            ");
                                            while ($row=$query->fetch_array()){        
                                            ?>  
                                            <tr>
                                                <td><?php echo $row['no_transaksi_ke']; ?></td>
                                                <td><?php echo $row['tgl_keluar']; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['jumlah']; ?></td>
                                                <td><?php echo $row['jenis_barang']; ?></td>
                                                <td><?php echo $row['penanggung_jawab']; ?></td>
                                                <td><?php echo $row['kode_barang']; ?></td>
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
                                    <form action="printtgl.php" method="POST" target="blank">
                                    <div id="print_tgl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Cari Data Material berdasarkan tanggal</h4>
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