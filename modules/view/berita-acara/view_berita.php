<?php
	$data = new koneksi();
?>
<section class="wrapper site-min-height">
	<div class="mail-box">
		<aside class="sm-side">
			<div class="user-head">
				<a href="javascript:;" class="inbox-avatar"></a>
				<div class="user-name">
					<h5><?php echo $_SESSION['en-nama'] ?></h5>
				</div>
			</div>
			<ul class="nav nav-pills nav-stacked labels-info inbox-divider" id="daftar-berita">
				<li> <h4>Berita Acara Terbaru</h4> </li>
				<?php
					$query = "SELECT `berita_acara`.*, `karyawan`.`nama` FROM `berita_acara` 
					INNER JOIN `karyawan` ON (`berita_acara`.`id_karyawan` = `karyawan`.`id`) WHERE `berita_acara`.`hapus` = '0'
					ORDER BY `tgl`,`jam` DESC LIMIT 20;";
					if ($result = $data->runQuery($query)) {
						if ($result->num_rows > 0) {
							while ($rs = $result->fetch_array()) {
								echo "<li id='item-berita' data-id='".$rs['id']."' data-tgl='".$rs['tgl']."' data-jam='".$rs['jam']."' 
								data-judul='".$rs['judul']."' data-isi='".$rs['isi']."' data-nama='".$rs['nama']."'>
								<a href='#'><i class='fa fa-sign-blank text-danger'></i> ".$rs['nama']."</a></li>";
							}
						} else {
							echo "<li><a href='#'><i class='fa fa-sign-blank text-danger'></i> Tidak ada item baru</a></li>";
						}
					}
				?>
			</ul>
		</aside>
		<aside class="lg-side">
			<div class="inbox-head">
				<h3>View Berita Acara</h3>
			</div>
			<div class="inbox-body">
				<div class="heading-inbox row">
					<div class="col-md-8">
						<?php if ($_SESSION['en-level'] == "1" || $_SESSION['en-level'] == "2") { ?>
						<div class="compose-btn">
							<button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm tooltips" id="btn-hapus"><i class="fa fa-trash-o"></i></button>
						</div>
						<?php } ?>
					</div>
					<div class="col-md-4 text-right">
					  <p class="date" id="tanggal"></p>
					</div>
					<div class="col-md-12">
					  <h4 id="judul"></h4>
					</div>
				</div>
				<input type="hidden" id="txt-id" value=""></input>
				<div class="view-mail" id="isi">
					
				</div>
			</div>
		</aside>
	</div>
</section>

<script>
$(document).ready(function(){
	
	function reloading(){
		$.ajax({
			url : "./",
			method: "POST",
			cache: false,
			data: {"mod" : "<?php echo e_url('modules/view/berita-acara/view_berita.php'); ?>"},
			success: function(event){	
				$('#main-content').html(event);
			},
			error: function(){
				alert('Gagal terkoneksi dengan server, coba lagi..!');
			}
		});
	};
	
	$('#daftar-berita').on('click', '#item-berita', function(ev){
		ev.preventDefault();
		var id = $(this).data('id');
		$('#tanggal').html($(this).data('tgl') + " " + $(this).data('jam'));
		$('#judul').html($(this).data('judul'));
		$('#isi').html($(this).data('isi'));
		$('#txt-id').val(id);
	});
	
	$('#btn-hapus').click(function(ev){
		ev.preventDefault();
		var id = $('#txt-id').val();
		if (confirm('Setuju hapus berita acara ini ?')) {
			$(this).addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i>');
			$.ajax({
				url: "./",
				method: "POST",
				cache: false,
				dataType: "JSON",
				data: {"aksi" : "<?php echo e_url('modules/controller/berita-acara/input.php'); ?>", "apa" : "hapus", "id" : id},
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