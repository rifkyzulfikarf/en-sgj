<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pembelian.php';
		$pembelian = new pembelian();
		
		switch ($_POST['apa']) {
			case "get-barang":
				include 'modules/model/class.barang.php';
				$barang = new barang();
				if ($query = $barang->get_barang()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."' data-harga='".$rs['harga_beli']."'>".$rs['nama']."</option>";
					}
				}
				break;
			case "get-bank":
				$bank = new bank();
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']." ".$rs['nomor_rekening']."</option>";
					}
				}
				break;
			case "simpan":
				$arr=array();
				if (isset($_POST['tgl']) && $_POST['tgl'] != "" && isset($_POST['lo']) && $_POST['lo'] != "" && 
				isset($_POST['sa']) && $_POST['sa'] != "" && isset($_POST['barang']) && $_POST['barang'] != "" && 
				isset($_POST['harga']) && $_POST['harga'] != "" && isset($_POST['jml']) && $_POST['jml'] != "" && 
				isset($_POST['pajak']) && $_POST['pajak'] != "" && isset($_POST['diskon']) && $_POST['diskon'] != "" && 
				isset($_POST['beaadmin']) && $_POST['beaadmin'] != "" && isset($_POST['total']) && $_POST['total'] != "" && 
				isset($_POST['bank']) && $_POST['bank'] != "" && isset($_POST['jenis']) && $_POST['jenis'] != "" && 
				isset($_POST['bukti']) && $_POST['bukti'] != "") {
					
					if ($result = $pembelian->transaksi_pembelian($_POST['tgl'], $_POST['lo'], $_POST['sa'], 
					$_POST['barang'], $_POST['jml'], $_POST['harga'], $_POST['pajak'], $_POST['diskon'], 
					$_POST['beaadmin'], $_POST['total'], $_POST['bank'], $_POST['bukti'], 
					$_POST['jenis'], d_code($_SESSION['en-data']))) {
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