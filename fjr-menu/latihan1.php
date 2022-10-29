<!-- Ambil data json -->
<?php 
$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

$menu = $menu["menu"];
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Latihan Rest-API</title>
  </head>
  <body>
  	<!-- Navbar -->
  	<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
	  <div class="container">
	    <a class="navbar-brand" href="#">Fajar Ramadhan</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <div class="navbar-nav">
	        <a class="nav-link active" aria-current="page" href="#">All Menu</a>
	       </div>
	    </div>
	  </div>
	</nav>
	<!-- Akhir navbar -->

	<!-- Card -->
	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<h1>All Menu</h1>
			</div>
		</div>

		<div class="row">
		  <?php foreach($menu as $row) : ?>
			<div class="col-md-4">
				<div class="card mb-3">
				  <img src="img/<?= $row["gambar"]; ?>" class="card-img-top">
				  <div class="card-body">
				    <h5 class="card-title"><?= $row["nama"]; ?></h5>
				    <p class="card-text"><?= $row["deskripsi"]; ?></p>
				    <h5 class="card-title">Rp. <?= $row["harga"]; ?></h5>
				    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
				  </div>
				</div>
			</div>
		 <?php endforeach; ?>
		</div>
	</div>
	<!-- Akhir card -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>