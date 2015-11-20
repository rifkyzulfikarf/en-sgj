<?php
	include "blob/blob.php";
	
	$data = new koneksi();
	
	$qCek = "SELECT id, id_bank FROM kas_bank";
	
	if ($resCek = $data->runQuery($qCek)) {
		while ($rsCek = $resCek->fetch_array()) {
			$kodeLama = $rsCek['id'];
			
			$prefix = ($rsCek['id_bank'] == "1")?"EKB":"SKB";
			
			$kodeBaru = $prefix.substr($kodeLama, 3, 10);
			
			$qUpdate = "UPDATE kas_bank SET id = '$kodeBaru' WHERE id = '$kodeLama'";
			
			$resUpdate = $data->runQuery($qUpdate);
		}
	}
?>