<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Ambil BG
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="dp-bg" id="dp-bg" placeholder="Tanggal BG">
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
						<table class="display table table-bordered table-striped" id="tabel-bg">
							<thead>
								<tr>
									<th>Konsumen</th>
									<th>No. Bukti BG</th>
									<th>Total Bayar</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Konsumen</th>
									<th>No. Bukti BG</th>
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
	
	function reloading(){
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"mod" : "<?php echo e_url('modules/view/penjualan/pelunasan.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	init();
	
	function init() {
		
		$('#dp-bg').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		
	};
	
	var tabelbg = $('#tabel-bg').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/penjualan/ambil_bg.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-bg"});
            aoData.push({"name": "tgl", "value": $('#dp-bg').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelbg.fnReloadAjax();
	});
	
	$('#tabel-bg').on('click', '#btn-ambil', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		var tgl = $(this).data('tgl');
		var total = $(this).data('total');
		var bank = $(this).data('bank');
		var bukti = $(this).data('bukti');
		
		if (confirm("Simpan pengambilan BG ?")) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/penjualan/ambil_bg.php'); ?>", "apa" : "ambil-bg", 
							"id" : id, "tgl" : tgl, "total" : total, "bank" : bank, "bukti" : bukti};
			
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelbg.fnReloadAjax();
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