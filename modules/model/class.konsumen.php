<?php
	class konsumen extends koneksi {
		
		function get_konsumen() {
			if ($list = $this->runQuery("SELECT `id`, `nama`, `alamat`, `telepon`, `harga_3kg`, `harga_12kg`, `harga_12kg_bg`, `harga_50kg` 
			FROM `konsumen` WHERE `hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_harga_dan_kuota_jual($idKonsumen, $tgl) {
			$idKonsumen = $this->clearText($idKonsumen);
			$tgl = $this->clearText($tgl);
			
			if ($list = $this->runQuery("SELECT `konsumen`.`harga_3kg`, `harga_12kg`, `harga_12kg_bg`, `harga_50kg`, 
			`kuota_penjualan`.`jml_alokasi` FROM `kuota_penjualan` INNER JOIN `konsumen` ON 
			(`kuota_penjualan`.`id_konsumen` = `konsumen`.`id`) WHERE 
			`kuota_penjualan`.`id_konsumen` = '$idKonsumen' AND `kuota_penjualan`.`tgl` = '$tgl';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_kuota_jual($idKonsumen, $tglAwal, $tglAkhir) {
			$idKonsumen = $this->clearText($idKonsumen);
			$tglAwal = $this->clearText($tglAwal);
			$tglAkhir = $this->clearText($tglAkhir);
		
			if ($list = $this->runQuery("SELECT `kuota_penjualan`.`id_konsumen`, `konsumen`.`nama`, `kuota_penjualan`.`tgl`, `kuota_penjualan`.`jml_alokasi`, 
			`kuota_penjualan`.`jml_terambil` FROM `kuota_penjualan` INNER JOIN `konsumen` ON (`kuota_penjualan`.`id_konsumen` = `konsumen`.`id`) 
			WHERE `kuota_penjualan`.`id_konsumen` LIKE '$idKonsumen' AND `konsumen`.`hapus` = '0' AND `kuota_penjualan`.`tgl` BETWEEN '$tglAwal' AND '$tglAkhir';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function tambah($nama, $alamat, $telepon) {
			$nama = $this->clearText($nama);
			$alamat = $this->clearText($alamat);
			$telepon = $this->clearText($telepon);
			
			if ($result = $this->runQuery("INSERT INTO `konsumen`(`nama`, `alamat`, `telepon`, `harga_3kg`, `harga_12kg`, `harga_12kg_bg`, 
			`harga_50kg`, `hapus`) VALUES('$nama', '$alamat', '$telepon', '0', '0', '0', '0', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah($id, $nama, $alamat, $telepon) {
			$id = $this->clearText($id);
			$nama = $this->clearText($nama);
			$alamat = $this->clearText($alamat);
			$telepon = $this->clearText($telepon);
			
			if ($result = $this->runQuery("UPDATE `konsumen` SET `nama` = '$nama', `alamat` = '$alamat', `telepon` = '$telepon' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `konsumen` SET `hapus` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function set_harga_jual($id, $harga3kg, $harga12kg, $harga12kgbg, $harga50kg) {
			$id = $this->clearText($id);
			$harga3kg = $this->clearText($harga3kg);
			$harga12kg = $this->clearText($harga12kg);
			$harga12kgbg = $this->clearText($harga12kgbg);
			$harga50kg = $this->clearText($harga50kg);
			
			if ($result = $this->runQuery("UPDATE `konsumen` SET `harga_3kg` = '$harga3kg', `harga_12kg` = '$harga12kg', `harga_12kg_bg` = '$harga12kgbg', 
			`harga_50kg` = '$harga50kg' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function tambah_kuota_penjualan($idKonsumen, $tgl, $jumlahAlokasi) {
			$idKonsumen = $this->clearText($idKonsumen);
			$tgl = $this->clearText($tgl);
			$jumlahAlokasi = $this->clearText($jumlahAlokasi);
			
			if ($result = $this->runQuery("INSERT INTO `kuota_penjualan` VALUES('$idKonsumen', '$tgl', '$jumlahAlokasi', '0')")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah_kuota_penjualan($idKonsumen, $tgl, $jumlahAlokasi) {
			$idKonsumen = $this->clearText($idKonsumen);
			$tgl = $this->clearText($tgl);
			$jumlahAlokasi = $this->clearText($jumlahAlokasi);
			
			if ($result = $this->runQuery("UPDATE `kuota_penjualan` SET `jml_alokasi` = '$jumlahAlokasi' WHERE `id_konsumen` = '$idKonsumen' AND `tgl` = '$tgl'")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ambil_kuota_penjualan($idKonsumen, $tgl, $jumlahTerambil) {
			$idKonsumen = $this->clearText($idKonsumen);
			$tgl = $this->clearText($tgl);
			$jumlahTerambil = $this->clearText($jumlahTerambil);
			
			if ($result = $this->runQuery("UPDATE `kuota_penjualan` SET `jumlah_terambil` = `jumlah_terambil` + $jumlahTerambil WHERE `id_konsumen` = '$idKonsumen' AND `tgl` = '$tgl';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function set_kuota_0($idKonsumen, $tglAwal, $tglAkhir) {
			$idKonsumen = $this->clearText($idKonsumen);
			$tglAwal = $this->clearText($tglAwal);
			$tglAkhir = $this->clearText($tglAkhir);
			
			if ($result = $this->runQuery("UPDATE `kuota_penjualan` SET `jml_alokasi` = '0' 
			WHERE `id_konsumen` LIKE '$idKonsumen' AND `tgl` BETWEEN '$tglAwal' AND '$tglAkhir';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>