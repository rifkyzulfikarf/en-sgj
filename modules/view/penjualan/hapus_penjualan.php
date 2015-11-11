<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Hapus Penjualan
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
									<th>Total Bayar</th>
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
									<th>Total Bayar</th>
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
		$('#dp-jual').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
	};
	
	var tabeljual = $('#tabel-jual').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/penjualan/hapus_penjualan.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-penjualan"});
            aoData.push({"name": "tgl", "value": $('#dp-jual').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabeljual.fnReloadAjax();
	});
});
</script>