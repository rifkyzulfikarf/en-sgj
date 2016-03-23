<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.kasir.php';
		$kasir = new kasir();
		
		switch ($_POST['apa']) {
			case "get-request":
				$collect = array();
				
				if ($query = $kasir->runQuery("SELECT `request_hapus`.*, `karyawan`.`nama` FROM `request_hapus` 
				INNER JOIN `karyawan` ON(`request_hapus`.`id_karyawan` = `karyawan`.`id`) WHERE `jenis` = '3' 
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
			case "get-kas":
				$collect = array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					if ($query = $kasir->get_kas_kecil_by_id($_POST['id'])) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["no_bukti"]);
							array_push($detail, $rs["tgl"]);
							array_push($detail, $rs["keterangan"]);
							array_push($detail, "Rp ".number_format($rs["debet"],0,".",","));
							array_push($detail, "Rp ".number_format($rs["kredit"],0,".",","));
							array_push($detail, "<button class='btn btn-sm btn-danger' id='btn-hapus' data-id='".$rs['id']."' 
							data-debet='".$rs['debet']."' data-kredit='".$rs['kredit']."' data-idkasir='".$rs['id_kasir']."'>
							<i class='fa fa-trash-o'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "hapus-kas" :
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['debet']) && $_POST['debet'] != "" && 
				isset($_POST['kredit']) && $_POST['kredit'] != "" && isset($_POST['idkasir']) && $_POST['idkasir'] != "") {
					
					if ($result = $kasir->kas_kecil_hapus($_POST['id'], $_POST['debet'], $_POST['kredit'], $_POST['idkasir'])) {
						$arr['status']=TRUE;
						$arr['msg']="Kas Kecil sukses terhapus..";
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
					
					if ($result = $kasir->runQuery("UPDATE `request_hapus` SET `hapus` = '1' WHERE `id` = '".$_POST['id']."';")) {
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