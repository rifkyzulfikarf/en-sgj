<?php
	include 'modules/model/class.penjualan.php';
	include 'modules/model/class.barang.php';
	$barang = new barang();
	$konsumen = new konsumen();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Pemesanan LPG
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Tgl Kirim</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="dp-tgl">
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Barang</label>
										<div class="col-sm-8">
											<select class="form-control" id="cmb-barang" name="cmb-barang">
												<?php
													if ($query = $barang->get_barang()) {
														while ($rs = $query->fetch_array()) {
															echo "<option value='".$rs['id']."' data-het='".$rs['het']."'>".$rs['nama']."</option>";
														}
													}
												?>
											</select>
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-8">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Konsumen</label>
										<div class="col-sm-10">
											<select class="form-control" id="cmb-konsumen" name="cmb-konsumen">
												<?php
													if ($query = $konsumen->get_konsumen()) {
														while ($rs = $query->fetch_array()) {
															echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
														}
													}
												?>
											</select>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Jumlah</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" 
											name="txt-jml" id="txt-jml">
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<button class="btn btn-primary btn-md" type="button" id="btn-simpan"><i class="fa fa-share"></i> Simpan Pemesanan</button>
							</section>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<script>
$(document).ready(function(){
	
	$('#dp-tgl').datepicker({
		format : "yyyy-mm-dd",
		autoclose : true
	});
	
	$('#txt-jml').number(true,0);
	$('#cmb-konsumen').chosen();
	
	function reloading(){
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"mod" : "<?php echo e_url('modules/view/penjualan/pemesanan.php'); ?>"},
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
		var tgl = $('#dp-tgl').val();
		var barang = $('#cmb-barang').val();
		var konsumen = $('#cmb-konsumen').val();
		var jml = $('#txt-jml').val();
		
		if (confirm("Harap cek kembali data - data yang anda masukkan ! Simpan pemesanan ?")) {
			$('#btn-simpan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/penjualan/pemesanan.php'); ?>", "apa" : "simpan", 
							"tgl" : tgl, "barang" : barang, "konsumen" : konsumen, "jml" : jml};
			
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
					$('#btn-simpan').removeClass('disabled').html('<i class="fa fa-share"></i> Simpan Pemesanan');
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