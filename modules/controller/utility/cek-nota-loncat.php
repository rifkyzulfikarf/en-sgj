<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		$data = new koneksi();
		
		switch ($_POST['apa']) {
			case "cek-nota":
				if (isset($_POST['awal']) && $_POST['awal'] != "" && isset($_POST['akhir']) && $_POST['akhir'] != "") {
					$awal = intval($_POST['awal']);
					$akhir = intval($_POST['akhir']);
					
					echo "Hasil Pengecekan Nota Loncat<br><br>-----<br>";
					echo "Batas awal : 0".$awal."<br>";
					echo "Batas akhir : 0".$akhir."<br>";
					
					$jumlah = 0;
					for ($i = $awal; $i <= $akhir; $i++) {
						$nota = "0".$i;
						if ($query = $data->runQuery("SELECT COUNT(`id`) FROM `penjualan` WHERE `no_nota` = '$nota'")) {
							$rs = $query->fetch_array();
							$hasil = $rs[0];
							
							if ($hasil == null || $hasil == 0) {
								echo "Nota no : ".$nota." tidak ditemukan.<br>";
								$jumlah++;
							}
						}
					}
					
					echo "<br>-----<br>Pengecekan selesai. ".$jumlah." nota loncat ditemukan.";
					
				}
				break;
		}
	}
?>