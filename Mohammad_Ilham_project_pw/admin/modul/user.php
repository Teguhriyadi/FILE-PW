<?php

switch ($_GET['act']) {

	case 'gantipwd':
	$id_user = $_GET['id'];
	$edit = mysqli_query($link, "SELECT * FROM admin WHERE id_user = '$id_user' ");
	$r = mysqli_fetch_array($edit);
	?>

	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-pencil"></i> Edit User</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Data Edit User</h3>
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi.php?module=user&act=gantipwd">
						<div class="form-group">
							<input type="text" class="form-control" name="id_user" value="<?php echo $r['id_user'] ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	case 'tambahuser':
	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-plus"></i> Tambah User</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tambah Data User
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi.php?module=user&act=input">
						<div class="form-group">
							<label for="nama_user"> Username </label>
							<input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukkan Username">
						</div>
						<div class="form-group">
							<label for="password"> Password </label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
						</div>
						<hr>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-save"></i> Simpan
							</button>
							<input type="button" class="btn btn-danger" value="Batal" onclick="self.history.back()">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;

	case 'edituser':
	?>

	<?php
	$id_user = $_GET['id'];
	$edit = mysqli_query($link, "SELECT * FROM tb_admin WHERE nama_user = '$id_user' ");
	$r = mysqli_fetch_array($edit);

	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-pencil"></i> Edit User</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Data Edit User
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi.php?module=user&act=update">
						<div class="form-group">
							<label for="id_user"> Username </label>
							<input type="text" id="id_user" class="form-control" name="id_user" value="<?php echo $id_user ?>">
						</div>
						<div class="form-group">
							<label for="password"> Password </label>
							<input type="password" id="password" class="form-control" name="password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-warning ">
								<i class="fa fa-edit"></i> Edit
							</button>
							<input type="button" name="" class="btn btn-danger" value="Batal" onclick="self.history.back()">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	?>

	<?php
	break;

	default:
	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-user"></i> Data User</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a class="btn btn-primary btn-sm" href="?module=user&act=tambahuser">
						<i class="fa fa-plus"></i> Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th>Nama User</th>
									<th>Password</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$tampil = mysqli_query($link, "SELECT * FROM tb_admin ORDER BY nama_user DESC");
								while ($r = mysqli_fetch_array($tampil)) {
									?>
									<tr>
										<td class="text-center"><?php echo $no++ ?>.</td>
										<td><?php echo $r['nama_user'] ?></td>
										<td><?php echo $r['password'] ?></td>
										<td class="text-center">
											<a class="btn btn-warning btn-sm" href="?module=user&act=edituser&id=<?php echo $r['id_user'] ?>">
												<i class="fa fa-pencil"></i> Edit
											</a> |
											<a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Benar Akan Menghapus User <?php echo $r['nama_user'] ?> ? ')" href="aksi.php?module=user&act=hapus&id_admin=<?php echo $r['id_admin'] ?>">
												<i class="fa fa-trash-o"></i> Hapus
											</a>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;
}	

?>