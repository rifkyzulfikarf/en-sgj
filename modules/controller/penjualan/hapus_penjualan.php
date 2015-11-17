<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan.php';
		$penjualan = new penjualan();
		
		switch ($_POST['apa']) {
			case "get-penjualan":
				$collect = array();
				
				if (isset($_POST['tgl']) && $_POST['tgl'] != "") {
					$qJual = "SELECT `penjualan`.*, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen`, 
							`penjualan_acc_gudang`.`acc_gudang`, `pelunasan`.`id_bank`, `pelunasan`.`id_bank` AS `idbanklunas` FROM `penjualan`
							INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
							INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
							INNER JOIN `penjualan_acc_gudang` ON (`penjualan`.`id` = `penjualan_acc_gudang`.`id_penjualan`) 
							LEFT JOIN `pelunasan` ON (`penjualan`.`id` = `pelunasan`.`id_penjualan`) 
							WHERE `penjualan`.`tgl` = '".$_POST['tgl']."';";
					if ($query = $penjualan->runQuery($qJual)) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["id"]);
							array_push($detail, $rs["no_nota"]);
							array_push($detail, $rs["nama_konsumen"]);
							array_push($detail, $rs["nama_barang"]);
							array_push($detail, $rs["jml"]);
							array_push($detail, "Rp ".number_format($rs["total_bayar"],0,".",","));
							array_push($detail, "<button class='btn btn-sm btn-danger' id='btn-hapus' data-id='".$rs['id']."'>
							<i class='fa fa-trash-o'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "hapus-penjualan" :
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					
					if ($result = $penjualan->penjualan_hapus($_POST['id'], d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Transaksi sukses terhapus..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal menghapus..";
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