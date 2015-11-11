<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Laporan Penebusan
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
							<div class="text-center"><h3>Laporan Tebus <?php echo ($_POST['cmb-bank'] == "1")?"PT. Energas Nusantara":"PT. Sumber Gasindo Jaya"; ?></h3></div><hr>
							Periode : <?php echo $_POST['tgl-awal']." s/d ".$_POST['tgl-akhir'] ?><br><br>
							<table class="table table-hover table-striped table-mod">
								<thead>
									<tr>
										<th class="text-center">Tgl Tebus</th>
										<th class="text-center">No LO</th>
										<th class="text-center">No SA</th>
										<th class="text-center">Barang</th>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Hrg Satuan</th>
										<th class="text-center">Pajak</th>
										<th class="text-center">Diskon</th>
										<th class="text-center">Bea Admin</th>
										<th class="text-center">Total</th>
										<th class="text-center">Jenis</th>
										<th class="text-center">Bukti</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = "SELECT `pembelian`.*, `barang`.`nama` FROM `pembelian` 
									INNER JOIN `barang` ON (`pembelian`.`id_barang` = `barang`.`id`) 
									WHERE `pembelian`.`id_bank` = '".$_POST['cmb-bank']."' 
									AND `pembelian`.`tgl_tebus` BETWEEN '".$_POST['tgl-awal']."' AND '".$_POST['tgl-akhir']."';";
									
									$totalJml = 0; $totalPajak = 0; $totalDiskon = 0; $totalAdmin = 0; $totalGT = 0;
									
									if ($daftar = $data->runQuery($query)) {
										while( $rs = $daftar->fetch_assoc() ) {
											
											$totalJml += $rs['jml_tabung'];
											$totalPajak += $rs['pajak'];
											$totalDiskon += $rs['diskon'];
											$totalAdmin += $rs['bea_admin'];
											$totalGT += $rs['grand_total'];
											
											$jenis = ($rs['jenis_tarikan']=="1")?"Tunai":"Transfer";
											
											echo "<tr>
												<td class='text-center'>".$rs['tgl_tebus']."</td>
												<td class='text-center'>".$rs['no_lo']."</td>
												<td class='text-center'>".$rs['no_sa']."</td>
												<td class='text-center'>".$rs['nama']."</td>
												<td class='text-center'>".number_format($rs['jml_tabung'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['harga_satuan'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['pajak'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['diskon'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['bea_admin'],0,",",".")."</td>
												<td class='text-center'>".number_format($rs['grand_total'],0,",",".")."</td>
												<td class='text-center'>".$jenis."</td>
												<td class='text-center'>".$rs['no_bukti']."</td>";
											echo "</tr>";
										}
									}
									?>
										<tr>
											<td colspan="4"><strong>Total</strong></td>
											<td class="text-center"><?php echo number_format($totalJml,0,",",".") ?></td>
											<td></td>
											<td class="text-center"><?php echo number_format($totalPajak,0,",",".") ?></td>
											<td class="text-center"><?php echo number_format($totalDiskon,0,",",".") ?></td>
											<td class="text-center"><?php echo number_format($totalAdmin,0,",",".") ?></td>
											<td class="text-center"><?php echo number_format($totalGT,0,",",".") ?></td>
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
					<input type="hidden" id="no_spa" name="no_spa" value="<?php echo e_url('modules/view/laporan/pembelian.php'); ?>">
					<div class="form-group">
						<input type="text" class="form-control" id="tgl-awal" name="tgl-awal" placeholder="Tanggal Awal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="tgl-akhir" name="tgl-akhir" placeholder="Tanggal Akhir">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-bank" name="cmb-bank"></select>
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
		data: {"aksi" : "<?php echo e_url('modules/controller/laporan/pembelian.php'); ?>", "apa" : "get-bank"},
		success: function(event){
			$('#cmb-bank').empty();	
			$('#cmb-bank').html(event);
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
	
});
</script>