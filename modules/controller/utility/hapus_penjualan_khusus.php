<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan_khusus.php';
		$penjualan = new penjualan_khusus();
		
		switch ($_POST['apa']) {
			case "get-request":
				$collect = array();
				
				if ($query = $penjualan->runQuery("SELECT `request_hapus`.*, `karyawan`.`nama` FROM `request_hapus` 
				INNER JOIN `karyawan` ON(`request_hapus`.`id_karyawan` = `karyawan`.`id`) WHERE `jenis` = '4' 
				AND `is_proses` = '0' AND `request_hapus`.`hapus` = '0';")) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["tgl"]);
						array_push($detail, $rs["nama"]);
						array_push($detail, $rs["id_hapus"]);
						array_push($detail, $rs["keterangan"]);
						array_push($detail, "<button class='btn btn-sm btn-primary' id='btn-cek' data-id='".$rs['id_hapus']."'>
							<i class='fa fa-search'></i></button>
							<button class='btn btn-sm btn-danger' id='btn-hapus-req' data-id='".$rs['id']."'>
							<i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "get-penjualan":
				$collect = array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					$qJual = "SELECT `khusus_penjualan`.*, `konsumen`.`nama` AS `nama_konsumen`, 
							`khusus_penjualan_acc_gudang`.`acc_gudang`, `khusus_pelunasan`.`id_bank`, `khusus_pelunasan`.`id_bank` AS `idbanklunas` FROM `khusus_penjualan`
							INNER JOIN `konsumen` ON (`khusus_penjualan`.`id_konsumen` = `konsumen`.`id`) 
							INNER JOIN `khusus_penjualan_acc_gudang` ON (`khusus_penjualan`.`id` = `khusus_penjualan_acc_gudang`.`id_penjualan`) 
							LEFT JOIN `khusus_pelunasan` ON (`khusus_penjualan`.`id` = `khusus_pelunasan`.`id_penjualan`) 
							WHERE `khusus_penjualan`.`id` = '".$_POST['id']."';";
					if ($query = $penjualan->runQuery($qJual)) {
						while ($rs = $query->fetch_array()) {
							
							if ($rs["id_barang"] == "1") {
								$namaBarang = "LPG 50Kg Khusus";
							} else {
								$namaBarang = "LPG 3Kg Sparta";
							}
						
							$detail = array();
							array_push($detail, $rs["id"]);
							array_push($detail, $rs["no_nota"]);
							array_push($detail, $rs["nama_konsumen"]);
							array_push($detail, $namaBarang);
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
			case "hapus-request" :
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					
					if ($result = $penjualan->runQuery("UPDATE `request_hapus` SET `hapus` = '1' WHERE `id` = '".$_POST['id']."';")) {
						$arr['status']=TRUE;
						$arr['msg']="Permintaan dihapus..";
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