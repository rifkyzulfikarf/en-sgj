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
					INNER JOIN `karyawan` ON (`berita_acara`.`id_karyawan` = `karyawan`.`id`) ORDER BY `tgl`,`jam` DESC LIMIT 20;";
					if ($result = $data->runQuery($query)) {
						if ($result->num_rows > 0) {
							while ($rs = $result->fetch_array()) {
								echo "<li id='item-berita' data-tgl='".$rs['tgl']."' data-jam='".$rs['jam']."' data-judul='".$rs['judul']."' 
								data-isi='".$rs['isi']."' data-nama='".$rs['nama']."'>
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
					<div class="col-md-8"></div>
					<div class="col-md-4 text-right">
					  <p class="date" id="tanggal"></p>
					</div>
					<div class="col-md-12">
					  <h4 id="judul"></h4>
					</div>
				</div>
				<div class="view-mail" id="isi">
					
				</div>
			</div>
		</aside>
	</div>
</section>

<script>
$(document).ready(function(){
	
	$('#daftar-berita').on('click', '#item-berita', function(ev){
		ev.preventDefault();
		$('#tanggal').html($(this).data('tgl') + " " + $(this).data('jam'));
		$('#judul').html($(this).data('judul'));
		$('#isi').html($(this).data('isi'));
	});
	
});
</script>