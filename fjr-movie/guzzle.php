<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
	'query' => [
		'apikey' => '960fae65',
		's' => 'Dilan'
	]
]);

// menampilkan hasil array
$result =json_decode($response->getBody()->getContents(), true);

// var_dump($result);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Daftar Film </title>
 	<!-- Internal CSS -->
 	<style>
 		body{
 			font-family: georgia;
 			font-size: 1.6em;
 		}
 		h1{
 			text-align: center;
 		}
 	</style>
 </head>
 <body>

 	<h1>Daftar Film menggunakan library Guzzle</h1>

 	<?php foreach($result['Search'] as $movie) : ?>
	 	<ul class="list-group">
		  <li class="list-group-item">Judul : <?= $movie['Title']; ?></li>
		  <li class="list-group-item">Tahun : <?= $movie['Year']; ?></li>
		  <li class="list-group-item">
		  	<img src="<?= $movie['Poster']; ?>" width="99">
		  </li>
		</ul>
	<?php endforeach; ?>
 	
 </body>
 </html>