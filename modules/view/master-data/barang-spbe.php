<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data Barang SPBE
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-spbe">
							<thead>
								<tr>
									<th>SPBE</th>
									<th>Barang</th>
									<th>Ship To</th>
									<th>Sold To</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>SPBE</th>
									<th>Barang</th>
									<th>Ship To</th>
									<th>Sold To</th>
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

<div class="modal fade " id="mdl-data-spbe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Data Barang SPBE</h4>
			</div>
			<div class="modal-body">
				<form id="frm-spbe" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<select class="form-control" id="cmb-spbe" name="cmb-spbe">
							<?php
								if ($query = $data->runQuery("SELECT `id`, `nama` FROM `spbe` WHERE `hapus` = '0';")) {
									while ($rs = $query->fetch_array()) {
										echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-barang" name="cmb-barang">
							<?php
								if ($query = $data->runQuery("SELECT `id`, `nama` FROM `barang`;")) {
									while ($rs = $query->fetch_array()) {
										echo "<option value='".$rs['id']."'>".$rs['nama']."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-ship" name="txt-ship" placeholder="Masukkan Kode Ship To">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="txt-sold" name="txt-sold" placeholder="Masukkan Kode Sold To">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default btn-close-modal" type="button">Close</button>
				<button class="btn btn-primary" type="button" id="btn-simpan-data">Simpan Data</button>
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
			data: {"mod" : "<?php echo e_url('modules/view/master-data/barang-spbe.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabelspbe = $('#tabel-spbe').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/master-data/barang-spbe.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-data"});
        }
    });
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-data-spbe').modal();
		$('#apa').val('tambah');
		$('#txt-ship').val("");
		$('#txt-sold').val("");
	});
	
	$('#tabel-spbe').on('click', '#btn-hapus', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/master-data/barang-spbe.php'); ?>", "apa" : "hapus", "id" : id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelspbe.fnReloadAjax();
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
	
	$('#btn-simpan-data').click(function(ev){
		ev.preventDefault();
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/master-data/barang-spbe.php'); ?>" + "&" +$('#frm-spbe').serialize();
		if (confirm('Simpan data ?')) {
			$('#btn-simpan-data').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
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
						tabelspbe.fnReloadAjax();
					} else {
						alert(eve.msg);
					}
					$('#btn-simpan-data').removeClass('disabled').html('Simpan Data');
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