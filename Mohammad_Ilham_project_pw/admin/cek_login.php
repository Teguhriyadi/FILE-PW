<?php
	
	include '../include/koneksi.php';

	$nama_user = $_POST['nama_user'];
	$password = $_POST['password'];

	$login = mysqli_query($link, "SELECT * FROM tb_admin WHERE nama_user = '$nama_user' AND password = '$password' ");
	
	$dapat = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

	if ($dapat > 0) {
		session_start();

		$_SESSION['namauser'] = $r[$nama_user];
		$_SESSION['passuser'] = $r[$password];

		header("location:server.php?module=home");
	} else {
		print("
				<script>
					alert('Periksa Pengisian Form');
					location.href='index.php';
				</script>");
	}

?>