<?php
	class loading_khusus extends koneksi {
		
		function autocode($tgl) {
			$kode = "";
			$prefix = "KLD";
			
			$query = "SELECT MAX(`id`) FROM `khusus_loading_pembelian` WHERE `tgl_loading` = '$tgl';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				if ($rs[0] == null) {
					$kode = $prefix.date("ymd", strtotime($tgl))."0001";
				} else {
					$lastCode = substr($rs[0], 9, 4);
					$newCode = $lastCode + 1;
					
					switch (strlen($newCode)) {
						case 1:
							$kode = $prefix.date("ymd", strtotime($tgl))."000".$newCode;
							break;
						case 2:
							$kode = $prefix.date("ymd", strtotime($tgl))."00".$newCode;
							break;
						case 3:
							$kode = $prefix.date("ymd", strtotime($tgl))."0".$newCode;
							break;
						case 4:
							$kode = $prefix.date("ymd", strtotime($tgl)).$newCode;
							break;
					}
				}
			}
			return $kode;
		}
		
		function get_loading_by_tgl($tgl) {
			$query = "SELECT `khusus_loading_pembelian`.*, `kendaraan`.`nopol`, `driver`.`nama` AS `nama_driver`, `barang`.`nama` AS `nama_barang`, 
			`gudang_out`.`nama` AS `nama_gudang_out`, `gudang_in`.`nama` AS `nama_gudang_in` FROM `khusus_loading_pembelian` 
			LEFT JOIN `kendaraan` ON `khusus_loading_pembelian`.`id_kendaraan` = `kendaraan`.`id`
			LEFT JOIN `karyawan` AS `driver` ON `khusus_loading_pembelian`.`id_driver` = `driver`.`id` 
			LEFT JOIN `karyawan` AS `gudang_out` ON `khusus_loading_pembelian`.`id_gudang_berangkat` = `gudang_out`.`id` 
			LEFT JOIN `karyawan` AS `gudang_in` ON `khusus_loading_pembelian`.`id_gudang_kembali` = `gudang_in`.`id` 
			INNER JOIN `barang` ON `khusus_loading_pembelian`.`id_barang` = `barang`.`id` 
			WHERE `khusus_loading_pembelian`.`tgl_loading` = '$tgl';";
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
		
		function input_loading_pembelian_keluar($idKendaraan, $idDriver, $idBarang, $tglLoading, $jamBerangkat, 
		$tabungKosong, $idKaryawan) {
			$id = $this->autocode($tglLoading);
			$idKendaraan = $this->clearText($idKendaraan);
			$idDriver = $this->clearText($idDriver);
			$idBarang = $this->clearText($idBarang);
			$tglLoading = $this->clearText($tglLoading);
			$jamBerangkat = $this->clearText($jamBerangkat);
			$tabungKosong = $this->clearText($tabungKosong);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$query = "INSERT INTO `khusus_loading_pembelian`(`id`, `id_kendaraan`, `id_driver`, `id_barang`, `tgl_loading`, `jam_berangkat`, `tabung_kosong`, 
			`id_karyawan_berangkat`) VALUES('$id', '$idKendaraan', '$idDriver', '$idBarang', '$tglLoading', '$jamBerangkat', '$tabungKosong', '$idKaryawan');";
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function acc_loading_pembelian_keluar($id, $acc, $keterangan, $idKaryawan, $idBarang, $jmlBarang) {
			$id = $this->clearText($id);
			$acc = $this->clearText($acc);
			$keterangan = $this->clearText($keterangan);
			$idKaryawan = $this->clearText($idKaryawan);
			$idBarang = $this->clearText($idBarang);
			$jmlBarang = $this->clearText($jmlBarang);
			
			$query = "UPDATE `khusus_loading_pembelian` SET `acc_gudang_berangkat` = '$acc', `ket_gudang_berangkat` = '$keterangan', 
						`id_gudang_berangkat` = '$idKaryawan' WHERE `id` = '$id';";
			$query .= "UPDATE `khusus_barang` SET `stok_kosong` = `stok_kosong` - $jmlBarang WHERE `id` = '$idBarang';";
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function input_loading_pembelian_masuk($id, $jamKembali, $tabungIsi, $idKaryawan) {
			$id = $this->clearText($id);
			$jamKembali = $this->clearText($jamKembali);
			$tabungIsi = $this->clearText($tabungIsi);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$query = "UPDATE `khusus_loading_pembelian` SET `jam_kembali` = '$jamKembali', `tabung_isi` = '$tabungIsi', 
						`id_karyawan_kembali` = '$idKaryawan' WHERE `id` = '$id';";
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function acc_loading_pembelian_masuk($id, $acc, $keterangan, $idKaryawan, $idBarang, $jmlBarang) {
			$id = $this->clearText($id);
			$acc = $this->clearText($acc);
			$keterangan = $this->clearText($keterangan);
			$idKaryawan = $this->clearText($idKaryawan);
			$idBarang = $this->clearText($idBarang);
			$jmlBarang = $this->clearText($jmlBarang);
			
			$query = "UPDATE `khusus_loading_pembelian` SET `acc_gudang_kembali` = '$acc', `ket_gudang_kembali` = '$keterangan', 
						`id_gudang_kembali` = '$idKaryawan' WHERE `id` = '$id';";
			$query .= "UPDATE `khusus_barang` SET `stok_isi` = `stok_isi` + $jmlBarang WHERE `id` = '$idBarang';";
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
?>