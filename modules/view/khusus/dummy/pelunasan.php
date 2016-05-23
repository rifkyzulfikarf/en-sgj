<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Login
				</header>
				<div class="panel-body">
					<form class="form-inline" role="form" action="./" method="POST" id="frm-admin">
						<input type="hidden" id="no_spa" name="no_spa" value="tes">
						<input type="hidden" id="isadmin" name="isadmin" value="true">
						<div class="form-group">
							<label class="sr-only" for="pwd">Password</label>
							<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
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
	
	$('#btn-masuk').click(function(ev){
		ev.preventDefault();
		
		if ($('#pwd').val() == "nonsgj") {
			$('#frm-admin').submit();
		} else {
			alert("Salah !");
		}
	});
	
});
</script>