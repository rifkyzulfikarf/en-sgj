<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Laporan Penjualan
					<span class="tools pull-right">
						<button data-toggle="modal" href="#mdl-kriteria" class="btn btn-primary btn-sm"><i class="fa fa-tint"></i> Kriteria</button>
					</span>
				</header>
				<div class="panel-body">
					<?php  
						if (isset($_POST['tgl-awal']) && $_POST['tgl-awal'] != "" && isset($_POST['tgl-akhir']) && $_POST['tgl-akhir'] != "" 
						&& isset($_POST['cmb-bank']) && $_POST['cmb-bank'] != "") {
					?>
						<div class="pull-right">
							<button class="btn btn-default btn-sm" id="btn-print"><i class="fa fa-print"></i> Print</button>
						</div>
						<div id="print-section">
							<div class="text-center"><h3>Laporan Penjualan <?php echo ($_POST['cmb-bank'] == "1")?"PT. Energas Nusantara":"PT. Sumber Gasindo Jaya"; ?></h3></div><hr>
							Periode : <?php echo $_POST['tgl-awal']." s/d ".$_POST['tgl-akhir'] ?><br><br>
							<table class="table table-hover table-striped table-mod">
								<thead>
									<tr>
										<th class="text-center">Tgl</th>
										<th class="text-center">Konsumen</th>
										<th class="text-center">Barang</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Hrg Jual</th>
										<th class="text-center">Total Jual</th>
										<th class="text-center">Total Bayar</th>
										<th class="text-center">Jenis</th>
										<th class="text-center">Bukti</th>
										<th class="text-center">Nota</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									if ($_POST['cmb-bank'] == "1") {	//energas
										$query = "SELECT `penjualan`.*, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen` 
										FROM `penjualan` 
										INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
										INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
										WHERE `penjualan`.`id_bank` = '1' 
										AND `penjualan`.`id_konsumen` LIKE '".$_POST['cmb-konsumen']."' 
										AND `penjualan`.`jenis` LIKE '".$_POST['cmb-jenis']."' 
										AND `penjualan`.`tgl` BETWEEN '".$_POST['tgl-awal']."' AND '".$_POST['tgl-akhir']."';";
									} else {							//gasindo
										$query = "SELECT `penjualan`.*, `barang`.`nama` AS `nama_barang`, `konsumen`.`nama` AS `nama_konsumen` 
										FROM `penjualan` 
										INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
										INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
										WHERE (`penjualan`.`id_bank` = '2' OR `penjualan`.`id_bank` = '0') 
										AND `penjualan`.`id_konsumen` LIKE '".$_POST['cmb-konsumen']."' 
										AND `penjualan`.`jenis` LIKE '".$_POST['cmb-jenis']."' 
										AND `penjualan`.`tgl` BETWEEN '".$_POST['tgl-awal']."' AND '".$_POST['tgl-akhir']."';";
									}
									
									
									
									$totalJml = 0; $totalJual = 0; $totalBayar = 0;
									
									if ($daftar = $data->runQuery($query)) {
										while( $rs = $daftar->fetch_assoc() ) {
											
											$totalJml += $rs['jml'];
											$totalJual += $rs['total_jual'];
											$totalBayar += $rs['total_bayar'];
											
											if ($rs['jenis'] == "1") {
												$jenis = "Cash";
											} elseif ($rs['jenis'] == "2") {
												$jenis = "Debet";
											} elseif ($rs['jenis'] == "3") {
												$jenis = "Transfer";
											} else {
												$jenis = "Tempo";
											}
											
											echo "<tr>
												<td class='text-center'>".$rs['tgl']."</td>
												<td class='text-center'>".$rs['nama_konsumen']."</td>
												<td class='text-center'>".$rs['nama_barang']."</td>
												<td class='text-center'>".number_format($rs['jml'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['harga_jual'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['total_jual'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['total_bayar'],0,",",".")."</td>
												<td class='text-center'>".$jenis."</td>
												<td class='text-center'>".$rs['no_bukti']."</td>
												<td class='text-center'>".$rs['no_nota']."</td>";
											echo "</tr>";
										}
									}
									?>
										<tr>
											<td colspan="3"><strong>Total</strong></td>
											<td class="text-center"><?php echo number_format($totalJml,0,",",".") ?></td>
											<td></td>
											<td class="text-center"><?php echo number_format($totalJual,0,",",".") ?></td>
											<td class="text-center"><?php echo number_format($totalBayar,0,",",".") ?></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
								</tbody>
							</table>
							<p class="text-muted small">Dicetak oleh <?php echo $_SESSION['en-nama'] ?>, pada <?php echo date("d M Y"); ?> </p>
						</div>
					<?php
						} else {
					?>
						<div class="text-center text-muted">
							<p style="font-size:120px;"><i class="fa fa-question-circle"></i></p>
							<p>Silahkan isi kriteria laporan dengan meng-klik tombol kriteria</p>
						</div>
					<?php
						}
					?>
				</div>
			</section>
		</div>
	</div>
</section>

<form action="./" method="POST" role="form">
	<div class="modal fade " id="mdl-kriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Kriteria</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="no_spa" name="no_spa" value="<?php echo e_url('modules/view/laporan/penjualan.php'); ?>">
					<div class="form-group">
						<input type="text" class="form-control" id="tgl-awal" name="tgl-awal" placeholder="Tanggal Awal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="tgl-akhir" name="tgl-akhir" placeholder="Tanggal Akhir">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-konsumen" name="cmb-konsumen"></select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-bank" name="cmb-bank"></select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-jenis" name="cmb-jenis">
							<option value="%">Semua</option>
							<option value="1">Cash</option>
							<option value="2">Debet</option>
							<option value="3">Transfer</option>
							<option value="4">Tempo</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
					<button class="btn btn-primary" type="submit" id="btn-simpan-data">Cari Sesuai Kriteria Diatas</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
$(document).ready(function(){
	
	$.ajax({
		url : "./",
		method: "POST",
		cache: false,
		data: {"aksi" : "<?php echo e_url('modules/controller/laporan/penjualan.php'); ?>", "apa" : "get-bank"},
		success: function(event){
			$('#cmb-bank').empty();	
			$('#cmb-bank').html(event);
		},
		error: function(){
			alert('Gagal terkoneksi dengan server, coba lagi..!');
		}
	});
	
	$.ajax({
		url : "./",
		method: "POST",
		cache: false,
		data: {"aksi" : "<?php echo e_url('modules/controller/laporan/penjualan.php'); ?>", "apa" : "get-konsumen"},
		success: function(event){
			$('#cmb-konsumen').empty();	
			$('#cmb-konsumen').html(event);
		},
		error: function(){
			alert('Gagal terkoneksi dengan server, coba lagi..!');
		}
	});
	
	$('#tgl-awal').datepicker({
		format : "yyyy-mm-dd",
		autoclose : true
	});
	$('#tgl-akhir').datepicker({
		format : "yyyy-mm-dd",
		autoclose : true
	});
	
	$('#btn-print').click(function(ev){
		ev.preventDefault();
		$('#print-section').print({
			globalStyles: true,
			timeout: 250
		});
	});
	
	$('#mdl-kriteria').on('shown.bs.modal', function () {
		$('#cmb-konsumen', this).chosen();
	});
	
});
</script>