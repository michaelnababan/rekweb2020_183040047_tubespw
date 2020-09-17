<?php
$keyword = $_GET['keyword'];
//Connect To Databases => funtions
require 'functions.php';
//Query data Tabel Film
$film = query("SELECT * FROM film WHERE judul LIKE '%$keyword%' ");

 
?>
<div id="container">
	<table class="table" align="center" border="1"  cellspacing="0" cellpadding="10">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th>Opsi</th>
				<th>Gambar</th>
				<th>Judul</th>
				<th>Durasi</th>
				<th>Sutradara</th>
				<th>Produser</th>
				<th>Produksi</th>
				<th>Distributor</th>
				<th>Genre</th>
				<th>Kelompok Umur</th>
			</tr>
			<?php $i = 1; ?>	
				<?php foreach($film as $fil) : ?>
			<tr>
				<td><?= $i++; ?></td>
				<td><button type="button" class="btn btn-warning"><a href="ubah.php?id=<?= $fil["id"]; ?> ">Ubah</a></button>  
					<button type="button" class="btn btn-danger"><a href="hapus.php?id=<?= $fil["id"]; ?>" onClick="return confirm('Anda Yakin akan dihapus?')">Hapus</a></button>
				</td>
				<td><img src="../TugasBesar/assets/img/<?= $fil['gambar']; ?>"></td>
				<td><?= $fil['judul']; ?></td>
				<td><?= $fil['durasi']; ?></td>
				<td><?= $fil['sutradara']; ?></td>
				<td><?= $fil['produser']; ?></td>
				<td><?= $fil['produksi']; ?></td>
				<td><?= $fil['distributor']; ?></td>
				<td><?= $fil['genre']; ?></td>
				<td><?= $fil['kelompok_umur']; ?></td>
			</tr>
				<?php endforeach; ?>

		</table>
	</div>