<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pembelian.php';
		$pembelian = new pembelian();
		
		switch ($_POST['apa']) {
			case "get-tebus":
				$collect = array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					if ($query = $pembelian->get_pembelian_by_id($_POST['id'])) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["tgl_tebus"]);
							array_push($detail, $rs["no_lo"]);
							array_push($detail, $rs["no_sa"]);
							array_push($detail, $rs["nama"]);
							array_push($detail, number_format($rs["jml_tabung"],0,".",","));
							array_push($detail, "Rp ".number_format($rs["grand_total"],0,".",","));
							array_push($detail, "<button class='btn btn-sm btn-danger' id='btn-hapus' data-id='".$rs['id']."' 
							data-tarik='".$rs['grand_total']."' data-idbank='".$rs['id_bank']."'>
							<i class='fa fa-trash-o'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "hapus-tebus" :
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['tarik']) && $_POST['tarik'] != "" 
				&& isset($_POST['idbank']) && $_POST['idbank'] != "") {
					
					if ($result = $pembelian->hapus_pembelian($_POST['id'], $_POST['tarik'], $_POST['idbank'])) {
						$arr['status']=TRUE;
						$arr['msg']="Tebusan sukses terhapus..";
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