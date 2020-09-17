<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
//Query data Tabel smartphone
$film = query("SELECT * FROM film");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Film Terbaru</title>
</head>
<body>
	<h1>Daftar Film</h1>
	<table class="table" align="center" border="1"  cellspacing="0" cellpadding="10">
		<thead color = "blue">
			<tr>
				<th scope="col">#</th>
				<th>Gambar</th>
				<th>Judul</th>
				<th>Durasi</th>
				<th>Sutradara</th>
				<th>Produser</th>
				<th>Produksi</th>
				<th>Distributor</th>
				<th>Genre</th>
				<th>Kelompok Umur</th>
			</tr>';
			$i = 1;
			foreach ($film as $fil) {
				$html .='<tr>
				<td>'. $i++ .'</td>
				<td><img src="../TugasBesar/assets/img/'. $fil["gambar"].'" width="130"></td>
				<td>'. $fil["judul"].'</td>
				<td>'. $fil["durasi"].'</td>
				<td>'. $fil["sutradara"].'</td>
				<td>'. $fil["produser"].'</td>
				<td>'. $fil["produksi"]. '</td>
				<td>'. $fil["distributor"]. '</td>
				<td>'. $fil["genre"].'</td>
				<td>'. $fil["kelompok_umur"]. '</td>
				</tr>';
			}	
 $html .= '</table>

	

</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

?>