 <?php
$keyword = $_GET['keyword'];
//Connect To Databases => funtions
require 'functions.php';
//Query data Tabel Film
$film = query("SELECT * FROM film WHERE judul LIKE '%$keyword%' ");

 
?>
 <div class="container" id="container">
		 	<?php foreach ($film as $fil) : ?>
		        <div class="content">
		           <div class="gambar">
                   <p><img height="200" width="150" src="../TugasBesar/assets/img/<?= $fil['gambar']; ?>">
           </div>
            <p class="nama">
				<a href="Profil.php?id=<?= $fil['id']; ?>"><?= $fil['judul']; ?></a>
			</p>
			<p><?= $fil['durasi']; ?></p>
			<?php endforeach; ?>
        </div>
 </div>