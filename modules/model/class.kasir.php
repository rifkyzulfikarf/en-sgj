<?php

	//eval(base64_decode("Y2xhc3Mga29uZWtzaSB7DQoJcHVibGljICRrb25lazsNCglmdW5jdGlvbiBfX2NvbnN0cnVjdCgpeyANCgkJJHRoaXMtPmtvbmVrPW5ldyBteXNxbGkoImxvY2FsaG9zdCIsICJyb290IiwgIiIsICJlbmVyZ2FzIik7DQoJCWlmKCR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJubyl7DQoJCQllY2hvICdVbmFibGUgdG8gY29ubmVjdCB0byBkYXRhYmFzZSBbJyAuICR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJvciAuICddJzsNCgkJCWV4aXQoKTsNCgkJfQkJDQoJfSAgICAgIA0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBjb21taXQoKXsgICAgICAgICANCgkJJHRoaXMtPmtvbmVrLT5jb21taXQoKTsNCgl9DQoNCglwdWJsaWMgZnVuY3Rpb24gYXV0b2NvbW1pdCgkYXBhKXsNCgkJJHRoaXMtPmtvbmVrLT5hdXRvY29tbWl0KCRhcGEpOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcm9sbGJhY2soKXsNCgkJJHRoaXMtPmtvbmVrLT5yb2xsYmFjaygpOyAgICAgDQoJfSAgICAgIA0KCQ0KCWZ1bmN0aW9uIF9fZGVzdHJ1Y3QoKXsNCg0KCX0gICAgICAgICAgDQoJDQoJZnVuY3Rpb24gY2xvc2VEQigpew0KCQkkdGhpcy0+a29uZWstPmNsb3NlKCk7DQoJfSAgICAgICAgICANCgkNCglwdWJsaWMgZnVuY3Rpb24gY2xlYXJUZXh0KCR0ZXh0KSB7DQoJCSR0ZXh0ID0gdHJpbSgkdGV4dCk7DQoJCXJldHVybiAkdGhpcy0+a29uZWstPnJlYWxfZXNjYXBlX3N0cmluZygkdGV4dCk7DQoJfSAgICAgICAgDQoJDQoJcHVibGljIGZ1bmN0aW9uIGxhc3RJbnNlcnRJRCgpIHsNCgkJcmV0dXJuICR0aGlzLT5rb25lay0+aW5zZXJ0X2lkOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcnVuUXVlcnkoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7DQoJfQ0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBydW5NdWx0aXBsZVF1ZXJpZXMoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5tdWx0aV9xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7ICAgICANCgl9ICAgICAgICAgDQoJICAgICANCn0gICAgICAgICAgICAgIA0KDQpmdW5jdGlvbiBlbmNyeXB0X2RlY3J5cHQoJGFjdGlvbiwgJHN0cmluZyApIHsgICAgICAgICAgICAgICAgIA0KCWlmKCAkYWN0aW9uID09ICdlbmNyeXB0JyApIHsgICAgICAgICAgICAgICAgICANCgkJJG91dHB1dCA9IGJhc2U2NF9lbmNvZGUoYmFzZTY0X2VuY29kZSgkc3RyaW5nKSk7ICAgICANCgl9IGVsc2UgaWYoICRhY3Rpb24gPT0gJ2RlY3J5cHQnICl7ICAgICAgICAgDQoJCSRvdXRwdXQgPSBiYXNlNjRfZGVjb2RlKGJhc2U2NF9kZWNvZGUoJHN0cmluZykpOyAgICAgDQoJfSAgICAgIA0KCXJldHVybiAkb3V0cHV0OyANCn0gIA0KDQpmdW5jdGlvbiBlX3VybCggJHVybCApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgDQp9ICANCg0KZnVuY3Rpb24gZF91cmwoICR1cmwgKXsgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgIA0KfSAgDQoNCmZ1bmN0aW9uIGVfY29kZSggJHN0cmluZyApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7IA0KfSAgDQoNCmZ1bmN0aW9uIGRfY29kZSggJHN0cmluZyApew0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7DQp9ICAgICAgDQoNCmZ1bmN0aW9uIGNla19sb2dpbigkdXNlciwkcGFzcyl7DQogICAgJGtvbmVrc2kgPSBuZXcga29uZWtzaSgpOw0KCSR1c2VyID0gZV9jb2RlKCR1c2VyKTsNCiAgICAkcGFzcyA9IGVfY29kZSgkcGFzcyk7DQoJDQoJJHFDZWsgPSAiU0VMRUNUIGBwZW1ha2FpYC5gaWRgLCBgcGVtYWthaWAuYGlkX2thcnlhd2FuYCwgYGthcnlhd2FuYC5gbmFtYWAsIGBrYXJ5YXdhbmAuYGlkX2xldmVsYCwgYGthcnlhd2FuYC5gamtgIEZST00gYHBlbWFrYWlgIElOTkVSIEpPSU4gYGthcnlhd2FuYCANCgkJCU9OIChgcGVtYWthaWAuYGlkX2thcnlhd2FuYCA9IGBrYXJ5YXdhbmAuYGlkYCkgV0hFUkUgYHBlbWFrYWlgLmB1c2VyYCA9ICckdXNlcicgQU5EIGBwZW1ha2FpYC5ga3VuY2lgID0gJyRwYXNzJyBBTkQgYHBlbWFrYWlgLmBoYXB1c2AgPSAnMCc7IjsNCgkNCglpZiAoJHJlc0NlayA9ICRrb25la3NpLT5ydW5RdWVyeSgkcUNlaykpIHsNCgkJaWYgKCRyZXNDZWstPm51bV9yb3dzID4gMCkgew0KCQkJJHJzQ2VrID0gJHJlc0Nlay0+ZmV0Y2hfYXJyYXkoKTsNCgkJCQ0KCQkJJF9TRVNTSU9OWydlbi1kYXRhJ10gPSBlX2NvZGUoJHJzQ2VrWydpZF9rYXJ5YXdhbiddKTsNCgkJCSRfU0VTU0lPTlsnZW4tbmFtYSddID0gJHJzQ2VrWyduYW1hJ107DQoJCQkkX1NFU1NJT05bJ2VuLWxldmVsJ10gPSAkcnNDZWtbJ2lkX2xldmVsJ107DQoJCQkkX1NFU1NJT05bJ2VuLWprJ10gPSAkcnNDZWtbJ2prJ107DQoJCQkNCgkJCSRsb2c9JGtvbmVrc2ktPnJ1blF1ZXJ5KCJJTlNFUlQgSU5UTyBgbG9nX2xvZ2luYChgaWRfdXNlcmApIFZBTFVFUyAoJyIuJHJzQ2VrWydpZCddLiInKSIpOw0KCQkJDQoJCQlyZXR1cm4gVFJVRTsNCgkJfSBlbHNlIHsNCgkJCXJldHVybiBGQUxTRTsNCgkJfQ0KCX0gZWxzZSB7DQoJCXJldHVybiBGQUxTRTsNCgl9IA0KfQ=="));

	class kasir extends koneksi {
	
		function get_kasir() {
			$query = "SELECT `kasir`.`id`, `kasir`.`nama`, `kasir`.`saldo` FROM `kasir` WHERE `kasir`.`hapus` = '0';";
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
		
		function tambah_baru($nama) {
			$nama = $this->clearText($nama);
			
			if ($result = $this->runQuery("INSERT INTO `kasir`(`nama`, `saldo`, `hapus`) VALUES('$nama', '0', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus_data($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `kasir` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function get_saldo($id) {
			$saldo = 0;
			$query = "SELECT `saldo` FROM `kasir` WHERE `id` = '$id';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				$saldo = $rs[0];
			}
			return $saldo;
		}
		
		function autocode_on_history($idKasir) {
			$kode = "";
			
			$prefix = ($idKasir=="1")?"KKE":"KKS";
			
			$query = "SELECT MAX(`id`) FROM `kas_kecil` WHERE `tgl` = '".date("Y-m-d")."' AND `id` LIKE '$prefix%';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				if ($rs[0] == null) {
					$kode = $prefix.date("ymd")."0001";
				} else {
					$lastCode = substr($rs[0], 9, 4);
					$newCode = $lastCode + 1;
					
					switch (strlen($newCode)) {
						case 1:
							$kode = $prefix.date("ymd")."000".$newCode;
							break;
						case 2:
							$kode = $prefix.date("ymd")."00".$newCode;
							break;
						case 3:
							$kode = $prefix.date("ymd")."0".$newCode;
							break;
						case 4:
							$kode = $prefix.date("ymd").$newCode;
							break;
					}
				}
			}
			return $kode;
		}
		
		function transaksi_debet($idKasir, $noBukti, $tgl, $keterangan, $kodeAkun, $debet, $idKaryawan) {
			$idKasir = $this->clearText($idKasir);
			$noBukti = $this->clearText($noBukti);
			$tgl = $this->clearText($tgl);
			$keterangan = $this->clearText($keterangan);
			$kodeAkun = $this->clearText($kodeAkun);
			$debet = $this->clearText($debet);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$id = $this->autocode_on_history($idKasir);
			$saldoAwal = $this->get_saldo($idKasir);
			$saldoAkhir = $saldoAwal + $debet;
			
			$query = "INSERT INTO `kas_kecil`(`id`, `id_kasir`, `no_bukti`, `tgl`, `keterangan`, `kode_akun`, `debet`, `kredit`, `saldo`, `id_karyawan`) 
						VALUES('$id', '$idKasir', '$noBukti', '$tgl', '$keterangan', '$kodeAkun', '$debet', '0', '$saldoAkhir', '$idKaryawan');";
			$query .= "UPDATE `kasir` SET `saldo` = '$saldoAkhir' WHERE `id` = '$idKasir';";
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function transaksi_kredit($idKasir, $noBukti, $tgl, $keterangan, $kodeAkun, $kredit, $idKaryawan) {
			$idKasir = $this->clearText($idKasir);
			$noBukti = $this->clearText($noBukti);
			$tgl = $this->clearText($tgl);
			$keterangan = $this->clearText($keterangan);
			$kodeAkun = $this->clearText($kodeAkun);
			$kredit = $this->clearText($kredit);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$id = $this->autocode_on_history();
			$saldoAwal = $this->get_saldo($idKasir);
			$saldoAkhir = $saldoAwal - $kredit;
			
			$query = "INSERT INTO `kas_kecil`(`id`, `id_kasir`, `no_bukti`, `tgl`, `keterangan`, `kode_akun`, `debet`, `kredit`, `saldo`, `id_karyawan`) 
						VALUES('$id', '$idKasir', '$noBukti', '$tgl', '$keterangan', '$kodeAkun', '0', '$kredit', '$saldoAkhir', '$idKaryawan');";
			$query .= "UPDATE `kasir` SET `saldo` = '$saldoAkhir' WHERE `id` = '$idKasir';";
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function get_kas_kecil_by_id($id) {
			$id = $this->clearText($id);
			
			$query = "SELECT * FROM `kas_kecil` WHERE `kas_kecil`.`id` = '$id';";
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
		
		function kas_kecil_hapus($id, $debet, $kredit, $idKasir) {
			$id = $this->clearText($id);
			$debet = $this->clearText($debet);
			$kredit = $this->clearText($kredit);
			$idKasir = $this->clearText($idKasir);
			
			$revisiJumlah = 0;
			$saldoAkhir = 0;
			$query = "";
			
			if ($debet != 0) {
				$revisiJumlah = $debet;
				$query = "UPDATE `kas_kecil` SET `saldo` = `saldo` - $revisiJumlah WHERE `id` > '$id' AND id_kasir = '$idKasir';";
				$query .= "UPDATE `kasir` SET `saldo` = `saldo` - $revisiJumlah WHERE `id` = '$idKasir';";
			} else {
				$revisiJumlah = $kredit;
				$query = "UPDATE `kas_kecil` SET `saldo` = `saldo` + $revisiJumlah WHERE `id` > '$id' AND id_kasir = '$idKasir';";
				$query .= "UPDATE `kasir` SET `saldo` = `saldo` + $revisiJumlah WHERE `id` = '$idKasir';";
			}
			
			$query .= "DELETE FROM `kas_kecil` WHERE `id` = '$id';";
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
	
	// $kasir = new kasir();
	// if ($result = $kasir->transaksi_debet("3", "kwd87", "2015-10-07", "kwf84", "SA", 1282500, "1")) {
		// echo "TRUE";
	// } else {
		// echo "FALSE";
	// }
	
?>