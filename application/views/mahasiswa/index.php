<div class="container">
	<div class="row">
		<div class="col-md-6 mt-3">
			<?php if ($this->session->flashdata('message') != '') : ?>
				<?= $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md">
			<a href="<?= base_url('mahasiswa/insert'); ?>" type="button" class="btn btn-primary">Tambah Data Mahasiswa</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<form action="<?= base_url('mahasiswa'); ?>" method="post">
				<div class="input-group">
					<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari data mahasiswa">
					<button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
				</div>
			</form>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<h3>Daftar Mahasiswa</h3>
			<?php if (empty($mahasiswa)) : ?>
				<div class="alert alert-danger" role="alert">Data mahasiswa tidak ditemukan</div>
			<?php else : ?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($mahasiswa as $mhs) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $mhs['nama'] ?></td>
								<td>
									<a href="<?= base_url('mahasiswa/detail/' . $mhs['id']); ?>" class="badge rounded-pill bg-primary text-white text-decoration-none">Detail</a>
									<a href="<?= base_url('mahasiswa/edit/' . $mhs['id']); ?>" class="badge rounded-pill bg-warning text-white text-decoration-none">Edit</a>
									<a href="<?= base_url('mahasiswa/delete/' . $mhs['id']); ?>" class="badge rounded-pill bg-danger text-white text-decoration-none" onclick="return confirm('Hapus datanya?')">Delete</a>
								</td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>

				<div class="row">
					<div class="col-md-6 mx-auto">
						<?= $this->pagination->create_links(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
