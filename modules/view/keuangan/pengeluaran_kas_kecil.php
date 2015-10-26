<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Kas Keluar
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-kasir">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Saldo</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nama</th>
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

<div class="modal fade " id="mdl-data-kasir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Kas Keluar</h4>
			</div>
			<div class="modal-body">
				<form id="frm-kasir" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-idkasir" name="txt-idkasir">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-bukti" name="txt-bukti" placeholder="No. Bukti Transaksi">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-keterangan" name="txt-keterangan" placeholder="Keterangan">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-akun" name="cmb-akun"></select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-jumlah" name="txt-jumlah" placeholder="Jumlah">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-data">Simpan Pengeluaran</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#txt-jumlah').number(true,0,'.');
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/keuangan/pengeluaran_kas_kecil.php'); ?>", "apa" : "get-akun"},
			success: function(event){
				$('#cmb-akun').empty();	
				$('#cmb-akun').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabelkasir = $('#tabel-kasir').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/keuangan/pengeluaran_kas_kecil.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-kasir"});
        }
    });
	
	$('#tabel-kasir').on('click', '#btn-pengeluaran-dana', function(ev){
		ev.preventDefault();
		$('#mdl-data-kasir').modal();
		$('#apa').val('pengeluaran-dana');
		$('#txt-idkasir').val($(this).data('id'));
		$('#txt-keterangan').val("");
		$('#txt-jumlah').val("");
	});
	
	$('#btn-simpan-data').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/keuangan/pengeluaran_kas_kecil.php'); ?>" + "&" +$('#frm-kasir').serialize();
		if (confirm('Setuju simpan pengeluaran ?')) {
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
						tabelkasir.fnReloadAjax();
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
	
	$('#mdl-data-kasir').on('shown.bs.modal', function () {
		$('#cmb-akun', this).chosen();
	});
	
});
</script>