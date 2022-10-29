<!-- Ubah array ke json -->
<?php
	// $mahasiswa = [
	// 	[
	// 		"nama" 	 	=> "M.Fajar Ramadhan",
	// 		"nim"  	 	=> "19132301",
	// 		"email"	 	=> "frmdhan14@gmail.com",
	// 		"jurusan" 	=> "Sistem Informasi"
	// 	],
	// 	[
	// 		"nama" 	 	=> "Tri Bagus Sadewo",
	// 		"nim"  	 	=> "19132302",
	// 		"email"	 	=> "bagus3@gmail.com",
	// 		"jurusan" 	=> "Sistem Informasi"
	// 	]
	// ];

// Koneksi ke database dengan pdo
	$dbh = new PDO('mysql:host=localhost;dbname=phpdasar_wpu', 'root', '');
	$db  = $dbh->prepare('SELECT * FROM mahasiswa');
	$db->execute();
	$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

	$data = json_encode($mahasiswa);
	echo $data;
	// var_dump($mahasiswa);