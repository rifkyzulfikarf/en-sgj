<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Input Berita Acara Baru
				</header>
				<div class="panel-body">
					<form class="form-horizontal tasi-form">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Judul</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="txt-judul">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Berita Acara</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="7" id="txt-isi"></textarea>
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
			data: {"mod" : "<?php echo e_url('modules/view/berita-acara/input.php'); ?>"},
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
		
		if (confirm("Sampaikan berita acara ?")) {
		
			$('#btn-simpan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
		
			var judul = $('#txt-judul').val(); var isi = $('#txt-isi').val();
			
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/berita-acara/input.php'); ?>", "apa" : "simpan", 
							"judul" : judul, "isi" : isi};
			
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