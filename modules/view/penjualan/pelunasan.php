<?php
	$data = new koneksi();
	$qTotal = "SELECT SUM(`penjualan`.`total_jual`) AS `total_piutang` FROM `penjualan` 
				WHERE `penjualan`.`jenis` = '4' AND `penjualan`.`total_bayar` < `penjualan`.`total_jual`;";
	
	if ($query = $data->runQuery($qTotal)) {
		$rs = $query->fetch_array();
	}
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Pelunasan
				</header>
				<div class="panel-body">
					<div class="row">
						<!--<div class="col-lg-2">
							<section class="panel">
								<div class="input-group input-large">
									<select class="form-control" id="cmb-konsumen">
									<?php
										//if ($result = $data->runQuery("SELECT id, nama FROM konsumen WHERE hapus = '0'")) {
											//while ($rs = $result->fetch_array()) {
												//echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
											//}
										//}
									?>
									</select>
								</div>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="panel">
								<button type="button" class="btn btn-primary" id="btn-cari"><i class="fa fa-search"></i> Cari</button>
							</section>
						</div>-->
						<div class="col-lg-12">
							<strong>Total Keseluruhan Piutang : Rp <?php echo number_format($rs['total_piutang'], 0, ",", "."); ?></strong>
						</div>
					</div>
					<hr>
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-penjualan">
							<thead>
								<tr>
									<th>Tgl Tempo</th>
									<th>ID</th>
									<th>Nota</th>
									<th>Tgl Jual</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th>Harga</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Tgl Tempo</th>
									<th>ID</th>
									<th>Nota</th>
									<th>Tgl Jual</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th>Harga</th>
									<th>Total</th>
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
					<div class="form-group" id="div-bank">
						<select class="form-control" id="cmb-bank" name="cmb-bank"></select>
					</div>
					<div class="form-group" id="div-bukti">
						<input type="text" class="form-control" id="txt-bukti" name="txt-bukti" placeholder="No. Bukti EDC / Bukti Transfer / No. BG">
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
		$('#div-bukti').hide();
		$('#div-bank').hide();
		$('#cmb-konsumen').chosen();
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
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelpenjualan.fnReloadAjax();
	});
	
	$('#tabel-penjualan').on('click', '#btn-show-bayar', function(ev){
		ev.preventDefault();
		$('#mdl-bayar').modal();
		$('#txt-id').val($(this).data('id'));
		$('#txt-bayar').val($(this).data('bayar'));
	});
	
	$('#cmb-jenis').change(function(){
		var selected = $(this).val();
		if (selected == '4') {
			$('#div-bg').show();
			$('#div-bukti').show();
			$('#div-bank').show();
		} else if (selected != '1') {
			$('#div-bg').hide();
			$('#div-bukti').show();
			$('#div-bank').show();
		} else {
			$('#div-bg').hide();
			$('#div-bukti').hide();
			$('#div-bank').hide();
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
			$('#btn-simpan-pelunasan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
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
						tabelpenjualan.fnReloadAjax();
						$('.btn-close-modal').click();
						//reloading();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan-pelunasan').removeClass('disabled').html('Bayar Pelunasan');
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