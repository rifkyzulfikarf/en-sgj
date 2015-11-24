<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pembelian_khusus.php';
		$pembelian = new pembelian_khusus();
		
		switch ($_POST['apa']) {
			case "get-loading":
				if (isset($_POST['tgl']) && $_POST['tgl'] != "") {
					$loading = new loading_khusus();
					if ($query = $loading->get_loading_by_tgl($_POST['tgl'])) {
						while ($rs = $query->fetch_array()) {
							echo "<option value='".$rs['id']."' data-jumlah='".$rs['tabung_isi']."'>".$rs['id']." - ".$rs['tabung_isi']." Tabung</option>";
						}
					}
				}
				break;
			case "simpan":
				$arr=array();
				if (isset($_POST['tgl']) && $_POST['tgl'] != "" && isset($_POST['beaadmin']) && $_POST['beaadmin'] != "" && 
				isset($_POST['total']) && $_POST['total'] != "" && isset($_POST['bank']) && $_POST['bank'] != "" && 
				isset($_POST['jenis']) && $_POST['jenis'] != "" && isset($_POST['bukti']) && $_POST['bukti'] != "" && 
				isset($_POST['detail']) && $_POST['detail'] != "") {
					
					if ($result = $pembelian->transaksi_pembelian($_POST['tgl'], $_POST['beaadmin'], $_POST['total'], 
					$_POST['bank'], $_POST['bukti'], $_POST['jenis'], d_code($_SESSION['en-data']), $_POST['detail'])) {
						$arr['status']=TRUE;
						$arr['msg']="Transaksi sukses tersimpan..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal menyimpan..";
					}
				} else {
					$arr['status']=FALSE;
					$arr['msg']="Harap isi data dengan lengkap..";
				}
				
				echo json_encode($arr);
				break;
		}
	}
?>