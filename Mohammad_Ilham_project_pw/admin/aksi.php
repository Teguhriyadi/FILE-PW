<?php
include "../include/koneksi.php";
$module = $_GET['module'];
//echo $module;
$act = $_GET['act'];

//delete data dalam database
if (isset($module) AND $act == 'hapus') {
	
	mysqli_query($link, "DELETE FROM admin where id_".$module."='$_GET[id]'"); 
	header('location:server.php?module='.$module);

} elseif ($module == 'user' and $act == 'input') {
	
	$id_login = $_POST['id_user'];
	$id = mysqli_query($link, "SELECT * FROM admin WHERE id_user = '$id_login'");
	$r = mysqli_fetch_array($id);
	$cek = $r['id_user']; 

	if($id_login = $cek) {
		print "<script>alert('user dengan nama $id_login sudah terdaftar, Silahkan Cek Kembali!!!');
		location.href = 'server.php?module=user&act=tambahuser';
		</script>";
	} else if(empty($_POST['id_user'])) {
		print "<script>alert('username tidak boleh kosong!!!'); 
		location.href = 'javascript:history.go(-1)';</script>";
	} else if(empty($_POST['password'])) {
		print "<script>alert('password tidak boleh kosong!!!'); 
		location.href = 'javascript:history.go(-1)';
		</script>";
	} else{
		$id_user = $_POST['id_user'];
		$password = $_POST['password']; 
		mysqli_query($link, "INSERT INTO admin(id_user, password) VALUES ('$id_user', '$password')"); 
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
