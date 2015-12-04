<?php
	class berita_acara extends koneksi {
		
		function get_berita_acara() {
			if ($list = $this->runQuery("SELECT `berita_acara`.*, `karyawan`.`nama` FROM `berita_acara` 
			INNER JOIN `karyawan` ON (`berita_acara`.`id_karyawan` = `karyawan`.`id`) WHERE `berita_acara`.`hapus` = '0'
			ORDER BY `tgl` DESC LIMIT 20")) {
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
			
			if ($result = $this->runQuery("INSERT INTO `berita_acara`(`tgl`, `jam`, `judul`, `isi`, `id_karyawan`, `hapus`) 
			VALUES('$tgl', '$jam', '$judul', '$isi', '$idKaryawan', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `berita_acara` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>