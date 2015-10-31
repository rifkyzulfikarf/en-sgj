<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Pelunasan
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<input type="text" class="form-control" name="dp-tempo" id="dp-tempo" placeholder="Tanggal Tempo">
								</div>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<button type="button" class="btn btn-primary" id="btn-cari"><i class="fa fa-search"></i> Cari</button>
							</section>
						</div>
					</div>
					<hr>
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-penjualan">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tgl Jual</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th>Harga</th>
									<th>Total</th>
									<th>Bayar</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Tgl Jual</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th>Harga</th>
									<th>Total</th>
									<th>Bayar</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<div class="modal fade " id="mdl-bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Pelunasan</h4>
			</div>
			<div class="modal-body">
				<form id="frm-pelunasan" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="txt-id" id="txt-id">
					<div class="form-group">
						<input type="text" class="form-control" name="dp-bayar" id="dp-bayar" placeholder="Tgl Bayar">
					</div>
					<div class="form-group">
						<input type="text" class="form-control rupiah" name="txt-bayar" id="txt-bayar" placeholder="Total Bayar">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-jenis" name="cmb-jenis">
							<option value="1">Cash</option>
							<option value="2">Debet</option>
							<option value="3">Transfer</option>
							<option value="4">BG</option>
						</select>
					</div>
					<div class="form-group" id="div-bg">
						<input type="text" class="form-control" name="dp-bg" id="dp-bg" placeholder="Tgl BG">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-bank" name="cmb-bank"></select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-bukti" name="txt-bukti" placeholder="No. Bukti">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-pelunasan">Bayar Pelunasan</button>
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
			data: {"mod" : "<?php echo e_url('modules/view/penjualan/pelunasan.php'); ?>"},
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
		$('.rupiah').number(true,0);
		$('.rupiah').val(0);
		$('#div-bg').hide();
		$('#dp-tempo').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#dp-bayar').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$('#dp-bg').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/pelunasan.php'); ?>", "apa" : "get-bank"},
			success: function(event){
				$('#cmb-bank').empty();	
				$('#cmb-bank').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabelpenjualan = $('#tabel-penjualan').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/penjualan/pelunasan.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-penjualan-tempo"});
            aoData.push({"name": "tgl", "value": $('#dp-tempo').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelpenjualan.fnReloadAjax();
	});
	
	$('#tabel-penjualan').on('click', '#btn-show-bayar', function(ev){
		ev.preventDefault();
		$('#mdl-bayar').modal();
		$('#txt-id').val($(this).data('id'));
	});
	
	$('#cmb-jenis').change(function(){
		var selected = $(this).val();
		if (selected == '4') {
			$('#div-bg').show();
		} else {
			$('#div-bg').hide();
		}
    });
	
	$('#btn-simpan-pelunasan').click(function(ev){
		ev.preventDefault();
		var id = $('#txt-id').val();
		var tgl = $('#dp-bayar').val();
		var total = $('#txt-bayar').val();
		var jenis = $('#cmb-jenis').val();
		var tglbg = $('#dp-bg').val();
		var bank = $('#cmb-bank').val();
		var bukti = $('#txt-bukti').val();
		
		if (confirm("Harap cek kembali data - data yang anda masukkan ! Simpan pelunasan ?")) {
			var post_data = {"aksi" : "<?php echo e_url('modules/controller/penjualan/pelunasan.php'); ?>", "apa" : "simpan-pelunasan", 
							"id" : id, "tgl" : tgl, "total" : total, "jenis" : jenis, "tglbg" : tglbg, "bank" : bank, "bukti" : bukti};
			
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