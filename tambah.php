<?php
session_start();

 if( !isset($_SESSION["login"]) ) {
 	header("location: login_admin.php");
 	exit;
 }
//Connet To Databases
require 'functions.php';
//Tombol Submit mengecek sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
//Pengecekan Berhasil Apa gagal
	if( tambah($_POST) > 0 ) {
		print "
			<script>
				alert('Data Berhasil Ditambahkan!');
				document.location.href = 'index3.php';
			</script>
		";
	} else {
		print "
			<script>
				alert('Data Gagal Ditambahkan!');
				document.location.href = 'index3.php';
			</script>
		";
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	   <link rel="stylesheet" href="assets/css/tambah.css">
<title>Daftar Film</title>
</head>
<body>
	<h2>Tambah Daftar Film!</h2>
		<form method="post" action="" enctype="multipart/form-data">
			<ul>
				<li>
				<label for="judul">Masukan Judul Film : </label> 
				<br>
				<input type="text" name="judul" required>
				</li>
				
				<br>
				<li>
				<label for="durasi">Masukan  Durasi : </label> 
				<br>
				<input type="text" name="durasi" required>
				</li>
				
				<br>
				
				<li>
				<label for="sutradara">Masukan Sutradara :</label>
				<br>
				<input type="text" name="sutradara" required>
				</li>
				
				<br>
				
				<li>
				<label for="produser">Masukan Produser:</label>	 
				<br>
				<input type="text" name="produser" required>
				</li>
				
				<br>
				
				<li>
				<label for="produksi">Masukan Produksi :</label>	 
				<br>	 
				<input type="text" name="produksi" required>
				</li>
				
				<br>

				<li>
				<label for="distributor">Masukan  Distributor : </label> 
				<br>
				<input type="text" name="distributor" required>
				</li>
				
				<br>

				<li>
				<label for="genre">Masukan  Genre : </label> 
				<br>
				<input type="text" name="genre" required>
				</li>
				
				<br>

				<li>
				<label for="gambar">Masukan Gambar :</label>		 
				<br>
				<input type="file" name="gambar" id="gambar" required>
				</li>
				
				<br>

				<li>
				<label for="kelompok_umur">Masukan  Kelompok Umur : </label> 
				<br>
				<input type="text" name="kelompok_umur" required>
				</li>
				
				<br>
				
				<td>
					<button type="submit" name="submit" class="btn btn-primary">Tambah Data Film!</button>
				</td>
			</ul>
		</form>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	
	
	
</body>
</html>