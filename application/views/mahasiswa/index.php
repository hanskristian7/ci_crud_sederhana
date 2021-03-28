<div class="container">
	<div class="row">
		<div class="col-md-6 mt-3">
			<?php if ($this->session->flashdata('message') != '') : ?>
				<?= $this->session->flashdata('message'); ?>
				<?php $this->session->set_flashdata('message', ''); ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md mt-3">
			<a href="<?= base_url('mahasiswa/insert'); ?>" type="button" class="btn btn-primary">Tambah Data Mahasiswa</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<ul class="list-group mt-3">
				<h3>Daftar Mahasiswa</h3>
				<?php foreach ($mahasiswa as $mhs) : ?>
					<li class="list-group-item"><?= $mhs['nama']; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
