<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "latihan_db";

	$link = mysqli_connect($server, $username, $password) or die("gagal");
	mysqli_select_db($link, $database) or die ("database tidak ditemukan");

?>