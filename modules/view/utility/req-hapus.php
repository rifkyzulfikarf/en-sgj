<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Permintaan Penghapusan Transaksi
				</header>
				<div class="panel-body">
					<form class="form-horizontal tasi-form">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Jenis Transaksi</label>
							<div class="col-sm-10">
								<select class="form-control" id="cmb-jenis">
									<option value="1">Hapus Transaksi Penjualan</option>
									<option value="2">Hapus Transaksi Penebusan</option>
									<option value="3">Hapus Transaksi Kas Kecil</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">ID Transaksi</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="txt-id">
								<span class="help-block">Contoh -> Penjualan EGN15111101 / SGJ15111101, Penebusan EPB15111101, Kas Kecil KKE1511110001 / KKS1511110001.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="7" id="txt-ket"></textarea>
							</div>
						</div>
						<button class="btn btn-primary" id="btn-simpan"><i class="fa fa-share"></i> Submit</button>
					</form>
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
			data: {"mod" : "<?php echo e_url('modules/view/utility/req-hapus.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	$('#btn-simpan').click(function(ev){
		ev.preventDefault();
		
		if (confirm("Sampaikan permintaan penghapusan ?")) {
		
			$('#btn-simpan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
		
			var jenis = $('#cmb-jenis').val(); var id = $('#txt-id').val(); var ket = $('#txt-ket').val();
			
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/utility/req-hapus.php'); ?>", "apa" : "simpan", 
							"jenis" : jenis, "id" : id, "ket" : ket};
			
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: post_data,
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						reloading();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan').removeClass('disabled').html('<i class="fa fa-share"></i> Submit');
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