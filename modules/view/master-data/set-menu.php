<?php
if (isset($_SESSION['en-data']) && $_SESSION['en-data'] != "" && isset($_REQUEST['id']) && $_REQUEST['id'] != "" && isset($_REQUEST['nama']) && $_REQUEST['nama'] != "") {
	require './modules/model/class.user.php';
	$data = new user();
?>
<section class="wrapper site-min-height">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					<?php echo $_REQUEST['nama']; ?>
					<span class="tools pull-right">
						<button type="button" class="btn btn-primary btn-sm" id="btn-simpan"><i class="fa fa-share"></i> Simpan Data</button>
					</span>
				</header>
				<div class="panel-body">
					<form action="#" method="POST" id="form-menu" name="form-menu" >
						<input type="hidden" id="aksi" name="aksi" value="<?php echo e_url('./modules/controller/master-data/set_menu.php'); ?>">
						<input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['id']; ?>">
						<table class="table table-mod">
							<thead>
								<tr>
									<th>Nama Menu</th><th>Level</th><th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									if ($res1 = $data->runQuery("SELECT `id`, `icon`, `nama` FROM `akses_menu` WHERE `induk` = '0' ORDER BY `urutan` ASC;")) {
										while ($rs1 = $res1->fetch_array()) {
											if ($resCek1 = $data->runQuery("SELECT COUNT(`id`) FROM `akses` WHERE `id_pemakai` = '".d_code($_REQUEST['id'])."' AND `id_menu` = '".$rs1['id']."'")) {
												$rsCek1 = $resCek1->fetch_array();
												$checked1 = ($rsCek1[0] == 0) ? "":"checked";
											}
								?>
											<tr>
												<td> <i class="<?php echo $rs1['icon']; ?>"></i> <?php echo $rs1['nama']; ?></td><td>1</td><td><input type="checkbox" id="menu" name="menu[]" value="<?php  echo $rs1['id']; ?>" <?php echo $checked1 ?>></td>
											</tr>
								<?php
											if ($res2 = $data->runQuery("SELECT `id`, `nama` FROM `akses_menu` WHERE `induk` = '".$rs1['id']."' ORDER BY `urutan` ASC;")) {
												while ($rs2 = $res2->fetch_array()) {
													if ($resCek2 = $data->runQuery("SELECT COUNT(`id`) FROM `akses` WHERE `id_pemakai` = '".d_code($_REQUEST['id'])."' AND `id_menu` = '".$rs2['id']."'")) {
														$rsCek2 = $resCek2->fetch_array();
														$checked2 = ($rsCek2[0] == 0) ? "":"checked";
													}
								?>
													<tr>
														<td>-- <?php echo $rs2['nama']; ?></td><td> -- 2</td><td><input type="checkbox" id="menu" name="menu[]" value="<?php  echo $rs2['id']; ?>" <?php echo $checked2 ?>></td>
													</tr>	
								<?php
												}
											}
										}
									}
								?>
							</tbody>
						</table>

					</form>
				</div>
			</section>
		</div>
	</div>
</section>

<script>
$(document).ready(function() {

	$('#btn-simpan').on('click', function(ev){
	    ev.preventDefault();
		$('#btn-simpan').addClass('disabled').html('<i class="fa fa-spinner fa-pulse"></i> Processing...');
	    var post_data = $('#form-menu').serialize();
	        
		$.ajax({
			url: "./",
			method: "POST",
			cache: false,
			data: post_data,
			success: function(eve) {
				alert(eve);
				var href = $('.logo').attr('href');
				window.location.href = href;
			},
			error: function() {
				alert('Gagal terkoneksi dengan server..');
			}
		 });
	});
	
});


</script>
<?php
}
?>