<?php
	class reqhapus extends koneksi {
		
		// function get_berita_acara() {
			// if ($list = $this->runQuery("SELECT `berita_acara`.*, `karyawan`.`nama` FROM `berita_acara` 
			// INNER JOIN `karyawan` ON (`berita_acara`.`id_karyawan` = `karyawan`.`id`) WHERE `berita_acara`.`hapus` = '0'
			// ORDER BY `tgl` DESC LIMIT 20")) {
				// if ($list->num_rows > 0) {
					// return $list;
				// } else {
					// return FALSE;
				// }
			// } else {
				// return FALSE;
			// }
		// }
		
		function tambah($tgl, $idKaryawan, $jenis, $idHapus, $keterangan) {
			$tgl = $this->clearText($tgl);
			$idKaryawan = $this->clearText($idKaryawan);
			$jenis = $this->clearText($jenis);
			$idHapus = $this->clearText($idHapus);
			$keterangan = $this->clearText($keterangan);
			
			if ($result = $this->runQuery("INSERT INTO `request_hapus`(`tgl`, `id_karyawan`, `jenis`, `id_hapus`, `keterangan`, `is_proses`, `hapus`) 
			VALUES('$tgl', '$idKaryawan', '$jenis', '$idHapus', '$keterangan', '0', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `request_hapus` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>