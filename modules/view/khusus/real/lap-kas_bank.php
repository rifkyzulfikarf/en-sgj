<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Laporan Kas Bank
					<span class="tools pull-right">
						<button data-toggle="modal" href="#mdl-kriteria" class="btn btn-primary btn-sm"><i class="fa fa-tint"></i> Kriteria</button>
					</span>
				</header>
				<div class="panel-body">
					<?php  
						if (isset($_POST['bank']) && $_POST['bank'] != "" && isset($_POST['tgl-awal']) && $_POST['tgl-awal'] != "" && 
						isset($_POST['tgl-akhir']) && $_POST['tgl-akhir'] != "") {
					?>
						<div class="pull-right">
							<button class="btn btn-default btn-sm" id="btn-print"><i class="fa fa-print"></i> Print</button>
						</div>
						<div id="print-section">
							<div class="text-center"><h3>Laporan Kas Bank Khusus</h3></div><hr>
							Periode : <?php echo $_POST['tgl-awal']." s/d ".$_POST['tgl-akhir'] ?><br><br>
							<table class="table table-hover table-striped table-mod">
								<thead>
									<tr>
										<th class="text-center">Tanggal</th>
										<th class="text-center">No. Bukti</th>
										<th class="text-center">Keterangan</th>
										<th class="text-center">Setor</th>
										<th class="text-center">Tarik</th>
										<th class="text-center">Bea Admin</th>
										<th class="text-center">Saldo</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = "SELECT `khusus_kas_bank`.`tgl`, `khusus_kas_bank`.`no_bukti`, `khusus_kas_bank`.`keterangan`, `khusus_kas_bank`.`jenis`, 
									`khusus_kas_bank`.`setor`, `khusus_kas_bank`.`tarik`, `khusus_kas_bank`.`bea_admin`, `khusus_kas_bank`.`saldo` FROM `khusus_kas_bank` 
									INNER JOIN `khusus_bank` ON (`khusus_kas_bank`.`id_bank` = `khusus_bank`.`id`)  
									WHERE `khusus_kas_bank`.`id_bank` LIKE '".$_POST['bank']."' 
									AND `khusus_kas_bank`.`tgl` BETWEEN '".$_POST['tgl-awal']."' AND '".$_POST['tgl-akhir']."';";
									
									$totalSetor = 0; $totalTarik = 0; $totalAdmin = 0; $totalSaldo = 0;
									
									if ($daftar = $data->runQuery($query)){
										while( $rs = $daftar->fetch_assoc() ){
											
											$totalSetor += $rs['setor'];
											$totalTarik += $rs['tarik'];
											$totalAdmin += $rs['bea_admin'];
											$totalSaldo = $rs['saldo'];
											
											if ($rs['jenis'] == "1") {
												$jenis = "Tunai";
											} elseif($rs['jenis'] == "2") {
												$jenis = "Transfer";
											} else {
												$jenis = "BG / Cek";
											}
											
											echo "<tr>
												<td class='text-center'>".$rs['tgl']."</td>
												<td>".$rs['no_bukti']."</td>
												<td>".$rs['keterangan']."</td>
												<td class='text-center'>".number_format($rs['setor'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['tarik'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['bea_admin'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['saldo'],0,",",".")."</td>";
											echo "</tr>";
										}
									}
									?>
										<tr>
											<td colspan="4"><strong>Total</strong></td>
											<td class="text-center"><?php echo number_format($totalSetor,0,",",".") ?></td>
											<td class="text-center"><?php echo number_format($totalTarik,0,",",".") ?></td>
											<td class="text-center"><?php echo number_format($totalAdmin,0,",",".") ?></td>
											<td class="text-center"><?php echo number_format($totalSaldo,0,",",".") ?></td>
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
					<input type="hidden" id="no_spa" name="no_spa" value="<?php echo e_url('modules/view/khusus/real/lap-kas_bank.php'); ?>">
					<div class="form-group">
						<select class="form-control" id="bank" name="bank">
							<?php
								if ($query = $data->runQuery("SELECT `khusus_bank`.`id`, `khusus_bank`.`nama` FROM `khusus_bank`;")) {
									while ($rs = $query->fetch_array()) {
										echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
									}
								}
							?>
						</select>
					</div>
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
	
});
</script>