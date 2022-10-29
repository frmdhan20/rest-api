// Ubah object jadi json
	let mahasiswa = {
		nim  : "19132304",
		nama : "Agus Feriyadi ",
		email : "feri@gmail.com",
		jurusan : "Sistem Informasi"
	}

	console.log(JSON.stringify(mahasiswa));

// ubah json ke object
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			let mahasiswa = JSON.parse(this.responseText);
			console.log(mahasiswa);
		}
	}
	xhr.open('GET', 'coba.json', true);
	xhr.send();

// Menggunakan jquery
	$.getJSON('coba.json', function(data){
		console.log(data);
	});