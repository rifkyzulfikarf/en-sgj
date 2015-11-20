<?php
	class berita_acara extends koneksi {
		
		function get_berita_acara() {
			if ($list = $this->runQuery("SELECT `berita_acara`.*, `karyawan`.`nama` FROM `berita_acara` 
			INNER JOIN `karyawan` ON (`berita_acara`.`id_karyawan` = `karyawan`.`id`) ORDER BY `tgl` DESC LIMIT 20")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah($tgl, $jam, $judul, $isi, $idKaryawan) {
			$tgl = $this->clearText($tgl);
			$jam = $this->clearText($jam);
			$judul = $this->clearText($judul);
			$isi = $this->clearText($isi);
			$idKaryawan = $this->clearText($idKaryawan);
			
			if ($result = $this->runQuery("INSERT INTO `berita_acara`(`tgl`, `jam`, `judul`, `isi`, `id_karyawan`) 
			VALUES('$tgl', '$jam', '$judul', '$isi', '$idKaryawan');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>