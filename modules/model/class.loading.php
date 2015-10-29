<?php
	class loading extends koneksi {
		
		function get_loading_by_lo($noLO) {
			$query = "SELECT `loading_pembelian`.*, `kendaraan`.`nopol`, `driver`.`nama` AS `nama_driver`, `barang`.`nama` AS `nama_barang`, 
			`pembelian`.`id_barang`, `gudang_out`.`nama` AS `nama_gudang_out`, `gudang_in`.`nama` AS `nama_gudang_in` FROM `loading_pembelian` 
			INNER JOIN `pembelian` ON `loading_pembelian`.`id_pembelian` = `pembelian`.`id` 
			LEFT JOIN `kendaraan` ON `loading_pembelian`.`id_kendaraan` = `kendaraan`.`id`
			LEFT JOIN `karyawan` AS `driver` ON `loading_pembelian`.`id_driver` = `driver`.`id` 
			LEFT JOIN `karyawan` AS `gudang_out` ON `loading_pembelian`.`id_gudang_berangkat` = `gudang_out`.`id` 
			LEFT JOIN `karyawan` AS `gudang_in` ON `loading_pembelian`.`id_gudang_kembali` = `gudang_in`.`id` 
			INNER JOIN `barang` ON `pembelian`.`id_barang` = `barang`.`id` 
			WHERE `pembelian`.`no_lo` = '$noLO';";
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
		
		function loading_pembelian_baru($idPembelian) {
			$idPembelian = $this->clearText($idPembelian);
			
			$query = "INSERT INTO `loading_pembelian`(`id_pembelian`) VALUES('$idPembelian');";
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function input_loading_pembelian_keluar($idPembelian, $idKendaraan, $idDriver, $tglLoading, $jamBerangkat, 
		$tabungKosong, $idKaryawan) {
			$idPembelian = $this->clearText($idPembelian);
			$idKendaraan = $this->clearText($idKendaraan);
			$idDriver = $this->clearText($idDriver);
			$tglLoading = $this->clearText($tglLoading);
			$jamBerangkat = $this->clearText($jamBerangkat);
			$tabungKosong = $this->clearText($tabungKosong);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$query = "UPDATE `loading_pembelian` SET `id_kendaraan` = '$idKendaraan', `id_driver` = '$idDriver', 
						`tgl_loading` = '$tglLoading', `jam_berangkat` = '$jamBerangkat', `tabung_kosong` = '$tabungKosong', 
						`id_karyawan_berangkat` = '$idKaryawan' WHERE `id_pembelian` = '$idPembelian';";
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function acc_loading_pembelian_keluar($idPembelian, $acc, $keterangan, $idKaryawan, $idBarang, $jmlBarang) {
			$idPembelian = $this->clearText($idPembelian);
			$acc = $this->clearText($acc);
			$keterangan = $this->clearText($keterangan);
			$idKaryawan = $this->clearText($idKaryawan);
			$idBarang = $this->clearText($idBarang);
			$jmlBarang = $this->clearText($jmlBarang);
			
			$query = "UPDATE `loading_pembelian` SET `acc_gudang_berangkat` = '$acc', `ket_gudang_berangkat` = '$keterangan', 
						`id_gudang_berangkat` = '$idKaryawan' WHERE `id_pembelian` = '$idPembelian';";
			$query .= "UPDATE `barang` SET `stok_kosong` = `stok_kosong` - $jmlBarang WHERE `id` = '$idBarang';";
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function input_loading_pembelian_masuk($idPembelian, $jamKembali, $tabungIsi, $idKaryawan) {
			$idPembelian = $this->clearText($idPembelian);
			$jamKembali = $this->clearText($jamKembali);
			$tabungIsi = $this->clearText($tabungIsi);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$query = "UPDATE `loading_pembelian` SET `jam_kembali` = '$jamKembali', `tabung_isi` = '$tabungIsi', 
						`id_karyawan_kembali` = '$idKaryawan' WHERE `id_pembelian` = '$idPembelian';";
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function acc_loading_pembelian_masuk($idPembelian, $acc, $keterangan, $idKaryawan, $idBarang, $jmlBarang) {
			$idPembelian = $this->clearText($idPembelian);
			$acc = $this->clearText($acc);
			$keterangan = $this->clearText($keterangan);
			$idKaryawan = $this->clearText($idKaryawan);
			$idBarang = $this->clearText($idBarang);
			$jmlBarang = $this->clearText($jmlBarang);
			
			$query = "UPDATE `loading_pembelian` SET `acc_gudang_kembali` = '$acc', `ket_gudang_kembali` = '$keterangan', 
						`id_gudang_kembali` = '$idKaryawan' WHERE `id_pembelian` = '$idPembelian';";
			$query .= "UPDATE `barang` SET `stok_isi` = `stok_isi` + $jmlBarang WHERE `id` = '$idBarang';";
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
?>