<?php
include "../include/koneksi.php";
$module = $_GET['module'];
//echo $module;
$act = $_GET['act'];

//delete data dalam database
if (isset($module) AND $act == 'hapus') {
	$id_admin = $_GET['id_admin'];
	mysqli_query($link, "DELETE FROM tb_admin where id_admin = '$id_admin' "); 
	header('location:server.php?module='.$module);

} elseif ($module == 'user' and $act == 'input') {
	
	$nama_user = $_POST['nama_user'];
	$password = $_POST['password'];
	$id = mysqli_query($link, "SELECT * FROM tb_admin WHERE nama_user = '$nama_user'");
	$r = mysqli_fetch_array($id);
	$cek = $r['id_admin']; 

	if($id_login = $cek) {
		print "<script>alert('user dengan nama $id_login sudah terdaftar, Silahkan Cek Kembali!!!');
		location.href = 'server.php?module=user&act=tambahuser';
		</script>";
	} else if(empty($_POST['nama_user'])) {
		print "<script>alert('username tidak boleh kosong!!!'); 
		location.href = 'javascript:history.go(-1)';</script>";
	} else if(empty($_POST['password'])) {
		print "<script>alert('password tidak boleh kosong!!!'); 
		location.href = 'javascript:history.go(-1)';
		</script>";
	} else{
		$nama_user = $_POST['nama_user'];
		$password = $_POST['password']; 
		mysqli_query($link, "INSERT INTO tb_admin(nama_user, password) VALUES ('$nama_user', '$password')"); 
		header('location:server.php?module='.$module);
	}
} elseif ($module == 'user' and $act == 'update') { 
	if (empty($_POST['id_user'])) {
		print "<script>alert('username tidak boleh kosong!!!'); 
		location.href = 'javascript:history.go(-1)';
		</script>";
	} else {
//apabila password tidak dirubah 
		if (empty($_POST['password'])) {
			mysqli_query($link, "update admin set id_user='$_POST[id_user]' where id_user='$_POST[id_user]'");
		} else {
			$pass = $_POST['password'];
			mysqli_query($link, "update admin set id_user='$_POST[id_user]', password='$pass' where id_user='$_POST[id_user]'");
		}
		header('location:server.php?module='.$module);
	}
}
?>
