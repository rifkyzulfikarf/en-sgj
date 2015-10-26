<?php
	class user extends koneksi {
		
		function get_user() {
			if ($list = $this->runQuery("SELECT `pemakai`.`id`, `pemakai`.`id_karyawan`, `karyawan`.`nama`, `level`.`jabatan`, `pemakai`.`user`, `pemakai`.`kunci` 
			FROM `pemakai` INNER JOIN `karyawan` ON (`pemakai`.`id_karyawan` = `karyawan`.`id`) INNER JOIN `level` ON (`karyawan`.`id_level` = `level`.`id`) 
			WHERE `pemakai`.`hapus` = '0' ORDER BY `karyawan`.`nama` ASC;")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_karyawan_not_user() {
			if ($list = $this->runQuery("SELECT `karyawan`.`id`, `karyawan`.`nama` FROM `pemakai` RIGHT JOIN `karyawan` ON `pemakai`.`id_karyawan` = `karyawan`.`id` 
			WHERE `pemakai`.`id_karyawan` IS NULL AND `karyawan`.`hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah_user($idKaryawan, $user, $pass) {
			$idKaryawan = $this->clearText(d_code($idKaryawan));
			$user = $this->clearText(e_code($user));
			$pass = $this->clearText(e_code($pass));
			
			if ($result = $this->runQuery("INSERT INTO `pemakai`(`id_karyawan`, `user`, `kunci`, `hapus`) VALUES('$idKaryawan', '$user', '$pass', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah_user($id, $user, $pass) {
			$id = $this->clearText(d_code($id));
			$user = $this->clearText(e_code($user));
			$pass = $this->clearText(e_code($pass));
			
			if ($result = $this->runQuery("UPDATE `pemakai` SET `user` = '$user', `kunci` = '$pass' WHERE `id` = '$id'")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus_user($id) {
			$id = $this->clearText(d_code($id));
			
			if ($result = $this->runQuery("UPDATE `pemakai` SET `hapus` = '1' WHERE `id` = '$id'")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function add_menu($id_user, $id_menu) {
			$id_user = $this->clearText(d_code($id_user));
			$id_menu = $this->clearText($id_menu);

			if ($query = $this->runQuery("INSERT INTO `akses` (`id_pemakai`,`id_menu`) VALUES ('$id_user','$id_menu')")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
?>