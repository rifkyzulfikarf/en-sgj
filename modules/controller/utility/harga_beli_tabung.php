<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.barang.php';
		$barang = new barang();
		
		switch ($_POST['apa']) {
			case "get-harga-beli":
				$collect = array();
				
				if ($query = $barang->get_barang()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, "Rp ".number_format($rs["harga_beli"], 2, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' data-harga='".$rs["harga_beli"]."'>
											<i class='fa fa-pencil'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "ubah-harga-beli":
				$arr=array();
				
				if (isset($_POST['txt-harga-beli']) && $_POST['txt-harga-beli'] != "") {
					
					if ($result = $barang->ubah_harga_beli($_POST['txt-harga-beli'])) {
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