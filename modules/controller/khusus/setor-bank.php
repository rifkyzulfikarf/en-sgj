<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan_khusus.php';
		$penjualan = new penjualan_khusus();
		
		switch ($_POST['apa']) {
			case "get-penjualan":
				$collect = array();
				
				if (isset($_POST['tgl']) && $_POST['tgl'] != "" && isset($_POST['jenis']) && $_POST['jenis'] != "") {
					if ($_POST['jenis'] == '1') {
						$qJual = "SELECT `khusus_penjualan`.`id`, `khusus_penjualan`.`no_nota`, `khusus_penjualan`.`jml`, `khusus_penjualan`.`total_bayar`,
								`konsumen`.`nama` AS `nama_konsumen` 
								FROM `khusus_penjualan` 
								INNER JOIN `konsumen` ON (`khusus_penjualan`.`id_konsumen` = `konsumen`.`id`) 
								WHERE `khusus_penjualan`.`tgl` = '".$_POST['tgl']."' AND `khusus_penjualan`.`jenis` = '1' AND `khusus_penjualan`.`no_bukti` = '';";
					} else {
						$qJual = "SELECT `khusus_pelunasan`.`id`, `khusus_penjualan`.`no_nota`, `khusus_penjualan`.`jml`, `khusus_pelunasan`.`total_bayar`,
								`konsumen`.`nama` AS `nama_konsumen` 
								FROM `khusus_pelunasan` 
								INNER JOIN `khusus_penjualan` ON (`khusus_pelunasan`.`id_penjualan` = `khusus_penjualan`.`id`) 
								INNER JOIN `konsumen` ON (`khusus_penjualan`.`id_konsumen` = `konsumen`.`id`) 
								WHERE `khusus_pelunasan`.`tgl` = '".$_POST['tgl']."' AND `khusus_pelunasan`.`jenis` = '1' AND `khusus_pelunasan`.`no_bukti` = '';";
					}
					if ($query = $penjualan->runQuery($qJual)) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["id"]);
							array_push($detail, $rs["no_nota"]);
							array_push($detail, $rs["nama_konsumen"]);
							array_push($detail, $rs["jml"]);
							array_push($detail, "Rp ".number_format($rs["total_bayar"],0,",","."));
							array_push($detail, "<button class='btn btn-sm btn-primary' id='btn-show-setor' data-id='".$rs['id']."' 
										data-total='".$rs['total_bayar']."'>
										<i class='fa fa-mail-forward'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "get-bank":
				$bank = new bank_khusus();
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