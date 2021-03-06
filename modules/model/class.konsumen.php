<?php
	class konsumen extends koneksi {
		
		function get_konsumen() {
			if ($list = $this->runQuery("SELECT `id`, `nama`, `alamat`, `telepon`, `harga_3kg`, `harga_12kg`, `harga_12kg_bg`, `harga_50kg`, `pangkalan`, `waktu_tempo`, `pic` 
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
		
		function get_pangkalan() {
			if ($list = $this->runQuery("SELECT `id`, `nama`, `alamat`, `telepon`, `harga_3kg`, `harga_12kg`, `harga_12kg_bg`, `harga_50kg`, `pangkalan` 
			FROM `konsumen` WHERE `pangkalan` = '1' AND `hapus` = '0';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_konsumen_khusus() {
			if ($list = $this->runQuery("SELECT `id`, `nama`, `alamat`, `telepon`, `harga_50kg_khusus` 
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
		
		function get_harga_jual($idKonsumen) {
			$idKonsumen = $this->clearText($idKonsumen);
			
			if ($list = $this->runQuery("SELECT `konsumen`.`harga_3kg`, `konsumen`.`harga_12kg`, `konsumen`.`harga_12kg_bg`, 
			`konsumen`.`harga_50kg`, `konsumen`.`waktu_tempo` FROM `konsumen` WHERE `konsumen`.`id` = '$idKonsumen';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_harga_jual_khusus($idKonsumen) {
			$idKonsumen = $this->clearText($idKonsumen);
			
			if ($list = $this->runQuery("SELECT `konsumen`.`harga_50kg_khusus` FROM `konsumen` WHERE `konsumen`.`id` = '$idKonsumen';")) {
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
		
			if ($list = $this->runQuery("SELECT `kuota_penjualan`.`id`, `kuota_penjualan`.`id_konsumen`, `konsumen`.`nama`, `kuota_penjualan`.`tgl`, `kuota_penjualan`.`jml_alokasi`, 
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
		
		function tambah($nama, $alamat, $telepon, $pangkalan, $tempo, $pic, $harga3kg, $harga12kg, $hargabg, $harga50kg) {
			$nama = $this->clearText($nama);
			$alamat = $this->clearText($alamat);
			$telepon = $this->clearText($telepon);
			$pangkalan = $this->clearText($pangkalan);
			$tempo = $this->clearText($tempo);
			$pic = $this->clearText($pic);
			$harga3kg = $this->clearText($harga3kg);
			$harga12kg = $this->clearText($harga12kg);
			$hargabg = $this->clearText($hargabg);
			$harga50kg = $this->clearText($harga50kg);
			
			if ($result = $this->runQuery("INSERT INTO `konsumen`(`nama`, `alamat`, `telepon`, `harga_3kg`, `harga_12kg`, 
			`harga_12kg_bg`, `harga_50kg`, `pangkalan`, `waktu_tempo`, `pic`, `hapus`) VALUES('$nama', '$alamat', 
			'$telepon', '$harga3kg', '$harga12kg', '$hargabg', '$harga50kg', '$pangkalan', '$tempo', '$pic', '0');")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah($id, $nama, $alamat, $telepon, $pangkalan, $tempo, $pic, $harga3kg, $harga12kg, $hargabg, $harga50kg) {
			$id = $this->clearText($id);
			$nama = $this->clearText($nama);
			$alamat = $this->clearText($alamat);
			$telepon = $this->clearText($telepon);
			$pangkalan = $this->clearText($pangkalan);
			$tempo = $this->clearText($tempo);
			$pic = $this->clearText($pic);
			$harga3kg = $this->clearText($harga3kg);
			$harga12kg = $this->clearText($harga12kg);
			$hargabg = $this->clearText($hargabg);
			$harga50kg = $this->clearText($harga50kg);
			
			if ($result = $this->runQuery("UPDATE `konsumen` SET `nama` = '$nama', `alamat` = '$alamat', `telepon` = '$telepon', 
			`pangkalan` = '$pangkalan', `waktu_tempo` = '$tempo', `pic` = '$pic', `harga_3kg` = '$harga3kg', 
			`harga_12kg` = '$harga12kg', `harga_12kg_bg` = '$hargabg', `harga_50kg` = '$harga50kg' WHERE `id` = '$id';")) {
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
		
		function set_harga_jual_khusus($id, $harga50kgkhusus) {
			$id = $this->clearText($id);
			$harga50kgkhusus = $this->clearText($harga50kgkhusus);
			
			if ($result = $this->runQuery("UPDATE `konsumen` SET `harga_50kg_khusus` = '$harga50kgkhusus' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function tambah_kuota_penjualan($idKonsumen, $tgl, $jumlahAlokasi) {
			$idKonsumen = $this->clearText($idKonsumen);
			$tgl = $this->clearText($tgl);
			$jumlahAlokasi = $this->clearText($jumlahAlokasi);
			
			if ($result = $this->runQuery("INSERT INTO `kuota_penjualan`(`id_konsumen`, `tgl`, `jml_alokasi`, `jml_terambil`) 
			VALUES('$idKonsumen', '$tgl', '$jumlahAlokasi', '0')")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function ubah_kuota_penjualan($id, $jumlahAlokasi) {
			$id = $this->clearText($id);
			$jumlahAlokasi = $this->clearText($jumlahAlokasi);
			
			if ($result = $this->runQuery("UPDATE `kuota_penjualan` SET `jml_alokasi` = '$jumlahAlokasi' WHERE `id` = '$id'")) {
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
		
		function hapus_kuota_penjualan($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("DELETE FROM `kuota_penjualan` WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>