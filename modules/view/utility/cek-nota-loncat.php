<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Pengecekan Nota Loncat
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="txt-awal" id="txt-awal" placeholder="Masukkan Batas Awal">
								</div>
							</section>
						</div>
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="txt-akhir" id="txt-akhir" placeholder="Masukkan Batas Akhir">
								</div>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<button type="button" class="btn btn-primary" id="btn-cari"><i class="fa fa-search"></i> Cek</button>
							</section>
						</div>
					</div>
					<hr>
					<div id="hasil" class="text-center"></div>
				</div>
			</section>
		</div>
	</div>
</section>

<script>
$(document).ready(function(){
	$('#btn-cari').click(function(ev){
		ev.preventDefault();
		var awal = $('#txt-awal').val();
		var akhir = $('#txt-akhir').val();
		$('#btn-cari').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
		$.ajax({
			url: "./",
			method: "POST",
			cache: false,
			dataType: "HTML",
			data: {"aksi" : "<?php echo e_url('modules/controller/utility/cek-nota-loncat.php'); ?>", "apa" : "cek-nota", 
			"awal" : awal, "akhir" : akhir},
			success: function(eve){
				$('#hasil').html(eve);
				$('#btn-cari').removeClass('disabled').html('<i class="fa fa-search"></i> Cek');
			},
			error: function(err){
				alert('Gagal terkoneksi dengan server..');
				$('#btn-cari').removeClass('disabled').html('<i class="fa fa-search"></i> Cek');
			}
		});
	});
});
</script>