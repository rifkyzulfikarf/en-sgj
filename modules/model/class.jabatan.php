<?php
	class jabatan extends koneksi {
		
		function get_jabatan() {
			if ($list = $this->runQuery("SELECT `id`, `jabatan` FROM `level` WHERE `hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah($jabatan) {
			$jabatan = $this->clearText($jabatan);
			
			if ($result = $this->runQuery("INSERT INTO `level`(`jabatan`, `hapus`) VALUES('$jabatan', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah($id, $jabatan) {
			$id = $this->clearText($id);
			$jabatan = $this->clearText($jabatan);
			
			if ($result = $this->runQuery("UPDATE `level` SET `jabatan` = '$jabatan' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `level` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>