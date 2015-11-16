<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.barang.php';
		$barang = new barang();
		
		switch ($_POST['apa']) {
			case "get-het":
				$collect = array();
				
				if ($query = $barang->get_barang()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, "Rp ".number_format($rs["het"], 2, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' data-harga='".$rs["het"]."'>
											<i class='fa fa-pencil'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "ubah-het":
				$arr=array();
				
				if (isset($_POST['txt-het']) && $_POST['txt-het'] != "" && isset($_POST['txt-id']) && $_POST['txt-id'] != "") {
					
					if ($result = $barang->ubah_het($_POST['txt-het'], $_POST['txt-id'])) {
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