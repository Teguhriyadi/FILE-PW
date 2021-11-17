<?php

switch ($_GET['act']) {
	case 'tambahgaleri':
	?>
	<div class="row">
		<div class="col-md-12">
			<h2>
				<i class="fa fa-plus"></i> Tambah Galeri
			</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tambah Data
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi_galeri.php?module=galeri&act=input" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nm_galeri"> Nama Galeri </label>
							<input type="text" class="form-control" id="nm_galeri" name="nm_galeri" placeholder="Masukkan Nama Galeri">
						</div>
						<div class="form-group">
							<label for="keterangan"> Keterangan </label>
							<textarea class="form-control" id="ket" name="ket" rows="5" placeholder="Masukkan Keterangan"></textarea>
						</div>
						<div class="form-group">
							<label for="gambar"> Gambar </label>
							<input type="file" class="form-control" id="gambar" name="gambar">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">
								<i class="fa fa-plus"></i> Tambah
							</button>
							<input type="button" class="btn btn-danger btn-sm" value="Batal" onclick="self.history.back()">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;

	case 'editgaleri':
	?>

	<?php
	$id_galeri = $_GET['id_galeri'];
	$edit = mysqli_query($link, "SELECT * FROM galeri WHERE id_galeri = '$id_galeri' ");
	$r = mysqli_fetch_array($edit);

	?>

	<div class="row">
		<div class="col-md-12">
			<h2>
				<i class="fa fa-edit"></i> Edit Galeri
			</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Data
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi_galeri.php?module=galeri&act=update" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nm_galeri"> Nama Galeri </label>
							<input type="text" class="form-control" id="nm_galeri" name="nm_galeri" placeholder="Masukkan Nama Galeri" value="<?php echo $r['nm_galeri'] ?>">
						</div>
						<div class="form-group">
							<label for="keterangan"> Keterangan </label>
							<textarea class="form-control" id="ket" name="ket" rows="5" placeholder="Masukkan Keterangan"><?php echo $r['ket'] ?></textarea>
						</div>
						<img src="galeri/<?php echo $r['gambar'] ?>" width="300">
						<br><br>
						<div class="form-group">
							<label for="gambar_baru"> Gambar </label>
							<input type="file" class="form-control" id="gambar_baru" name="gambar_baru">
						</div>
						<br>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i> Simpan
							</button>
							<input type="button" class="btn btn-danger btn-sm" value="Batal" onclick="self.history.back()">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;

	default:
	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-image"></i> Data Galeri</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="?module=galeri&act=tambahgaleri" class="btn btn-primary btn-sm">
						<i class="fa fa-plus"></i> Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th>Nama Galeri</th>
									<th>Tanggal</th>
									<th>Galeri</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								$tampil = mysqli_query($link, "SELECT * FROM galeri ORDER BY id_galeri");
								while ($r = $tampil->fetch_array()) {
									?>
									<tr>
										<td class="text-center"><?php echo ++$no ?>.</td>
										<td><?php echo $r['nm_galeri'] ?></td>
										<td><?php echo $r['tgl_galeri'] ?></td>
										<td>
											<img src="galeri/<?php echo $r['gambar'] ?>" width="50">
										</td>
										<td>
											<a href="?module=galeri&act=editgaleri&id_galeri=<?php echo $r['id_galeri'] ?>" class="btn btn-warning btn-sm">
												<i class="fa fa-edit"></i> Edit
											</a>
											<a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="aksi_galeri.php?module=galeri&id_galeri=<?php echo $r['id_galeri'] ?>&act=hapus" class="btn btn-danger btn-sm">
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