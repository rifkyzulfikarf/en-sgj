<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pemesanan.php';
		$pemesanan = new pemesanan();
		
		switch ($_POST['apa']) {
			case "simpan" :
				$arr=array();
							
				if (isset($_POST['tgl']) && $_POST['tgl'] != "" && isset($_POST['barang']) && $_POST['barang'] != "" && 
				isset($_POST['konsumen']) && $_POST['konsumen'] != "" && isset($_POST['jml']) && $_POST['jml'] != "") {
					
					if ($result = $pemesanan->tambah($_POST['tgl'], $_POST['konsumen'], $_POST['barang'], $_POST['jml'], d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Data tersimpan..";
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