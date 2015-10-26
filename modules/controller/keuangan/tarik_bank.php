<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.bank.php';
		$bank = new bank();
		
		switch ($_POST['apa']) {
			case "get-bank":
				$collect = array();
				
				if ($query = $bank->get_bank()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, $rs["nomor_rekening"]);
						array_push($detail, "Rp ".number_format($rs["saldo"], 2, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-tarik' data-id='".$rs["id"]."'>
									<i class='fa fa-money'></i> Tarik Dana</button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tarik-dana":
				$arr=array();
				
				if (isset($_POST['txt-idbank']) && $_POST['txt-idbank'] != "" && isset($_POST['txt-bukti']) && $_POST['txt-bukti'] != "" 
					&& isset($_POST['txt-tgltarik']) && $_POST['txt-tgltarik'] != "" && isset($_POST['txt-keterangan']) && $_POST['txt-keterangan'] != "" 
					&& isset($_POST['txt-jumlah']) && $_POST['txt-jumlah'] != "" && isset($_POST['txt-beaadmin']) && $_POST['txt-beaadmin'] != "" 
					&& isset($_POST['cmb-jenis']) && $_POST['cmb-jenis'] != "") {
					
					if ($result = $bank->transaksi_tarik($_POST['txt-idbank'], $_POST['txt-bukti'], $_POST['txt-tgltarik'], $_POST['txt-keterangan'], 
					$_POST['txt-jumlah'], $_POST['txt-beaadmin'], d_code($_SESSION['en-data']), $_POST['cmb-jenis'])) {
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