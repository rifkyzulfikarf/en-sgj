<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.loading.php';
		$loading = new loading();
		
		switch ($_POST['apa']) {
			case "get-loading":
				$collect = array();
				
				if ($query = $loading->get_loading_belum_acc_gudang()) {
					while ($rs = $query->fetch_array()) {
						$kendaraan = ($rs['nopol']==null)?" ":$rs['nopol'];
						
						if ($rs['id_gudang_berangkat'] == null) {
							$tombol = "<button type='button' class='btn btn-sm btn-primary' id='btn-show-out' 
									data-id='".$rs["id_pembelian"]."' data-idbarang='".$rs["id_barang"]."' data-jml='".$rs["tabung_kosong"]."'>
									<i class='fa fa-check'></i></button>";
						} else {
							$tombol = "<button type='button' class='btn btn-sm btn-primary' id='btn-show-in' 
									data-id='".$rs["id_pembelian"]."' data-idbarang='".$rs["id_barang"]."' data-jml='".$rs["tabung_isi"]."'>
									<i class='fa fa-check'></i></button>";
						}
						
						if ($rs['id_gudang_berangkat'] != null && $rs['id_gudang_kembali'] != null) {
							$tombol = "";
						}
						
						$driver = ($rs['nama_driver']==null)?" ":$rs['nama_driver'];
						
						$detail = array();
						array_push($detail, $rs['id_pembelian']." - ".$kendaraan." - ".$driver." - ".$rs['nama_barang']);
						array_push($detail, $rs["tabung_kosong"]);
						array_push($detail, $rs["tabung_isi"]);
						array_push($detail, $tombol);
						array_push($collect, $detail);
						unset($detail);
					}
				}
				
				echo json_encode(array("aaData"=>$collect));
				break;
			case "simpan-acc-out":
				$arr=array();
				if (isset($_POST['txt-id-out']) && $_POST['txt-id-out'] != "" && isset($_POST['cmb-acc-out']) && $_POST['cmb-acc-out'] != "" && 
				isset($_POST['txt-idbarang-out']) && $_POST['txt-idbarang-out'] != "" && isset($_POST['txt-jml-out']) && $_POST['txt-jml-out'] != "") {
					
					if ($result = $loading->acc_loading_pembelian_keluar($_POST['txt-id-out'], $_POST['cmb-acc-out'], $_POST['txt-ket-out'], 
					d_code($_SESSION['en-data']), $_POST['txt-idbarang-out'], $_POST['txt-jml-out'])) {
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
					
					if ($result = $loading->acc_loading_pembelian_masuk($_POST['txt-id-in'], $_POST['cmb-acc-in'], $_POST['txt-ket-in'], 
					d_code($_SESSION['en-data']), $_POST['txt-idbarang-in'], $_POST['txt-jml-in'])) {
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