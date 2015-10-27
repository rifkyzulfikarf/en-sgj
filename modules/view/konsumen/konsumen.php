<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data Konsumen
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-konsumen">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No. Telp</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No. Telp</th>
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

<div class="modal fade " id="mdl-data-konsumen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Data Pangkalan</h4>
			</div>
			<div class="modal-body">
				<form id="frm-konsumen" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-nama" name="txt-nama" placeholder="Nama Konsumen">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-alamat" name="txt-alamat" placeholder="Alamat">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-telp" name="txt-telp" placeholder="No. Telepon">
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
	
	var tabelkonsumen = $('#tabel-konsumen').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-konsumen"});
        }
    });
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-data-konsumen').modal();
		$('#apa').val('tambah-konsumen');
		$('#txt-nama').val("");
		$('#txt-alamat').val("");
		$('#txt-telp').val("");
	});
	
	$('#tabel-konsumen').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-konsumen').modal();
		$('#apa').val('ubah-konsumen');
		$('#txt-id').val($(this).data('id'));
		$('#txt-nama').val($(this).data('nama'));
		$('#txt-alamat').val($(this).data('alamat'));
		$('#txt-telp').val($(this).data('telp'));
	});
	
	$('#tabel-konsumen').on('click', '#btn-hapus-konsumen', function(ev){
		ev.preventDefault();
		var id_konsumen = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>", "apa" : "hapus-konsumen", "id" : id_konsumen},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelkonsumen.fnReloadAjax();
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
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>" + "&" +$('#frm-konsumen').serialize();
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
						tabelkonsumen.fnReloadAjax();
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