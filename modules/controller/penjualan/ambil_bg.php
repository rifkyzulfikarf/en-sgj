<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pelunasan.php';
		$pelunasan = new pelunasan();
		
		switch ($_POST['apa']) {
			case "get-bg":
				$collect = array();
				
				if (isset($_POST['tgl']) && $_POST['tgl'] != "") {
					if ($query = $pelunasan->get_bg_belum_ambil($_POST['tgl'], $_POST['tgl'])) {
						while ($rs = $query->fetch_array()) {
							$detail = array();
							array_push($detail, $rs["nama"]);
							array_push($detail, $rs["no_bukti"]);
							array_push($detail, "Rp ".number_format($rs["total_bayar"],0,".",","));
							array_push($detail, "<button class='btn btn-sm btn-primary' id='btn-ambil' data-id='".$rs['id']."' 
							data-tgl='".$rs['tgl_bg']."' data-total='".$rs['total_bayar']."' data-bank='".$rs['id_bank']."' 
							data-bukti='".$rs['no_bukti']."'><i class='fa fa-share'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "ambil-bg" :
				$arr=array();
							
				if (isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['tgl']) && $_POST['tgl'] != "" && 
				isset($_POST['total']) && $_POST['total'] != "" && isset($_POST['bank']) && $_POST['bank'] != "" && 
				isset($_POST['bukti']) && $_POST['bukti'] != "") {
					
					if ($result = $pelunasan->ambil_bg($_POST['id'], $_POST['tgl'], $_POST['total'], $_POST['bank'], 
					$_POST['bukti'], d_code($_SESSION['en-data']))) {
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