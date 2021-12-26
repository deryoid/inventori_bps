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
                                <li class="breadcrumb-item active">Data Surat Jalan</li>
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
                                <h4 class="card-title"><b>Data Surat Jalan</b></h4>
                                <br>
                                <a href="tambah.php" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" title="Tambah Data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
                                <a href="print.php" class="btn btn-default waves-effect m-b-5" data-toggle="modal" data-target="#print_proyek" title="Print Data"><i class="mdi mdi-home-modern" aria-hidden="true"></i> Data Proyek</a>
                                <div class="table-responsive m-t-40">
                                    <table id="suratjalan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.Surat</th>
                                                <th>Tanggal Jalan</th>
                                                <th>Nama Sopir</th>
                                                <th>No Polisi</th>
                                                <th>Alamat Tujuan</th>
                                                <th>No.Tansaksi Keluar</th>
                                                <th>Nama Material</th>
                                                <th>Jumlah</th>
                                                <th>Jenis Material</th>
                                                <th>Kode Proyek</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query ($con, "SELECT * FROM tb_surat_jalan");
                                            while ($row=$query->fetch_array()){        
                                            ?>  
                                            <tr>
                                                <td><?= $row['no_surat']; ?></td>
                                                <td><?= date('d-m-Y',strtotime($row['tgl_jalan']))?></td>
                                                <td><?= $row['nama_sopir']; ?></td>
                                                <td><?= $row['no_pol']; ?></td>
                                                <td><?= $row['alamat_tujuan']; ?></td>
                                                <td><?= $row['no_transaksi_ke']; ?></td>
                                                <td><?= $row['nama_material']; ?></td>
                                                <td><?= $row['jumlah']; ?></td>
                                                <td><?= $row['jenis_material']; ?></td>
                                                <td><?= $row['kode_proyek']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class=" mdi mdi-menu"></i>
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 5px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item" href="print.php?sj=<?php echo $row[0]; ?>"><i class="fa fa-print"></i> Surat Jalan</a>
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
                                <form action="printprk.php" method="POST" target="blank">
                                    <div id="print_proyek" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Cari Data Material yang diantar Per Proyek</h4>
                                                </div>
                                                <div class="modal-body">
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
                                                <div class="modal-footer">
                                                    <button type="submit" name="cetak" class="btn btn-primary waves-effect waves-light">Cetak</button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Keluar</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </form>


<?php include_once '../../footer.php';?>