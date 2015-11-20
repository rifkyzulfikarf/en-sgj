<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.konsumen.php';
		$konsumen = new konsumen();
		
		switch ($_POST['apa']) {
			case "get-konsumen":
				$collect = array();
				
				if ($query = $konsumen->get_konsumen()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, $rs["alamat"]);
						array_push($detail, $rs["telepon"]);
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' data-nama='".$rs["nama"]."' 
											data-alamat='".$rs["alamat"]."' data-telp='".$rs["telepon"]."'><i class='fa fa-pencil'></i></button> 
											<button type='button' class='btn btn-sm btn-danger' id='btn-hapus-konsumen' data-id='".$rs["id"]."'><i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-konsumen":
				$arr=array();
				
				if (isset($_POST['txt-nama']) && $_POST['txt-nama'] != "" && isset($_POST['txt-alamat']) && $_POST['txt-alamat'] != "" && 
					isset($_POST['txt-telp']) && $_POST['txt-telp'] != "") {
					
					if ($result = $konsumen->tambah($_POST['txt-nama'], $_POST['txt-alamat'], $_POST['txt-telp'])) {
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
			case "ubah-konsumen":
				$arr=array();
				
				if (isset($_POST['txt-nama']) && $_POST['txt-nama'] != "" && isset($_POST['txt-alamat']) && $_POST['txt-alamat'] != "" && 
					isset($_POST['txt-telp']) && $_POST['txt-telp'] != "" && isset($_POST['txt-id']) && $_POST['txt-id'] != "") {
					
					if ($result = $konsumen->ubah($_POST['txt-id'], $_POST['txt-nama'], $_POST['txt-alamat'], $_POST['txt-telp'])) {
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
			case "hapus-konsumen":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" ) {
					
					if ($result = $konsumen->hapus($_POST['id'])) {
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
			case "get-harga-jual":
				$collect = array();
				
				if ($query = $konsumen->get_konsumen()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, "Rp ".number_format($rs["harga_3kg"], 0, ",", "."));
						array_push($detail, "Rp ".number_format($rs["harga_12kg"], 0, ",", "."));
						array_push($detail, "Rp ".number_format($rs["harga_12kg_bg"], 0, ",", "."));
						array_push($detail, "Rp ".number_format($rs["harga_50kg"], 0, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' 
											data-3kg='".$rs["harga_3kg"]."' data-12kg='".$rs["harga_12kg"]."' data-12kgbg='".$rs["harga_12kg_bg"]."' 
											data-50kg='".$rs["harga_50kg"]."'><i class='fa fa-pencil'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "ubah-harga-jual":
				$arr=array();
				
				if (isset($_POST['txt-id']) && $_POST['txt-id'] != "" && isset($_POST['txt-3kg']) && $_POST['txt-3kg'] != "" && 
				isset($_POST['txt-12kg']) && $_POST['txt-12kg'] != "" && isset($_POST['txt-12kgbg']) && $_POST['txt-12kgbg'] != "" && 
				isset($_POST['txt-50kg']) && $_POST['txt-50kg'] != "") {
					
					if ($result = $konsumen->set_harga_jual($_POST['txt-id'], $_POST['txt-3kg'], $_POST['txt-12kg'], $_POST['txt-12kgbg'], $_POST['txt-50kg'])) {
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