<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Jakarta');
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br \>');

include "../../blob/blob.php";
require_once "../../ext/PHPExcel.php";
	
$data = new koneksi();
$ds   = DIRECTORY_SEPARATOR;
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = "../../ext/";
	$temp = explode(".",$_FILES["file"]["name"]);
	$newFileName = rand(1,99999999) . '.' .end($temp);
	$targetFile =  $targetPath. $newFileName;
	move_uploaded_file($tempFile,$targetFile);
	
	$objReader = new PHPExcel_Reader_Excel5();
	$objReader->setReadDataOnly(true);
	$objExcel = $objReader->load("../../ext/".$newFileName);
	
	$objExcel->setActiveSheetIndex(0);
	$highestRow = $objExcel->setActiveSheetIndex(0)->getHighestRow();
	
	for ($row = 9; $row <= $highestRow; $row++) {
		$idPangkalan = $objExcel->getSheet(0)->getCell('A'.$row)->getValue();
		$hari = $objExcel->getSheet(0)->getCell('B'.$row)->getValue();
		$bulan = $objExcel->getSheet(0)->getCell('C'.$row)->getValue();
		$tahun = $objExcel->getSheet(0)->getCell('D'.$row)->getValue();
		$alokasi = $objExcel->getSheet(0)->getCell('E'.$row)->getValue();
		
		if (strlen($hari) == 1) {
			$hari = "0".$hari;
		}
		
		if (strlen($bulan) == 1) {
			$bulan = "0".$bulan;
		}
		
		$tanggal = $tahun."-".$bulan."-".$hari;
		
		$query = $data->runQuery("INSERT INTO `kuota_penjualan`(`id_konsumen`, `tgl`, `jml_alokasi`, `jml_terambil`) 
		VALUES('$idPangkalan', '$tanggal', '$alokasi', '0')");
	}
	
	
	$objExcel->disconnectWorksheets();
	unset($objExcel);
	unlink($targetFile);
	
}
?>