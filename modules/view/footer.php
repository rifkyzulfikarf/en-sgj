<!--footer start-->
<footer class="site-footer">
	<div class="text-center">
		2015 &copy; Vibisoft by Rifky Zulfikar.
		<a href="#" class="go-top">
			<i class="fa fa-angle-up"></i>
		</a>
	</div>
</footer>
<!--footer end-->

<div class="modal fade" id="modal-sign-out">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Sign Out</h4>
			</div>
			<div class="modal-body">
				<center>
					Apakah anda yakin ingin keluar dari aplikasi?
				</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-danger btn-confirm-logout">Ya</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script>
	$(document).ready(function(){
		var cekNotif = function () {
			$.ajax({
				url : "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/get-notif.php'); ?>", "apa" : "get-notif"},
				success: function(ev){
					$('.notification-list').html(ev.listNotif);
					//$('#notif-sign').show();
				},
				error: function(err){
					console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
					alert('Gagal terkoneksi dengan server, coba lagi..!');
				}
			});	
			
			setTimeout(cekNotif, 600000);
		};
		
		cekNotif();
	});
</script>