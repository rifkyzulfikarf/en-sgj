<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Harga Tebus Tabung
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-harga">
							<thead>
								<tr>
									<th>Barang</th>
									<th>Jumlah</th>
									<th>Harga Tebus</th>
									<th></th>
								</tr>
							</thead>
							<tbody></tbody>
							<tfoot>
								<tr>
									<th>Barang</th>
									<th>Jumlah</th>
									<th>Harga Tebus</th>
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

<div class="modal fade " id="mdl-data-harga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Harga Tebus</h4>
			</div>
			<div class="modal-body">
				<form id="frm-harga" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<select class="form-control" id="cmb-barang" name="cmb-barang">
							<option value="1">LPG 3Kg</option>
							<option value="2">LPG 12Kg</option>
							<option value="3">LPG 50Kg</option>
							<option value="4">LPG Bright Gas</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-jumlah" name="txt-jumlah" placeholder="Jumlah">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-harga-beli" name="txt-harga-beli" placeholder="Besar Harga Beli">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-data">Simpan Data</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#txt-harga-beli').number(true,2);
	};
	
	var tabelharga = $('#tabel-harga').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/utility/harga_beli_tabung.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-harga-beli"});
        }
    });
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-data-harga').modal();
		$('#apa').val('tambah-harga-beli');
		$('#txt-jumlah').val("");
		$('#txt-harga-beli').val("");
	});
	
	$('#tabel-harga').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-harga').modal();
		$('#apa').val('ubah-harga-beli');
		$('#txt-id').val($(this).data('id'));
		$('#txt-jumlah').val($(this).data('jumlah'));
		$('#txt-harga-beli').val($(this).data('harga'));
	});
	
	
	$('#btn-simpan-data').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/utility/harga_beli_tabung.php'); ?>" + "&" +$('#frm-harga').serialize();
		if (confirm('Simpan data ?')) {
			$('#btn-simpan-data').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
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
						tabelharga.fnReloadAjax();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan-data').removeClass('disabled').html('Simpan Data');
				},
				error: function(err){
					console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
					alert('Gagal terkoneksi dengan server..');
				}
			});
		}
	});
	
	$('#tabel-harga').on('click', '#btn-hapus-data', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/utility/harga_beli_tabung.php'); ?>", "apa" : "hapus-harga-beli", "id" : id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelharga.fnReloadAjax();
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