<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Tebus LPG Khusus
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-4">
							<section class="panel">
								<input type="text" class="form-control" id="dp-tgl" placeholder="Tanggal Tebus">
							</section>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="adv-table">
							<table class="display table table-bordered table-striped" id="tabel-loading">
								<thead>
									<tr>
										<th>ID Loading</th>
										<th>Tanggal</th>
										<th>Jumlah</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
								<tfoot>
									<tr>
										<th colspan="4"><button type="button" class="btn btn-primary btn-sm pull-right" id="btn-show-item"><i class="fa fa-plus"></i> Tambah</button></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="row">
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
												id="txt-total">
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
								<select class="form-control" id="cmb-bank" name="cmb-bank">
								<?php
									if ($result = $data->runQuery("SELECT * FROM khusus_bank WHERE hapus = '0';")) {
										while ($rs = $result->fetch_array()) {
											echo "<option value='".$rs['id']."'>".$rs['nama']." ".$rs['nomor_rekening']."</option>";
										}
									}
								?>
								</select>
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

<div class="modal fade " id="mdl-tambah-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Item Tebus</h4>
			</div>
			<div class="modal-body">
				<form id="frm-loading" action="#" method="POST" role="form">
					<div class="form-group">
						<input type="text" class="form-control" name="dp-loading" id="dp-loading" placeholder="Tanggal Loading">
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="button" id="btn-cari-loading">Cari</button>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-loading" name="cmb-loading"></select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-add-item">Tambah Item</button>
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
			data: {"mod" : "<?php echo e_url('modules/view/khusus/real/tebus.php'); ?>"},
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
		$('#dp-loading').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
	};
	
	function hitung(){
		
	};
	
	$('#btn-show-item').on('click', function(ev){
		ev.preventDefault();
		$('#mdl-tambah-item').modal();
		$('#cmb-loading').empty();
	});
	
	$('#btn-cari-loading').click(function(ev){
		var tgl = $('#dp-loading').val();
		$('#btn-cari-loading').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/khusus/tebus.php'); ?>", "apa" : "get-loading", "tgl" : tgl},
			success: function(event){
				$('#cmb-loading').empty();	
				$('#cmb-loading').html(event);
				$('#btn-cari-loading').removeClass('disabled').html('<i class="fa fa-share"></i> Cari');
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	});
	
	$('#btn-add-item').on('click', function(ev){
		ev.preventDefault();
		
		var id = $('#cmb-loading').val();
		var tgl = $('#dp-loading').val();
		
		var selected = $('#cmb-loading').find('option:selected');
		var jumlah = selected.data('jumlah');
		
		$('#tabel-loading tbody').append(
			"<tr>"+
			"<td>"+ id +"</td>"+
			"<td>"+ tgl +"</td>"+
			"<td>"+ jumlah +"</td>"+
			"<td><a class='btn btn-danger hapus-item' href='#'><i class='fa fa-trash-o'></i></a></td>"+
			"</tr>"
		);
		
		$('.hapus-item').bind("click", deleteDetail);
		$('.btn-close-modal').click();
	});
	
	function deleteDetail() {
		var par = $(this).parent().parent(); //tr
		par.remove();
	};
	
	function storeTblValues(){
		var TableData = new Array();

		$('#tabel-loading > tbody > tr').each(function(row, tr){
			TableData[row]={
				"idLoading" : $(tr).find('td:eq(0)').text()
			}    
		}); 
		return TableData;
	};
	
	$('#btn-simpan').click(function(ev){
		ev.preventDefault();
		if (confirm("Harap cek kembali data - data yang anda masukkan ! Simpan penebusan ?")) {
		
			$('#btn-simpan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
		
			var tgl = $('#dp-tgl').val(); var beaadmin = $('#txt-bea-admin').val();
			var total = $('#txt-total').val(); var bank = $('#cmb-bank').val();
			var jenis = $('#cmb-jenis').val(); var bukti = $('#txt-bukti').val();
			
			var TableData;
			TableData = storeTblValues();
			TableData = JSON.stringify(TableData);
			
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/khusus/tebus.php'); ?>", "apa" : "simpan", 
							"tgl" : tgl, "beaadmin" : beaadmin, "total" : total, "bank" : bank, 
							"jenis" : jenis, "bukti" : bukti, "detail" : TableData};
			
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