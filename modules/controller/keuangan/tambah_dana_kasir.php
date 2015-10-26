<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.kasir.php';
		$kasir = new kasir();
		
		switch ($_POST['apa']) {
			case 'get-akun':
				include 'modules/model/class.akun_kas.php';
				$akun = new akun_kas();
				if ($query = $akun->get_data()) {
					while ($rs = $query->fetch_array()) {
						echo "<option value='".$rs['kode']."'>".$rs["kode"]." - ".$rs['nama_akun']."</option>";
					}
				}
				break;
			case "get-kasir":
				$collect = array();
				
				if ($query = $kasir->get_kasir()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, "Rp ".number_format($rs["saldo"], 0, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-tambah-dana' data-id='".$rs["id"]."'>
									<i class='fa fa-plus'></i> Tambah Dana</button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-dana":
				$arr=array();
				
				if (isset($_POST['txt-idkasir']) && $_POST['txt-idkasir'] != "" && isset($_POST['txt-keterangan']) && $_POST['txt-keterangan'] != "" 
					&& isset($_POST['cmb-akun']) && $_POST['cmb-akun'] != "" && isset($_POST['txt-jumlah']) && $_POST['txt-jumlah'] != "") {
					
					if ($result = $kasir->transaksi_debet($_POST['txt-idkasir'], "-", date("Y-m-d"), $_POST['txt-keterangan'], $_POST['cmb-akun'], $_POST['txt-jumlah'], d_code($_SESSION['en-data']))) {
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