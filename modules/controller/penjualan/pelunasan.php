<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pelunasan.php';
		//include '../../model/class.pelunasan.php';
		$pelunasan = new pelunasan();
		
		switch ($_POST['apa']) {
			case "get-penjualan-tempo":
				$collect = array();
				
				if (isset($_POST['tgl']) && $_POST['tgl'] != "") {
					if ($query = $pelunasan->get_penjualan_belum_lunas($_POST['tgl'], $_POST['tgl'])) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["id"]);
							array_push($detail, $rs["tgl"]);
							array_push($detail, $rs["nama_konsumen"]);
							array_push($detail, $rs["nama_barang"]);
							array_push($detail, $rs["jml"]);
							array_push($detail, "Rp ".number_format($rs["harga_jual"],0,".",","));
							array_push($detail, "Rp ".number_format($rs["total_jual"],0,".",","));
							array_push($detail, "Rp ".number_format($rs["total_bayar"],0,".",","));
							array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-show-bayar' data-id='".$rs["id"]."'> 
							<i class='fa fa-shopping-cart'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "get-bank":
				$bank = new bank();
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['id']."'>".$rs['nama']." ".$rs['nomor_rekening']."</option>";
					}
				}
				break;
			case "simpan-pelunasan":
				$arr=array();
							
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['tgl']) && $_POST['tgl'] != "" && 
				isset($_POST['total']) && $_POST['total'] != "" && isset($_POST['jenis']) && $_POST['jenis'] != "" && 
				isset($_POST['bank']) && $_POST['bank'] != "" && isset($_POST['bukti']) && $_POST['bukti'] != "") {
					
					if ($_POST['jenis'] == '4') {
						$tglBg = $_POST['tglBg'];
					} else {
						$tglBg = '0000-00-00';
					}
					
					if ($result = $pelunasan->bayar_pelunasan($_POST['id'], $_POST['tgl'], $_POST['total'], $_POST['jenis'], 
					$tglBg, $_POST['bank'], $_POST['bukti'], d_code($_SESSION['en-data']))) {
						$arr['status']=TRUE;
						$arr['msg']="Pelunasan sukses tersimpan..";
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