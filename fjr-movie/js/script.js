function searchMovie(){
	// saat pertama diklik hilangkan movie list
	$('#movie-list').html('');
	
	$.ajax({
		url: 'http://omdbapi.com',
		type: 'get',
		dataType: 'json',
		data: {
			'apikey': '960fae65',
			's': $('#search-input').val()
		},
		success: function(result){
			if(result.Response == "True"){
				let movies = result.Search;

				// looping
				$.each(movies, function(i, data){
					$('#movie-list').append(`
						<div class="col-md-4"	
							<div class="card mb-3">
							  <img src="`+ data.Poster +`" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h5 class="card-title">`+ data.Title +`</h5>
							    <h6 class="card-subtitle mb-2 text-muted">`+ data.Year +`</h6>
							    <a style="text-decoration:none; href="#" class="card-link see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="`+ data.imdbID +`">Lihat Detail</a>
							  </div>
							</div>
						</div>
					`);
				});

				// setelah berhasil, hilangkan keyword pencarian
				$('#search-input').val(''); 

			} else{
				$('#movie-list').html(`
					<div class="col">
					  <h1 class="text-center">`+ result.Error +`</h1>
					</div>
					`)
			}
		}
	});
}

$('#search-button').on('click', function(){
	searchMovie();
});

// ketika tombol enter ditekan
$('#search-input').on('keyup', function(event){
	if(event.keyCode === 13){
		searchMovie()
	}
});

$('#movie-list').on('click', '.see-detail', function(){
	// console.log($(this).data('id'));
	$.ajax({
		url: 'http://omdbapi.com',
		type: 'get',
		dataType: 'json',
		data: {
			'apikey': '960fae65',
			'i': $(this).data('id')
		},
		success: function(movie){
			if(movie.Response === "True"){
				$('.modal-body').html(`
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4">
								<img src="`+ movie.Poster +`" class="img-fluid">
							</div>

							<div class="col-md-8">
								<ul class="list-group">
								  <li class="list-group-item"><h3>`+ movie.Title +`</h3></li>
								  <li class="list-group-item">Released : `+ movie.Released +`</li>
								  <li class="list-group-item">Genre : `+ movie.Genre +`</li>
								  <li class="list-group-item">Director : `+ movie.Director +`</li>
								  <li class="list-group-item">Actor : `+ movie.Actors +`</li>
								  <li class="list-group-item">Runtime : `+ movie.Runtime +`</li>
								  <li class="list-group-item">Language : `+ movie.Language +`</li>
								  <li class="list-group-item">Country : `+ movie.Country +`</li>
								  <li class="list-group-item">IMDB Rating : `+ movie.imdbRating +`</li>
								  <li class="list-group-item">Plot : `+ movie.Plot +`</li>
								</ul>
							</div>
						</div>
					</div>
				`)
			}
		}
	});
});