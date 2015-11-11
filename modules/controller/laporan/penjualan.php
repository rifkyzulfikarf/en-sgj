<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan.php';
		$penjualan = new penjualan();
		
		switch ($_POST['apa']) {
			case "get-bank":
				$bank = new bank();
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']." ".$rs['nomor_rekening']."</option>";
					}
				}
				break;
			case "get-konsumen":
				$konsumen = new konsumen();
				if ($query = $konsumen->get_konsumen()) {
					echo "<option value='%'>Semua</option>";
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
					}
				}
				break;
		}
	}
?>