<?php
include "../include/koneksi.php";
echo $module = $_GET['module'];
//echo $module;
$act = $_GET['act'];

//delete data dalam database
if (isset($module) AND $act == 'hapus') {
	
	$unlink = mysqli_query($link, "SELECT * FROM galeri WHERE id_galeri = '$_GET[id_galeri]' ");
	$CekLink = mysqli_fetch_array($unlink);
	$gambar = $CekLink['gambar'];

	if (!empty($gambar)) {
		unlink("galeri/$gambar");
	}

	mysqli_query($link, "DELETE FROM galeri WHERE id_galeri = '$_GET[id_galeri]' ");
	header("location:server.php?module=galeri");

} elseif ($module == 'galeri' and $act == 'input') {
	
	$set = true;
	$msg = "";

	$tipe_file = $_FILES['gambar']['type'];
	$lokasi_file = $_FILES['gambar']['tmp_name'];
	$nama_file = $_FILES['gambar']['name'];
	$save_file = move_uploaded_file($lokasi_file, "galeri/$nama_file");

	if (empty($lokasi_file)) {
		$set = false;
		$msg = $msg. 'Upload Gagal, Anda Lupa Mengambil Gambar...';
	} else {
		if ($tipe_file != "image/gif" AND $tipe_file != "image/jpeg" AND $tipe_file != "image/jpg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png") {
			$set = false;
			$msg = $msg. 'Upload Gagal, tipe file harus image...';
		} else {
			isset($save_file);
		}

		// replace di server
		if ($save_file) {
			chmod("galeri/$nama_file", 0777);
		} else {
			$msg = $msg. "Upload Image Gagal...";
			$set = false;
		}
	}

	if ($set) {
		$nm_galeri = $_POST['nm_galeri'];
		$ket = $_POST['ket'];
		$tgl = date("d-m-Y");
		$sql = mysqli_query($link, "INSERT INTO galeri VALUES('','$nm_galeri', '$ket', '$tgl', '$nama_file')");
		$msg = $msg. "Upload Galeri Sukses...";
		echo "<script>window.location.href='server.php?module=galeri';</script>";
	} 

	echo "$msg";

} elseif ($module == 'galeri' and $act == 'update') {
	$set = true;
	$msg = "";

	$tipe_file = $_FILES['gambar_baru']['type'];
	$lokasi_file = $_FILES['gambar_baru']['tmp_name'];
	$nama_file = $_FILES['gambar_baru']['name'];
}

?>
