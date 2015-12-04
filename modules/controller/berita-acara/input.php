<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.berita_acara.php';
		$data = new berita_acara();
		
		switch ($_POST['apa']) {
			case "simpan":
				$arr=array();
				
				if (isset($_POST['judul']) && $_POST['judul'] != "" && isset($_POST['isi']) && $_POST['isi'] != "") {
					
					if ($result = $data->tambah(date("Y-m-d"), date("H:i:s"), $_POST['judul'], $_POST['isi'], d_code($_SESSION['en-data']))) {
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