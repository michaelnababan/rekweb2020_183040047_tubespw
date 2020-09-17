  <?php
require 'functions.php';
 $film = query("SELECT * FROM film");

 if( isset($_POST['cari'])) {
 	$film = cari($_POST['keyword']);
 }
 if(isset($_POST['submit'])) {
 	if ($_POST['username'] == 'username' && $_POST['password'] == 'password') {
 		header("location: index3.php");
 		exit;
 	}else{
 		$nValid = true;
 	}
 }

 	if(isset($_GET['urutkan'])){
 		if($_GET['urutkan'] == 'terbaru'){
 			$film = query("SELECT * FROM film ORDER BY id ASC");
 		}
 		else if($_GET['urutkan'] == 'terlama'){
 			$film = query("SELECT * FROM film ORDER BY id DESC");
 		}
 	}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/user.css">
<title>User</title>
</head>
	<style>
		.container {
			text-align: center;
		}
		.content {
			
		}
		.gambar {
			
			
		}
	</style>
<body bgcolor="yellow">
	<center><h2>Daftar Film Terbaru!</h2></center>
	<form action="" method="post">
		
		<div class="Login">
          <center><button type="button" class="btn btn-danger"><a href="Login_admin.php">Login sebagai admin</a></center></button>
            </div>
            <br><br>

            <div class="btn btn-primary">
            	 <a href="user.php?urutkan=terbaru">Terbaru</a>
            </div>
            <div class="btn btn-warning">
            	<a href="user.php?urutkan=terlama">Terlama</a>
            </div>
            <br><br>
           

            <form action="" method="post" class="form-cari">
            <center><input type="text" name="keyword" size="50" autofocus placeholder="Masukan keyword pencarian Film" autocomplete="off" id="keyword">
            <button type="submit" name="cari" id="tombol-cari" class="btn btn-info">Telusuri!</button></center>
	</form>
	<br>
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
			xhr.open('GET','pencarian_user.php?keyword='+keyword.value,true);
			xhr.send();

		});

			</script>
</body>
</html>