<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Laporan Pinjaman Tabung
					<span class="tools pull-right">
						<button data-toggle="modal" href="#mdl-kriteria" class="btn btn-primary btn-sm"><i class="fa fa-tint"></i> Kriteria</button>
					</span>
				</header>
				<div class="panel-body">
					<?php  
						if (isset($_POST['konsumen']) && $_POST['konsumen'] != "") {
					?>
						<div class="pull-right">
							<button class="btn btn-default btn-sm" id="btn-print"><i class="fa fa-print"></i> Print</button>
						</div>
						<div id="print-section">
							<div class="text-center"><h3>Laporan Pinjaman Tabung</h3></div><hr>
							<table class="table table-hover table-striped table-mod">
								<thead>
									<tr>
										<th class="text-center">ID</th>
										<th class="text-center">Konsumen</th>
										<th class="text-center">Barang</th>
										<th class="text-center">Jumlah Pinjam</th>
										<th class="text-center">Jenis Pinjaman</th>
										<th class="text-center">Tgl Pinjam</th>
										<th class="text-center">Tgl Kembali</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = "SELECT `pinjaman_tabung`.*, `konsumen`.`nama` AS `nama_konsumen`, `barang`.`nama` AS `nama_barang` 
									FROM `pinjaman_tabung` 
									INNER JOIN `konsumen` ON (`pinjaman_tabung`.`id_konsumen` = `konsumen`.`id`) 
									INNER JOIN `barang` ON (`pinjaman_tabung`.`id_barang` = `barang`.`id`) 
									WHERE `pinjaman_tabung`.`id_konsumen` LIKE '".$_POST['konsumen']."';";
									
									$totalPinjam = 0;
									
									if ($daftar = $data->runQuery($query)){
										while( $rs = $daftar->fetch_assoc() ){
											
											$totalPinjam += $rs['jml_pinjam'];
											$jenis = ($rs['jenis_pinjaman']=="1")?"Permanen":"Sementara";
											
											echo "<tr>
												<td class='text-center'>".$rs['id']."</td>
												<td class='text-center'>".$rs['nama_konsumen']."</td>
												<td class='text-center'>".$rs['nama_barang']."</td>
												<td class='text-center'>".number_format($rs['jml_pinjam'],0,",",".")."</td>
												<td class='text-center'>".$jenis."</td>
												<td class='text-center'>".$rs['tgl_pinjam']."</td>
												<td class='text-center'>".$rs['tgl_kembali']."</td>";
											echo "</tr>";
										}
									}
									?>
										<tr>
											<td colspan="3"><strong>Total Pinjaman</strong></td>
											<td class="text-center"><?php echo number_format($totalPinjam,0,",",".") ?></td>
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
					<input type="hidden" id="no_spa" name="no_spa" value="<?php echo e_url('modules/view/laporan/pinjam_tabung.php'); ?>">
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