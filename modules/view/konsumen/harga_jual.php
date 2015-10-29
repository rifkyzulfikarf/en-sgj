<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data Harga Jual
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-harga">
							<thead>
								<tr>
									<th>Nama</th>
									<th>3 Kg</th>
									<th>12 Kg</th>
									<th>BG</th>
									<th>50 kg</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nama</th>
									<th>3 Kg</th>
									<th>12 Kg</th>
									<th>BG</th>
									<th>50 kg</th>
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
				<h4 class="modal-title">Data Harga Jual</h4>
			</div>
			<div class="modal-body">
				<form id="frm-harga" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-3kg" name="txt-3kg" placeholder="Harga Jual 3kg">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-12kg" name="txt-12kg" placeholder="Harga Jual 12kg">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-12kgbg" name="txt-12kgbg" placeholder="Harga Jual 12kg BG">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-50kg" name="txt-50kg" placeholder="Harga Jual 50kg">
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
		$('#txt-3kg').number(true,0);
		$('#txt-12kg').number(true,0);
		$('#txt-12kgbg').number(true,0);
		$('#txt-50kg').number(true,0);
	};
	
	var tabelharga = $('#tabel-harga').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-harga-jual"});
        }
    });
	
	$('#tabel-harga').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-harga').modal();
		$('#apa').val('ubah-harga-jual');
		$('#txt-id').val($(this).data('id'));
		$('#txt-3kg').val($(this).data('3kg'));
		$('#txt-12kg').val($(this).data('12kg'));
		$('#txt-12kgbg').val($(this).data('12kgbg'));
		$('#txt-50kg').val($(this).data('50kg'));
	});
	
	
	$('#btn-simpan-data').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>" + "&" +$('#frm-harga').serialize();
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