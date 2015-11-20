<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Harga HET
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-harga">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Harga Eceran Tertinggi (HET)</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nama Barang</th>
									<th>Harga Eceran Tertinggi (HET)</th>
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
				<h4 class="modal-title">HET</h4>
			</div>
			<div class="modal-body">
				<form id="frm-harga" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-het" name="txt-het" placeholder="Besar HET">
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
		$('#txt-het').number(true,2);
	};
	
	var tabelharga = $('#tabel-harga').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/utility/het_penjualan.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-het"});
        }
    });
	
	$('#tabel-harga').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-harga').modal();
		$('#apa').val('ubah-het');
		$('#txt-id').val($(this).data('id'));
		$('#txt-het').val($(this).data('harga'));
	});
	
	
	$('#btn-simpan-data').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/utility/het_penjualan.php'); ?>" + "&" +$('#frm-harga').serialize();
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
	
});
</script>