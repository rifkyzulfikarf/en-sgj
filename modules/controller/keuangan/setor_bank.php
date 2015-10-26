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
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-setor' data-id='".$rs["id"]."'>
									<i class='fa fa-plus'></i> Setor Dana</button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "setor-dana":
				$arr=array();
				
				if (isset($_POST['txt-idbank']) && $_POST['txt-idbank'] != "" && isset($_POST['txt-bukti']) && $_POST['txt-bukti'] != "" 
					&& isset($_POST['txt-tglsetor']) && $_POST['txt-tglsetor'] != "" && isset($_POST['txt-keterangan']) && $_POST['txt-keterangan'] != "" 
					&& isset($_POST['txt-jumlah']) && $_POST['txt-jumlah'] != "") {
					
					if ($result = $bank->transaksi_setor($_POST['txt-idbank'], $_POST['txt-bukti'], $_POST['txt-tglsetor'], $_POST['txt-keterangan'], 
					$_POST['txt-jumlah'], d_code($_SESSION['en-data']))) {
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