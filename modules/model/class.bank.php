<?php
	//eval(base64_decode("Y2xhc3Mga29uZWtzaSB7DQoJcHVibGljICRrb25lazsNCglmdW5jdGlvbiBfX2NvbnN0cnVjdCgpeyANCgkJJHRoaXMtPmtvbmVrPW5ldyBteXNxbGkoImxvY2FsaG9zdCIsICJyb290IiwgIiIsICJlbmVyZ2FzIik7DQoJCWlmKCR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJubyl7DQoJCQllY2hvICdVbmFibGUgdG8gY29ubmVjdCB0byBkYXRhYmFzZSBbJyAuICR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJvciAuICddJzsNCgkJCWV4aXQoKTsNCgkJfQkJDQoJfSAgICAgIA0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBjb21taXQoKXsgICAgICAgICANCgkJJHRoaXMtPmtvbmVrLT5jb21taXQoKTsNCgl9DQoNCglwdWJsaWMgZnVuY3Rpb24gYXV0b2NvbW1pdCgkYXBhKXsNCgkJJHRoaXMtPmtvbmVrLT5hdXRvY29tbWl0KCRhcGEpOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcm9sbGJhY2soKXsNCgkJJHRoaXMtPmtvbmVrLT5yb2xsYmFjaygpOyAgICAgDQoJfSAgICAgIA0KCQ0KCWZ1bmN0aW9uIF9fZGVzdHJ1Y3QoKXsNCg0KCX0gICAgICAgICAgDQoJDQoJZnVuY3Rpb24gY2xvc2VEQigpew0KCQkkdGhpcy0+a29uZWstPmNsb3NlKCk7DQoJfSAgICAgICAgICANCgkNCglwdWJsaWMgZnVuY3Rpb24gY2xlYXJUZXh0KCR0ZXh0KSB7DQoJCSR0ZXh0ID0gdHJpbSgkdGV4dCk7DQoJCXJldHVybiAkdGhpcy0+a29uZWstPnJlYWxfZXNjYXBlX3N0cmluZygkdGV4dCk7DQoJfSAgICAgICAgDQoJDQoJcHVibGljIGZ1bmN0aW9uIGxhc3RJbnNlcnRJRCgpIHsNCgkJcmV0dXJuICR0aGlzLT5rb25lay0+aW5zZXJ0X2lkOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcnVuUXVlcnkoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7DQoJfQ0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBydW5NdWx0aXBsZVF1ZXJpZXMoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5tdWx0aV9xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7ICAgICANCgl9ICAgICAgICAgDQoJICAgICANCn0gICAgICAgICAgICAgIA0KDQpmdW5jdGlvbiBlbmNyeXB0X2RlY3J5cHQoJGFjdGlvbiwgJHN0cmluZyApIHsgICAgICAgICAgICAgICAgIA0KCWlmKCAkYWN0aW9uID09ICdlbmNyeXB0JyApIHsgICAgICAgICAgICAgICAgICANCgkJJG91dHB1dCA9IGJhc2U2NF9lbmNvZGUoYmFzZTY0X2VuY29kZSgkc3RyaW5nKSk7ICAgICANCgl9IGVsc2UgaWYoICRhY3Rpb24gPT0gJ2RlY3J5cHQnICl7ICAgICAgICAgDQoJCSRvdXRwdXQgPSBiYXNlNjRfZGVjb2RlKGJhc2U2NF9kZWNvZGUoJHN0cmluZykpOyAgICAgDQoJfSAgICAgIA0KCXJldHVybiAkb3V0cHV0OyANCn0gIA0KDQpmdW5jdGlvbiBlX3VybCggJHVybCApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgDQp9ICANCg0KZnVuY3Rpb24gZF91cmwoICR1cmwgKXsgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgIA0KfSAgDQoNCmZ1bmN0aW9uIGVfY29kZSggJHN0cmluZyApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7IA0KfSAgDQoNCmZ1bmN0aW9uIGRfY29kZSggJHN0cmluZyApew0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7DQp9ICAgICAgDQoNCmZ1bmN0aW9uIGNla19sb2dpbigkdXNlciwkcGFzcyl7DQogICAgJGtvbmVrc2kgPSBuZXcga29uZWtzaSgpOw0KCSR1c2VyID0gZV9jb2RlKCR1c2VyKTsNCiAgICAkcGFzcyA9IGVfY29kZSgkcGFzcyk7DQoJDQoJJHFDZWsgPSAiU0VMRUNUIGBwZW1ha2FpYC5gaWRgLCBgcGVtYWthaWAuYGlkX2thcnlhd2FuYCwgYGthcnlhd2FuYC5gbmFtYWAsIGBrYXJ5YXdhbmAuYGlkX2xldmVsYCwgYGthcnlhd2FuYC5gamtgIEZST00gYHBlbWFrYWlgIElOTkVSIEpPSU4gYGthcnlhd2FuYCANCgkJCU9OIChgcGVtYWthaWAuYGlkX2thcnlhd2FuYCA9IGBrYXJ5YXdhbmAuYGlkYCkgV0hFUkUgYHBlbWFrYWlgLmB1c2VyYCA9ICckdXNlcicgQU5EIGBwZW1ha2FpYC5ga3VuY2lgID0gJyRwYXNzJyBBTkQgYHBlbWFrYWlgLmBoYXB1c2AgPSAnMCc7IjsNCgkNCglpZiAoJHJlc0NlayA9ICRrb25la3NpLT5ydW5RdWVyeSgkcUNlaykpIHsNCgkJaWYgKCRyZXNDZWstPm51bV9yb3dzID4gMCkgew0KCQkJJHJzQ2VrID0gJHJlc0Nlay0+ZmV0Y2hfYXJyYXkoKTsNCgkJCQ0KCQkJJF9TRVNTSU9OWydlbi1kYXRhJ10gPSBlX2NvZGUoJHJzQ2VrWydpZF9rYXJ5YXdhbiddKTsNCgkJCSRfU0VTU0lPTlsnZW4tbmFtYSddID0gJHJzQ2VrWyduYW1hJ107DQoJCQkkX1NFU1NJT05bJ2VuLWxldmVsJ10gPSAkcnNDZWtbJ2lkX2xldmVsJ107DQoJCQkkX1NFU1NJT05bJ2VuLWprJ10gPSAkcnNDZWtbJ2prJ107DQoJCQkNCgkJCSRsb2c9JGtvbmVrc2ktPnJ1blF1ZXJ5KCJJTlNFUlQgSU5UTyBgbG9nX2xvZ2luYChgaWRfdXNlcmApIFZBTFVFUyAoJyIuJHJzQ2VrWydpZCddLiInKSIpOw0KCQkJDQoJCQlyZXR1cm4gVFJVRTsNCgkJfSBlbHNlIHsNCgkJCXJldHVybiBGQUxTRTsNCgkJfQ0KCX0gZWxzZSB7DQoJCXJldHVybiBGQUxTRTsNCgl9IA0KfQ=="));

	class bank extends koneksi {
		
		function get_bank() {
			if ($list = $this->runQuery("SELECT `id`, `nama`, `nomor_rekening`, `saldo` FROM `bank` WHERE `hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_histori($idBank, $tglAwal, $tglAkhir) {
			$query = "SELECT `bank`.`nama` AS `nama_bank`, `bank`.`nomor_rekening`, `kas_bank`.`no_bukti`, `kas_bank`.`tgl`, `kas_bank`.`keterangan`, `kas_bank`.`setor`, 
					`kas_bank`.`tarik`, `kas_bank`.`bea_admin`, `kas_bank`.`saldo`, `karyawan`.`nama` FROM `kas_bank` INNER JOIN `bank` ON 
					(`kas_bank`.`id_bank` = `bank`.`id`) INNER JOIN `karyawan` ON (`kas_bank`.`id_karyawan` = `karyawan`.`id`) WHERE 
					`kas_bank`.`id_bank` = '$idBank' AND `kas_bank`.`tgl` BETWEEN '$tglAwal' AND '$tglAkhir';";
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
		
		function tambah_baru($nama, $rekening) {
			$nama = $this->clearText($nama);
			$rekening = $this->clearText($rekening);
			
			if ($result = $this->runQuery("INSERT INTO `bank`(`nama`, `nomor_rekening`, `saldo`, `hapus`) VALUES('$nama', '$rekening', '0', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah_data($id, $nama, $rekening) {
			$id = $this->clearText($id);
			$nama = $this->clearText($nama);
			$rekening = $this->clearText($rekening);
			
			if ($result = $this->runQuery("UPDATE `bank` SET `nama` = '$nama', `nomor_rekening` = '$rekening' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus_data($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `bank` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function autocode_on_history() {
			$kode = "";
			$query = "SELECT MAX(`id`) FROM `kas_bank` WHERE DATE(`tgl_input`) = '".date("Y-m-d")."';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				if ($rs[0] == null) {
					$kode = "EKB".date("ymd")."0001";
				} else {
					$lastCode = substr($rs[0], 9, 4);
					$newCode = $lastCode + 1;
					
					switch (strlen($newCode)) {
						case 1:
							$kode = "EKB".date("ymd")."000".$newCode;
							break;
						case 2:
							$kode = "EKB".date("ymd")."00".$newCode;
							break;
						case 3:
							$kode = "EKB".date("ymd")."0".$newCode;
							break;
						case 4:
							$kode = "EKB".date("ymd").$newCode;
							break;
					}
				}
			}
			return $kode;
		}
		
		function get_saldo($idBank) {
			$saldo = 0;
			$query = "SELECT `saldo` FROM `bank` WHERE `id` = '$idBank';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				$saldo = $rs[0];
			}
			return $saldo;
		}
		
		function transaksi_setor($idBank, $noBukti, $tgl, $keterangan, $setor, $idKaryawan) {
			$idBank = $this->clearText($idBank);
			$noBukti = $this->clearText($noBukti);
			$tgl = $this->clearText($tgl);
			$keterangan = $this->clearText($keterangan);
			$setor = $this->clearText($setor);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$id = $this->autocode_on_history();
			$saldoAwal = $this->get_saldo($idBank);
			$saldoAkhir = $saldoAwal + $setor;
			
			$query = "INSERT INTO `kas_bank`(`id`, `id_bank`, `no_bukti`, `tgl`, `keterangan`, `setor`, `tarik`, `bea_admin`, `saldo`, `id_karyawan`) 
						VALUES('$id', '$idBank', '$noBukti', '$tgl', '$keterangan', '$setor', '0', '0', '$saldoAkhir', '$idKaryawan');";
			$query .= "UPDATE `bank` SET `saldo` = '$saldoAkhir' WHERE `id` = '$idBank';";
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function transaksi_tarik($idBank, $noBukti, $tgl, $keterangan, $tarik, $beaAdmin, $idKaryawan, $jenis) {
			$idBank = $this->clearText($idBank);
			$noBukti = $this->clearText($noBukti);
			$tgl = $this->clearText($tgl);
			$keterangan = $this->clearText($keterangan);
			$tarik = $this->clearText($tarik);
			$beaAdmin = $this->clearText($beaAdmin);
			$idKaryawan = $this->clearText($idKaryawan);
			$jenis = $this->clearText($jenis);
			
			$id = $this->autocode_on_history();
			$saldoAwal = $this->get_saldo($idBank);
			$saldoAkhir = $saldoAwal - $tarik - $beaAdmin;
			
			$query = "INSERT INTO `kas_bank`(`id`, `id_bank`, `no_bukti`, `tgl`, `keterangan`, `setor`, `tarik`, `bea_admin`, `saldo`, `id_karyawan`, `jenis`)
						VALUES('$id', '$idBank', '$noBukti', '$tgl', '$keterangan', '0', '$tarik', '$beaAdmin', '$saldoAkhir', '$idKaryawan', '$jenis');";
			$query .= "UPDATE `bank` SET `saldo` = '$saldoAkhir' WHERE `id` = '$idBank';";
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
	
?>