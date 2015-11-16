<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Acc Gudang
				</header>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
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
						<div class="col-lg-4">
							<section class="panel">
								<button type="button" class="btn btn-primary" id="btn-cari"><i class="fa fa-search"></i> Cari</button>
							</section>
						</div>
					</div>
					<hr>
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-pinjaman">
							<thead>
								<tr>
									<th>Tgl Pinjam</th>
									<th>Jumlah</th>
									<th>Tgl Kembali</th>
									<th>Jumlah</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Tgl Pinjam</th>
									<th>Jumlah</th>
									<th>Tgl Kembali</th>
									<th>Jumlah</th>
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

<div class="modal fade " id="mdl-acc-out" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Acc Pinjaman</h4>
			</div>
			<div class="modal-body">
				<form id="frm-acc-out" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="apa" id="apa" value="simpan-acc-out">
					<input type="hidden" class="form-control" name="txt-id-out" id="txt-id-out">
					<input type="hidden" class="form-control" name="txt-idbarang-out" id="txt-idbarang-out">
					<input type="hidden" class="form-control" name="txt-jml-out" id="txt-jml-out">
					<div class="form-group">
						<select class="form-control" id="cmb-acc-out" name="cmb-acc-out">
							<option value="1">Acc</option>
							<option value="2">Tolak</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-acc-out">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade " id="mdl-acc-in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Acc Pengembalian</h4>
			</div>
			<div class="modal-body">
				<form id="frm-acc-in" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="apa" id="apa" value="simpan-acc-in">
					<input type="hidden" class="form-control" name="txt-id-in" id="txt-id-in">
					<input type="hidden" class="form-control" name="txt-idbarang-in" id="txt-idbarang-in">
					<input type="hidden" class="form-control" name="txt-jml-in" id="txt-jml-in">
					<div class="form-group">
						<select class="form-control" id="cmb-acc-in" name="cmb-acc-in">
							<option value="1">Acc</option>
							<option value="2">Tolak</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-acc-in">Simpan</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#cmb-konsumen').chosen();
	};
	
	var tabelpinjaman = $('#tabel-pinjaman').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/pinjam-tabung/acc_gudang.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-pinjaman"});
            aoData.push({"name": "konsumen", "value": $('#cmb-konsumen').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelpinjaman.fnReloadAjax();
	});
	
	$('#tabel-pinjaman').on('click', '#btn-show-out', function(ev){
		ev.preventDefault();
		$('#mdl-acc-out').modal();
		$('#txt-id-out').val($(this).data('id'));
		$('#txt-idbarang-out').val($(this).data('idbarang'));
		$('#txt-jml-out').val($(this).data('jml'));
	});
	
	$('#tabel-pinjaman').on('click', '#btn-show-in', function(ev){
		ev.preventDefault();
		$('#mdl-acc-in').modal();
		$('#txt-id-in').val($(this).data('id'));
		$('#txt-idbarang-in').val($(this).data('idbarang'));
		$('#txt-jml-in').val($(this).data('jml'));
	});
	
	$('#btn-simpan-acc-out').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/pinjam-tabung/acc_gudang.php'); ?>" + "&" +$('#frm-acc-out').serialize();
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
						$('.btn-close-modal').click();
						tabelpinjaman.fnReloadAjax();
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
	
	$('#btn-simpan-acc-in').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/pinjam-tabung/acc_gudang.php'); ?>" + "&" +$('#frm-acc-in').serialize();
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
						$('.btn-close-modal').click();
						tabelpinjaman.fnReloadAjax();
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