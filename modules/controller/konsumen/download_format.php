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
	$objExcel = PHPExcel_IOFactory::load("../../ext/format-impor-alokasi.xls");
	$objWriter = new PHPExcel_Writer_Excel5($objExcel);
	
	$objExcel->setActiveSheetIndex(1);
	
	$startRow = 4;
	if ($query = $data->runQuery("SELECT `id`,`nama` FROM `konsumen` WHERE `pangkalan` = '1' AND `hapus` = '0'")) {
		while ($rs = $query->fetch_array()) {
			$objExcel->getActiveSheet()->SetCellValue('A'.$startRow, $rs['id']);
			$objExcel->getActiveSheet()->SetCellValue('B'.$startRow, $rs['nama']);
			$startRow++;
		}
	}
	
	header('Content-type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename="format-impor-alokasi.xls"');
	$objWriter->save('php://output');
?>