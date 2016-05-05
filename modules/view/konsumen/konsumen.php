<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data Konsumen
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="pull-right">
						<button class="btn btn-default btn-sm" id="btn-print"><i class="fa fa-print"></i> Print</button>
					</div>
					<div id="print-section">
						<div class="adv-table">
							<table class="display table table-bordered table-striped" id="tabel-konsumen">
								<thead>
									<tr>
										<th>Nama</th>
										<th>PIC</th>
										<th>Alamat</th>
										<th>Telp</th>
										<th>Pangkalan</th>
										<th>Tempo</th>
										<th>3 Kg</th>
										<th>12 Kg</th>
										<th>BG</th>
										<th>50 Kg</th>
										<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
								<tfoot>
									<tr>
										<th>Nama</th>
										<th>PIC</th>
										<th>Alamat</th>
										<th>Telp</th>
										<th>Pangkalan</th>
										<th>Tempo</th>
										<th>3 Kg</th>
										<th>12 Kg</th>
										<th>BG</th>
										<th>50 Kg</th>
										<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<div class="modal fade " id="mdl-data-konsumen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Data Konsumen</h4>
			</div>
			<div class="modal-body">
				<form id="frm-konsumen" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								Nama :<input type="text" class="form-control" id="txt-nama" name="txt-nama" placeholder="Nama Konsumen">
							</div>
							<div class="form-group">
								PIC :<input type="text" class="form-control" id="txt-pic" name="txt-pic" placeholder="-">
							</div>
							<div class="form-group">
								Alamat :<input type="text" class="form-control" id="txt-alamat" name="txt-alamat" placeholder="Alamat">
							</div>
							<div class="form-group">
								Telepon :<input type="text" class="form-control" id="txt-telp" name="txt-telp" placeholder="No. Telepon">
							</div>
							<div class="form-group">
								Tempo :<input type="text" class="form-control" id="txt-tempo" name="txt-tempo" placeholder="Waktu Tempo">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								3 Kg :<input type="text" class="form-control" id="txt-3kg" name="txt-3kg" placeholder="Harga 3Kg">
							</div>
							<div class="form-group">
								12 Kg :<input type="text" class="form-control" id="txt-12kg" name="txt-12kg" placeholder="Harga 12Kg">
							</div>
							<div class="form-group">
								BG :<input type="text" class="form-control" id="txt-bg" name="txt-bg" placeholder="Harga BG">
							</div>
							<div class="form-group">
								50 Kg :<input type="text" class="form-control" id="txt-50kg" name="txt-50kg" placeholder="Harga 50Kg">
							</div>
							<div class="form-group">
								<label>
									<input type="checkbox" id="cb-pangkalan" name="cb-pangkalan" value="1"> Pangkalan
								</label>
							</div>
						</div>
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
	
	init();
	
	function init() {
		$('#txt-tempo').number(true,0);
		$('#txt-3kg').number(true,0);
		$('#txt-12kg').number(true,0);
		$('#txt-bg').number(true,0);
		$('#txt-50kg').number(true,0);
	};
	
	var tabelkonsumen = $('#tabel-konsumen').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-konsumen"});
        },
		"aLengthMenu": [
			[10, 25, 50, 100, -1],
			[10, 25, 50, 100, "All"]
		],
		"bFilter": false
    });
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-data-konsumen').modal();
		$('#apa').val('tambah-konsumen');
		$('#txt-nama').val("");
		$('#txt-alamat').val("");
		$('#txt-telp').val("");
		$('#txt-tempo').val("30");
		$('#txt-3kg').val("");
		$('#txt-12kg').val("");
		$('#txt-bg').val("");
		$('#txt-50kg').val("");
	});
	
	$('#tabel-konsumen').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-konsumen').modal();
		$('#apa').val('ubah-konsumen');
		$('#txt-id').val($(this).data('id'));
		$('#txt-nama').val($(this).data('nama'));
		$('#txt-alamat').val($(this).data('alamat'));
		$('#txt-telp').val($(this).data('telp'));
		$('#txt-tempo').val($(this).data('tempo'));
		$('#txt-3kg').val($(this).data('3kg'));
		$('#txt-12kg').val($(this).data('12kg'));
		$('#txt-bg').val($(this).data('bg'));
		$('#txt-50kg').val($(this).data('50kg'));
	});
	
	$('#tabel-konsumen').on('click', '#btn-hapus-konsumen', function(ev){
		ev.preventDefault();
		var id_konsumen = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>", "apa" : "hapus-konsumen", "id" : id_konsumen},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelkonsumen.fnReloadAjax();
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
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/konsumen/konsumen.php'); ?>" + "&" +$('#frm-konsumen').serialize();
		console.log(post_data);
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
						tabelkonsumen.fnReloadAjax();
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
	
	$('#btn-print').click(function(ev){
		ev.preventDefault();
		$('#print-section').print({
			globalStyles: true,
			timeout: 250
		});
	});
	
});
</script>