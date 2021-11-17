<?php
include "../include/koneksi.php";
$module = $_GET['module'];
//echo $module;
$act = $_GET['act'];

//delete data dalam database
if (isset($module) AND $act == 'hapus') {
	
	mysqli_query($link, "DELETE FROM buku_tamu WHERE id_bktamu = '$_GET[id_bktamu]'"); 
	header('location:server.php?module='.$module);

} elseif ($module == 'bukutamu' and $act == 'input') {
	
	$email_bktamu = $_POST['email_bktamu'];
	$query = mysqli_query($link, "SELECT * FROM buku_tamu WHERE email_bktamu = '$email_bktamu'");
	$r = mysqli_fetch_array($query);
	$cek = $r['email_bktamu']; 

	if($email_bktamu = $cek) {
		print "<script>alert('user dengan email $email_bktamu sudah terdaftar, Silahkan Cek Kembali!!!');
		location.href = 'server.php?module=bukutamu&act=tambahuser';
		</script>";
	} else{
		$nm_bktamu = $_POST['nm_bktamu'];
		$email_bktamu = $_POST['email_bktamu'];
		$tgl_bktamu = $_POST['tgl_bktamu'];
		$status_bktamu = $_POST['status_bktamu'];
		$alamat_bktamu = $_POST['alamat_bktamu'];
		$komentar = $_POST['komentar'];
		mysqli_query($link, "INSERT INTO buku_tamu VALUES('','$status_bktamu', '$nm_bktamu', '$email_bktamu', '$alamat_bktamu', '$tgl_bktamu', '$komentar') "); 
		header('location:server.php?module='.$module);
	}
} elseif ($module == 'bukutamu' and $act == 'update') { 
	if (empty($_POST['email_bktamu'])) {
		print "<script>alert('username tidak boleh kosong!!!'); 
		location.href = 'javascript:history.go(-1)';
		</script>";
	} else {
//apabila password tidak dirubah 
		if (empty($_POST['id_bktamu'])) {
			mysqli_query($link, "update admin set id_user='$_POST[id_user]' where id_user='$_POST[id_user]'");
		} else {
			$id_bktamu = $_POST['id_bktamu'];
			$nm_bktamu = $_POST['nm_bktamu'];
			$email_bktamu = $_POST['email_bktamu'];
			$status_bktamu = $_POST['status_bktamu'];
			$alamat_bktamu = $_POST['alamat_bktamu'];
			$tgl_bktamu = $_POST['tgl_bktamu'];
			$komentar = $_POST['komentar'];
			mysqli_query($link, "UPDATE buku_tamu SET nm_bktamu = '$nm_bktamu', email_bktamu = '$email_bktamu', status_bktamu = '$status_bktamu', alamat_bktamu = '$alamat_bktamu', tgl_bktamu = '$tgl_bktamu', komentar = '$komentar' WHERE id_bktamu = '$id_bktamu' ");
		}
		header('location:server.php?module='.$module);
	}
}
?>
