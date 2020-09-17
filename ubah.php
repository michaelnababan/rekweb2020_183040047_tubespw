<?php
session_start();

 if( !isset($_SESSION["login"]) ) {
    header("location: login_admin.php");
    exit;
 }

require 'functions.php';

$id = $_GET["id"];
$fil = query("SELECT * FROM film WHERE id = $id")[0];

if( isset($_POST['submit'])){
    if(ubah($_POST) > 0 ){
        print "<script>
            alert('data berhasil diubah');
            document.location.href = 'index3.php';
            </script>";
    }else{
        print "<script>
            alert('data gagal diubah');
            document.location.href = 'index3.php';
            </script>";
    }
}
?>

<html>
    <head lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/ubah.css">
        <title>Tambah Data Film Terbaru</title>
    </head>
    <body>
        <center><h1>FORM ubah Data Film</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$fil["id"];?>">

           <label for="judul" > Judul Film : </label><br>
            <input type="text" name="judul" id="judul" value="<?=$fil['judul'];?>" required><br>

            <label for="durasi">Durasi : </label><br>
            <input type="text" name="durasi" id="durasi" value="<?=$fil['durasi'];?>" required><br>

            <label for="sutradara">Sutradara : </label><br>
            <input type="textarea" name="sutradara" id="sutradara" value="<?=$fil['sutradara'];?>" required><br>

            <label for="produser">Produser : </label><br>
            <input type="text" name="produser" id="produser" value="<?=$fil['produser'];?>" required><br>

            <label for="produksi">Produksi : </label><br>
            <input type="text" name="produksi" id="produksi" value="<?=$fil['produksi'];?>" required><br>
    
            <label for="distributor">Distributor : </label><br>
            <input type="text" name="distributor" id="distributor" value="<?=$fil['distributor'];?>" required><br>
            
            <label for="genre">Genre : </label><br>
            <input type="text" name="genre" id="genre" value="<?=$fil['genre'];?>" required><br>
            

            <label for="kelompok_umur">Kelompok Umur : </label><br>
            <input type="text" name="kelompok_umur" id="kelompok_umur" value="<?=$fil['kelompok_umur'];?>" required><br>


            <label for="gambar">Gambar : </label><br>
            <img src="../TugasBesar/assets/img/<?= $fil['gambar']; ?>" width="40"> <br>
            <input type="file" name="gambar" id="gambar"required><br>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
        </form>
    </center> 
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>