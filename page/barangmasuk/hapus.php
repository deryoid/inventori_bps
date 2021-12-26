<?php
	include '../../_config/config.php';

	$no = $_GET['d'];

	$query = $con->query(" DELETE FROM tb_barang_masuk WHERE id_barang = '$no' ");
	if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=data.php'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";     
        echo "<meta http-equiv='refresh' content='0; url=data.php'>";   
	}
?>