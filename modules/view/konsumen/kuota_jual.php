<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Alokasi Pangkalan
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<select class="form-control" id="cmb-cari-konsumen" name="cmb-cari-konsumen"></select>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<div class="input-group input-large" data-date="12/09/2015" data-date-format="mm/dd/yyyy">
									<input type="text" class="form-control" name="dp-awal" id="dp-awal" placeholder="Tanggal Awal">
									<span class="input-group-addon">To</span>
									<input type="text" class="form-control dpd2" name="dp-akhir" id="dp-akhir" placeholder="Tanggal Akhir">
								</div>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<button type="button" class="btn btn-primary" id="btn-cari-kuota"><i class="fa fa-search"></i> Cari</button>
							</section>
						</div>
					</div>
					<hr>
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-kuota">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Jumlah Kuota</th>
									<th>Telah Diambil</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Tanggal</th>
									<th>Jumlah Kuota</th>
									<th>Telah Diambil</th>
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

<div class="modal fade " id="mdl-tambah-kuota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Alokasi Pangkalan</h4>
			</div>
			<div class="modal-body">
				<form id="frm-tambah-kuota" action="#" method="POST" role="form">
					<div class="form-group">
						<select class="form-control" id="cmb-konsumen-tambah-kuota" name="cmb-konsumen-tambah-kuota"></select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="dp-tambah-kuota" id="dp-tambah-kuota" placeholder="Tanggal">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-tambah-kuota" name="txt-tambah-kuota" placeholder="Jumlah Kuota Penjualan">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-tambah-kuota">Simpan Data</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="mdl-ubah-kuota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ubah Data Alokasi Pangkalan</h4>
			</div>
			<div class="modal-body">
				<form id="frm-ubah-kuota" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="txt-id-konsumen" id="txt-id-konsumen" readonly>
					<div class="form-group">
						<input type="text" class="form-control" name="txt-nama-konsumen" id="txt-nama-konsumen" readonly>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="txt-tgl-kuota" id="txt-tgl-kuota" readonly>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-ubah-kuota" name="txt-ubah-kuota" placeholder="Jumlah Kuota Penjualan">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-ubah-kuota">Simpan Data</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#txt-tambah-kuota').number(true,0,'.');
		$('#txt-ubah-kuota').number(true,0,'.');
        $('#dp-awal').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
        $('#dp-akhir').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#dp-tambah-kuota').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/konsumen/kuota_jual.php'); ?>", "apa" : "get-konsumen"},
			success: function(event){
				$('#cmb-cari-konsumen').empty();	
				$('#cmb-cari-konsumen').html(event);
				$('#cmb-cari-konsumen').chosen();
				
				$('#cmb-konsumen-tambah-kuota').empty();	
				$('#cmb-konsumen-tambah-kuota').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabelkuota = $('#tabel-kuota').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/konsumen/kuota_jual.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-kuota"});
            aoData.push({"name": "id", "value": $('#cmb-cari-konsumen').val()});
            aoData.push({"name": "tglAwal", "value": $('#dp-awal').val()});
            aoData.push({"name": "tglAkhir", "value": $('#dp-akhir').val()});
        }
    });
	
	$('#btn-cari-kuota').click(function(ev){
		tabelkuota.fnReloadAjax();
	});
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-tambah-kuota').modal();
		$('#txt-tambah-kuota').val("");
	});
	
	$('#btn-simpan-tambah-kuota').click(function(ev){
		ev.preventDefault();
		var id = $('#cmb-konsumen-tambah-kuota').val();
		var tgl = $('#dp-tambah-kuota').val();
		var kuota = $('#txt-tambah-kuota').val();
		
		if (confirm('Simpan data ?')) {
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi":"<?php echo e_url('modules/controller/konsumen/kuota_jual.php'); ?>", "apa":"tambah-kuota", "id":id, "tgl":tgl, "kuota":kuota},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
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
	
	$('#tabel-kuota').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-ubah-kuota').modal();
		$('#txt-id-konsumen').val($(this).data('id'));
		$('#txt-nama-konsumen').val($(this).data('nama'));
		$('#txt-tgl-kuota').val($(this).data('tgl'));
		$('#txt-ubah-kuota').val($(this).data('kuota'));
	});
	
	$('#btn-simpan-ubah-kuota').click(function(ev){
		ev.preventDefault();
		var id = $('#txt-id-konsumen').val();
		var tgl = $('#txt-tgl-kuota').val();
		var kuota = $('#txt-ubah-kuota').val();
		
		if (confirm('Simpan data ?')) {
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi":"<?php echo e_url('modules/controller/konsumen/kuota_jual.php'); ?>", "apa":"ubah-kuota", "id":id, "tgl":tgl, "kuota":kuota},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelkuota.fnReloadAjax();
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
	
	$('#mdl-tambah-kuota').on('shown.bs.modal', function () {
		$('#cmb-konsumen-tambah-kuota', this).chosen();
	});
	
});
</script>