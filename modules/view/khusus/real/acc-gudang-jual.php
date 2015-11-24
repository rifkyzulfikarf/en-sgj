<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Acc Penjualan - Gudang
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
						<table class="display table table-bordered table-striped" id="tabel-acc">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nota</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th>Acc</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
									<th>Acc</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
	
	var tabelacc = $('#tabel-acc').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/khusus/acc-gudang-jual.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-penjualan"});
            aoData.push({"name": "tgl", "value": $('#dp-jual').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelacc.fnReloadAjax();
	});
	
	$('#tabel-acc').on('click', '#btn-acc', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		var barang = $(this).data('barang');
		var jml = $(this).data('jml');
		
		if (confirm("Acc penjualan ini ?")) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/khusus/acc-gudang-jual.php'); ?>", "apa" : "acc-penjualan", 
							"id" : id, "barang" : barang, "jml" : jml};
			
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelacc.fnReloadAjax();
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
	
	$('#tabel-acc').on('click', '#btn-tolak', function(ev){
		ev.preventDefault();
		
		var id = $(this).data('id');
		var barang = $(this).data('barang');
		var jml = $(this).data('jml');
		
		if (confirm("Tolak penjualan ini ?")) {
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/khusus/acc-gudang-jual.php'); ?>", "apa" : "tolak-penjualan", 
							"id" : id, "barang" : barang, "jml" : jml};
			
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelacc.fnReloadAjax();
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