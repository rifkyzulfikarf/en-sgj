<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Hapus Penebusan
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="txt-id" id="txt-id" placeholder="ID Penebusan">
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
						<table class="display table table-bordered table-striped" id="tabel-tebus">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>No LO</th>
									<th>No SA</th>
									<th>Barang</th>
									<th>Jumlah</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Tanggal</th>
									<th>No LO</th>
									<th>No SA</th>
									<th>Barang</th>
									<th>Jumlah</th>
									<th>Total</th>
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
	
	var tabeltebus = $('#tabel-tebus').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/utility/hapus_pembelian.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-tebus"});
            aoData.push({"name": "id", "value": $('#txt-id').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabeltebus.fnReloadAjax();
	});
	
	$('#tabel-tebus').on('click', '#btn-hapus', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		var tarik = $(this).data('tarik');
		var idbank = $(this).data('idbank');
		if (confirm('Setuju hapus data ?')) {
		$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/utility/hapus_pembelian.php'); ?>", "apa" : "hapus-tebus", 
				"id" : id, "tarik" : tarik, "idbank" : idbank},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabeltebus.fnReloadAjax();
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