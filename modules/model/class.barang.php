<?php
	class barang extends koneksi {
		
		function get_barang() {
			if ($list = $this->runQuery("SELECT `id`, `nama`, `stok_isi`, `stok_kosong`, `stok_pinjam`, `het`, `harga_beli` FROM `barang`;")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_het($id) {
			$id = $this->clearText($id);
			
			if ($list = $this->runQuery("SELECT `het` FROM `barang` WHERE `id` = '$id';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_harga_beli($id) {
			$id = $this->clearText($id);
			
			if ($list = $this->runQuery("SELECT `harga_beli` FROM `barang` WHERE `id` = '$id';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_harga_beli_all() {
			$qHarga = "SELECT `harga_beli`.`id`, `barang`.`nama`, `harga_beli`.`jumlah`, `harga_beli`.`harga_beli` 
						FROM `harga_beli` INNER JOIN `barang` ON(`harga_beli`.`id_barang` = `barang`.`id`);";
			if ($list = $this->runQuery($qHarga)) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah_harga_beli($idBarang, $jumlah, $harga) {
			$idBarang = $this->clearText($idBarang);
			$jumlah = $this->clearText($jumlah);
			$harga = $this->clearText($harga);
			
			$qHarga = "INSERT INTO `harga_beli`(`id_barang`, `jumlah`, `harga_beli`) VALUES('$idBarang', '$jumlah', '$harga')";
			
			if ($result = $this->runQuery($qHarga)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah_harga_beli($id, $idBarang, $jumlah, $harga) {
			$id = $this->clearText($id);
			$idBarang = $this->clearText($idBarang);
			$jumlah = $this->clearText($jumlah);
			$harga = $this->clearText($harga);
			
			$qHarga = "UPDATE `harga_beli` SET `id_barang` = '$idBarang', `jumlah` = '$jumlah', `harga_beli` = '$harga' 
						WHERE `id` = '$id';";
			
			if ($result = $this->runQuery($qHarga)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus_harga_beli($id) {
			$id = $this->clearText($id);
			
			$qHarga = "DELETE FROM `harga_beli` WHERE `id` = '$id';";
			
			if ($result = $this->runQuery($qHarga)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah_het($het, $id) {
			$het = $this->clearText($het);
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `barang` SET `het` = '$het' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function stok_opname($tgl, $idBarang, $stokIsiLama, $stokIsiBaru, $stokKosongLama, $stokKosongBaru, $stokPinjamLama, $stokPinjamBaru,
		$keterangan, $idKaryawan) {
			$tgl = $this->clearText($tgl);
			$idBarang = $this->clearText($idBarang);
			$stokIsiLama = $this->clearText($stokIsiLama);
			$stokIsiBaru = $this->clearText($stokIsiBaru);
			$stokKosongLama = $this->clearText($stokKosongLama);
			$stokKosongBaru = $this->clearText($stokKosongBaru);
			$stokPinjamLama = $this->clearText($stokPinjamLama);
			$stokPinjamBaru = $this->clearText($stokPinjamBaru);
			$keterangan = $this->clearText($keterangan);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$query = "INSERT INTO `stok_opname` VALUES ('$tgl', '$idBarang', '$stokIsiLama', '$stokIsiBaru', '$stokKosongLama', 
					'$stokKosongBaru', '$stokPinjamLama', '$stokPinjamBaru', '$keterangan', '$idKaryawan');";
			$query .= "UPDATE `barang` SET `stok_isi` = '$stokIsiBaru', `stok_kosong` = '$stokKosongBaru', `stok_pinjam` = '$stokPinjamBaru' WHERE `id` = '$idBarang';";
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		
	}
?>