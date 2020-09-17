 <?php  
  session_start();

 if( !isset($_SESSION["login"]) ) {
 	header("location: login_admin.php");
 	exit;
 }
//Connect To Databases => funtions
require 'functions.php';
//Query data Tabel Film
$film = query("SELECT * FROM film");

if( isset($_POST['cari'])) {
	$film   = cari($_POST["keyword"]);
}
 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	   <link rel="stylesheet" href="css/tambah.css">
<title>Daftar Film Terbaru</title>
<style>
	.loader {
		width: 90px;
		position: absolute;
		top: 120px;
		left: 900px;
		z-index: -1;
		display: none;

	}

	@media print {
         .logout, .tambah, .form-cari, .form-logout, .opsi {
         	display: none;
         }
	}

</style>
</head>
<body> 
	<h2 align="center">Daftar Film Terbaru</h2>
	<center><a href="cetak.php" class="btn btn-success">Cetak</a></center>
	<br>
	<form action="logout.php" class="form-logout">
	
	<center><button a href="logout.php" class="logout btn btn-danger">LOGOUT</a></button></center><br> 
			
		</form>

	<center><a href="tambah.php" class="btn btn-primary">Tambahkan Film</a></center>
		<br><br>

	<form action="" method="post" class="form-cari">
		<center><input type="text" name="keyword" size="50" autofocus placeholder="Masukan pencarian film..." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari" class="btn btn-info">Telusuri!</button></center>
	</form>
	<br>
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
	</thead>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript">

			var keyword = document.getElementById('keyword');
			var container = document.getElementById('container');

			keyword.addEventListener('keyup',function()
			{
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function()
				{
					if (xhr.readyState == 4 && xhr.status == 200)
				  	{
					container.innerHTML = xhr.responseText;
					}
 
			}
			xhr.open('GET','ajax.php?keyword='+keyword.value,true);
			xhr.send();

		});

			</script>
		</body>
	</html> 