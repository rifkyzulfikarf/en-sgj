<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.loading.php';
		$loading = new loading();
		
		switch ($_POST['apa']) {
			case "get-loading":
				$collect = array();
				
				if (isset($_POST['lo']) && $_POST['lo'] != "") {
					if ($query = $loading->get_loading_by_lo($_POST['lo'])) {
						while ($rs = $query->fetch_array()) {
							$kendaraan = ($rs['nopol']==null)?" ":$rs['nopol'];
							
							$tombol = "";
							if ($rs['nopol'] == null && $rs['jam_kembali'] == "00:00:00") {
								$tombol = "<button type='button' class='btn btn-sm btn-primary' id='btn-show-out' 
										data-id='".$rs["id_pembelian"]."'><i class='fa fa-truck'></i></button>";
							} elseif ($rs['nopol'] != null && $rs['jam_kembali'] == "00:00:00") {
								$tombol = "<button type='button' class='btn btn-sm btn-primary' id='btn-show-in' 
										data-id='".$rs["id_pembelian"]."'><i class='fa fa-truck'></i></button>";
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
			case "get-kendaraan":
				include 'modules/model/class.kendaraan.php';
				$kendaraan = new kendaraan();
				if ($query = $kendaraan->get_kendaraan()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nopol']." ".$rs['keterangan']."</option>";
					}
				}
				break;
			case "get-driver":
				include 'modules/model/class.karyawan.php';
				$driver = new karyawan();
				if ($query = $driver->get_driver()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
					}
				}
				break;
			case "simpan-loading-out":
				$arr=array();
				if (isset($_POST['txt-id-out']) && $_POST['txt-id-out'] != "" && isset($_POST['cmb-kendaraan']) && $_POST['cmb-kendaraan'] != "" && 
				isset($_POST['cmb-driver']) && $_POST['cmb-driver'] != "" && isset($_POST['dp-tgl-loading']) && $_POST['dp-tgl-loading'] != "" && 
				isset($_POST['txt-jam-out']) && $_POST['txt-jam-out'] != "" && isset($_POST['txt-tabung-kosong']) && $_POST['txt-tabung-kosong'] != "") {
					
					if ($result = $loading->input_loading_pembelian_keluar($_POST['txt-id-out'], $_POST['cmb-kendaraan'], 
					$_POST['cmb-driver'], $_POST['dp-tgl-loading'], $_POST['txt-jam-out'], $_POST['txt-tabung-kosong'], 
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