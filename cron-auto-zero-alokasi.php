<?php

	include "modules/blob/blob.php";
	
	$koneksi = new koneksi();
	
	$simpan = $koneksi->runQuery("UPDATE `kuota_penjualan` SET `jml_alokasi` = '0' WHERE `tgl` < NOW();");
?>