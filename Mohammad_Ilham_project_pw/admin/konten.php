<?php
	error_reporting(0);
	include '../include/koneksi.php';
	include '../include/konversi_tgl.php';

	if ($_GET['module'] == 'home') {
?>
<div class="row">
	<div class="col-md-12">
		<h2><i class="fa fa-dashboard"></i> Dashboard</h2>   
		<h5>Selamat Datang di Halaman Utama <b>Web Mohammad Ilham Teguhriyadi</b></h5>
	</div>
</div>
<?php
	} else if ($_GET['module'] == 'user') {
		require 'modul/user.php';
	} else if($_GET['module'] == 'galeri') {
		require 'modul/galeri.php';
	} else if($_GET['module'] == 'bukutamu') {
		require 'modul/bukutamu.php';
	} else {
		echo "<p><b>MODUL BELUM ADA</b></p>";
	}
?>