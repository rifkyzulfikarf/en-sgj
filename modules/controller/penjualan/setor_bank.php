<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan.php';
		$penjualan = new penjualan();
		
		switch ($_POST['apa']) {
			case "get-penjualan":
				$collect = array();
				
				if (isset($_POST['tgl']) && $_POST['tgl'] != "" && isset($_POST['jenis']) && $_POST['jenis'] != "") {
					if ($_POST['jenis'] == '1') {
						$qJual = "SELECT `penjualan`.`id`, `penjualan`.`no_nota`, `penjualan`.`jml`, `penjualan`.`total_bayar`,
								`barang`.`id` AS `id_barang`, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen` 
								FROM `penjualan` 
								INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
								INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
								WHERE `penjualan`.`tgl` = '".$_POST['tgl']."' AND `penjualan`.`jenis` = '1' AND `penjualan`.`no_bukti` = '';";
					} else {
						$qJual = "SELECT `pelunasan`.`id`, `penjualan`.`no_nota`, `penjualan`.`jml`, `pelunasan`.`total_bayar`,
								`barang`.`id` AS `id_barang`, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen` 
								FROM `pelunasan` 
								INNER JOIN `penjualan` ON (`pelunasan`.`id_penjualan` = `penjualan`.`id`) 
								INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
								INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
								WHERE `pelunasan`.`tgl` = '".$_POST['tgl']."' AND `pelunasan`.`jenis` = '1' AND `pelunasan`.`no_bukti` = '';";
					}
					if ($query = $penjualan->runQuery($qJual)) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["id"]);
							array_push($detail, $rs["no_nota"]);
							array_push($detail, $rs["nama_konsumen"]);
							array_push($detail, $rs["nama_barang"]);
							array_push($detail, $rs["jml"]);
							array_push($detail, "<button class='btn btn-sm btn-primary' id='btn-show-setor' data-id='".$rs['id']."' 
										data-total='".$rs['total_bayar']."'><i class='fa fa-mail-forward'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "get-bank":
				$bank = new bank();
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']." ".$rs['nomor_rekening']."</option>";
					}
				}
				break;
			case "simpan-setoran":
				$arr=array();
							
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['bank']) && $_POST['bank'] != "" && 
				isset($_POST['bukti']) && $_POST['bukti'] != "" && isset($_POST['total']) && $_POST['total'] != "") {
					
					if ($result = $penjualan->setor_bank($_POST['id'], $_POST['bank'], $_POST['bukti'], $_POST['total'], 
					d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Setoran sukses tersimpan..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal menyimpan..";
					}
				} else {
					$arr['status']=FALSE;
					$arr['msg']="Harap isi data dengan lengkap..";
				}
				
				echo json_encode($arr);
				break;
		}
	}
?>