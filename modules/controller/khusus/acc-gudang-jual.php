<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan_khusus.php';
		$penjualan = new penjualan_khusus();
		
		switch ($_POST['apa']) {
			case "get-penjualan":
				$collect = array();
				
				if (isset($_POST['tgl']) && $_POST['tgl'] != "") {
					$qJual = "SELECT `khusus_penjualan_acc_gudang`.`id_penjualan`, `khusus_penjualan`.`no_nota`, `khusus_penjualan`.`jml`, 
							`khusus_barang`.`id` AS 
							`id_barang`, `khusus_barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen`, 
							`khusus_penjualan_acc_gudang`.`acc_gudang` FROM `khusus_penjualan_acc_gudang` 
							INNER JOIN `khusus_penjualan` ON (`khusus_penjualan_acc_gudang`.`id_penjualan` = `khusus_penjualan`.`id`) 
							INNER JOIN `khusus_barang` ON (`khusus_penjualan`.`id_barang` = `khusus_barang`.`id`) 
							INNER JOIN `konsumen` ON (`khusus_penjualan`.`id_konsumen` = `konsumen`.`id`) 
							WHERE `khusus_penjualan`.`tgl` = '".$_POST['tgl']."';";
					if ($query = $penjualan->runQuery($qJual)) {
						while ($rs = $query->fetch_array()) {
							
							if ($rs['acc_gudang'] == null) {
								$acc = "Belum";
								$button = "<button class='btn btn-primary btn-sm' id='btn-acc' data-id='".$rs['id_penjualan']."' 
										data-barang='".$rs['id_barang']."' data-jml='".$rs['jml']."'><i class='fa fa-check'></i></button>
										<button class='btn btn-danger btn-sm' id='btn-tolak' data-id='".$rs['id_penjualan']."' 
										data-barang='".$rs['id_barang']."' data-jml='".$rs['jml']."'><i class='fa fa-ban'></i></button>";
							} else if($rs['acc_gudang'] == "1") {
								$acc = "Ya";
								$button = "";
							} else {
								$acc = "Tidak";
								$button = "";
							}
							
							$detail = array();
							array_push($detail, $rs["id_penjualan"]);
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