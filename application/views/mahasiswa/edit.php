<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<form action="<?= base_url('mahasiswa/edit/' . $mahasiswa['id']); ?>" method="POST">
				<div class="card">
					<div class="card-header">
						<?= $title; ?>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<input type="hidden" name="id" id="id" value="<?= $mahasiswa['id']; ?>">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="e.g. Hans Kristian" value="<?= $mahasiswa['nama']; ?>">
							<?= form_error('nama', '<small><div class="error text-danger mt-1">', '</div></small>'); ?>
						</div>

						<div class="mb-3">
							<label for="nim" class="form-label">NIM</label>
							<input type="text" class="form-control" id="nim" name="nim" placeholder="e.g. 14" value="<?= $mahasiswa['nim']; ?>">
							<?= form_error('nim', '<small><div class="error text-danger mt-1">', '</div></small>'); ?>
						</div>

						<div class="mb-3">
							<label for="jurusan" class="form-label">Jurusan</label>
							<select name="jurusan" id="jurusan" class="form-select">
								<option selected>--Pilih Jurusan--</option>
								<option value="TI">TI</option>
								<option value="TD">TD</option>
							</select>
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="e.g. iniemail@gmail.com" value="<?= $mahasiswa['email']; ?>">
						</div>

						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
