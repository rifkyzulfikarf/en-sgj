<?php
	if ($_POST['apa'] == "get-notif") {
		$data = new koneksi();
		$arr = array();
		$listNotif = "<div class='notify-arrow notify-arrow-yellow'></div>
					<li>
						<p class='yellow'>You have new notifications</p>
					</li>";
		$pangkalanBelumAmbil = 0;
		
		$query = "SELECT `konsumen`.`id`, `konsumen`.`nama` AS `nama_konsumen`, `kuota_penjualan`.`jml_alokasi` 
		FROM `kuota_penjualan` 
		INNER JOIN `konsumen` ON (`kuota_penjualan`.`id_konsumen` = `konsumen`.`id`) 
		WHERE tgl = '".date("Y-m-d")."';";
		if ($result = $data->runQuery($query)) {
			while ($rs = $result->fetch_array()) {
				
				$qCek = "SELECT SUM(`jml`) FROM `penjualan` WHERE `id_konsumen` = '".$rs["id"]."' AND 
				`tgl` = '".date("Y-m-d")."' AND 
				`id_barang` = '1';";
				if ($resCek = $data->runQuery($qCek)) {
					$rsCek = $resCek->fetch_array();
					$jumlahTerambil = $rsCek[0];
					
					if ($jumlahTerambil < $rs['jml_alokasi']) {
						$pangkalanBelumAmbil += 1;
					}
					
				}

			}
		}
		
		$listNotif .= "<li><a href='#'>".$pangkalanBelumAmbil." Pangkalan belum memenuhi alokasi.</a></li>";
		
		$arr['listNotif'] = $listNotif;
		
		echo json_encode($arr);
	}

?>