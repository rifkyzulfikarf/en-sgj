<?php
	class pinjam_tabung extends koneksi {
		function autocode() {
			$kode = "";
			$query = "SELECT COUNT(`id`) FROM `pinjaman_tabung` WHERE `tgl_pinjam` = '".date("Y-m-d")."';";
			if ($result = $this->runQuery($query)) {
				$rs = $result->fetch_array();
				
				switch (strlen($rs[0] + 1)) {
					case 1:
						$kode = "EPT".date("ymd")."0".($rs[0] + 1);
						break;
					case 2:
						$kode = "EPT".date("ymd").($rs[0] + 1);
						break;
				}
			}
			return $kode;
		}
		
		function get_pinjaman($idKonsumen, $idBarang, $jenis, $accGudangPinjam, $accGudangKembali, $tglPinjamAwal, $tglPinjamAkhir, 
		$tglKembaliAwal, $tglKembaliAkhir) {
			$query = "SELECT `pinjaman_tabung`.*, `konsumen`.`nama`, `barang`.`nama` FROM `pinjaman_tabung` 
					INNER JOIN `konsumen` ON (`pinjaman_tabung`.`id_konsumen` = `konsumen`.`id`) 
					INNER JOIN `barang` ON (`pinjaman_tabung`.`id_barang` = `barang`.`id`) 
					WHERE `pinjaman_tabung`.`id_konsumen` LIKE '$idKonsumen' AND 
					`pinjaman_tabung`.`id_barang` LIKE '$idBarang' AND 
					`pinjaman_tabung`.`jenis_pinjaman` LIKE '$jenis' AND 
					`pinjaman_tabung`.`acc_gudang_pinjam` = '$accGudangPinjam' AND 
					`pinjaman_tabung`.`acc_gudang_kembali` = '$accGudangKembali' AND 
					`pinjaman_tabung`.`tgl_pinjam` BETWEEN '$tglPinjamAwal' AND '$tglPinjamAkhir' AND 
					`pinjaman_tabung`.`tgl_kembali` BETWEEN '$tglKembaliAwal' AND '$tglKembaliAkhir';";
			
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
		
		function pinjam($idKonsumen, $idBarang, $tglPinjam, $tglKembali, $jenis, $jumlah, $idKaryawan) {
			$id = $this->autocode();
			$idKonsumen = $this->clearText($idKonsumen);
			$idBarang = $this->clearText($idBarang);
			$tglPinjam = $this->clearText($tglPinjam);
			$tglKembali = $this->clearText($tglKembali);
			$jenis = $this->clearText($jenis);
			$jumlah = $this->clearText($jumlah);
			$idKaryawan = $this->clearText($idKaryawan);
			
			if ($jenis == "1") {				//permanen
				$tglKembali = "0000-00-00";
			}
			
			$query = "INSERT INTO `pinjaman_tabung`(`id`, `id_konsumen`, `id_barang`, `jenis_pinjaman`, `tgl_pinjam`, 
					`jml_pinjam`, `tgl_kembali`, `jml_kembali`, `acc_gudang_pinjam`, `acc_gudang_kembali`, `id_karyawan`) 
					VALUES('$id', '$idKonsumen', '$idBarang', '$jenis', '$tglPinjam', '$jumlah', '$tglKembali', 
					'0', '0', '0', '$idKaryawan');";
			
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function acc_gudang_pinjam($id, $idBarang, $jumlah, $acc, $idGudang) {
			$id = $this->clearText($id);
			$idBarang = $this->clearText($idBarang);
			$jumlah = $this->clearText($jumlah);
			$acc = $this->clearText($acc);
			$idGudang = $this->clearText($idGudang);
			
			$query = "UPDATE `pinjaman_tabung` SET `acc_gudang_pinjam` = '$acc', `id_gudang_pinjam` = '$idGudang' WHERE `id` = '$id';";
			
			if ($acc == "1") {		//jika disetujui
				$query .= "UPDATE `barang` SET `stok_kosong` = `stok_kosong` - $jumlah, `stok_pinjam` = `stok_pinjam` + $jumlah 
							WHERE `id` = '$idBarang';";
			}
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function kembali($id, $jenis, $tglKembali, $jumlah) {
			$id = $this->clearText($id);
			$tglKembali = $this->clearText($tglKembali);
			$jumlah = $this->clearText($jumlah);
			
			$query = "UPDATE `pinjaman_tabung` SET `tgl_kembali` = '$tglKembali', `jml_kembali` = '$jumlah' WHERE `id` = '$id';";
			
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function acc_gudang_kembali($id, $idBarang, $jumlah, $acc, $idGudang) {
			$id = $this->clearText($id);
			$idBarang = $this->clearText($idBarang);
			$jumlah = $this->clearText($jumlah);
			$acc = $this->clearText($acc);
			$idGudang = $this->clearText($idGudang);
			
			$query = "UPDATE `pinjaman_tabung` SET `acc_gudang_kembali` = '$acc', `id_gudang_kembali` = '$idGudang' WHERE `id` = '$id';";
			
			if ($acc == "1") {		//jika disetujui
				$query .= "UPDATE `barang` SET `stok_kosong` = `stok_kosong` + $jumlah, `stok_pinjam` = `stok_pinjam` - $jumlah 
							WHERE `id` = '$idBarang';";
			}
			
			if ($result = $this->runMultipleQueries($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
?>
