<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Pengembalian Tabung
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
									<th>Barang</th>
									<th>Jumlah</th>
									<th>Jenis</th>
									<th>Tgl Pinjam</th>
									<th>Tgl Kembali</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Barang</th>
									<th>Jumlah</th>
									<th>Jenis</th>
									<th>Tgl Pinjam</th>
									<th>Tgl Kembali</th>
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

<div class="modal fade " id="mdl-kembali" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Pengembalian</h4>
			</div>
			<div class="modal-body">
				<form id="frm-pengembalian" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" name="apa" id="apa" value="simpan">
					<input type="hidden" class="form-control" name="txt-id" id="txt-id">
					<input type="hidden" class="form-control" name="txt-jenis" id="txt-jenis">
					<div class="form-group">
						<input type="text" class="form-control" name="dp-kembali" id="dp-kembali" placeholder="Tgl Kembali">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="txt-jumlah" id="txt-jumlah" placeholder="Jumlah Kembali">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-pengembalian">Simpan Pengembalian</button>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	init();
	
	function init() {
		$('#cmb-konsumen').chosen();
		$('#dp-kembali').datepicker({
			format : "yyyy-mm-dd",
			autoclose : true
		});
	};
	
	var tabelpinjaman = $('#tabel-pinjaman').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/pinjam-tabung/pengembalian.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-pinjaman"});
            aoData.push({"name": "konsumen", "value": $('#cmb-konsumen').val()});
        }
    });
	
	$('#btn-cari').click(function(ev){
		tabelpinjaman.fnReloadAjax();
	});
	
	$('#tabel-pinjaman').on('click', '#btn-show-kembali', function(ev){
		ev.preventDefault();
		$('#mdl-kembali').modal();
		$('#txt-id').val($(this).data('id'));
		$('#txt-jenis').val($(this).data('jenis'));
	});
	
	$('#btn-simpan-pengembalian').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/pinjam-tabung/pengembalian.php'); ?>" + "&" + $('#frm-pengembalian').serialize();
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