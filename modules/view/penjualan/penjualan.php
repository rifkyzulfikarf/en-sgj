<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Penjualan LPG
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Tgl</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="dp-tgl">
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-6">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Sales</label>
										<div class="col-sm-8">
											<select class="form-control" id="cmb-sales" name="cmb-sales"></select>
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
										<label class="col-sm-2 col-sm-2 control-label">Barang</label>
										<div class="col-sm-10">
											<select class="form-control" id="cmb-barang" name="cmb-barang"></select>
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-6">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Konsumen</label>
										<div class="col-sm-8">
											<select class="form-control" id="cmb-konsumen" name="cmb-konsumen"></select>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<button class="btn btn-warning btn-md" type="button" id="btn-cek"><i class="fa fa-lightbulb-o"></i> Cek</button>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">HET</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah" name="txt-het" 
												id="txt-het" readonly>
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
										<label class="col-sm-4 col-sm-4 control-label">Harga Jual</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah" name="txt-harga-jual" 
												id="txt-harga-jual" readonly>
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
										<label class="col-sm-4 col-sm-4 control-label">Alokasi</label>
										<div class="col-sm-8">
											<input type="text" class="form-control rupiah" name="txt-alokasi" id="txt-alokasi" readonly>
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
										<label class="col-sm-4 col-sm-4 control-label">Jumlah Beli</label>
										<div class="col-sm-8">
											<input type="text" class="form-control rupiah" name="txt-jml" id="txt-jml">
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-4 col-sm-4 control-label">Grand Total</label>
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon">Rp</span>
												<input type="text" class="form-control rupiah" name="txt-grand-total" 
												id="txt-grand-total" readonly>
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
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Jenis</label>
										<div class="col-sm-10">
											<select class="form-control" id="cmb-jenis" name="cmb-jenis">
												<option value="1">Cash</option>
												<option value="2">Debet</option>
												<option value="3">Transfer</option>
												<option value="4">Tempo</option>
											</select>
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4" id="div-tempo">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Tgl</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="dp-tempo">
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Nota</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="txt-nota" placeholder="No. Nota">
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4" id="div-bank">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Bank</label>
										<div class="col-sm-10">
											<select class="form-control" id="cmb-bank" name="cmb-bank"></select>
										</div>
									</div>
								</form>
							</section>
						</div>
						<div class="col-lg-4" id="div-bukti">
							<section class="panel">
								<form class="form-horizontal tasi-form">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Bukti</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="txt-bukti" placeholder="No. EDC / Bukti Transfer">
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<button class="btn btn-primary btn-md pull-right" type="button" id="btn-simpan"><i class="fa fa-share"></i> Simpan Penjualan</button>
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
			data: {"mod" : "<?php echo e_url('modules/view/penjualan/penjualan.php'); ?>"},
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
		$('#dp-tgl').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#dp-tempo').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#div-tempo').hide();
		$('#div-bank').hide();
		$('#div-bukti').hide();
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/penjualan.php'); ?>", "apa" : "get-sales"},
			success: function(event){
				$('#cmb-sales').empty();	
				$('#cmb-sales').html(event);
				$('#cmb-sales').chosen();
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/penjualan.php'); ?>", "apa" : "get-barang"},
			success: function(event){
				$('#cmb-barang').empty();	
				$('#cmb-barang').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/penjualan.php'); ?>", "apa" : "get-konsumen"},
			success: function(event){
				$('#cmb-konsumen').empty();	
				$('#cmb-konsumen').html(event);
				$('#cmb-konsumen').chosen();
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/penjualan.php'); ?>", "apa" : "get-bank"},
			success: function(event){
				$('#cmb-bank').empty();	
				$('#cmb-bank').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	$('#btn-cek').click(function(ev){
		var tgl = $('#dp-tgl').val();
		var barang = $('#cmb-barang').val();
		var konsumen = $('#cmb-konsumen').val();
		ev.preventDefault();
		
		var selected = $('#cmb-barang').find('option:selected');
		var het = selected.data('het'); 
		$('#txt-het').val(het);
		
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			dataType: "JSON",
			data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/penjualan.php'); ?>", 
			"apa" : "get-kuota-harga", "konsumen" : konsumen, "barang" : barang, "tgl" : tgl},
			success: function(eve){
				if (eve.status){
					$('#txt-alokasi').val(eve.kuota);
					$('#txt-harga-jual').val(eve.harga);
					hitungTotal();
				} else {
					alert(eve.msg);
					$('#txt-alokasi').val("0");
					$('#txt-harga-jual').val("0");
					hitungTotal();
				}
			},
			error: function(err){
				console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
				alert('Gagal terkoneksi dengan server..');
			}
		});
	});
	
	function hitungTotal(){
		var hargaJual = Number($('#txt-harga-jual').val());
		var jumlahBeli = Number($('#txt-jml').val());
		
		var total = hargaJual * jumlahBeli;
		$('#txt-grand-total').val(total);
	};
	
	$('#txt-jml').keyup(function(){
		hitungTotal();
	});
	
	$('#cmb-jenis').change(function(){
		var selected = $(this).val();
		if (selected == '4') {
			$('#div-tempo').show();
			$('#div-bank').hide();
			$('#div-bukti').hide();
		} else if(selected == '1') {
			$('#div-tempo').hide();
			$('#div-bank').hide();
			$('#div-bukti').hide();
		} else {
			$('#div-tempo').hide();
			$('#div-bank').show();
			$('#div-bukti').show();
		}
    });
	
	$('#btn-simpan').click(function(ev){
		ev.preventDefault();
		var tgl = $('#dp-tgl').val();
		var sales = $('#cmb-sales').val();
		var barang = $('#cmb-barang').val();
		var konsumen = $('#cmb-konsumen').val();
		var jml = Number($('#txt-jml').val());
		var alokasi = Number($('#txt-alokasi').val());
		var hargaJual = Number($('#txt-harga-jual').val());
		var het = Number($('#txt-het').val());
		var total = Number($('#txt-grand-total').val());
		var jenis = $('#cmb-jenis').val();
		var tempo = $('#dp-tempo').val();
		var bank = $('#cmb-bank').val();
		var bukti = $('#txt-bukti').val();
		var nota = $('#txt-nota').val();
		
		if ((barang == '1') && (jml > alokasi)) {
			alert("Pembelian anda melebihi alokasi !");
			return;
		}
		
		if (confirm("Harap cek kembali data - data yang anda masukkan ! Simpan penebusan ?")) {
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/penjualan/penjualan.php'); ?>", "apa" : "simpan", 
							"tgl" : tgl, "sales" : sales, "barang" : barang, "konsumen" : konsumen, "jml" : jml, "hargaJual" : hargaJual, 
							"het" : het, "total" : total, "jenis" : jenis, "tempo" : tempo, "bank" : bank, "bukti" : bukti, "nota" : nota};
			
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