<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Login
				</header>
				<div class="panel-body">
					<form class="form-inline" role="form">
						<div class="form-group">
							<label class="sr-only" for="pwd">Password</label>
							<input type="password" class="form-control" id="pwd" placeholder="Password">
						</div>
						<button class="btn btn-success" id="btn-masuk">Masuk</button>
					</form>
				</div>
			</section>
		</div>
	</div>
</section>

<script>
$(document).ready(function(){
	
	function redirect(){
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"mod" : "<?php echo e_url('modules/view/khusus/real/setor-bank.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	$('#btn-masuk').click(function(ev){
		ev.preventDefault();
		
		if ($('#pwd').val() == "nonsgj") {
			redirect();
		} else {
			alert("Salah !");
		}
	});
	
});
</script>