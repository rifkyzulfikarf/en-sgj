<?php
	class karyawan extends koneksi {
		
		function get_karyawan() {
			if ($list = $this->runQuery("SELECT `karyawan`.`id`, `karyawan`.`nama`, `level`.`jabatan`, `karyawan`.`jk` FROM `karyawan` 
			INNER JOIN `level` ON (`karyawan`.`id_level` = `level`.`id`) WHERE `karyawan`.`hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_driver() {
			if ($list = $this->runQuery("SELECT `karyawan`.`id`, `karyawan`.`nama`, `level`.`jabatan`, `karyawan`.`jk` FROM `karyawan` 
			INNER JOIN `level` ON (`karyawan`.`id_level` = `level`.`id`) WHERE `karyawan`.`id_level` = '3' AND `karyawan`.`hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah($nama, $level, $jk) {
			$nama = $this->clearText($nama);
			$level = $this->clearText($level);
			$jk = $this->clearText($jk);
			
			if ($result = $this->runQuery("INSERT INTO `karyawan`(`nama`, `id_level`, `jk`, `hapus`) VALUES('$nama', '$level', '$jk', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah($id, $nama, $level, $jk) {
			$id = $this->clearText($id);
			$nama = $this->clearText($nama);
			$level = $this->clearText($level);
			$jk = $this->clearText($jk);
			
			if ($result = $this->runQuery("UPDATE `karyawan` SET `nama` = '$nama', `id_level` = '$level', `jk` = '$jk' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `karyawan` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>