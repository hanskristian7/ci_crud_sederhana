<div class="container">
	<div class="row">
		<div class="col-md-8">
			<ul class="list-group mt-5">
				<h3>Daftar Mahasiswa</h3>

				<?php foreach ($mahasiswa as $mhs) : ?>
					<li class="list-group-item"><?= $mhs['nama']; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
