<?php
	//eval(base64_decode("Y2xhc3Mga29uZWtzaSB7DQoJcHVibGljICRrb25lazsNCglmdW5jdGlvbiBfX2NvbnN0cnVjdCgpeyANCgkJJHRoaXMtPmtvbmVrPW5ldyBteXNxbGkoImxvY2FsaG9zdCIsICJyb290IiwgIiIsICJlbmVyZ2FzIik7DQoJCWlmKCR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJubyl7DQoJCQllY2hvICdVbmFibGUgdG8gY29ubmVjdCB0byBkYXRhYmFzZSBbJyAuICR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJvciAuICddJzsNCgkJCWV4aXQoKTsNCgkJfQkJDQoJfSAgICAgIA0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBjb21taXQoKXsgICAgICAgICANCgkJJHRoaXMtPmtvbmVrLT5jb21taXQoKTsNCgl9DQoNCglwdWJsaWMgZnVuY3Rpb24gYXV0b2NvbW1pdCgkYXBhKXsNCgkJJHRoaXMtPmtvbmVrLT5hdXRvY29tbWl0KCRhcGEpOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcm9sbGJhY2soKXsNCgkJJHRoaXMtPmtvbmVrLT5yb2xsYmFjaygpOyAgICAgDQoJfSAgICAgIA0KCQ0KCWZ1bmN0aW9uIF9fZGVzdHJ1Y3QoKXsNCg0KCX0gICAgICAgICAgDQoJDQoJZnVuY3Rpb24gY2xvc2VEQigpew0KCQkkdGhpcy0+a29uZWstPmNsb3NlKCk7DQoJfSAgICAgICAgICANCgkNCglwdWJsaWMgZnVuY3Rpb24gY2xlYXJUZXh0KCR0ZXh0KSB7DQoJCSR0ZXh0ID0gdHJpbSgkdGV4dCk7DQoJCXJldHVybiAkdGhpcy0+a29uZWstPnJlYWxfZXNjYXBlX3N0cmluZygkdGV4dCk7DQoJfSAgICAgICAgDQoJDQoJcHVibGljIGZ1bmN0aW9uIGxhc3RJbnNlcnRJRCgpIHsNCgkJcmV0dXJuICR0aGlzLT5rb25lay0+aW5zZXJ0X2lkOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcnVuUXVlcnkoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7DQoJfQ0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBydW5NdWx0aXBsZVF1ZXJpZXMoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5tdWx0aV9xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7ICAgICANCgl9ICAgICAgICAgDQoJICAgICANCn0gICAgICAgICAgICAgIA0KDQpmdW5jdGlvbiBlbmNyeXB0X2RlY3J5cHQoJGFjdGlvbiwgJHN0cmluZyApIHsgICAgICAgICAgICAgICAgIA0KCWlmKCAkYWN0aW9uID09ICdlbmNyeXB0JyApIHsgICAgICAgICAgICAgICAgICANCgkJJG91dHB1dCA9IGJhc2U2NF9lbmNvZGUoYmFzZTY0X2VuY29kZSgkc3RyaW5nKSk7ICAgICANCgl9IGVsc2UgaWYoICRhY3Rpb24gPT0gJ2RlY3J5cHQnICl7ICAgICAgICAgDQoJCSRvdXRwdXQgPSBiYXNlNjRfZGVjb2RlKGJhc2U2NF9kZWNvZGUoJHN0cmluZykpOyAgICAgDQoJfSAgICAgIA0KCXJldHVybiAkb3V0cHV0OyANCn0gIA0KDQpmdW5jdGlvbiBlX3VybCggJHVybCApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgDQp9ICANCg0KZnVuY3Rpb24gZF91cmwoICR1cmwgKXsgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgIA0KfSAgDQoNCmZ1bmN0aW9uIGVfY29kZSggJHN0cmluZyApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7IA0KfSAgDQoNCmZ1bmN0aW9uIGRfY29kZSggJHN0cmluZyApew0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7DQp9ICAgICAgDQoNCmZ1bmN0aW9uIGNla19sb2dpbigkdXNlciwkcGFzcyl7DQogICAgJGtvbmVrc2kgPSBuZXcga29uZWtzaSgpOw0KCSR1c2VyID0gZV9jb2RlKCR1c2VyKTsNCiAgICAkcGFzcyA9IGVfY29kZSgkcGFzcyk7DQoJDQoJJHFDZWsgPSAiU0VMRUNUIGBwZW1ha2FpYC5gaWRgLCBgcGVtYWthaWAuYGlkX2thcnlhd2FuYCwgYGthcnlhd2FuYC5gbmFtYWAsIGBrYXJ5YXdhbmAuYGlkX2xldmVsYCwgYGthcnlhd2FuYC5gamtgIEZST00gYHBlbWFrYWlgIElOTkVSIEpPSU4gYGthcnlhd2FuYCANCgkJCU9OIChgcGVtYWthaWAuYGlkX2thcnlhd2FuYCA9IGBrYXJ5YXdhbmAuYGlkYCkgV0hFUkUgYHBlbWFrYWlgLmB1c2VyYCA9ICckdXNlcicgQU5EIGBwZW1ha2FpYC5ga3VuY2lgID0gJyRwYXNzJyBBTkQgYHBlbWFrYWlgLmBoYXB1c2AgPSAnMCc7IjsNCgkNCglpZiAoJHJlc0NlayA9ICRrb25la3NpLT5ydW5RdWVyeSgkcUNlaykpIHsNCgkJaWYgKCRyZXNDZWstPm51bV9yb3dzID4gMCkgew0KCQkJJHJzQ2VrID0gJHJlc0Nlay0+ZmV0Y2hfYXJyYXkoKTsNCgkJCQ0KCQkJJF9TRVNTSU9OWydlbi1kYXRhJ10gPSBlX2NvZGUoJHJzQ2VrWydpZF9rYXJ5YXdhbiddKTsNCgkJCSRfU0VTU0lPTlsnZW4tbmFtYSddID0gJHJzQ2VrWyduYW1hJ107DQoJCQkkX1NFU1NJT05bJ2VuLWxldmVsJ10gPSAkcnNDZWtbJ2lkX2xldmVsJ107DQoJCQkkX1NFU1NJT05bJ2VuLWprJ10gPSAkcnNDZWtbJ2prJ107DQoJCQkNCgkJCSRsb2c9JGtvbmVrc2ktPnJ1blF1ZXJ5KCJJTlNFUlQgSU5UTyBgbG9nX2xvZ2luYChgaWRfdXNlcmApIFZBTFVFUyAoJyIuJHJzQ2VrWydpZCddLiInKSIpOw0KCQkJDQoJCQlyZXR1cm4gVFJVRTsNCgkJfSBlbHNlIHsNCgkJCXJldHVybiBGQUxTRTsNCgkJfQ0KCX0gZWxzZSB7DQoJCXJldHVybiBGQUxTRTsNCgl9IA0KfQ=="));

	include("class.bank.php");
	include("class.kasir.php");
	include("class.konsumen.php");
	
	class penjualan extends koneksi {
		
		function autocode_penjualan($tgl, $idBarang) {
			$kode = "";
			$prefix = "";
			
			$prefix = ($idBarang=="1")?"EGN":"SGJ";
			
			$query = "SELECT COUNT(`id`) FROM `penjualan` WHERE `tgl` = '$tgl' AND `id` LIKE '$prefix%';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				switch (strlen($rs[0] + 1)) {
					case 1:
						$kode = $prefix.date("ymd", strtotime($tgl))."0".($rs[0] + 1);
						break;
					case 2:
						$kode = $prefix.date("ymd", strtotime($tgl)).($rs[0] + 1);
						break;
				}
			}
			return $kode;
		}
		
		function get_penjualan($tglAwal, $tglAkhir, $idKonsumen, $metodeBayar, $accGudang, $idSales) {
			$tglAwal = $this->clearText($tglAwal);
			$tglAkhir = $this->clearText($tglAkhir);
			$idKonsumen = $this->clearText($idKonsumen);
			$metodeBayar = $this->clearText($metodeBayar);
			$accGudang = $this->clearText($accGudang);
			$idSales = $this->clearText($idSales);
			
			$query = "SELECT `penjualan`.*, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen`, `gudang`.`nama` AS `nama_gudang`, 
			`pencatat`.`nama` AS `nama_pencatat`, `sales`.`nama` AS `nama_sales` FROM `penjualan` INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
			INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) LEFT JOIN `karyawan` AS `gudang` ON (`penjualan`.`id_gudang` = `gudang`.`id`) 
			INNER JOIN `karyawan` AS `pencatat` ON (`penjualan`.`id_karyawan` = `pencatat`.`id`) INNER JOIN `karyawan` AS `sales` ON (`penjualan`.`id_sales` = `sales`.`id`) 
			WHERE `penjualan`.`id_konsumen` LIKE '$idKonsumen' AND `penjualan`.`metode_bayar` LIKE '$metodeBayar' AND `penjualan`.`acc_gudang` LIKE '$accGudang' 
			AND `penjualan`.`id_sales` LIKE '$idSales' AND `penjualan`.`tgl` BETWEEN '$tglAwal' AND '$tglAkhir';";
			
			if ($list = $this->runQuery($query)) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function transaksi_penjualan($tgl, $idKonsumen, $idBarang, $jmlTabung, $hargaJual, $het, $totalJual, $totalHet, 
		$totalBayar, $jenis, $tglTempo, $idBank, $noBukti, $idSales, $idKaryawan, $nota) {
			$tgl = $this->clearText($tgl);
			$idKonsumen = $this->clearText($idKonsumen);
			$idBarang = $this->clearText($idBarang);
			$jmlTabung = $this->clearText($jmlTabung);
			$hargaJual = $this->clearText($hargaJual);
			$het = $this->clearText($het);
			$totalJual = $this->clearText($totalJual);
			$totalHet = $this->clearText($totalHet);
			$totalBayar = $this->clearText($totalBayar);
			$jenis = $this->clearText($jenis);
			$tglTempo = $this->clearText($tglTempo);
			$idBank = $this->clearText($idBank);
			$noBukti = $this->clearText($noBukti);
			$idSales = $this->clearText($idSales);
			$idKaryawan = $this->clearText($idKaryawan);
			$nota = $this->clearText($nota);
			
			$id = $this->autocode_penjualan($tgl, $idBarang);
			
			if ($jenis != "4") {			//tempo
				$tglTempo = "0000-00-00";
			}
			
			$query = "INSERT INTO `penjualan` VALUES('$id', '$tgl', '$idKonsumen', '$idBarang', '$jmlTabung', '$hargaJual', 
						'$het', '$totalJual', '$totalHet', '$totalBayar', '$jenis', '$tglTempo', '$idBank', '$noBukti', 
						'$idSales', '$idKaryawan', '$nota');";
			$query .= "INSERT INTO `penjualan_acc_gudang`(`id_penjualan`) VALUES('$id');";
			if ($result = $this->runMultipleQueries($query)) {
				if ($jenis == "2" || $jenis == "3") {
					$bank = new bank();
					$hasilBank = $bank->transaksi_setor($idBank, $noBukti, $tgl, "Penjualan ".$id, $totalJual, $idKaryawan);
				} else {
					$hasilBank = TRUE;
				}
				
				if ($hasilBank) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function acc_gudang($idPenjualan, $idBarang, $jml, $acc, $idGudang) {
			$idPenjualan = $this->clearText($idPenjualan);
			$idBarang = $this->clearText($idBarang);
			$jml = $this->clearText($jml);
			$acc = $this->clearText($acc);
			$idGudang = $this->clearText($idGudang);
			
			$query = "UPDATE `penjualan_acc_gudang` SET `acc_gudang` = '$acc', `id_gudang` = '$idGudang' WHERE `id_penjualan` = '$idPenjualan';";
			if ($acc == "1") {
				$query .= "UPDATE `barang` SET `stok_isi` = `stok_isi` - $jml, `stok_kosong` = `stok_kosong` + $jml WHERE `id` = '$idBarang';";
			}
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function setor_bank($id, $bank, $bukti, $total, $idKaryawan) {
			$id = $this->clearText($id);
			$bank = $this->clearText($bank);
			$bukti = $this->clearText($bukti);
			$total = $this->clearText($total);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$tgl = date("Y-m-d");
			$prefixID = substr($id, 0, 3);
			
			if ($prefixID == "EPP") {
				$query = "UPDATE `pelunasan` SET `id_bank` = '$bank', `no_bukti` = '$bukti' WHERE `id` = '$id';";
				$keterangan = "Setoran Pelunasan ".$id;
			} else {
				$query = "UPDATE `penjualan` SET `id_bank` = '$bank', `no_bukti` = '$bukti' WHERE `id` = '$id';";
				$keterangan = "Setoran Penjualan ".$id;
			}
			
			if ($result = $this->runQuery($query)) {
				$cbank = new bank();
				$hasilBank = $cbank->transaksi_setor($bank, $bukti, $tgl, $keterangan, $total, $idKaryawan);
				
				if ($hasilBank) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
	}
	
	//$penjualan = new penjualan();
	// if ($result = $penjualan->transaksi_penjualan("2015-10-03", "4", "1", "90", "14250", "14250", "1282500", "1282500", "2", "3", "ksjs", 
		// "SA", "90", "9", "1")) {
		// echo "TRUE";
	// } else {
		// echo "FALSE";
	// }
	//echo $penjualan->autocode_penjualan();
	
?>