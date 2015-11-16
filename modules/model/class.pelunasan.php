<?php
	//eval(base64_decode("Y2xhc3Mga29uZWtzaSB7DQoJcHVibGljICRrb25lazsNCglmdW5jdGlvbiBfX2NvbnN0cnVjdCgpeyANCgkJJHRoaXMtPmtvbmVrPW5ldyBteXNxbGkoImxvY2FsaG9zdCIsICJyb290IiwgIiIsICJlbnNnaiIpOw0KCQlpZigkdGhpcy0+a29uZWstPmNvbm5lY3RfZXJybm8pew0KCQkJZWNobyAnVW5hYmxlIHRvIGNvbm5lY3QgdG8gZGF0YWJhc2UgWycgLiAkdGhpcy0+a29uZWstPmNvbm5lY3RfZXJyb3IgLiAnXSc7DQoJCQlleGl0KCk7DQoJCX0JCQ0KCX0gICAgICANCgkNCglwdWJsaWMgZnVuY3Rpb24gY29tbWl0KCl7ICAgICAgICAgDQoJCSR0aGlzLT5rb25lay0+Y29tbWl0KCk7DQoJfQ0KDQoJcHVibGljIGZ1bmN0aW9uIGF1dG9jb21taXQoJGFwYSl7DQoJCSR0aGlzLT5rb25lay0+YXV0b2NvbW1pdCgkYXBhKTsNCgl9DQoJDQoJcHVibGljIGZ1bmN0aW9uIHJvbGxiYWNrKCl7DQoJCSR0aGlzLT5rb25lay0+cm9sbGJhY2soKTsgICAgIA0KCX0gICAgICANCgkNCglmdW5jdGlvbiBfX2Rlc3RydWN0KCl7DQoNCgl9ICAgICAgICAgIA0KCQ0KCWZ1bmN0aW9uIGNsb3NlREIoKXsNCgkJJHRoaXMtPmtvbmVrLT5jbG9zZSgpOw0KCX0gICAgICAgICAgDQoJDQoJcHVibGljIGZ1bmN0aW9uIGNsZWFyVGV4dCgkdGV4dCkgew0KCQkkdGV4dCA9IHRyaW0oJHRleHQpOw0KCQlyZXR1cm4gJHRoaXMtPmtvbmVrLT5yZWFsX2VzY2FwZV9zdHJpbmcoJHRleHQpOw0KCX0gICAgICAgIA0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBsYXN0SW5zZXJ0SUQoKSB7DQoJCXJldHVybiAkdGhpcy0+a29uZWstPmluc2VydF9pZDsNCgl9DQoJDQoJcHVibGljIGZ1bmN0aW9uIHJ1blF1ZXJ5KCRxcnkpIHsNCgkJJHJlc3VsdCA9ICR0aGlzLT5rb25lay0+cXVlcnkoJHFyeSk7DQoJCXJldHVybiAkcmVzdWx0Ow0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcnVuTXVsdGlwbGVRdWVyaWVzKCRxcnkpIHsNCgkJJHJlc3VsdCA9ICR0aGlzLT5rb25lay0+bXVsdGlfcXVlcnkoJHFyeSk7DQoJCXJldHVybiAkcmVzdWx0OyAgICAgDQoJfSAgICAgICAgIA0KCSAgICAgDQp9ICAgICAgICAgICAgICANCg0KZnVuY3Rpb24gZW5jcnlwdF9kZWNyeXB0KCRhY3Rpb24sICRzdHJpbmcgKSB7ICAgICAgICAgICAgICAgICANCglpZiggJGFjdGlvbiA9PSAnZW5jcnlwdCcgKSB7ICAgICAgICAgICAgICAgICAgDQoJCSRvdXRwdXQgPSBiYXNlNjRfZW5jb2RlKGJhc2U2NF9lbmNvZGUoJHN0cmluZykpOyAgICAgDQoJfSBlbHNlIGlmKCAkYWN0aW9uID09ICdkZWNyeXB0JyApeyAgICAgICAgIA0KCQkkb3V0cHV0ID0gYmFzZTY0X2RlY29kZShiYXNlNjRfZGVjb2RlKCRzdHJpbmcpKTsgICAgIA0KCX0gICAgICANCglyZXR1cm4gJG91dHB1dDsgDQp9ICANCg0KZnVuY3Rpb24gZV91cmwoICR1cmwgKXsgICAgICANCgkkb3V0cHV0PWh0bWxzcGVjaWFsY2hhcnMoIGVuY3J5cHRfZGVjcnlwdCgnZW5jcnlwdCcsICR1cmwgKSApOyAgICAgDQoJcmV0dXJuICRvdXRwdXQ7IA0KfSAgDQoNCmZ1bmN0aW9uIGRfdXJsKCAkdXJsICl7ICAgICANCgkkb3V0cHV0PWh0bWxzcGVjaWFsY2hhcnMoIGVuY3J5cHRfZGVjcnlwdCgnZGVjcnlwdCcsICR1cmwgKSApOyAgICAgDQoJcmV0dXJuICRvdXRwdXQ7ICANCn0gIA0KDQpmdW5jdGlvbiBlX2NvZGUoICRzdHJpbmcgKXsgICAgICANCgkkb3V0cHV0PWh0bWxzcGVjaWFsY2hhcnMoIGVuY3J5cHRfZGVjcnlwdCgnZW5jcnlwdCcsICRzdHJpbmcgKSApOw0KCXJldHVybiAkb3V0cHV0OyANCn0gIA0KDQpmdW5jdGlvbiBkX2NvZGUoICRzdHJpbmcgKXsNCgkkb3V0cHV0PWh0bWxzcGVjaWFsY2hhcnMoIGVuY3J5cHRfZGVjcnlwdCgnZGVjcnlwdCcsICRzdHJpbmcgKSApOw0KCXJldHVybiAkb3V0cHV0Ow0KfSAgICAgIA0KDQpmdW5jdGlvbiBjZWtfbG9naW4oJHVzZXIsJHBhc3Mpew0KICAgICRrb25la3NpID0gbmV3IGtvbmVrc2koKTsNCgkkdXNlciA9IGVfY29kZSgkdXNlcik7DQogICAgJHBhc3MgPSBlX2NvZGUoJHBhc3MpOw0KCQ0KCSRxQ2VrID0gIlNFTEVDVCBgcGVtYWthaWAuYGlkYCwgYHBlbWFrYWlgLmBpZF9rYXJ5YXdhbmAsIGBrYXJ5YXdhbmAuYG5hbWFgLCBga2FyeWF3YW5gLmBpZF9sZXZlbGAsIGBrYXJ5YXdhbmAuYGprYCBGUk9NIGBwZW1ha2FpYCBJTk5FUiBKT0lOIGBrYXJ5YXdhbmAgDQoJCQlPTiAoYHBlbWFrYWlgLmBpZF9rYXJ5YXdhbmAgPSBga2FyeWF3YW5gLmBpZGApIFdIRVJFIGBwZW1ha2FpYC5gdXNlcmAgPSAnJHVzZXInIEFORCBgcGVtYWthaWAuYGt1bmNpYCA9ICckcGFzcycgQU5EIGBwZW1ha2FpYC5gaGFwdXNgID0gJzAnOyI7DQoJDQoJaWYgKCRyZXNDZWsgPSAka29uZWtzaS0+cnVuUXVlcnkoJHFDZWspKSB7DQoJCWlmICgkcmVzQ2VrLT5udW1fcm93cyA+IDApIHsNCgkJCSRyc0NlayA9ICRyZXNDZWstPmZldGNoX2FycmF5KCk7DQoJCQkNCgkJCSRfU0VTU0lPTlsnZW4tZGF0YSddID0gZV9jb2RlKCRyc0Nla1snaWRfa2FyeWF3YW4nXSk7DQoJCQkkX1NFU1NJT05bJ2VuLW5hbWEnXSA9ICRyc0Nla1snbmFtYSddOw0KCQkJJF9TRVNTSU9OWydlbi1sZXZlbCddID0gJHJzQ2VrWydpZF9sZXZlbCddOw0KCQkJJF9TRVNTSU9OWydlbi1qayddID0gJHJzQ2VrWydqayddOw0KCQkJDQoJCQkkbG9nPSRrb25la3NpLT5ydW5RdWVyeSgiSU5TRVJUIElOVE8gYGxvZ19sb2dpbmAoYGlkX3VzZXJgKSBWQUxVRVMgKCciLiRyc0Nla1snaWQnXS4iJykiKTsNCgkJCQ0KCQkJcmV0dXJuIFRSVUU7DQoJCX0gZWxzZSB7DQoJCQlyZXR1cm4gRkFMU0U7DQoJCX0NCgl9IGVsc2Ugew0KCQlyZXR1cm4gRkFMU0U7DQoJfSANCn0="));

	include("class.bank.php");
	
	class pelunasan extends koneksi {
		
		function autocode_pelunasan($tgl) {
			$kode = "";
			$query = "SELECT COUNT(`id`) FROM `pelunasan` WHERE `tgl` = '$tgl';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				switch (strlen($rs[0] + 1)) {
					case 1:
						$kode = "EPP".date("ymd", strtotime($tgl))."000".($rs[0] + 1);
						break;
					case 2:
						$kode = "EPP".date("ymd", strtotime($tgl))."00".($rs[0] + 1);
						break;
					case 3:
						$kode = "EPP".date("ymd", strtotime($tgl))."0".($rs[0] + 1);
						break;
					case 4:
						$kode = "EPP".date("ymd", strtotime($tgl)).($rs[0] + 1);
						break;
				}
			}
			return $kode;
		}
		
		function get_penjualan_belum_lunas($tglAwal, $tglAkhir) {
			$tglAwal = $this->clearText($tglAwal);
			$tglAkhir = $this->clearText($tglAkhir);
			
			$query = "SELECT `penjualan`.*, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen`, 
			`sales`.`nama` AS `nama_sales` FROM `penjualan` INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
			INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
			INNER JOIN `karyawan` AS `sales` ON (`penjualan`.`id_sales` = `sales`.`id`) 
			WHERE `penjualan`.`jenis` = '4' AND `penjualan`.`total_bayar` < `penjualan`.`total_jual` 
			AND `penjualan`.`tgl_tempo` BETWEEN '$tglAwal' AND '$tglAkhir';";
			
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
		
		function get_bg_belum_ambil($tglAwal, $tglAkhir) {
			$tglAwal = $this->clearText($tglAwal);
			$tglAkhir = $this->clearText($tglAkhir);
			
			$query = "SELECT `pelunasan`.*, `konsumen`.`nama` FROM `pelunasan` 
					INNER JOIN `penjualan` ON (`pelunasan`.`id_penjualan` = `penjualan`.`id`) 
					INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) WHERE `pelunasan`.`jenis` = '4' AND 
					`pelunasan`.`ambil_bg` = '0' AND `pelunasan`.`tgl_bg` BETWEEN '$tglAwal' AND '$tglAkhir';";
			
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
		
		function bayar_pelunasan($idPenjualan, $tgl, $totalBayar, $jenis, $tglBg, $idBank, $noBukti, $idKaryawan){
			$idPenjualan = $this->clearText($idPenjualan);
			$tgl = $this->clearText($tgl);
			$totalBayar = $this->clearText($totalBayar);
			$jenis = $this->clearText($jenis);
			$tglBg = $this->clearText($tglBg);
			$idBank = $this->clearText($idBank);
			$noBukti = $this->clearText($noBukti);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$id = $this->autocode_pelunasan($tgl);
			$ambilBg = "0";
			
			if ($jenis != "4") {
				$tglBg = "0000-00-00";
				$ambilBg = "1";
			}
			
			$query = "INSERT INTO `pelunasan` VALUES('$id', '$idPenjualan', '$tgl', '$totalBayar', '$jenis', '$tglBg', 
			'$ambilBg', '$idBank', '$noBukti', '$idKaryawan');";
			$query .= "UPDATE `penjualan` SET `total_bayar` = `total_bayar` + '$totalBayar' WHERE `id` = '$idPenjualan';";
			
			if ($result = $this->runMultipleQueries($query)) {
				if ($jenis == "2" || $jenis == "3") {
					$bank = new bank();
					$hasilBank = $bank->transaksi_setor($idBank, $noBukti, $tgl, "Piutang ".$id, $totalBayar, $idKaryawan);
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
		
		function ambil_bg($idPelunasan, $tglBg, $totalBayar, $idBank, $bukti, $idKaryawan){
			$idPelunasan = $this->clearText($idPelunasan);
			$tglBg = $this->clearText($tglBg);
			$totalBayar = $this->clearText($totalBayar);
			$idBank = $this->clearText($idBank);
			$bukti = $this->clearText($bukti);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$query = "UPDATE `pelunasan` SET `ambil_bg` = '1' WHERE `id` = '$idPelunasan';";
			
			if ($result = $this->runQuery($query)) {
				$bank = new bank();
				$hasilBank = $bank->transaksi_setor($idBank, $bukti, $tglBg, "Pencairan BG ".$bukti, $totalBayar, $idKaryawan);
				
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
	
?>