<?php
	class kendaraan extends koneksi {
		
		function get_kendaraan() {
			if ($list = $this->runQuery("SELECT `id`, `nopol`, `keterangan` FROM `kendaraan` WHERE `hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah($nopol, $keterangan) {
			$nopol = $this->clearText($nopol);
			$keterangan = $this->clearText($keterangan);
			
			if ($result = $this->runQuery("INSERT INTO `kendaraan`(`nopol`, `keterangan`, `hapus`) VALUES('$nopol', '$keterangan', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah($id, $nopol, $keterangan) {
			$id = $this->clearText($id);
			$nopol = $this->clearText($nopol);
			$keterangan = $this->clearText($keterangan);
			
			if ($result = $this->runQuery("UPDATE `kendaraan` SET `nopol` = '$nopol', `keterangan` = '$keterangan' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `kendaraan` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>