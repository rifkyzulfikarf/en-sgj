<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.konsumen.php';
		$konsumen = new konsumen();
		
		switch ($_POST['apa']) {
			case "get-harga-jual":
				$collect = array();
				
				if ($query = $konsumen->get_konsumen_khusus()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, "Rp ".number_format($rs["harga_50kg_khusus"], 0, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' 
								data-50kgkhusus='".$rs["harga_50kg_khusus"]."'><i class='fa fa-pencil'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "ubah-harga-jual":
				$arr=array();
				
				if (isset($_POST['txt-id']) && $_POST['txt-id'] != "" && isset($_POST['txt-50kg-khusus']) && $_POST['txt-50kg-khusus'] != "") {
					
					if ($result = $konsumen->set_harga_jual_khusus($_POST['txt-id'], $_POST['txt-50kg-khusus'])) {
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