<?php

if (isset($_POST['menu']) && $_POST['menu'] != "" &&  isset($_POST['id']) && $_POST['id'] != "") {
	require './modules/model/class.user.php';
	$data  = new user();

	$arr = array();
	$arr = $_POST['menu'];
	
	$query = "";

	//----- netralkan 
	$delete = $data->runQuery("DELETE FROM `akses` WHERE `id_pemakai` = '".d_code($_POST['id'])."';");

	foreach ($arr as $key => $value) {
		//$add = $data->add_menu($_POST['id'], $value );
		$query .= "INSERT INTO `akses` (`id_pemakai`,`id_menu`) VALUES ('".d_code($_POST['id'])."','".$value."');";
	}
	
	if ($result = $data->runMultipleQueries($query)) {
		echo "Data tersimpan..!";
	} else {
		echo "Gagal menyimpan..!";
	}
	

}


?>