<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Tebus LPG
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<input type="text" class="form-control" id="dp-tgl" placeholder="Tanggal Tebus">
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<input type="text" class="form-control" id="txt-lo" placeholder="Nomor LO">
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<input type="text" class="form-control" id="txt-sa" placeholder="Nomor SA">
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<select class="form-control" id="cmb-barang" name="cmb-barang"></select>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="text" class="form-control rupiah-koma" name="txt-harga-satuan" 
									id="txt-harga-satuan" readonly>
								</div>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Jumlah Tabung</label>
										<div class="col-sm-8">
											<input type="text" class="form-control rupiah-bulat" 
											name="txt-jml-tabung" id="txt-jml-tabung">
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Subtotal</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah-bulat" 
												name="txt-subtotal" id="txt-subtotal" readonly>
											</div>
										</div>
									</div>
								</form>
							</section>
						</div>
						<!--
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Pajak</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah-bulat" name="txt-pajak" 
												id="txt-pajak" readonly>
											</div>
										</div>
									</div>
								</form>
							</section>
						</div>
						-->
					</div>
					<div class="row">
						<!--
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Diskon</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah-bulat" name="txt-diskon" 
												id="txt-diskon" readonly>
											</div>
										</div>
									</div>
								</form>
							</section>
						</div>
						-->
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Adm Bank</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah-bulat" name="txt-bea-admin" 
												id="txt-bea-admin">
											</div>
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Total</label>
										<div class="col-sm-10">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah-bulat" name="txt-total" 
												id="txt-total" readonly>
											</div>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<select class="form-control" id="cmb-bank" name="cmb-bank"></select>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<select class="form-control" id="cmb-jenis" name="cmb-jenis">
									<option value="1">Tarikan Tunai</option>
									<option value="2">KlikBCA</option>
								</select>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<input type="text" class="form-control" id="txt-bukti" placeholder="No. Bukti">
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<button class="btn btn-primary btn-md pull-right" type="button" id="btn-simpan"><i class="fa fa-share"></i> Simpan Penebusan</button>
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
			data: {"mod" : "<?php echo e_url('modules/view/pembelian/pembelian.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	init();
	
	function init() {
		$('.rupiah-koma').number(true,2);
		$('.rupiah-bulat').number(true,0);
		$('.rupiah-koma').val(0);
		$('.rupiah-bulat').val(0);
		$('#dp-tgl').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/pembelian/pembelian.php'); ?>", "apa" : "get-barang"},
			success: function(event){
				$('#cmb-barang').empty();	
				$('#cmb-barang').html(event);
				$('#cmb-barang').change();
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/pembelian/pembelian.php'); ?>", "apa" : "get-bank"},
			success: function(event){
				$('#cmb-bank').empty();	
				$('#cmb-bank').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	$('#cmb-barang').change(function(){
       var selected = $(this).find('option:selected');
       var harga = selected.data('harga'); 
       $('#txt-harga-satuan').val(harga);
	   
	   if ($(this).val() == '1') {
			$('#cmb-bank').val("1");
		} else {
			$('#cmb-bank').val("2");
		}
    });
	
	function hitung(){
		var jumlah; var harga; var subtotal; var pajak; var diskon; var beaadmin; var total;
		jumlah = Number($('#txt-jml-tabung').val());
		harga = Number($('#txt-harga-satuan').val());
		diskon = 0;
		beaadmin = Number($('#txt-bea-admin').val());
		subtotal = jumlah * harga;
		pajak = 0;
		total = subtotal + pajak + beaadmin - diskon;
		$('#txt-subtotal').val(subtotal);
		//$('#txt-pajak').val(pajak);
		$('#txt-total').val(total);
	};
	
	$('#txt-jml-tabung').keyup(function(){
		hitung();
	});
	
	$('#txt-bea-admin').keyup(function(){
		hitung();
	});
	
	$('#btn-simpan').click(function(ev){
		ev.preventDefault();
		if (confirm("Harap cek kembali data - data yang anda masukkan ! Simpan penebusan ?")) {
		
			$('#btn-simpan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
		
			var tgl = $('#dp-tgl').val(); var lo = $('#txt-lo').val(); var sa = $('#txt-sa').val();
			var barang = $('#cmb-barang').val(); var harga = $('#txt-harga-satuan').val();
			var jml = $('#txt-jml-tabung').val(); var pajak = 0;
			var diskon = 0; var beaadmin = $('#txt-bea-admin').val();
			var total = $('#txt-total').val(); var bank = $('#cmb-bank').val();
			var jenis = $('#cmb-jenis').val(); var bukti = $('#txt-bukti').val();
			
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/pembelian/pembelian.php'); ?>", "apa" : "simpan", 
							"tgl" : tgl, "lo" : lo, "sa" : sa, "barang" : barang, "harga" : harga, "jml" : jml, 
							"pajak" : pajak, "diskon" : diskon, "beaadmin" : beaadmin, "total" : total, "bank" : bank, 
							"jenis" : jenis, "bukti" : bukti};
			
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
					$('#btn-simpan').removeClass('disabled').html('<i class="fa fa-share"></i> Simpan Penebusan');
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