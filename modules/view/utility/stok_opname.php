<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Stok Opname
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-stok">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Stok Tabung Kosong</th>
									<th>Stok Tabung Isi</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nama Barang</th>
									<th>Stok Tabung Kosong</th>
									<th>Stok Tabung Isi</th>
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

<div class="modal fade " id="mdl-opname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Stok Opname</h4>
			</div>
			<div class="modal-body">
				<form id="frm-opname" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa" value="simpan-opname">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-kosong-lama" name="txt-kosong-lama" placeholder="Stok Kosong Lama" readonly>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-kosong-baru" name="txt-kosong-baru" placeholder="Jumlah Tabung Kosong Sekarang">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-isi-lama" name="txt-isi-lama" placeholder="Stok Isi Lama" readonly>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-isi-baru" name="txt-isi-baru" placeholder="Jumlah Tabung Isi Sekarang">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-keterangan" name="txt-keterangan" placeholder="Keterangan Perubahan">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-opname">Simpan Data</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#txt-kosong-baru').number(true,0);
		$('#txt-isi-baru').number(true,0);
	};
	
	var tabelstok = $('#tabel-stok').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/utility/stok_opname.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-stok"});
        }
    });
	
	$('#tabel-stok').on('click', '#btn-show-opname', function(ev){
		ev.preventDefault();
		$('#mdl-opname').modal();
		$('#txt-kosong-lama').val($(this).data('kosong'));
		$('#txt-isi-lama').val($(this).data('isi'));
		$('#txt-id').val($(this).data('id'));
		$('#txt-kosong-baru').val("");
		$('#txt-isi-baru').val("");
		$('#txt-keterangan').val("");
	});
	
	$('#btn-simpan-opname').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/utility/stok_opname.php'); ?>" + "&" +$('#frm-opname').serialize();
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
						tabelstok.fnReloadAjax();
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