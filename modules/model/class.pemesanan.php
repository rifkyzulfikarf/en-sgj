<?php
	class pemesanan extends koneksi {
		
		function get_pemesanan() {
			$query = "SELECT `pemesanan`.*, `konsumen`.`nama` AS nama_konsumen, `barang`.`nama` AS nama_barang, 
						`barang`.`het`, `karyawan`.`nama` AS nama_karyawan FROM `pemesanan` INNER JOIN `konsumen` 
						ON(`pemesanan`.`id_konsumen` = `konsumen`.`id`) INNER JOIN `barang` 
						ON(`pemesanan`.`id_barang` = `barang`.`id`) INNER JOIN `karyawan` 
						ON(`pemesanan`.`id_karyawan` = `karyawan`.`id`) WHERE `pemesanan`.`proses` = '0' 
						AND `pemesanan`.`hapus` = '0';";
			
			if ($list = $this->runQuery($query)) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function autocode_pemesanan($tgl, $idBarang) {
			$kode = "";
			$prefix = "";
			
			$prefix = ($idBarang=="1")?"EPN":"SPN";
			
			$query = "SELECT MAX(`id`) FROM `pemesanan` WHERE `tgl` = '$tgl' AND `id` LIKE '$prefix%';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				if ($rs[0] == null) {
					$kode = $prefix.date("ymd", strtotime($tgl))."01";
				} else {
					$lastCode = substr($rs[0], 9, 2);
					$newCode = $lastCode + 1;
					
					switch (strlen($newCode)) {
						case 1:
							$kode = $prefix.date("ymd", strtotime($tgl))."0".$newCode;
							break;
						case 2:
							$kode = $prefix.date("ymd", strtotime($tgl)).$newCode;
							break;
					}
				}
			}
			return $kode;
		}
		
		function tambah($tgl, $idKonsumen, $idBarang, $jml, $idKaryawan) {
			$tgl = $this->clearText($tgl);
			$idKonsumen = $this->clearText($idKonsumen);
			$idBarang = $this->clearText($idBarang);
			$jml = $this->clearText($jml);
			$idKaryawan = $this->clearText($idKaryawan);
			
			$id = $this->autocode_pemesanan($tgl, $idBarang);
			
			$query = "INSERT INTO `pemesanan` VALUES('$id', '$tgl', '$idKonsumen', '$idBarang', '$jml', '$idKaryawan', '0', '0');";
			
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function hapus($id) {
			$id = $this->clearText($id);
			
			$query = "UPDATE `pemesanan` SET `hapus` = '1' WHERE `id` = '$id';";
			
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function telah_proses($id) {
			$id = $this->clearText($id);
			
			$query = "UPDATE `pemesanan` SET `proses` = '1' WHERE `id` = '$id';";
			
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>