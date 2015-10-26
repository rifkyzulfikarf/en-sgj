<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data User Aplikasi
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-show-tambah" data-mode="tambah"><i class="fa fa-plus"></i> Tambah User</button>
					</span>
				</header>
				<div class="panel-body">
				<?php
					require './modules/model/class.user.php';
					$data = new user();
					if ($daftar = $data->get_user()) {
						while ($rs = $daftar->fetch_array()) {
				?>
					<div class="col-md-3">
						<div class="well">
							<div class="row">
								<div class="col-md-12 text-center">
									<?php echo $rs['nama']."<br>".$rs['jabatan']; ?>
									<hr>
									<a class="btn btn-primary btn-sm btn-show-ubah" data-id="<?php echo e_code($rs['id']) ?>">Edit</a> 
									<a href="./?no_spa=<?php echo e_url("modules/view/master-data/set-menu.php") ?>&id=<?php echo e_code($rs['id']) ?>&nama=<?php echo $rs['nama'] ?>" data-hash="user-menu" class="btn btn-primary btn-sm link-menu">Menu</a> 
									<button class="btn btn-danger btn-sm btn-hapus-user" data-id="<?php echo e_code($rs['id']) ?>">Hapus</button>
								</div>
							</div>
							
						</div>
					</div>
				<?php
						}
					}
				?>
				</div>
			</section>
		</div>
	</div>
</section>

<div class="modal fade " id="mdl-tambah-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah User</h4>
			</div>
			<div class="modal-body">
				<form id="frm-tambah-user" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa" value="tambah-user">
					<div class="form-group">
						<select class="form-control" id="cmb-karyawan" name="cmb-karyawan">
							<?php
								if ($daftar = $data->get_karyawan_not_user()) {
									while ($rs = $daftar->fetch_array()) {
										echo "<option value='".e_code($rs['id'])."'>".$rs['nama']."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-tambah-user" name="txt-tambah-user" placeholder="Masukkan Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="txt-tambah-pass" name="txt-tambah-pass" placeholder="Masukkan Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="txt-tambah-pass2" name="txt-tambah-pass2" placeholder="Masukkan Password Lagi">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-tambah-user">Simpan Data</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="mdl-ubah-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ubah User</h4>
			</div>
			<div class="modal-body">
				<form id="frm-ubah-user" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa" value="ubah-user">
					<input type="hidden" class="form-control" id="txt-ubah-id" name="txt-ubah-id">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-ubah-user" name="txt-ubah-user" placeholder="Masukkan Username Baru">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="txt-ubah-pass" name="txt-ubah-pass" placeholder="Masukkan Password Baru">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="txt-ubah-pass2" name="txt-ubah-pass2" placeholder="Masukkan Password Lagi">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-ubah-user">Ubah Data</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	function reloading(){
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"mod" : "<?php echo e_url('modules/view/master-data/user.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	$('#btn-show-tambah').click(function(ev){
		ev.preventDefault();
		$('#mdl-tambah-user').modal();
		$('#txt-tambah-user').val("");
		$('#txt-tambah-pass').val("");
		$('#txt-tambah-pass2').val("");
		
	});
	
	$('.btn-show-ubah').click(function(ev){
		ev.preventDefault();
		$('#mdl-ubah-user').modal();
		$('#txt-ubah-id').val($(this).data('id'));
		$('#txt-ubah-user').val("");
		$('#txt-ubah-pass').val("");
		$('#txt-ubah-pass2').val("");
		
	});
	
	$('#btn-tambah-user').click(function(ev){
		ev.preventDefault();
		if ($('#txt-tambah-pass').val() == $('#txt-tambah-pass2').val()) {
			var post_data = "aksi=" + "<?php echo e_url('modules/controller/master-data/user.php'); ?>" + "&" +$('#frm-tambah-user').serialize();
			if (confirm('Simpan data ?')) {
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
					},
					error: function(err){
						console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
						alert('Gagal terkoneksi dengan server..');
					}
				});
			}
		} else {
			alert("Password tidak cocok!");
		}
	});
	
	$('#btn-ubah-user').click(function(ev){
		ev.preventDefault();
		if ($('#txt-ubah-pass').val() == $('#txt-ubah-pass2').val()) {
			var post_data = "aksi=" + "<?php echo e_url('modules/controller/master-data/user.php'); ?>" + "&" +$('#frm-ubah-user').serialize();
			if (confirm('Setuju ubah data ?')) {
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
					},
					error: function(err){
						console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
						alert('Gagal terkoneksi dengan server..');
					}
				});
			}
		} else {
			alert("Password tidak cocok!");
		}
	});
	
	$('.btn-hapus-user').click(function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/master-data/user.php'); ?>", "apa" : "hapus-user", "id" : id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						reloading();
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