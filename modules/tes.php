<?php
	include "blob/blob.php";
	
	$data = new koneksi();
	
	$qCek = "SELECT id, id_kasir, tgl FROM kas_kecil ORDER BY id_kasir ASC";
	
	if ($resCek = $data->runQuery($qCek)) {
		while ($rsCek = $resCek->fetch_array()) {
			
			$prefix = ($rsCek['id_kasir'] == "1")?"KKE":"KKS";
			
			$query = "SELECT COUNT(`id`) FROM `kas_kecil` WHERE `tgl` = '".$rsCek['tgl']."' AND `id` LIKE '$prefix%';";
			if ($result = $data->runQuery($query)) {
				$rs = $result->fetch_array();
				
				switch (strlen($rs[0] + 1)) {
					case 1:
						$kode = $prefix.date("ymd", strtotime($rsCek['tgl']))."000".($rs[0] + 1);
						break;
					case 2:
						$kode = $prefix.date("ymd", strtotime($rsCek['tgl']))."00".($rs[0] + 1);
						break;
					case 3:
						$kode = $prefix.date("ymd", strtotime($rsCek['tgl']))."0".($rs[0] + 1);
						break;
					case 4:
						$kode = $prefix.date("ymd", strtotime($rsCek['tgl'])).($rs[0] + 1);
						break;
				}
			}
			
			$update = $data->runQuery("UPDATE kas_kecil SET id = '$kode' WHERE id = '".$rsCek['id']."';");
		}
	}
?>