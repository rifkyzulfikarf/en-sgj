<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.penjualan.php';
		$penjualan = new penjualan();
		
		switch ($_POST['apa']) {
			case "get-sales":
				include 'modules/model/class.karyawan.php';
				$karyawan = new karyawan();
				if ($query = $karyawan->get_karyawan()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
					}
				}
				break;
			case "get-barang":
				include 'modules/model/class.barang.php';
				$barang = new barang();
				if ($query = $barang->get_barang()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."' data-het='".$rs['het']."'>".$rs['nama']."</option>";
					}
				}
				break;
			case "get-konsumen":
				$konsumen = new konsumen();
				if ($query = $konsumen->get_konsumen()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
					}
				}
				break;
			case "get-bank":
				$bank = new bank();
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']." ".$rs['nomor_rekening']."</option>";
					}
				}
				break;
			case "get-kuota-harga":
				$konsumen = new konsumen();
				$arr=array();
				
				if (isset($_POST['konsumen']) && $_POST['konsumen'] != "" && isset($_POST['barang']) && $_POST['barang'] != "" && 
				isset($_POST['tgl']) && $_POST['tgl'] != "") {
					if ($query = $konsumen->get_harga_jual($_POST['konsumen'])) {
						$rs = $query->fetch_array();
						$arr['status']=TRUE;
						
						if ($_POST['barang'] == "1") {
							$arr['harga'] = ($rs['harga_3kg'] != null)?$rs['harga_3kg']:0;
							
							if ($kuota = $konsumen->get_kuota_jual($_POST['konsumen'], $_POST['tgl'], $_POST['tgl'])) {
								$rsKuota = $kuota->fetch_array();
								$arr['kuota'] = ($rsKuota['jml_alokasi'] != null)?$rsKuota['jml_alokasi']:0;
							}
							
							$qCek = "SELECT SUM(`jml`) FROM `penjualan` WHERE `id_konsumen` = '".$_POST['konsumen']."' AND 
							`tgl` = '".$_POST['tgl']."' AND `id_barang` = '".$_POST['barang']."';";
							if ($resCek = $konsumen->runQuery($qCek)) {
								$rsCek = $resCek->fetch_array();
								$arr['kuota'] = $arr['kuota'] - $rsCek[0];
							}
							
						} elseif($_POST['barang'] == "2") {
							$arr['harga'] = ($rs['harga_12kg'] != null)?$rs['harga_12kg']:0;
							$arr['kuota'] = 0;
						} elseif($_POST['barang'] == "3") {
							$arr['harga'] = ($rs['harga_50kg'] != null)?$rs['harga_50kg']:0;
							$arr['kuota'] = 0;
						} elseif($_POST['barang'] == "4") {
							$arr['harga'] = ($rs['harga_12kg_bg'] != null)?$rs['harga_12kg_bg']:0;
							$arr['kuota'] = 0;
						}
					}
				} else {
					$arr['status']=FALSE;
					$arr['msg']="Harap isi data dengan lengkap..";
				}
				
				echo json_encode($arr);
				break;
			case "simpan":
				$arr=array();
				if (isset($_POST['tgl']) && $_POST['tgl'] != "" && isset($_POST['sales']) && $_POST['sales'] != "" && 
				isset($_POST['barang']) && $_POST['barang'] != "" && isset($_POST['konsumen']) && $_POST['konsumen'] != "" && 
				isset($_POST['jml']) && $_POST['jml'] != "" && isset($_POST['hargaJual']) && $_POST['hargaJual'] != "" && 
				isset($_POST['het']) && $_POST['het'] != "" && isset($_POST['total']) && $_POST['total'] != "" && 
				isset($_POST['jenis']) && $_POST['jenis'] != "" && isset($_POST['nota']) && $_POST['nota'] != "") {
					
					if ($_POST['jenis'] == '4') {
						$tempo = $_POST['tempo'];
						$bank = "0";
						$bukti = "-";
						$totalBayar = 0;
					} else {
						$tempo = '0000-00-00';
						$bank = $_POST['bank'];
						$bukti = $_POST['bukti'];
						$totalBayar = $_POST['total'];
					}
					
					if ($result = $penjualan->transaksi_penjualan($_POST['tgl'], $_POST['konsumen'], $_POST['barang'], $_POST['jml'], 
					$_POST['hargaJual'], $_POST['het'], $_POST['total'], $_POST['total'], $totalBayar, $_POST['jenis'], $tempo, 
					$bank, $bukti, $_POST['sales'], d_code($_SESSION['en-data']), $_POST['nota'])) {
						$arr['status']=TRUE;
						$arr['msg']="Transaksi sukses tersimpan..";
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