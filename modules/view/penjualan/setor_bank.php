<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Setor Transaksi Ke Bank
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="dp-jual" id="dp-jual" placeholder="Tanggal Penjualan">
								</div>
							</section>
						</div>
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<select class="form-control" id="cmb-jenis">
										<option value="1">Penjualan Cash</option>
										<option value="2">Pelunasan Piutang</option>
									</select>
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
						<table class="display table table-bordered table-striped" id="tabel-jual">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nota</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Nota</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
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

<div class="modal fade " id="mdl-setor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Setor Penjualan</h4>
			</div>
			<div class="modal-body">
				<form id="frm-setor" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="txt-id" id="txt-id">
					<input type="hidden" class="form-control" name="txt-total" id="txt-total">
					<div class="form-group">
						<select class="form-control" id="cmb-bank" name="cmb-bank"></select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-bukti" name="txt-bukti" placeholder="No. Bukti Setor">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-setoran">Simpan Setoran</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#dp-jual').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/setor_bank.php'); ?>", "apa" : "get-bank"},
			success: function(event){
				$('#cmb-bank').empty();	
				$('#cmb-bank').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabeljual = $('#tabel-jual').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/penjualan/setor_bank.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-penjualan"});
            aoData.push({"name": "tgl", "value": $('#dp-jual').val()});
            aoData.push({"name": "jenis", "value": $('#cmb-jenis').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabeljual.fnReloadAjax();
	});
	
	$('#tabel-jual').on('click', '#btn-show-setor', function(ev){
		ev.preventDefault();
		$('#mdl-setor').modal();
		$('#txt-id').val($(this).data('id'));
		$('#txt-total').val($(this).data('total'));
	});
	
	$('#btn-simpan-setoran').click(function(ev){
		ev.preventDefault();
		var id = $('#txt-id').val();
		var bank = $('#cmb-bank').val();
		var bukti = $('#txt-bukti').val();
		var total = $('#txt-total').val();
		
		if (confirm("Harap cek kembali data - data yang anda masukkan ! Simpan setoran ?")) {
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/penjualan/setor_bank.php'); ?>", "apa" : "simpan-setoran", 
							"id" : id, "bank" : bank, "bukti" : bukti, "total" : total};
			
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
						tabeljual.fnReloadAjax();
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