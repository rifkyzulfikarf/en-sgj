<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Loading Barang
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="txt-lo" id="txt-lo" placeholder="Nomor LO">
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
					<input type="hidden" class="form-control" name="txt-id-out" id="txt-id-out">
					<div class="form-group">
						<input type="text" class="form-control" id="dp-tgl-loading" name="dp-tgl-loading" placeholder="Tanggal Loading">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-kendaraan" name="cmb-kendaraan"></select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-driver" name="cmb-driver"></select>
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
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/pembelian/loading.php'); ?>", "apa" : "get-kendaraan"},
			success: function(event){
				$('#cmb-kendaraan').empty();	
				$('#cmb-kendaraan').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/pembelian/loading.php'); ?>", "apa" : "get-driver"},
			success: function(event){
				$('#cmb-driver').empty();	
				$('#cmb-driver').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabelloading = $('#tabel-loading').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/pembelian/loading.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-loading"});
            aoData.push({"name": "lo", "value": $('#txt-lo').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelloading.fnReloadAjax();
	});
	
	$('#tabel-loading').on('click', '#btn-show-out', function(ev){
		ev.preventDefault();
		$('#mdl-loading-out').modal();
		$('#txt-id-out').val($(this).data('id'));
	});
	
	$('#tabel-loading').on('click', '#btn-show-in', function(ev){
		ev.preventDefault();
		$('#mdl-loading-in').modal();
		$('#txt-id-in').val($(this).data('id'));
	});
	
	$('#btn-simpan-loading-out').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/pembelian/loading.php'); ?>" + "&" +$('#frm-loading-out').serialize();
		if (confirm('Simpan data ?')) {
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
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/pembelian/loading.php'); ?>" + "&" +$('#frm-loading-in').serialize();
		if (confirm('Simpan data ?')) {
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