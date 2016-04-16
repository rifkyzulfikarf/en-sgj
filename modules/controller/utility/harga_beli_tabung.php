<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.barang.php';
		$barang = new barang();
		
		switch ($_POST['apa']) {
			case "get-harga-beli":
				$collect = array();
				
				if ($query = $barang->get_harga_beli_all()) {
					while ($rs = $query->fetch_array()) {
						$detail = array();
						array_push($detail, $rs["nama"]);
						array_push($detail, $rs["jumlah"]);
						array_push($detail, "Rp ".number_format($rs["harga_beli"], 2, ",", "."));
						array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-ubah-data' data-id='".$rs["id"]."' data-jumlah='".$rs['jumlah']."' data-harga='".$rs["harga_beli"]."'>
											<i class='fa fa-pencil'></i></button>
											<button type='button' class='btn btn-sm btn-danger' id='btn-hapus-data' data-id='".$rs["id"]."'>
											<i class='fa fa-trash-o'></i></button>");
						array_push($collect, $detail);
						unset($detail);
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "tambah-harga-beli":
				$arr=array();
				
				if (isset($_POST['cmb-barang']) && $_POST['cmb-barang'] != "" && isset($_POST['txt-jumlah']) && $_POST['txt-jumlah'] != "" && 
				isset($_POST['txt-harga-beli']) && $_POST['txt-harga-beli'] != "") {
					
					if ($result = $barang->tambah_harga_beli($_POST['cmb-barang'], $_POST['txt-jumlah'], $_POST['txt-harga-beli'])) {
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
			case "ubah-harga-beli":
				$arr=array();
				
				if (isset($_POST['cmb-barang']) && $_POST['cmb-barang'] != "" && isset($_POST['txt-jumlah']) && $_POST['txt-jumlah'] != "" && 
				isset($_POST['txt-harga-beli']) && $_POST['txt-harga-beli'] != "" && isset($_POST['txt-id']) && $_POST['txt-id'] != "") {
					
					if ($result = $barang->ubah_harga_beli($_POST['txt-id'], $_POST['cmb-barang'], $_POST['txt-jumlah'], $_POST['txt-harga-beli'])) {
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
			case "hapus-harga-beli":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					
					if ($result = $barang->hapus_harga_beli($_POST['id'])) {
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