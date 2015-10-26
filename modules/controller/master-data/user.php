<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.user.php';
		$user = new user();
		
		switch ($_POST['apa']) {
			case "tambah-user":
				$arr=array();
				
				if (isset($_POST['cmb-karyawan']) && $_POST['cmb-karyawan'] != "" && isset($_POST['txt-tambah-user']) && $_POST['txt-tambah-user'] != "" && 
					isset($_POST['txt-tambah-pass']) && $_POST['txt-tambah-pass'] != "") {
					
					if ($result = $user->tambah_user($_POST['cmb-karyawan'], $_POST['txt-tambah-user'], $_POST['txt-tambah-pass'])) {
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
			case "ubah-user":
				$arr=array();
				
				if (isset($_POST['txt-ubah-id']) && $_POST['txt-ubah-id'] != "" && isset($_POST['txt-ubah-user']) && $_POST['txt-ubah-user'] != "" && 
					isset($_POST['txt-ubah-pass']) && $_POST['txt-ubah-pass'] != "") {
					
					if ($result = $user->ubah_user($_POST['txt-ubah-id'], $_POST['txt-ubah-user'], $_POST['txt-ubah-pass'])) {
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
			case "hapus-user":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					
					if ($result = $user->hapus_user($_POST['id'])) {
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