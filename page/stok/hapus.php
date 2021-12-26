<?php
	include '../../_config/config.php';

	$kode = $_GET['d'];

	$query = $con->query(" DELETE FROM tb_stok WHERE kode_barang = '$kode' ");
	if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=data.php'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";     
        echo "<meta http-equiv='refresh' content='0; url=data.php'>";   
	}
?>