<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Peminjaman Tabung
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Tgl Pinjam</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="dp-tgl-pinjam">
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
												if ($query = $data->runQuery("SELECT `id`, `nama` FROM `konsumen` WHERE hapus = '0'")) {
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
										<label class="col-sm-4 col-sm-4 control-label">Barang</label>
										<div class="col-sm-8">
											<select class="form-control" id="cmb-barang" name="cmb-barang">
											<?php
												if ($query = $data->runQuery("SELECT `id`, `nama` FROM `barang`")) {
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
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Jenis</label>
										<div class="col-sm-8">
											<select class="form-control" id="cmb-jenis" name="cmb-jenis">
												<option value="1">Permanen</option>
												<option value="2">Sementara</option>
											</select>
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group" id="div-kembali">
										<label class="col-sm-4 col-sm-4 control-label">Tgl Kembali</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="dp-tgl-kembali">
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
											<input type="text" class="form-control rupiah" id="txt-jumlah">
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<button class="btn btn-primary btn-md" type="button" id="btn-pinjam"><i class="fa fa-share"></i> Simpan</button>
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
	
	function reloading(){
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"mod" : "<?php echo e_url('modules/view/pinjam_tabung/pinjaman.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	init();
	
	function init(){
		$('.rupiah').number(true,0);
		$('.rupiah').val(0);
		$('#cmb-konsumen').chosen();
		$('#div-kembali').hide();
		$('#dp-tgl-pinjam').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#dp-tgl-kembali').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
	};
	
	$('#cmb-jenis').change(function(){
		var selected = $(this).val();
		if (selected == '1') {
			$('#div-kembali').hide();
		} else {
			$('#div-kembali').show();
		}
    });
	
	$('#btn-pinjam').click(function(ev){
		ev.preventDefault();
		var tglpinjam = $('#dp-tgl-pinjam').val();
		var konsumen = $('#cmb-konsumen').val();
		var barang = $('#cmb-barang').val();
		var jenis = $('#cmb-jenis').val();
		var tglkembali = $('#dp-tgl-kembali').val();
		var jumlah = $('#txt-jumlah').val();
		
		if (confirm("Harap cek kembali data - data yang anda masukkan ! Simpan peminjaman ?")) {
		$('#btn-pinjam').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/pinjam-tabung/pinjaman.php'); ?>", "apa" : "simpan", 
							"tglpinjam" : tglpinjam, "barang" : barang, "konsumen" : konsumen, "jumlah" : jumlah, "jenis" : jenis, 
							"tglkembali" : tglkembali};
			
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
	});
	
});
</script>