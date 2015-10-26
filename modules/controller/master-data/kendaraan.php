<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.kendaraan.php';
		$kendaraan = new kendaraan();
		
		switch ($_POST['apa']) {
			case "get-kendaraan":
				$collect = array();
				
				if ($query = $kendaraan->get_kendaraan()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nopol"]);
						array_push($detail, $rs["keterangan"]);
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' data-nopol='".$rs["nopol"]."' 
									data-keterangan='".$rs["keterangan"]."'><i class='fa fa-pencil'></i></button> 
									<button type='button' class='btn btn-sm btn-danger' id='btn-hapus-kendaraan' data-id='".$rs["id"]."'><i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-kendaraan":
				$arr=array();
				
				if (isset($_POST['txt-nopol']) && $_POST['txt-nopol'] != "" && isset($_POST['txt-keterangan']) && $_POST['txt-keterangan'] != "") {
					
					if ($result = $kendaraan->tambah($_POST['txt-nopol'], $_POST['txt-keterangan'])) {
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
			case "ubah-kendaraan":
				$arr=array();
				
				if (isset($_POST['txt-nopol']) && $_POST['txt-nopol'] != "" && isset($_POST['txt-keterangan']) && $_POST['txt-keterangan'] != "" && isset($_POST['txt-id']) && $_POST['txt-id'] != "") {
					
					if ($result = $kendaraan->ubah($_POST['txt-id'], $_POST['txt-nopol'], $_POST['txt-keterangan'])) {
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
			case "hapus-kendaraan":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" ) {
					
					if ($result = $kendaraan->hapus($_POST['id'])) {
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