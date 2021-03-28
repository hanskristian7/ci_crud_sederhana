<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card text-center">
				<div class="card-header">
					Detail Mahasiswa
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $mahasiswa['nama']; ?> - <?= $mahasiswa['nim']; ?></h5>
					<p class="card-text"><?= $mahasiswa['jurusan']; ?></p>
				</div>
				<div class="card-footer text-muted">
					<?= $mahasiswa['email']; ?>
				</div>
			</div>
		</div>
	</div>
</div>
