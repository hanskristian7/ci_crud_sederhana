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
			<h3>Daftar Mahasiswa</h3>
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
								<a href="<?= base_url('mahasiswa/edit/' . $mhs['id']); ?>" class="badge rounded-pill bg-warning text-white text-decoration-none">Edit</a>
								<a href="<?= base_url('mahasiswa/delete/' . $mhs['id']); ?>" class="badge rounded-pill bg-danger text-white text-decoration-none" onclick="return confirm('Hapus datanya?')">Delete</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
