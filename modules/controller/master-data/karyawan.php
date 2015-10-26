<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.karyawan.php';
		$karyawan = new karyawan();
		
		switch ($_POST['apa']) {
			case 'get-jabatan':
				include 'modules/model/class.jabatan.php';
				$jabatan = new jabatan();
				if ($query = $jabatan->get_jabatan()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['jabatan']."</option>";
					}
				}
				break;
			case "get-karyawan":
				$collect = array();
				
				if ($query = $karyawan->get_karyawan()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, $rs["jk"]);
						array_push($detail, $rs["jabatan"]);
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' data-nama='".$rs["nama"]."'>
									<i class='fa fa-pencil'></i></button> 
									<button type='button' class='btn btn-sm btn-danger' id='btn-hapus-karyawan' data-id='".$rs["id"]."'><i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-karyawan":
				$arr=array();
				
				if (isset($_POST['txt-nama']) && $_POST['txt-nama'] != "" && isset($_POST['cmb-jk']) && $_POST['cmb-jk'] != "" && 
					isset($_POST['cmb-jabatan']) && $_POST['cmb-jabatan'] != "") {
					
					if ($result = $karyawan->tambah($_POST['txt-nama'], $_POST['cmb-jabatan'], $_POST['cmb-jk'])) {
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
			case "ubah-karyawan":
				$arr=array();
				
				if (isset($_POST['txt-nama']) && $_POST['txt-nama'] != "" && isset($_POST['cmb-jk']) && $_POST['cmb-jk'] != "" && 
					isset($_POST['cmb-jabatan']) && $_POST['cmb-jabatan'] != "" && isset($_POST['txt-id']) && $_POST['txt-id'] != "") {
					
					if ($result = $karyawan->ubah($_POST['txt-id'], $_POST['txt-nama'], $_POST['cmb-jabatan'], $_POST['cmb-jk'])) {
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
			case "hapus-karyawan":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" ) {
					
					if ($result = $karyawan->hapus($_POST['id'])) {
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