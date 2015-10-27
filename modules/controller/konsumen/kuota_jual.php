<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.konsumen.php';
		$konsumen = new konsumen();
		
		switch ($_POST['apa']) {
			case 'get-konsumen':
				if ($query = $konsumen->get_konsumen()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
					}
				}
				break;
			case "get-kuota":
				$collect = array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['tglAwal']) && $_POST['tglAwal'] != "" && 
					isset($_POST['tglAkhir']) && $_POST['tglAkhir'] != "") {
				
					if ($query = $konsumen->get_kuota_jual($_POST['id'], $_POST['tglAwal'], $_POST['tglAkhir'])) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["tgl"]);
							array_push($detail, $rs["jml_alokasi"]);
							array_push($detail, $rs["jml_terambil"]);
							array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs['id_konsumen']."' 
										data-kuota='".$rs['jml_alokasi']."' data-tgl='".$rs['tgl']."' data-nama='".$rs['nama']."'>
										<i class='fa fa-pencil'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-kuota":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['tgl']) && $_POST['tgl'] != "" && 
					isset($_POST['kuota']) && $_POST['kuota'] != "") {
					
					if ($result = $konsumen->tambah_kuota_penjualan($_POST['id'], $_POST['tgl'], $_POST['kuota'])) {
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
			case "ubah-kuota":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['kuota']) && $_POST['kuota'] != "" 
				&& isset($_POST['tgl']) && $_POST['tgl'] != "") {
					
					if ($result = $konsumen->ubah_kuota_penjualan($_POST['id'], $_POST['tgl'], $_POST['kuota'])) {
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