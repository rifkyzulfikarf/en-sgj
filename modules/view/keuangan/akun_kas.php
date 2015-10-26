<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data Kode Akun
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-akun">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Kode</th>
									<th>Nama</th>
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

<div class="modal fade " id="mdl-data-akun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Data Kode Akun</h4>
			</div>
			<div class="modal-body">
				<form id="frm-akun" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-id" name="txt-id" placeholder="Kode Akun">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-nama" name="txt-nama" placeholder="Nama / Keterangan Akun">
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
	
	var tabelakun = $('#tabel-akun').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/keuangan/akun_kas.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-akun"});
        }
    });
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-data-akun').modal();
		$('#apa').val('tambah-akun');
		$('#txt-nama').val("");
		$('#txt-id').prop('readonly', false);
	});
	
	$('#tabel-akun').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-akun').modal();
		$('#apa').val('ubah-akun');
		$('#txt-id').val($(this).data('id'));
		$('#txt-nama').val($(this).data('nama'));
		$('#txt-id').prop('readonly', true);
	});
	
	$('#tabel-akun').on('click', '#btn-hapus-akun', function(ev){
		ev.preventDefault();
		var id_akun = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/keuangan/akun_kas.php'); ?>", "apa" : "hapus-akun", "id" : id_akun},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelakun.fnReloadAjax();
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
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/keuangan/akun_kas.php'); ?>" + "&" +$('#frm-akun').serialize();
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
						tabelakun.fnReloadAjax();
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