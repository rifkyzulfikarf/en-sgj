<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					Data Karyawan
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-tambah-data" data-mode="tambah"><i class="fa fa-plus"></i> Tambah Data</button>
					</span>
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-karyawan">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Jabatan</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Jabatan</th>
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

<div class="modal fade " id="mdl-data-karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Data Karyawan</h4>
			</div>
			<div class="modal-body">
				<form id="frm-karyawan" action="#" method="POST" role="form">
					<input type="hidden" class="form-control" id="apa" name="apa">
					<input type="hidden" class="form-control" id="txt-id" name="txt-id">
					<div class="form-group">
						<input type="text" class="form-control" id="txt-nama" name="txt-nama" placeholder="Nama Karyawan">
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-jk" name="cmb-jk">
							<option value="L">Laki - laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<select class="form-control" id="cmb-jabatan" name="cmb-jabatan">
							
						</select>
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
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"aksi" : "<?php echo e_url('modules/controller/master-data/karyawan.php'); ?>", "apa" : "get-jabatan"},
			success: function(event){
				$('#cmb-jabatan').empty();	
				$('#cmb-jabatan').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabelkaryawan = $('#tabel-karyawan').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/master-data/karyawan.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-karyawan"});
        }
    });
	
	$('#btn-tambah-data').click(function(ev){
		ev.preventDefault();
		$('#mdl-data-karyawan').modal();
		$('#apa').val('tambah-karyawan');
		$('#txt-nama').val("");
	});
	
	$('#tabel-karyawan').on('click', '#btn-ubah-data', function(ev){
		ev.preventDefault();
		$('#mdl-data-karyawan').modal();
		$('#apa').val('ubah-karyawan');
		$('#txt-id').val($(this).data('id'));
		$('#txt-nama').val($(this).data('nama'));
	});
	
	$('#tabel-karyawan').on('click', '#btn-hapus-karyawan', function(ev){
		ev.preventDefault();
		var id_karyawan = $(this).data('id');
		if (confirm('Setuju hapus data ?')) {
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/master-data/karyawan.php'); ?>", "apa" : "hapus-karyawan", "id" : id_karyawan},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						$('.btn-close-modal').click();
						tabelkaryawan.fnReloadAjax();
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
		var post_data = "aksi=" + "<?php echo e_url('modules/controller/master-data/karyawan.php'); ?>" + "&" +$('#frm-karyawan').serialize();
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
						tabelkaryawan.fnReloadAjax();
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