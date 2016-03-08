<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Acc Penjualan - Gudang
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-acc">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tgl</th>
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
									<th>Tgl</th>
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
		
	};
	
	var tabelacc = $('#tabel-acc').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/penjualan/acc_gudang.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-penjualan"});
        }
    });
	
	$('#tabel-acc').on('click', '#btn-acc', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		var barang = $(this).data('barang');
		var jml = $(this).data('jml');
		
		if (confirm("Acc penjualan ini ?")) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/penjualan/acc_gudang.php'); ?>", "apa" : "acc-penjualan", 
							"id" : id, "barang" : barang, "jml" : jml};
			
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						$('#tabel-acc tbody').empty();
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
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/penjualan/acc_gudang.php'); ?>", "apa" : "tolak-penjualan", 
							"id" : id, "barang" : barang, "jml" : jml};
			
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						$('#tabel-acc tbody').empty();
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