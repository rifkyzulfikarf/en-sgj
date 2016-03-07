<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Laporan Pelunasan
					<span class="tools pull-right">
						<button data-toggle="modal" href="#mdl-kriteria" class="btn btn-primary btn-sm"><i class="fa fa-tint"></i> Kriteria</button>
					</span>
				</header>
				<div class="panel-body">
					<?php  
						if (isset($_POST['tgl-awal']) && $_POST['tgl-awal'] != "" && isset($_POST['tgl-akhir']) && $_POST['tgl-akhir'] != "") {
					?>
						<div class="pull-right">
							<button class="btn btn-default btn-sm" id="btn-print"><i class="fa fa-print"></i> Print</button>
						</div>
						<div id="print-section">
							<div class="text-center"><h3>Laporan Pelunasan PT. Sumber Gasindo Jaya</h3></div><hr>
							Periode : <?php echo $_POST['tgl-awal']." s/d ".$_POST['tgl-akhir'] ?><br><br>
							<table class="table table-hover table-striped table-mod">
								<thead>
									<tr>
										<th class="text-center">ID Penjualan</th>
										<th class="text-center">Nota</th>
										<th class="text-center">Tgl Pelunasan</th>
										<th class="text-center">Konsumen</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Jenis</th>
										<th class="text-center">Bukti</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = "SELECT `pelunasan`.*, `penjualan`.`id` AS `id_penjualan`, `penjualan`.`no_nota`, `konsumen`.`nama` 
									FROM `pelunasan` 
									INNER JOIN `penjualan` ON (`pelunasan`.`id_penjualan` = `penjualan`.`id`) 
									INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
									WHERE `pelunasan`.`id_bank` = '2' 
									AND `pelunasan`.`tgl` BETWEEN '".$_POST['tgl-awal']."' AND '".$_POST['tgl-akhir']."';";
									
									if ($daftar = $data->runQuery($query)) {
										while( $rs = $daftar->fetch_assoc() ) {
											
											if ($rs['jenis'] == "1") {
												$jenis = "Cash";
											} elseif ($rs['jenis'] == "2") {
												$jenis = "Debet";
											} elseif ($rs['jenis'] == "3") {
												$jenis = "Transfer";
											} else {
												$jenis = "BG";
											}
											
											echo "<tr>
												<td class='text-center'>".$rs['id_penjualan']."</td>
												<td class='text-center'>".$rs['no_nota']."</td>
												<td class='text-center'>".$rs['tgl']."</td>
												<td class='text-center'>".$rs['nama']."</td>
												<td class='text-center'>".number_format($rs['total_bayar'],0,",",".")."</td>
												<td class='text-center'>".$jenis."</td>
												<td class='text-center'>".$rs['no_bukti']."</td>";
											echo "</tr>";
										}
									}
									?>
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
					<input type="hidden" id="no_spa" name="no_spa" value="<?php echo e_url('modules/view/laporan/pelunasan.php'); ?>">
					<div class="form-group">
						<input type="text" class="form-control" id="tgl-awal" name="tgl-awal" placeholder="Tanggal Awal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="tgl-akhir" name="tgl-akhir" placeholder="Tanggal Akhir">
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