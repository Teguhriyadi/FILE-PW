<?php

switch ($_GET['act']) {
	case 'tambahbukutamu':
	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-plus"></i> Tambah Buku Tamu</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tambah Data Buku Tamu
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi_bukutamu.php?module=bukutamu&act=input">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_bukutamu"> Nama Buku Tamu </label>
									<input type="text" class="form-control" id="nama_bukutamu" name="nm_bktamu" placeholder="Masukkan Nama Buku Tamu">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email_bukutamu"> Email </label>
									<input type="email" class="form-control" id="email_bukutamu" name="email_bktamu" placeholder="Masukkan Email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tgl_bktamu"> Tanggal Buku Tamu</label>
									<input type="text" class="form-control" id="tgl_bktamu" name="tgl_bktamu">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="status_bukutamu"> Status </label>
									<input type="text" class="form-control" id="status_bukutamu" name="status_bktamu" placeholder="Masukkan Status">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat"> Alamat </label>
							<textarea class="form-control" id="alamat" name="alamat_bktamu" placeholder="Masukkan Alamat" rows="5"></textarea>
						</div>
						<div class="form-group">
							<label for="komentar"> Komentar </label>
							<textarea class="form-control" id="komentar" name="komentar" placeholder="Masukkan Komentar" rows="5"></textarea>
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

	case 'editbukutamu':
	?>

	<?php
	$id_bktamu = $_GET['id_bktamu'];
	$edit = mysqli_query($link, "SELECT * FROM buku_tamu WHERE id_bktamu = '$id_bktamu' ");
	$r = mysqli_fetch_array($edit);

	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-pencil"></i> Edit Buku Tamu</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Data Edit Buku Tamu
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi_bukutamu.php?module=bukutamu&act=update">
						<input type="hidden" name="id_bktamu" value="<?php echo $r['id_bktamu'] ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_bukutamu"> Nama Buku Tamu </label>
									<input type="text" class="form-control" id="nama_bukutamu" name="nm_bktamu" placeholder="Masukkan Nama Buku Tamu" value="<?php echo $r['nm_bktamu'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email_bukutamu"> Email </label>
									<input type="email" class="form-control" id="email_bukutamu" name="email_bktamu" placeholder="Masukkan Email" value="<?php echo $r['email_bktamu'] ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tgl_bktamu"> Tanggal Buku Tamu</label>
									<input type="text" class="form-control" id="tgl_bktamu" name="tgl_bktamu" value="<?php echo $r['tgl_bktamu'] ?>">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="status_bukutamu"> Status </label>
									<input type="text" class="form-control" id="status_bukutamu" name="status_bktamu" placeholder="Masukkan Status" value="<?php echo $r['status_bktamu'] ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat"> Alamat </label>
							<textarea class="form-control" id="alamat" name="alamat_bktamu" placeholder="Masukkan Alamat" rows="5"><?php echo $r['alamat_bktamu'] ?></textarea>
						</div>
						<div class="form-group">
							<label for="komentar"> Komentar </label>
							<textarea class="form-control" id="komentar" name="komentar" placeholder="Masukkan Komentar" rows="5"><?php echo $r['komentar'] ?></textarea>
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
	?>

	<?php
	break;

	default:
	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-book"></i> Data Buku Tamu</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a class="btn btn-primary btn-sm" href="?module=bukutamu&act=tambahbukutamu">
						<i class="fa fa-plus"></i> Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th>Nama Buku Tamu</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>Tanggal</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$tampil = mysqli_query($link, "SELECT * FROM buku_tamu ORDER BY id_bktamu");
								while ($r = mysqli_fetch_array($tampil)) {
									?>
									<tr>
										<td class="text-center"><?php echo $no++ ?>.</td>
										<td><?php echo $r['nm_bktamu'] ?></td>
										<td><?php echo $r['email_bktamu'] ?></td>
										<td><?php echo $r['alamat_bktamu'] ?></td>
										<td><?php echo $r['tgl_bktamu'] ?></td>
										<td class="text-center">
											<a class="btn btn-warning btn-sm" href="?module=bukutamu&act=editbukutamu&id_bktamu=<?php echo $r['id_bktamu'] ?>">
												<i class="fa fa-pencil"></i> Edit
											</a> |
											<a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Benar Akan Menghapus User <?php echo $r['nm_bktamu'] ?> ? ')" href="aksi_bukutamu.php?module=bukutamu&act=hapus&id_bktamu=<?php echo $r['id_bktamu'] ?>">
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