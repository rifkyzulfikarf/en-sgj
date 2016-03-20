<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.reqhapus.php';
		$data = new reqhapus();
		
		switch ($_POST['apa']) {
			case "simpan":
				$arr=array();
				
				if (isset($_POST['jenis']) && $_POST['jenis'] != "" && isset($_POST['id']) && $_POST['id'] != "" && 
				isset($_POST['ket']) && $_POST['ket'] != "") {
					
					if ($result = $data->tambah(date("Y-m-d"), d_code($_SESSION['en-data']), $_POST['jenis'], $_POST['id'], $_POST['ket'])) {
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
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					
					if ($result = $data->hapus($_POST['id'])) {
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