<?php
	class spbe extends koneksi {
		
		function get_spbe() {
			if ($list = $this->runQuery("SELECT `id`, `nama` FROM `spbe` WHERE `hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_spbe_barang(){
			if ($list = $this->runQuery("SELECT `spbe_barang`.*, `spbe`.`nama` AS nama_spbe, `barang`.`nama` AS nama_barang 
			FROM `spbe_barang` INNER JOIN `spbe` ON(`spbe_barang`.`id_spbe` = `spbe`.`id`) 
			INNER JOIN `barang` ON(`spbe_barang`.`id_barang` = `barang`.`id`) WHERE `spbe_barang`.`hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah($nama) {
			$nama = $this->clearText($nama);
			
			if ($result = $this->runQuery("INSERT INTO `spbe`(`nama`, `hapus`) VALUES('$nama','0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function tambah_barang($idSpbe, $idBarang, $ship, $sold) {
			$idSpbe = $this->clearText($idSpbe);
			$idBarang = $this->clearText($idBarang);
			$ship = $this->clearText($ship);
			$sold = $this->clearText($sold);
			
			if ($result = $this->runQuery("INSERT INTO `spbe_barang`(`id_spbe`, `id_barang`, `ship_to`, `sold_to`, `hapus`) 
			VALUES('$idSpbe','$idBarang', '$ship', '$sold', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah($id, $nama) {
			$id = $this->clearText($id);
			$nama = $this->clearText($nama);
			
			if ($result = $this->runQuery("UPDATE `spbe` SET `nama` = '$nama' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `spbe` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus_barang($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `spbe_barang` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>