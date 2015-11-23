<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Hapus Kas Kecil
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="txt-id" id="txt-id" placeholder="ID Kas">
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
						<table class="display table table-bordered table-striped" id="tabel-kas">
							<thead>
								<tr>
									<th>Bukti Transaksi</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>Debet</th>
									<th>Kredit</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Bukti Transaksi</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>Debet</th>
									<th>Kredit</th>
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

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		
	};
	
	var tabelkas = $('#tabel-kas').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/utility/hapus_kas_kecil.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-kas"});
            aoData.push({"name": "id", "value": $('#txt-id').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelkas.fnReloadAjax();
	});
	
	$('#tabel-kas').on('click', '#btn-hapus', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		var debet = $(this).data('debet');
		var kredit = $(this).data('kredit');
		var idkasir = $(this).data('idkasir');
		if (confirm('Setuju hapus data ?')) {
		$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/utility/hapus_kas_kecil.php'); ?>", "apa" : "hapus-kas", 
				"id" : id, "debet" : debet, "kredit" : kredit, "idkasir" : idkasir},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelkas.fnReloadAjax();
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