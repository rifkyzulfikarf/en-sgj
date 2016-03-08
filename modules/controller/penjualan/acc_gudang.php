<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan.php';
		$penjualan = new penjualan();
		
		switch ($_POST['apa']) {
			case "get-penjualan":
				$collect = array();
				
				$qJual = "SELECT `penjualan_acc_gudang`.`id_penjualan`, `penjualan`.`tgl`, `penjualan`.`no_nota`, `penjualan`.`jml`, `barang`.`id` AS 
						`id_barang`, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen`, 
						`penjualan_acc_gudang`.`acc_gudang` FROM `penjualan_acc_gudang` 
						INNER JOIN `penjualan` ON (`penjualan_acc_gudang`.`id_penjualan` = `penjualan`.`id`) 
						INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
						INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
						WHERE `penjualan_acc_gudang`.`acc_gudang` IS NULL;";
				if ($query = $penjualan->runQuery($qJual)) {
					while ($rs = $query->fetch_array()) {
						
						if ($rs['acc_gudang'] == null) {
							$acc = "Belum";
							$button = "<button class='btn btn-primary btn-sm' id='btn-acc' data-id='".$rs['id_penjualan']."' 
									data-barang='".$rs['id_barang']."' data-jml='".$rs['jml']."'><i class='fa fa-check'></i></button>";
						} else if($rs['acc_gudang'] == "1") {
							$acc = "Ya";
							$button = "";
						} else {
							$acc = "Tidak";
							$button = "";
						}
						
						$detail = array();
						array_push($detail, $rs["id_penjualan"]);
						array_push($detail, $rs["tgl"]);
						array_push($detail, $rs["no_nota"]);
						array_push($detail, $rs["nama_konsumen"]);
						array_push($detail, $rs["nama_barang"]);
						array_push($detail, $rs["jml"]);
						array_push($detail, $acc);
						array_push($detail, $button);
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "acc-penjualan" :
				$arr=array();
							
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['barang']) && $_POST['barang'] != "" && 
				isset($_POST['jml']) && $_POST['jml'] != "") {
					
					if ($result = $penjualan->acc_gudang($_POST['id'], $_POST['barang'], $_POST['jml'], "1", d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Acc tersimpan..";
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
			case "tolak-penjualan" :
				$arr=array();
							
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['barang']) && $_POST['barang'] != "" && 
				isset($_POST['jml']) && $_POST['jml'] != "") {
					
					if ($result = $penjualan->acc_gudang($_POST['id'], $_POST['barang'], $_POST['jml'], "2", d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Data tersimpan..";
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