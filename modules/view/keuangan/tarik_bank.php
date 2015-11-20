<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Tarikan Bank
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-bank">
							<thead>
								<tr>
									<th>Nama</th>
									<th>No. Rekening</th>
									<th>Saldo</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nama</th>
									<th>No. Rekening</th>
									<th>Saldo</th>
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

<div class="modal fade " id="mdl-tarikan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tarikan Bank</h4>
			</div>
			<div class="modal-body">
				<form id="frm-tarikan" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-idbank" name="txt-idbank">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-bukti" name="txt-bukti" placeholder="No. Bukti Tarikan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="txt-tgltarik" id="txt-tgltarik" placeholder="Tanggal Tarikan">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-jenis" name="cmb-jenis">
							<option value="1">Tarikan Tunai</option>
							<option value="2">Transfer</option>
							<option value="3">BG / Cek</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-keterangan" name="txt-keterangan" placeholder="Keterangan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-jumlah" name="txt-jumlah" placeholder="Jumlah Tarikan">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-beaadmin" name="txt-beaadmin" placeholder="Jumlah Bea Admin">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-data">Tarik Dana</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#txt-jumlah').number(true,2);
		$('#txt-beaadmin').number(true,2);
		$('#txt-tgltarik').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
	};
	
	var tabelbank = $('#tabel-bank').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/keuangan/tarik_bank.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-bank"});
        }
    });
	
	$('#tabel-bank').on('click', '#btn-tarik', function(ev){
		ev.preventDefault();
		$('#mdl-tarikan').modal();
		$('#apa').val('tarik-dana');
		$('#txt-idbank').val($(this).data('id'));
		$('#txt-bukti').val("");
		$('#txt-keterangan').val("");
		$('#txt-jumlah').val("");
		$('#txt-beaadmin').val("");
	});
	
	$('#btn-simpan-data').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/keuangan/tarik_bank.php'); ?>" + "&" +$('#frm-tarikan').serialize();
		if (confirm('Setuju tarik dana pada bank ?')) {
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
						tabelbank.fnReloadAjax();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan-data').removeClass('disabled').html('Tarik Dana');
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