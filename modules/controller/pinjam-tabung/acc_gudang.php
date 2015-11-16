<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pinjam_tabung.php';
		$peminjaman = new pinjam_tabung();
		
		switch ($_POST['apa']) {
			case "get-pinjaman":
				$collect = array();
				
				if (isset($_POST['konsumen']) && $_POST['konsumen'] != "") {
				
					$query = "SELECT `barang`.`nama`, `pinjaman_tabung`.* FROM `pinjaman_tabung` 
					INNER JOIN `barang` ON (`pinjaman_tabung`.`id_barang` = `barang`.`id`) 
					WHERE `pinjaman_tabung`.`id_konsumen` LIKE '".$_POST['konsumen']."';";
				
					if ($query = $peminjaman->runQuery($query)) {
						while ($rs = $query->fetch_array()) {
							
							if ($rs['id_gudang_pinjam'] == null) {
								$tombol = "<button type='button' class='btn btn-sm btn-primary' id='btn-show-out' 
										data-id='".$rs["id"]."' data-idbarang='".$rs["id_barang"]."' data-jml='".$rs["jml_pinjam"]."'>
										<i class='fa fa-check'></i></button>";
							} else {
								$tombol = "<button type='button' class='btn btn-sm btn-primary' id='btn-show-in' 
										data-id='".$rs["id"]."' data-idbarang='".$rs["id_barang"]."' data-jml='".$rs["jml_kembali"]."'>
										<i class='fa fa-check'></i></button>";
							}
							
							if ($rs['id_gudang_pinjam'] != null && $rs['id_gudang_kembali'] != null) {
								$tombol = "";
							}
							
							$detail = array();
							array_push($detail, $rs["tgl_pinjam"]);
							array_push($detail, $rs["jml_pinjam"]);
							array_push($detail, $rs["tgl_kembali"]);
							array_push($detail, $rs["jml_kembali"]);
							array_push($detail, $tombol);
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				
				echo json_encode(array("aaData"=>$collect));
				break;
			case "simpan-acc-out":
				$arr=array();
				if (isset($_POST['txt-id-out']) && $_POST['txt-id-out'] != "" && isset($_POST['cmb-acc-out']) && $_POST['cmb-acc-out'] != "" && 
				isset($_POST['txt-idbarang-out']) && $_POST['txt-idbarang-out'] != "" && isset($_POST['txt-jml-out']) && $_POST['txt-jml-out'] != "") {
					
					if ($result = $peminjaman->acc_gudang_pinjam($_POST['txt-id-out'], $_POST['txt-idbarang-out'], $_POST['txt-jml-out'], 
					$_POST['cmb-acc-out'], d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Sukses acc..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal acc..";
					}
				} else {
					$arr['status']=FALSE;
					$arr['msg']="Harap isi data dengan lengkap..";
				}
				
				echo json_encode($arr);
				break;
			case "simpan-acc-in":
				$arr=array();
				if (isset($_POST['txt-id-in']) && $_POST['txt-id-in'] != "" && isset($_POST['cmb-acc-in']) && $_POST['cmb-acc-in'] != "" && 
				isset($_POST['txt-idbarang-in']) && $_POST['txt-idbarang-in'] != "" && isset($_POST['txt-jml-in']) && $_POST['txt-jml-in'] != "") {
					
					if ($result = $peminjaman->acc_gudang_kembali($_POST['txt-id-in'], $_POST['txt-idbarang-in'], $_POST['txt-jml-in'], 
					$_POST['cmb-acc-in'], d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Sukses acc..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal acc..";
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