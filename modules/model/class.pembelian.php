<?php
	//eval(base64_decode("Y2xhc3Mga29uZWtzaSB7DQoJcHVibGljICRrb25lazsNCglmdW5jdGlvbiBfX2NvbnN0cnVjdCgpeyANCgkJJHRoaXMtPmtvbmVrPW5ldyBteXNxbGkoImxvY2FsaG9zdCIsICJyb290IiwgIiIsICJlbmVyZ2FzIik7DQoJCWlmKCR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJubyl7DQoJCQllY2hvICdVbmFibGUgdG8gY29ubmVjdCB0byBkYXRhYmFzZSBbJyAuICR0aGlzLT5rb25lay0+Y29ubmVjdF9lcnJvciAuICddJzsNCgkJCWV4aXQoKTsNCgkJfQkJDQoJfSAgICAgIA0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBjb21taXQoKXsgICAgICAgICANCgkJJHRoaXMtPmtvbmVrLT5jb21taXQoKTsNCgl9DQoNCglwdWJsaWMgZnVuY3Rpb24gYXV0b2NvbW1pdCgkYXBhKXsNCgkJJHRoaXMtPmtvbmVrLT5hdXRvY29tbWl0KCRhcGEpOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcm9sbGJhY2soKXsNCgkJJHRoaXMtPmtvbmVrLT5yb2xsYmFjaygpOyAgICAgDQoJfSAgICAgIA0KCQ0KCWZ1bmN0aW9uIF9fZGVzdHJ1Y3QoKXsNCg0KCX0gICAgICAgICAgDQoJDQoJZnVuY3Rpb24gY2xvc2VEQigpew0KCQkkdGhpcy0+a29uZWstPmNsb3NlKCk7DQoJfSAgICAgICAgICANCgkNCglwdWJsaWMgZnVuY3Rpb24gY2xlYXJUZXh0KCR0ZXh0KSB7DQoJCSR0ZXh0ID0gdHJpbSgkdGV4dCk7DQoJCXJldHVybiAkdGhpcy0+a29uZWstPnJlYWxfZXNjYXBlX3N0cmluZygkdGV4dCk7DQoJfSAgICAgICAgDQoJDQoJcHVibGljIGZ1bmN0aW9uIGxhc3RJbnNlcnRJRCgpIHsNCgkJcmV0dXJuICR0aGlzLT5rb25lay0+aW5zZXJ0X2lkOw0KCX0NCgkNCglwdWJsaWMgZnVuY3Rpb24gcnVuUXVlcnkoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7DQoJfQ0KCQ0KCXB1YmxpYyBmdW5jdGlvbiBydW5NdWx0aXBsZVF1ZXJpZXMoJHFyeSkgew0KCQkkcmVzdWx0ID0gJHRoaXMtPmtvbmVrLT5tdWx0aV9xdWVyeSgkcXJ5KTsNCgkJcmV0dXJuICRyZXN1bHQ7ICAgICANCgl9ICAgICAgICAgDQoJICAgICANCn0gICAgICAgICAgICAgIA0KDQpmdW5jdGlvbiBlbmNyeXB0X2RlY3J5cHQoJGFjdGlvbiwgJHN0cmluZyApIHsgICAgICAgICAgICAgICAgIA0KCWlmKCAkYWN0aW9uID09ICdlbmNyeXB0JyApIHsgICAgICAgICAgICAgICAgICANCgkJJG91dHB1dCA9IGJhc2U2NF9lbmNvZGUoYmFzZTY0X2VuY29kZSgkc3RyaW5nKSk7ICAgICANCgl9IGVsc2UgaWYoICRhY3Rpb24gPT0gJ2RlY3J5cHQnICl7ICAgICAgICAgDQoJCSRvdXRwdXQgPSBiYXNlNjRfZGVjb2RlKGJhc2U2NF9kZWNvZGUoJHN0cmluZykpOyAgICAgDQoJfSAgICAgIA0KCXJldHVybiAkb3V0cHV0OyANCn0gIA0KDQpmdW5jdGlvbiBlX3VybCggJHVybCApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgDQp9ICANCg0KZnVuY3Rpb24gZF91cmwoICR1cmwgKXsgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHVybCApICk7ICAgICANCglyZXR1cm4gJG91dHB1dDsgIA0KfSAgDQoNCmZ1bmN0aW9uIGVfY29kZSggJHN0cmluZyApeyAgICAgIA0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdlbmNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7IA0KfSAgDQoNCmZ1bmN0aW9uIGRfY29kZSggJHN0cmluZyApew0KCSRvdXRwdXQ9aHRtbHNwZWNpYWxjaGFycyggZW5jcnlwdF9kZWNyeXB0KCdkZWNyeXB0JywgJHN0cmluZyApICk7DQoJcmV0dXJuICRvdXRwdXQ7DQp9ICAgICAgDQoNCmZ1bmN0aW9uIGNla19sb2dpbigkdXNlciwkcGFzcyl7DQogICAgJGtvbmVrc2kgPSBuZXcga29uZWtzaSgpOw0KCSR1c2VyID0gZV9jb2RlKCR1c2VyKTsNCiAgICAkcGFzcyA9IGVfY29kZSgkcGFzcyk7DQoJDQoJJHFDZWsgPSAiU0VMRUNUIGBwZW1ha2FpYC5gaWRgLCBgcGVtYWthaWAuYGlkX2thcnlhd2FuYCwgYGthcnlhd2FuYC5gbmFtYWAsIGBrYXJ5YXdhbmAuYGlkX2xldmVsYCwgYGthcnlhd2FuYC5gamtgIEZST00gYHBlbWFrYWlgIElOTkVSIEpPSU4gYGthcnlhd2FuYCANCgkJCU9OIChgcGVtYWthaWAuYGlkX2thcnlhd2FuYCA9IGBrYXJ5YXdhbmAuYGlkYCkgV0hFUkUgYHBlbWFrYWlgLmB1c2VyYCA9ICckdXNlcicgQU5EIGBwZW1ha2FpYC5ga3VuY2lgID0gJyRwYXNzJyBBTkQgYHBlbWFrYWlgLmBoYXB1c2AgPSAnMCc7IjsNCgkNCglpZiAoJHJlc0NlayA9ICRrb25la3NpLT5ydW5RdWVyeSgkcUNlaykpIHsNCgkJaWYgKCRyZXNDZWstPm51bV9yb3dzID4gMCkgew0KCQkJJHJzQ2VrID0gJHJlc0Nlay0+ZmV0Y2hfYXJyYXkoKTsNCgkJCQ0KCQkJJF9TRVNTSU9OWydlbi1kYXRhJ10gPSBlX2NvZGUoJHJzQ2VrWydpZF9rYXJ5YXdhbiddKTsNCgkJCSRfU0VTU0lPTlsnZW4tbmFtYSddID0gJHJzQ2VrWyduYW1hJ107DQoJCQkkX1NFU1NJT05bJ2VuLWxldmVsJ10gPSAkcnNDZWtbJ2lkX2xldmVsJ107DQoJCQkkX1NFU1NJT05bJ2VuLWprJ10gPSAkcnNDZWtbJ2prJ107DQoJCQkNCgkJCSRsb2c9JGtvbmVrc2ktPnJ1blF1ZXJ5KCJJTlNFUlQgSU5UTyBgbG9nX2xvZ2luYChgaWRfdXNlcmApIFZBTFVFUyAoJyIuJHJzQ2VrWydpZCddLiInKSIpOw0KCQkJDQoJCQlyZXR1cm4gVFJVRTsNCgkJfSBlbHNlIHsNCgkJCXJldHVybiBGQUxTRTsNCgkJfQ0KCX0gZWxzZSB7DQoJCXJldHVybiBGQUxTRTsNCgl9IA0KfQ=="));
	
	include("class.bank.php");
	include("class.loading.php");
	
	class pembelian extends koneksi {
		
		function autocode_pembelian($tgl) {
			$kode = "";
			$query = "SELECT MAX(`id`) FROM `pembelian` WHERE `tgl_tebus` = '$tgl';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				if ($rs[0] == null) {
					$kode = "EPB".date("ymd", strtotime($tgl))."0001";
				} else {
					$lastCode = substr($rs[0], 9, 4);
					$newCode = $lastCode + 1;
					
					switch (strlen($newCode)) {
						case 1:
							$kode = "EPB".date("ymd", strtotime($tgl))."000".$newCode;
							break;
						case 2:
							$kode = "EPB".date("ymd", strtotime($tgl))."00".$newCode;
							break;
						case 3:
							$kode = "EPB".date("ymd", strtotime($tgl))."0".$newCode;
							break;
						case 4:
							$kode = "EPB".date("ymd", strtotime($tgl)).$newCode;
							break;
					}
				}
			}
			return $kode;
		}
		
		function get_pembelian($tglAwal, $tglAkhir) {
			$tglAwal = $this->clearText($tglAwal);
			$tglAkhir = $this->clearText($tglAkhir);
			
			if ($list = $this->runQuery("SELECT * FROM `pembelian` WHERE `tgl` BETWEEN '$tglAwal' AND '$tglAkhir';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_pembelian_by_id($id) {
			$id = $this->clearText($id);
			
			if ($list = $this->runQuery("SELECT `pembelian`.*, `barang`.`nama` FROM `pembelian` INNER JOIN `barang` 
			ON (`pembelian`.`id_barang` = `barang`.`id`) WHERE `pembelian`.`id` = '$id';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function transaksi_pembelian($tglTebus, $noLO, $noSA, $idBarang, $jmlTabung, $hargaSatuan,
		$pajak, $diskon, $beaAdmin, $grandTotal, $idBank, $bukti, $jenisTarikan, $idKaryawan, $idSPBE) {
			$tglTebus = $this->clearText($tglTebus);
			$noLO = $this->clearText($noLO);
			$noSA = $this->clearText($noSA);
			$idBarang = $this->clearText($idBarang);
			$jmlTabung = $this->clearText($jmlTabung);
			$hargaSatuan = $this->clearText($hargaSatuan);
			$pajak = $this->clearText($pajak);
			$diskon = $this->clearText($diskon);
			$beaAdmin = $this->clearText($beaAdmin);
			$grandTotal = $this->clearText($grandTotal);
			$idBank = $this->clearText($idBank);
			$bukti = $this->clearText($bukti);
			$jenisTarikan = $this->clearText($jenisTarikan);
			$idKaryawan = $this->clearText($idKaryawan);
			$idSPBE = $this->clearText($idSPBE);
			
			
			$id = $this->autocode_pembelian($tglTebus);
			
			$query = "INSERT INTO `pembelian` VALUES('$id', '$tglTebus', '$noLO', '$noSA', '$idBarang', 
			'$jmlTabung', '$hargaSatuan', '$pajak', '$diskon', '$beaAdmin', '$grandTotal', '$idBank', 
			'$bukti', '$jenisTarikan', '$idKaryawan', '$idSPBE');";
			if ($result = $this->runQuery($query)) {
				$bank = new bank();
				$hasilBank = $bank->transaksi_tarik($idBank, $bukti, $tglTebus, "Pembelian ".$id, 
				$grandTotal, 0, $idKaryawan, $jenisTarikan);
				
				$loading = new loading();
				$hasilLoading = $loading->loading_pembelian_baru($id);
				
				if ($hasilBank == TRUE && $hasilLoading == TRUE) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function hapus_pembelian($id, $tarik, $idBank) {
			$id = $this->clearText($id);
			$tarik = $this->clearText($tarik);
			$idBank = $this->clearText($idBank);
			
			$revisiJumlah = 0;
			$query = "";
			
			if ($resCek = $this->runQuery("SELECT `id` FROM `kas_bank` WHERE `keterangan` = 'Pembelian $id'")) {
				$rsCek = $resCek->fetch_array();
				$idKas = $rsCek['id'];
			}
			
			$query .= "DELETE FROM `pembelian` WHERE `id` = '$id';";
			$query .= "DELETE FROM `loading_pembelian` WHERE `id_pembelian` = '$id';";
			
			$revisiJumlah = $tarik;
			$query .= "UPDATE `kas_bank` SET `saldo` = `saldo` + $revisiJumlah WHERE `id` > '$idKas' AND id_bank = '$idBank';";
			$query .= "UPDATE `bank` SET `saldo` = `saldo` + $revisiJumlah WHERE `id` = '$idBank';";
			
			$query .= "DELETE FROM `kas_bank` WHERE `id` = '$idKas';";
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
	
?>