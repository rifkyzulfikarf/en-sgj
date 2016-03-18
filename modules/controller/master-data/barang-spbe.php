<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.spbe.php';
		$spbe = new spbe();
		
		switch ($_POST['apa']) {
			case "get-data":
				$collect = array();
				
				if ($query = $spbe->get_spbe_barang()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama_spbe"]);
						array_push($detail, $rs["nama_barang"]);
						array_push($detail, $rs["ship_to"]);
						array_push($detail, $rs["sold_to"]);
						array_push($detail, "<button type='button' class='btn btn-sm btn-danger' id='btn-hapus' data-id='".$rs["id"]."'><i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah":
				$arr=array();
				
				if (isset($_POST['cmb-spbe']) && $_POST['cmb-spbe'] != "" && isset($_POST['cmb-barang']) && $_POST['cmb-barang'] != "" && 
				isset($_POST['txt-ship']) && $_POST['txt-ship'] != "" && isset($_POST['txt-sold']) && $_POST['txt-sold'] != "") {
					
					if ($result = $spbe->tambah_barang($_POST['cmb-spbe'], $_POST['cmb-barang'], $_POST['txt-ship'], $_POST['txt-sold'])) {
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
			case "hapus":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" ) {
					
					if ($result = $spbe->hapus_barang($_POST['id'])) {
						$arr['status']=TRUE;
						$arr['msg']="Data terhapus..";
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