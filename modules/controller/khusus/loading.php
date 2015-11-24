<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.loading_khusus.php';
		$loading = new loading_khusus();
		
		switch ($_POST['apa']) {
			case "get-loading":
				$collect = array();
				
				if (isset($_POST['tgl']) && $_POST['tgl'] != "") {
					if ($query = $loading->get_loading_by_tgl($_POST['tgl'])) {
						while ($rs = $query->fetch_array()) {
							$kendaraan = ($rs['nopol']==null)?" ":$rs['nopol'];
							
							$tombol = "";
							if ($rs['nopol'] != null && $rs['jam_kembali'] == "00:00:00") {
								$tombol = "<button type='button' class='btn btn-sm btn-primary' id='btn-show-in' 
										data-id='".$rs["id"]."'><i class='fa fa-truck'></i></button>";
							}
							
							$driver = ($rs['nama_driver']==null)?" ":$rs['nama_driver'];
							
							$detail = array();
							array_push($detail, $kendaraan." - ".$driver." - ".$rs['nama_barang']);
							array_push($detail, $rs["tgl_loading"]);
							array_push($detail, $rs["jam_berangkat"]);
							array_push($detail, $rs["tabung_kosong"]);
							array_push($detail, $rs["jam_kembali"]);
							array_push($detail, $rs["tabung_isi"]);
							array_push($detail, $tombol);
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				
				echo json_encode(array("aaData"=>$collect));
				break;
			case "simpan-loading-out":
				$arr=array();
				if (isset($_POST['cmb-kendaraan']) && $_POST['cmb-kendaraan'] != "" && isset($_POST['cmb-driver']) && $_POST['cmb-driver'] != "" && 
				isset($_POST['cmb-barang']) && $_POST['cmb-barang'] != "" && isset($_POST['dp-tgl-loading']) && $_POST['dp-tgl-loading'] != "" && 
				isset($_POST['txt-jam-out']) && $_POST['txt-jam-out'] != "" && isset($_POST['txt-tabung-kosong']) && $_POST['txt-tabung-kosong'] != "") {
					
					if ($result = $loading->input_loading_pembelian_keluar($_POST['cmb-kendaraan'], $_POST['cmb-driver'], 
					$_POST['cmb-barang'], $_POST['dp-tgl-loading'], $_POST['txt-jam-out'], $_POST['txt-tabung-kosong'], 
					d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Sukses menyimpan..";
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
			case "simpan-loading-in":
				$arr=array();
				if (isset($_POST['txt-id-in']) && $_POST['txt-id-in'] != "" && isset($_POST['txt-jam-in']) && $_POST['txt-jam-in'] != "" && 
				isset($_POST['txt-tabung-isi']) && $_POST['txt-tabung-isi'] != "") {
					
					if ($result = $loading->input_loading_pembelian_masuk($_POST['txt-id-in'], $_POST['txt-jam-in'], 
					$_POST['txt-tabung-isi'], d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Sukses menyimpan..";
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