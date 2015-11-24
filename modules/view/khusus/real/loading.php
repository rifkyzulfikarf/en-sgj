<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Loading Barang Khusus
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Loading Baru</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="dp-cari-loading" id="dp-cari-loading" placeholder="Tanggal Loading">
								</div>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<button type="button" class="btn btn-primary" id="btn-cari"><i class="fa fa-search"></i> Cari</button>
							</section>
						</div>
					</div>
					<hr>
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-loading">
							<thead>
								<tr>
									<th>Data</th>
									<th>Tgl Loading</th>
									<th>Jam Ambil</th>
									<th>Tabung Kosong</th>
									<th>Jam Kembali</th>
									<th>Tabung Isi</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Data</th>
									<th>Tgl Loading</th>
									<th>Jam Ambil</th>
									<th>Tabung Kosong</th>
									<th>Jam Kembali</th>
									<th>Tabung Isi</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<div class="modal fade " id="mdl-loading-out" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Loading Keluar</h4>
			</div>
			<div class="modal-body">
				<form id="frm-loading-out" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="apa" id="apa" value="simpan-loading-out">
					<div class="form-group">
						<input type="text" class="form-control" id="dp-tgl-loading" name="dp-tgl-loading" placeholder="Tanggal Loading">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-kendaraan" name="cmb-kendaraan">
						<?php
							if ($result = $data->runQuery("SELECT * FROM kendaraan WHERE hapus = '0';")) {
								while ($rs = $result->fetch_array()) {
									echo "<option value='".$rs['id']."'>".$rs['nopol']." ".$rs['keterangan']."</option>";
								}
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-driver" name="cmb-driver">
						<?php
							if ($result = $data->runQuery("SELECT `karyawan`.`id`, `karyawan`.`nama`, `level`.`jabatan`, `karyawan`.`jk` 
							FROM `karyawan` INNER JOIN `level` ON (`karyawan`.`id_level` = `level`.`id`) WHERE `karyawan`.`id_level` = '3' 
							AND `karyawan`.`hapus` = '0';")) {
								while ($rs = $result->fetch_array()) {
									echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
								}
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-driver" name="cmb-barang">
						<?php
							if ($result = $data->runQuery("SELECT * FROM khusus_barang;")) {
								while ($rs = $result->fetch_array()) {
									echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
								}
							}
						?>
						</select>
					</div>
					<div class="form-group">
						<div class="input-group bootstrap-timepicker">
							<input type="text" class="form-control" id="txt-jam-out" name="txt-jam-out" placeholder="Jam Berangkat">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
							</span>
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-tabung-kosong" name="txt-tabung-kosong" placeholder="Jumlah Tabung Kosong">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-loading-out">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="mdl-loading-in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Loading Masuk</h4>
			</div>
			<div class="modal-body">
				<form id="frm-loading-in" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="apa" id="apa" value="simpan-loading-in">
					<input type="hidden" class="form-control" name="txt-id-in" id="txt-id-in">
					<div class="form-group">
						<div class="input-group bootstrap-timepicker">
							<input type="text" class="form-control" id="txt-jam-in" name="txt-jam-in" placeholder="Jam Kembali">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
							</span>
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-tabung-isi" name="txt-tabung-isi" placeholder="Jumlah Tabung Isi">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-loading-in">Simpan</button>
			</div>
		</div>
	</div>
</div>


<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#dp-cari-loading').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#dp-tgl-loading').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#txt-jam-out').timepicker({
			autoclose: true,
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false
		});
		$('#txt-jam-in').timepicker({
			autoclose: true,
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false
		});
	};
	
	var tabelloading = $('#tabel-loading').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/khusus/loading.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-loading"});
            aoData.push({"name": "tgl", "value": $('#dp-cari-loading').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelloading.fnReloadAjax();
	});
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-loading-out').modal();
	});
	
	$('#tabel-loading').on('click', '#btn-show-in', function(ev){
		ev.preventDefault();
		$('#mdl-loading-in').modal();
		$('#txt-id-in').val($(this).data('id'));
	});
	
	$('#btn-simpan-loading-out').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/khusus/loading.php'); ?>" + "&" +$('#frm-loading-out').serialize();
		if (confirm('Simpan data ?')) {
			$('#btn-simpan-loading-out').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan-loading-out').removeClass('disabled').html('Simpan');
				},
				error: function(err){
					console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
					alert('Gagal terkoneksi dengan server..');
				}
			});
		}
	});
	
	$('#btn-simpan-loading-in').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/khusus/loading.php'); ?>" + "&" +$('#frm-loading-in').serialize();
		if (confirm('Simpan data ?')) {
			$('#btn-simpan-loading-in').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelloading.fnReloadAjax();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan-loading-in').removeClass('disabled').html('Simpan');
				},
				error: function(err){
					console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
					alert('Gagal terkoneksi dengan server..');
				}
			});
		}
	});

});
</script>