<section class="wrapper site-min-height">
	
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Request Hapus Penjualan Khusus
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-request">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>Karyawan</th>
									<th>ID Penjualan</th>
									<th>Keterangan</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Tanggal Request</th>
									<th>Karyawan</th>
									<th>ID Penjualan</th>
									<th>Keterangan</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Hapus Penjualan Khusus
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="txt-id" id="txt-id" placeholder="ID Penjualan">
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
	
	var tabeljual = $('#tabel-jual').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/utility/hapus_penjualan_khusus.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-penjualan"});
            aoData.push({"name": "id", "value": $('#txt-id').val()});
        }
    });
	
	var tabelrequest = $('#tabel-request').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/utility/hapus_penjualan_khusus.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-request"});
        }
    });
	
	$('#tabel-request').on('click', '#btn-cek', function(ev){
		ev.preventDefault();
		$('#txt-id').val($(this).data('id'));
	});
	
	$('#btn-cari').click(function(ev){
		tabeljual.fnReloadAjax();
	});
	
	$('#tabel-jual').on('click', '#btn-hapus', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
		$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/utility/hapus_penjualan_khusus.php'); ?>", "apa" : "hapus-penjualan", 
				"id" : id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabeljual.fnReloadAjax();
						tabelrequest.fnReloadAjax();
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
	
	$('#tabel-request').on('click', '#btn-hapus-req', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		if (confirm('Setuju hapus request ?')) {
		$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/utility/hapus_penjualan_khusus.php'); ?>", "apa" : "hapus-request", 
				"id" : id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelrequest.fnReloadAjax();
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