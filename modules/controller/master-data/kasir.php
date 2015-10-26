<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.kasir.php';
		$kasir = new kasir();
		
		switch ($_POST['apa']) {
			case "get-kasir":
				$collect = array();
				
				if ($query = $kasir->get_kasir()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, "Rp ".number_format($rs["saldo"], 2, ",", "."));
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-kasir":
				$arr=array();
				
				if (isset($_POST['txt-nama']) && $_POST['txt-nama'] != "") {
					
					if ($result = $kasir->tambah_baru($_POST['txt-nama'])) {
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