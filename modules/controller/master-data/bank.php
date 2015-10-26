<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.bank.php';
		$bank = new bank();
		
		switch ($_POST['apa']) {
			case "get-bank":
				$collect = array();
				
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, $rs["nomor_rekening"]);
						array_push($detail, "Rp ".number_format($rs["saldo"], 2, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' data-nama='".$rs["nama"]."' 
									data-rekening='".$rs["nomor_rekening"]."'><i class='fa fa-pencil'></i></button> 
									<button type='button' class='btn btn-sm btn-danger' id='btn-hapus-bank' data-id='".$rs["id"]."'><i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-bank":
				$arr=array();
				
				if (isset($_POST['txt-nama']) && $_POST['txt-nama'] != "" && isset($_POST['txt-rekening']) && $_POST['txt-rekening'] != "") {
					
					if ($result = $bank->tambah_baru($_POST['txt-nama'], $_POST['txt-rekening'])) {
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
			case "ubah-bank":
				$arr=array();
				
				if (isset($_POST['txt-nama']) && $_POST['txt-nama'] != "" && isset($_POST['txt-rekening']) && $_POST['txt-rekening'] != "" && isset($_POST['txt-id']) && $_POST['txt-id'] != "") {
					
					if ($result = $bank->ubah_data($_POST['txt-id'], $_POST['txt-nama'], $_POST['txt-rekening'])) {
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
			case "hapus-bank":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" ) {
					
					if ($result = $bank->hapus_data($_POST['id'])) {
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