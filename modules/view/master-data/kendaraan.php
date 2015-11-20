<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data Kendaraan
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-kendaraan">
							<thead>
								<tr>
									<th>Nopol</th>
									<th>Keterangan</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nopol</th>
									<th>Keterangan</th>
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

<div class="modal fade " id="mdl-data-kendaraan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Data Kendaraan</h4>
			</div>
			<div class="modal-body">
				<form id="frm-kendaraan" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-nopol" name="txt-nopol" placeholder="Nomor Polisi">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-keterangan" name="txt-keterangan" placeholder="Keterangan ex. L300 Hitam">
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
		
	};
	
	var tabelkendaraan = $('#tabel-kendaraan').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/master-data/kendaraan.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-kendaraan"});
        }
    });
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-data-kendaraan').modal();
		$('#apa').val('tambah-kendaraan');
		$('#txt-nopol').val("");
		$('#txt-keterangan').val("");
	});
	
	$('#tabel-kendaraan').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-kendaraan').modal();
		$('#apa').val('ubah-kendaraan');
		$('#txt-id').val($(this).data('id'));
		$('#txt-nopol').val($(this).data('nopol'));
		$('#txt-keterangan').val($(this).data('keterangan'));
	});
	
	$('#tabel-kendaraan').on('click', '#btn-hapus-kendaraan', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/master-data/kendaraan.php'); ?>", "apa" : "hapus-kendaraan", "id" : id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelkendaraan.fnReloadAjax();
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
	
	$('#btn-simpan-data').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/master-data/kendaraan.php'); ?>" + "&" +$('#frm-kendaraan').serialize();
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
						tabelkendaraan.fnReloadAjax();
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
	
});
</script>