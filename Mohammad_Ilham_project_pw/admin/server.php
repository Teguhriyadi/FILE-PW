<?php 
session_start();

//apabila user yang mengakses tidak sah 
if (!empty($_SESSION['namauser']) and !empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses halaman ini, anda harus login terlebih dahulu <br>";
	echo "<a href='index.php'><b>LOGIN</b></a></center>";
}
//apabila user yang mengakses sah else {
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>.:: Halaman Utama Administrator ::.</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="../include/layouts/assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="../include/layouts/assets/css/font-awesome.css" rel="stylesheet" />
	<!-- MORRIS CHART STYLES-->

	<!-- CUSTOM STYLES-->
	<link href="../include/layouts/assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- TABLE STYLES-->
	<link href="../include/layouts/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Web</a> 
			</div>
			<div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust"><i class="fa fa-sign-out"></i> Logout</a> </div>
		</nav>   
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<?php include 'menu.php'; ?>
				</ul>

			</div>

		</nav>  
		<!-- /. NAV SIDE  -->
		<div id="page-wrapper" >
			<div id="page-inner">
				<?php include 'konten.php'; ?>
			</div>

		</div>
		<!-- /. PAGE INNER  -->
	</div>
	<!-- /. PAGE WRAPPER  -->
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="../include/layouts/assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="../include/layouts/assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="../include/layouts/assets/js/jquery.metisMenu.js"></script>
	<!-- DATA TABLE SCRIPTS -->
	<script src="../include/layouts/assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="../include/layouts/assets/js/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function () {
			$('#dataTables-example').dataTable();
		});
	</script>
	<!-- CUSTOM SCRIPTS -->
	<script src="../include/layouts/assets/assets/js/custom.js"></script>


</body>
</html>

<?
}
?>