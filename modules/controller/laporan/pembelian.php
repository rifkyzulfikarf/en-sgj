<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pembelian.php';
		$pembelian = new pembelian();
		
		switch ($_POST['apa']) {
			case "get-bank":
				$bank = new bank();
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']." ".$rs['nomor_rekening']."</option>";
					}
				}
				break;
		}
	}
?>