<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Laporan Piutang Khusus
					<span class="tools pull-right">
						<button data-toggle="modal" href="#mdl-kriteria" class="btn btn-primary btn-sm"><i class="fa fa-tint"></i> Kriteria</button>
					</span>
				</header>
				<div class="panel-body">
					<?php  
						if (isset($_POST['konsumen']) && $_POST['konsumen'] != "" && isset($_POST['tgl-awal']) && $_POST['tgl-awal'] != "" && 
						isset($_POST['tgl-akhir']) && $_POST['tgl-akhir'] != "") {
					?>
						<div class="pull-right">
							<button class="btn btn-default btn-sm" id="btn-print"><i class="fa fa-print"></i> Print</button>
						</div>
						<div id="print-section">
							<div class="text-center"><h3>Laporan Piutang Khusus</h3></div><hr>
							Periode : <?php echo $_POST['tgl-awal']." s/d ".$_POST['tgl-akhir'] ?><br><br>
							<table class="table table-hover table-striped table-mod">
								<thead>
									<tr>
										<th class="text-center">ID</th>
										<th class="text-center">Tgl Trx</th>
										<th class="text-center">Nota</th>
										<th class="text-center">Konsumen</th>
										<th class="text-center">Barang</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Satuan</th>
										<th class="text-center">Total</th>
										<th class="text-center">Tgl Tempo</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = "SELECT `khusus_penjualan`.`id`, `khusus_penjualan`.`tgl`, `khusus_penjualan`.`no_nota`, `konsumen`.`nama` AS `nama_konsumen`, 
									``khusus_barang`.`nama` AS `nama_`khusus_barang`, `khusus_penjualan`.`jml`, `khusus_penjualan`.`harga_jual`, `khusus_penjualan`.`total_jual`, 
									`khusus_penjualan`.`tgl_tempo` FROM `khusus_penjualan` 
									INNER JOIN `konsumen` ON (`khusus_penjualan`.`id_konsumen` = `konsumen`.`id`)  
									INNER JOIN ``khusus_barang` ON (`khusus_penjualan`.`id_`khusus_barang` = ``khusus_barang`.`id`)  
									WHERE `khusus_penjualan`.`jenis` = '4' AND 
									`khusus_penjualan`.`total_bayar` < `khusus_penjualan`.`total_jual` AND 
									`khusus_penjualan`.`id_konsumen` LIKE '".$_POST['konsumen']."' AND 
									`khusus_penjualan`.`tgl` BETWEEN '".$_POST['tgl-awal']."' AND '".$_POST['tgl-akhir']."';";
									
									$total = 0;
									
									if ($daftar = $data->runQuery($query)){
										while( $rs = $daftar->fetch_assoc() ){
											
											$total += $rs['total_jual'];
											
											echo "<tr>
												<td class='text-center'>".$rs['id']."</td>
												<td class='text-center'>".$rs['tgl']."</td>
												<td>".$rs['no_nota']."</td>
												<td>".$rs['nama_konsumen']."</td>
												<td>".$rs['nama_barang']."</td>
												<td class='text-center'>".number_format($rs['jml'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['harga_jual'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['total_jual'],0,",",".")."</td>
												<td>".$rs['tgl_tempo']."</td>";
											echo "</tr>";
										}
									}
									?>
										<tr>
											<td colspan="7"><strong>Total</strong></td>
											<td class="text-center"><?php echo number_format($total,0,",",".") ?></td>
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
					<input type="hidden" id="no_spa" name="no_spa" value="<?php echo e_url('modules/view/khusus/real/lap-piutang.php'); ?>">
					<div class="form-group">
						<select class="form-control" id="konsumen" name="konsumen">
							<option value="%">Semua</option>
							<?php
								if ($query = $data->runQuery("SELECT `konsumen`.`id`, `konsumen`.`nama` FROM `konsumen`;")) {
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
	
	$('#mdl-kriteria').on('shown.bs.modal', function () {
		$('#konsumen', this).chosen();
	});
	
});
</script>