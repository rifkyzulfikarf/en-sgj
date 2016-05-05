<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pemesanan.php';
		$pemesanan = new pemesanan();
		
		switch ($_POST['apa']) {
			case "get-pemesanan":
				$collect = array();
				
				if ($query = $pemesanan->get_pemesanan()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["id"]);
						array_push($detail, $rs["tgl"]);
						array_push($detail, $rs["tgl_kirim"]);
						array_push($detail, $rs["nama_konsumen"]);
						array_push($detail, $rs["nama_barang"]);
						array_push($detail, $rs["jml"]);
						array_push($detail, $rs["nama_karyawan"]);
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-proses-pesanan' 
											data-id='".$rs["id"]."' data-idkonsumen='".$rs['id_konsumen']."' 
											data-namakonsumen='".$rs['nama_konsumen']."' data-idbarang='".$rs['id_barang']."' 
											data-namabarang='".$rs['nama_barang']."' data-jml='".$rs['jml']."' 
											data-het='".$rs['het']."'> 
											<i class='fa fa-shopping-cart'></i></button>
											<button type='button' class='btn btn-sm btn-danger' id='btn-hapus-pesanan' data-id='".$rs["id"]."'> 
											<i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				
				echo json_encode(array("aaData"=>$collect));
				break;
			case "hapus":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "" ) {
					
					if ($result = $pemesanan->hapus($_POST['id'])) {
						$arr['status']=TRUE;
						$arr['msg']="Data terhapus..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal menghapus..";
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