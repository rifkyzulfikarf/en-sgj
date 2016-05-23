<?php

class menu extends koneksi {
	function cek_menu($id_user, $level, $induk) {

		$id_user = $this->clearText($id_user);
		$level = $this->clearText($level);
		$induk = $this->clearText($induk);


		if ($daftar = $this->runQuery("SELECT `akses_menu`.* FROM `akses_menu` INNER JOIN `akses` ON `akses`.`id_menu` = `akses_menu`.`id` 
INNER JOIN `pemakai` ON `akses`.`id_pemakai` = `pemakai`.`id` INNER JOIN `karyawan` ON 
`pemakai`.`id_karyawan` = `karyawan`.`id` WHERE `karyawan`.`id` = '$id_user' && `akses_menu`.`level` = '$level' && `akses_menu`.`induk`='$induk' ORDER BY `akses_menu`.`urutan`")) {
			if ($daftar->num_rows > 0) {
				return $daftar;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
}


if (isset($_SESSION['en-data']) && $_SESSION['en-data'] != "" && isset($_SESSION['en-level']) && $_SESSION['en-level'] != "") {
	$menu = new menu();
?>

	<!--sidebar start-->
	<aside>
		<div id="sidebar"  class="nav-collapse ">
			<!-- sidebar menu start-->
			<ul class="sidebar-menu" id="nav-accordion">
			
			<?php
				if ($level1 = $menu->cek_menu(d_code($_SESSION['en-data']),'1','0')) {
					while ($rs1 = $level1->fetch_assoc()) {
						if ($level2 = $menu->cek_menu(d_code($_SESSION['en-data']),'2',$rs1['id'])) {
							echo "<li class='sub-menu'><a href='javascript:;'><i class='".$rs1['icon']."'></i><span>".$rs1['nama']."</span></a><ul class='sub'>";

							while ($rs2 = $level2->fetch_assoc()) {
								if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] != "") {
									$url = str_replace("dummy", "real", $rs2['url']);
								} else {
									$url = $rs2['url'];
								}
								echo "<li><a href='#' class='link-menu' data-link='".e_url($url)."' data-hash='".$rs2['nama']."'>".$rs2['nama']."</a></li>";
							}

							echo "</ul></li>";
						} else {
							echo "<li><a href='#' class='link-menu' data-link='".e_url($rs1['url'])."' data-hash='".$rs1['nama']."'><i class='".$rs1['icon']."'></i><span>".$rs1['nama']."</span></a></li>";
						}
					}
				}
			?>
			
			</ul>
		  <!-- sidebar menu end-->
		</div>
	</aside>
	<!--sidebar end-->

<?php
}
?>