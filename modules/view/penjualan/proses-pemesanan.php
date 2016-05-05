<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					Proses Pemesanan
				</header>
				<div class="panel-body">
					<div class="adv-table">
						<table class="display table table-bordered table-striped" id="tabel-pemesanan">
							<thead>
								<tr>
									<th>ID</th>
									<th>Pesan</th>
									<th>Kirim</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th>Penginput</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
								</tr>
							</thead>
							<tbody></tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Pesan</th>
									<th>Kirim</th>
									<th>Konsumen</th>
									<th>Barang</th>
									<th>Jml</th>
									<th>Penginput</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
								</tr>
							</tfoot>
						</table>
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
			data: {"mod" : "<?php echo e_url('modules/view/penjualan/proses-pemesanan.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	var tabelpemesanan = $('#tabel-pemesanan').dataTable({
		"sAjaxSource": './',
		"sServerMethod": "POST",
		"fnServerParams": function ( aoData ) {
            aoData.push({"name": "aksi", "value": "<?php echo e_url('modules/controller/penjualan/proses-pemesanan.php'); ?>"});
            aoData.push({"name": "apa", "value": "get-pemesanan"});
        }
    });
	
	$('#tabel-pemesanan').on('click', '#btn-proses-pesanan', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		var idKonsumen = $(this).data('idkonsumen');
		var namaKonsumen = $(this).data('namakonsumen');
		var idBarang = $(this).data('idbarang');
		var namaBarang = $(this).data('namabarang');
		var jml = $(this).data('jml');
		var het = $(this).data('het');
		
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"mod" : "<?php echo e_url('modules/view/penjualan/penjualan-pemesanan.php'); ?>", 
					"id" : id, "idkonsumen" : idKonsumen, "namakonsumen" : namaKonsumen, "idbarang" : idBarang, 
					"namabarang" : namaBarang, "jml" : jml, "het" : het},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	});
	
	$('#tabel-pemesanan').on('click', '#btn-hapus-pesanan', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		
		if (confirm('Setuju hapus data ?')) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/penjualan/proses-pemesanan.php'); ?>", "apa" : "hapus", "id" : id},
				success: function(eve){
					if (eve.status){
						alert(eve.msg);
						tabelpemesanan.fnReloadAjax();
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