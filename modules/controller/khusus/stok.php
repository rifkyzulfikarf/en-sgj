<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.barang_khusus.php';
		$barang = new barang_khusus();
		
		switch ($_POST['apa']) {
			case "get-stok":
				$collect = array();
				
				if ($query = $barang->get_barang()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						//array_push($detail, number_format($rs["stok_kosong"], 0, ",", "."));
						array_push($detail, number_format($rs["stok_isi"], 0, ",", "."));
						//array_push($detail, number_format($rs["stok_pinjam"], 0, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-show-opname' data-kosong='".$rs["stok_kosong"]."' 
											data-isi='".$rs["stok_isi"]."' data-pinjam='".$rs["stok_pinjam"]."' data-id='".$rs['id']."'><i class='fa fa-pencil'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "simpan-opname":
				$arr=array();
				
				if (isset($_POST['txt-isi-lama']) && $_POST['txt-isi-lama'] != "" && isset($_POST['txt-isi-baru']) && $_POST['txt-isi-baru'] != "" && 
				isset($_POST['txt-keterangan']) && $_POST['txt-keterangan'] != "" && isset($_POST['txt-id']) && $_POST['txt-id'] != "") {
					
					$tgl = date("Y-m-d");
					
					if ($result = $barang->stok_opname($tgl, $_POST['txt-id'], $_POST['txt-isi-lama'], $_POST['txt-isi-baru'], 
					0, 0, 0, 0,
					$_POST['txt-keterangan'], d_code($_SESSION['en-data']))) {
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