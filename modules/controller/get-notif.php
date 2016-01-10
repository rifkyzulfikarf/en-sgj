<?php
	if ($_POST['apa'] == "get-notif") {
		$data = new koneksi();
		$arr = array();
		$listNotif = "<div class='notify-arrow notify-arrow-yellow'></div>
					<li>
						<p class='yellow'>You have new notifications</p>
					</li>";
		$pangkalanBelumJual = 0;
		$penjualanBelumAccGudang = 0;
		
		$query = "SELECT `id` FROM `konsumen` WHERE `pangkalan` = '1' AND `hapus` = '0';";
		if ($result = $data->runQuery($query)) {
			while ($rs = $result->fetch_array()) {
				
				$qCek = "SELECT COUNT(`id`) FROM `penjualan` WHERE `id_konsumen` = '".$rs["id"]."' AND 
				`tgl` = '".date("Y-m-d")."';";
				if ($resCek = $data->runQuery($qCek)) {
					$rsCek = $resCek->fetch_array();
					$jumlahPenjualan = $rsCek[0];
					
					if ($jumlahPenjualan == 0) {
						$pangkalanBelumJual += 1;
					}
					
				}

			}
		}
		
		$listNotif .= "<li><a href='#'>".$pangkalanBelumJual." Pangkalan belum melakukan<br>transaksi pada hari ini.</a></li>";
		
		$query = "SELECT COUNT(`penjualan_acc_gudang`.`id_penjualan`) FROM `penjualan_acc_gudang` INNER JOIN `penjualan` 
				ON(`penjualan_acc_gudang`.`id_penjualan` = `penjualan`.`id`) WHERE `penjualan_acc_gudang`.`acc_gudang` IS NULL AND 
				`penjualan_acc_gudang`.`id_gudang` IS NULL AND `penjualan`.`tgl` = '".date("Y-m-d")."';";
		if ($result = $data->runQuery($query)) {
			while ($rs = $result->fetch_array()) {
					$penjualanBelumAccGudang = $rs[0];
			}
		}
		
		$listNotif .= "<li><a href='#'>".$penjualanBelumAccGudang." Penjualan belum diacc oleh gudang<br>pada hari ini.</a></li>";
		
		$arr['listNotif'] = $listNotif;
		
		echo json_encode($arr);
	}

?>