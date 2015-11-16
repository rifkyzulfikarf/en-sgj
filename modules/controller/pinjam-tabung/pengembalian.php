<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.pinjam_tabung.php';
		$peminjaman = new pinjam_tabung();
		
		switch ($_POST['apa']) {
			case "get-pinjaman":
				$collect = array();
				
				if (isset($_POST['konsumen']) && $_POST['konsumen'] != "") {
				
					$query = "SELECT `barang`.`nama`, `pinjaman_tabung`.* FROM `pinjaman_tabung` 
					INNER JOIN `barang` ON (`pinjaman_tabung`.`id_barang` = `barang`.`id`) 
					WHERE `pinjaman_tabung`.`id_konsumen` LIKE '".$_POST['konsumen']."' AND 
					`pinjaman_tabung`.`jml_kembali` < `pinjaman_tabung`.`jml_pinjam`;";
				
					if ($qData = $peminjaman->runQuery($query)) {
						while ($rs = $qData->fetch_array()) {
						
							$jenis = ($rs['jenis_pinjaman'] == "1")?"Permanen":"Sementara";
						
							$detail = array();
							array_push($detail, $rs["nama"]);
							array_push($detail, $rs["jml_pinjam"]);
							array_push($detail, $jenis);
							array_push($detail, $rs["tgl_pinjam"]);
							array_push($detail, $rs["tgl_kembali"]);
							array_push($detail, "<button class='btn btn-sm btn-primary' id='btn-show-kembali' data-id='".$rs['id']."' 
							data-jenis='".$rs['jenis_pinjaman']."'><i class='fa fa-share'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "simpan":
				
				$arr=array();
				
				if (isset($_POST['txt-id']) && $_POST['txt-id'] != "" && isset($_POST['txt-jenis']) && $_POST['txt-jenis'] != "" && 
				isset($_POST['dp-kembali']) && $_POST['dp-kembali'] != "" && isset($_POST['txt-jumlah']) && $_POST['txt-jumlah'] != "") {
					
					if ($result = $peminjaman->kembali($_POST['txt-id'], $_POST['txt-jenis'], $_POST['dp-kembali'], $_POST['txt-jumlah'])) {
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