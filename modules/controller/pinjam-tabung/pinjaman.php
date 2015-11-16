<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pinjam_tabung.php';
		$peminjaman = new pinjam_tabung();
		
		switch ($_POST['apa']) {
			case "simpan":
				
				$arr=array();
				
				if (isset($_POST['tglpinjam']) && $_POST['tglpinjam'] != "" && isset($_POST['barang']) && $_POST['barang'] != "" && 
				isset($_POST['konsumen']) && $_POST['konsumen'] != "" && isset($_POST['jumlah']) && $_POST['jumlah'] != "" && 
				isset($_POST['jenis']) && $_POST['jenis'] != "") {
					
					if ($result = $peminjaman->pinjam($_POST['konsumen'], $_POST['barang'], $_POST['tglpinjam'], $_POST['tglkembali'], 
					$_POST['jenis'], $_POST['jumlah'], d_code($_SESSION['en-data']))) {
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