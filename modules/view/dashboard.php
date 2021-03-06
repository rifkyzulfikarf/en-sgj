<?php
	$data = new koneksi();
	$qPiutang = "SELECT SUM(`penjualan`.`total_jual`) AS `total_piutang` FROM `penjualan` 
				WHERE `penjualan`.`jenis` = '4' AND `penjualan`.`total_bayar` < `penjualan`.`total_jual`;";
	
	if ($queryPiutang = $data->runQuery($qPiutang)) {
		$rsPiutang = $queryPiutang->fetch_array();
	}
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading tab-bg-dark-navy-blue">
					<ul class="nav nav-tabs">
						<li class="active">
							<a data-toggle="tab" href="#penjualantempo" aria-expanded="true">Piutang Penjualan</a>
						</li>
						<li>
							<a data-toggle="tab" href="#bgcair" aria-expanded="false">Tgl Cair BG</a>
						</li>
						<li>
							<a data-toggle="tab" href="#alokasipangkalan" aria-expanded="false">Alokasi Hari Ini</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tebusanpending" aria-expanded="false">Loading Pending</a>
						</li>
						<li>
							<a data-toggle="tab" href="#pemesanan" aria-expanded="false">Pemesanan LPG</a>
						</li>
					</ul>
				</header>
				<div class="panel-body">
					<div class="tab-content">
						<div id="penjualantempo" class="tab-pane active">
							<strong>Total Keseluruhan Piutang : Rp <?php echo number_format($rsPiutang['total_piutang'], 0, ",", "."); ?></strong>
							<div class="adv-table">
								<table class="display table table-bordered table-striped" id="tabel-penjualan-tempo">
									<thead>
										<tr>
											<th>Tgl Tempo</th>
											<th>No Nota</th>
											<th>Konsumen</th>
											<th>Barang</th>
											<th>Jumlah</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$query = "SELECT `penjualan`.`tgl_tempo`, `penjualan`.`no_nota`, `konsumen`.`nama` AS `nama_konsumen`, `barang`.`nama` AS 
										`nama_barang`, `penjualan`.`jml`, `penjualan`.`harga_jual`, `penjualan`.`total_jual` FROM `penjualan` 
										INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
										INNER JOIN `barang` ON (`penjualan`.`id_barang` = `barang`.`id`) 
										WHERE `penjualan`.`jenis` = '4' AND `penjualan`.`total_bayar` < `penjualan`.`total_jual`;";
										if ($result = $data->runQuery($query)) {
											while ($rs = $result->fetch_array()) {
											
												$tglTempo = date('Y-m-d', strtotime($rs['tgl_tempo']));
												$tglSekarang = date('Y-m-d');
												
												if ($tglTempo <= $tglSekarang) {
													echo "<tr class='highlight'>
														<td>".$rs['tgl_tempo']."</td>
														<td>".$rs['no_nota']."</td>
														<td>".$rs['nama_konsumen']."</td>
														<td>".$rs['nama_barang']."</td>
														<td>".$rs['jml']." x Rp ".number_format($rs['harga_jual'],0,".",",")."</td>
														<td>Rp ".number_format($rs['total_jual'],0,".",",")."</td>
														</tr>";
												} else {
													echo "<tr>
														<td>".$rs['tgl_tempo']."</td>
														<td>".$rs['no_nota']."</td>
														<td>".$rs['nama_konsumen']."</td>
														<td>".$rs['nama_barang']."</td>
														<td>".$rs['jml']." x Rp ".number_format($rs['harga_jual'],0,".",",")."</td>
														<td>Rp ".number_format($rs['total_jual'],0,".",",")."</td>
														</tr>";
												}
											}
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th>Tgl Tempo</th>
											<th>No Nota</th>
											<th>Konsumen</th>
											<th>Barang</th>
											<th>Jumlah</th>
											<th>Total</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div id="bgcair" class="tab-pane">
							<div class="adv-table">
								<table class="display table table-bordered table-striped" id="tabel-bg-cair">
									<thead>
										<tr>
											<th>Tgl Cair BG</th>
											<th>Nomor BG</th>
											<th>Konsumen</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$query = "SELECT `pelunasan`.`no_bukti`, `pelunasan`.`tgl_bg`, `konsumen`.`nama` AS 
										`nama_konsumen`, `pelunasan`.`total_bayar` FROM `pelunasan` 
										INNER JOIN `penjualan` ON (`pelunasan`.`id_penjualan` = `penjualan`.`id`) 
										INNER JOIN `konsumen` ON (`penjualan`.`id_konsumen` = `konsumen`.`id`) 
										WHERE `pelunasan`.`jenis` = '4' AND `pelunasan`.`ambil_bg` = '0' 
										LIMIT 20;";
										if ($result = $data->runQuery($query)) {
											while ($rs = $result->fetch_array()) {
												
												$tglBG = date('Y-m-d', strtotime($rs['tgl_bg']));
												$tglSekarang = date('Y-m-d');
												
												if ($tglBG <= $tglSekarang) {
													echo "<tr class='highlight'>
														<td>".$rs['tgl_bg']."</td>
														<td>".$rs['no_bukti']."</td>
														<td>".$rs['nama_konsumen']."</td>
														<td>Rp ".number_format($rs['total_bayar'],0,".",",")."</td>
														</tr>";
												} else {
													echo "<tr>
														<td>".$rs['tgl_bg']."</td>
														<td>".$rs['no_bukti']."</td>
														<td>".$rs['nama_konsumen']."</td>
														<td>Rp ".number_format($rs['total_bayar'],0,".",",")."</td>
														</tr>";
												}
											}
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th>Tgl Cair BG</th>
											<th>Nomor BG</th>
											<th>Konsumen</th>
											<th>Total</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div id="alokasipangkalan" class="tab-pane">
							<div class="adv-table">
								<table class="display table table-bordered table-striped" id="tabel-alokasi-pangkalan">
									<thead>
										<tr>
											<th>Konsumen</th>
											<th>Alokasi</th>
											<th>Telah Diambil</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$query = "SELECT `konsumen`.`id`, `konsumen`.`nama` AS `nama_konsumen`, `kuota_penjualan`.`jml_alokasi` 
										FROM `kuota_penjualan` 
										INNER JOIN `konsumen` ON (`kuota_penjualan`.`id_konsumen` = `konsumen`.`id`) 
										WHERE tgl = '".date("Y-m-d")."';";
										if ($result = $data->runQuery($query)) {
											while ($rs = $result->fetch_array()) {
												$qCek = "SELECT SUM(jml) FROM penjualan WHERE id_konsumen = '".$rs["id"]."' AND tgl = '".date("Y-m-d")."' AND id_barang = '1';";
												if ($resCek = $data->runQuery($qCek)) {
													$rsCek = $resCek->fetch_array();
													$jumlahTerambil = $rsCek[0];
													
													echo "<tr>
													<td>".$rs['nama_konsumen']."</td>
													<td>".$rs['jml_alokasi']."</td>
													<td>".$jumlahTerambil."</td>
													</tr>";
												}
												
											}
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th>Konsumen</th>
											<th>Alokasi</th>
											<th>Telah Diambil</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div id="tebusanpending" class="tab-pane">
							<div class="adv-table">
								<table class="display table table-bordered table-striped" id="tabel-tebusan-pending">
									<thead>
										<tr>
											<th>Tgl Tebus</th>
											<th>Tgl Loading</th>
											<th>No LO</th>
											<th>No SA</th>
											<th>Barang</th>
											<th>Jumlah</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$query = "SELECT `pembelian`.`tgl_tebus`, `pembelian`.`no_lo`, `pembelian`.`no_sa`, `barang`.`id` AS `id_barang`, `barang`.`nama`, 
										`pembelian`.`jml_tabung`
										FROM `loading_pembelian` 
										INNER JOIN `pembelian` ON (`loading_pembelian`.`id_pembelian` = `pembelian`.`id`) 
										INNER JOIN `barang` ON (`pembelian`.`id_barang` = `barang`.`id`) 
										WHERE `loading_pembelian`.`id_kendaraan` IS NULL;";
										if ($result = $data->runQuery($query)) {
											while ($rs = $result->fetch_array()) {
												
												$tglTebus = date('Y-m-d', strtotime($rs['tgl_tebus']));
												
												if ($rs['id_barang'] == "1" || $rs['id_barang'] == "2") {
													$tglLoading = date('Y-m-d', strtotime($rs['tgl_tebus']) + (24*3600*1));
												} else {
													$tglLoading = date('Y-m-d', strtotime($rs['tgl_tebus']) + (24*3600*0));
												}
												
												$tglSekarang = date('Y-m-d');
												
												if ($tglLoading <= $tglSekarang) {
													echo "<tr class='highlight'>
														<td>".$rs['tgl_tebus']."</td>
														<td>".$tglLoading."</td>
														<td>".$rs['no_lo']."</td>
														<td>".$rs['no_sa']."</td>
														<td>".$rs['nama']."</td>
														<td>".$rs['jml_tabung']."</td>
														</tr>";
												} else {
													echo "<tr>
														<td>".$rs['tgl_tebus']."</td>
														<td>".$tglLoading."</td>
														<td>".$rs['no_lo']."</td>
														<td>".$rs['no_sa']."</td>
														<td>".$rs['nama']."</td>
														<td>".$rs['jml_tabung']."</td>
														</tr>";
												}
												
												
											}
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th>Tgl Tebus</th>
											<th>Tgl Loading</th>
											<th>No LO</th>
											<th>No SA</th>
											<th>Barang</th>
											<th>Jumlah</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div id="pemesanan" class="tab-pane">
							<div class="adv-table">
								<table class="display table table-bordered table-striped" id="tabel-pemesanan">
									<thead>
										<tr>
											<th>Kirim</th>
											<th>Pesan</th>
											<th>ID</th>
											<th>Konsumen</th>
											<th>Barang</th>
											<th>Jml</th>
											<th>Penginput</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$query = "SELECT `pemesanan`.*, `konsumen`.`nama` AS nama_konsumen, `barang`.`nama` AS nama_barang, 
										`barang`.`het`, `karyawan`.`nama` AS nama_karyawan FROM `pemesanan` INNER JOIN `konsumen` 
										ON(`pemesanan`.`id_konsumen` = `konsumen`.`id`) INNER JOIN `barang` 
										ON(`pemesanan`.`id_barang` = `barang`.`id`) INNER JOIN `karyawan` 
										ON(`pemesanan`.`id_karyawan` = `karyawan`.`id`) WHERE `pemesanan`.`proses` = '0' 
										AND `pemesanan`.`hapus` = '0';";
										if ($result = $data->runQuery($query)) {
											while ($rs = $result->fetch_array()) {
											
												if ($rs['tgl_kirim'] <= date("Y-m-d")) {
													echo "<tr class='highlight'>
													<td>".$rs['tgl_kirim']."</td>
													<td>".$rs['tgl']."</td>
													<td>".$rs['id']."</td>
													<td>".$rs['nama_konsumen']."</td>
													<td>".$rs['nama_barang']."</td>
													<td>".$rs['jml']."</td>
													<td>".$rs['nama_karyawan']."</td>
													</tr>";
												} else {
													echo "<tr>
													<td>".$rs['tgl_kirim']."</td>
													<td>".$rs['tgl']."</td>
													<td>".$rs['id']."</td>
													<td>".$rs['nama_konsumen']."</td>
													<td>".$rs['nama_barang']."</td>
													<td>".$rs['jml']."</td>
													<td>".$rs['nama_karyawan']."</td>
													</tr>";
												}
												
											}
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th>Kirim</th>
											<th>Pesan</th>
											<th>ID</th>
											<th>Konsumen</th>
											<th>Barang</th>
											<th>Jml</th>
											<th>Penginput</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<script>
$(document).ready(function(){
	var tblpenjualantempo = $('#tabel-penjualan-tempo').dataTable();
	
	var tblbgcair = $('#tabel-bg-cair').dataTable();
	
	var tblalokasi = $('#tabel-alokasi-pangkalan').dataTable();
	
	var tbltebusanpending = $('#tabel-tebusan-pending').dataTable();
	
	var tblpemesanan = $('#tabel-pemesanan').dataTable();
	
	$('#main-content').css({
		'margin-left': '0px'
	});
	$('#sidebar').css({
		'margin-left': '-210px'
	});
	$('#sidebar > ul').hide();
	$("#container").addClass("sidebar-closed");
});
</script>