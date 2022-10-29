<?php 
function get_CURL($url){
    // mendapatkan data api youtube
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $result = curl_exec($curl);
     curl_close($curl);

     return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC7oLl1Al--FmyYQCbPrqS0g&key=AIzaSyCvv4prtEXaihBJQOowgn-I4Qy7bMRrqJM');

 // buat variabel sesuai channel yotube
 $youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
 $channelName = $result['items'][0]['snippet']['title'];
 $subscriber = $result['items'][0]['statistics']['subscriberCount'];

 // video terakhir
 $urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCvv4prtEXaihBJQOowgn-I4Qy7bMRrqJM&channelId=UC7oLl1Al--FmyYQCbPrqS0g&maxResults=1&order=date&part=snippet';
 $result = get_CURL($urlLatestVideo);
 $urlLatestVideoId = $result['items'][0]['id']['videoId'];

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Internal CSS -->
    <style>
        section{
            min-height: 418px;
        }

        .ig-thumbnail{
            width: 110px;
            height: 110px;
            float: left;
            overflow: hidden;
        }
        .ig-thumbnail img{
            width: 110px;
        }
    </style>

    <!-- favicons-->
    <link rel="shortcut icon" href="img/thumbs/favicona.ico">

    <title>My Portfolio</title>
  </head>
  <body class="mt-5">
    
   <!-- Navbar -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Fajar Ramadhan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="#about">About</a>
          <a class="nav-link" href="#">Portfolio</a>
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact</a>
        </div>
      </div>
     </div>
    </nav>

    <!-- Fluit Jumbotron > class="rounded-circle" untuk membuat gambar menjadi bulat  -->
   <div class="jumbotron jumbotron-fluid">
     <div class="container text-center">
        <img src="img/thumbs/tt.jpg" width="34%" class="rounded-circle img-thumbnail">
      <h1 class="display-4">M.Fajar Ramadhan</h1>
      <p class="lead">Welcome To My Personal Website.</p>
    </div>
   </div>
<!-- Tulisan About -->
<section id="about" class="about">
<div class="container">
    <div class="row mb-4">
        <div class="col text-center">
            <h2>About</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            <p>On this occasion, please allow me to introduce my self. My Nama is Muhammad Fajar Ramadhan. I am the first child in my family and I have 2 other siblings. I was born in Probolinggo, Desember 26th 2000. Currently, I live in Jl.Koma' Indah no 19, Leces, Probolinggo</p>
        </div>
        <div class="col-md-5 text-center">
            <p>I really love music and I can play the guitar since 4th grade. Now I have made 4 song and I have a dream to make a band. I also want to share a stage with coldplay. Hopefully, my dream can come true. Well that's more or less my self-introduction, more or less please forgive</p>
        </div>
    </div>
</div>
</section>

<!-- Youtube & Instagram -->
    <div class="social bg-light" id="social">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Social Media</h2>
                </div>
            </div>

            <!-- yt -->
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $youtubeProfilePic; ?>" width="250" class="rounded-circle img-thumbnail">  
                        </div>
                        <div class="col-md-8">
                            <h5><?= $channelName; ?></h5>
                            <p><?= $subscriber; ?> Subscribers.</p>
                            <div class="g-ytsubscribe" data-channelid="UC7oLl1Al--FmyYQCbPrqS0g" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                    <div class="row mt-3 pb-3">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $urlLatestVideoId; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ig -->
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="img/thumbs/profile1.png" width="250" class="rounded-circle img-thumbnail"> 
                        </div>
                        <div class="col-md-8">
                            <h5>Fajar Ramadhan</h5>
                            <p>2629 Followers.</p>
                        </div>
                    </div>

                    <div class="row pb-3 mt-3">
                        <div class="col">
                            <div class="ig-thumbnail">
                                <img src="img/thumbs/1.png">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/thumbs/2.png">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/thumbs/3.png">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/thumbs/4.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Tulisan Portfolio -->
<section id="portfolio" class="portfolio pb-4">
<div class="container">
    <div class="row mb-4 pt-4">
        <div class="col text-center">
            <h2>Portfolio</h2>
        </div>
    </div>
<!-- Card atau katu -->
    <div class="row mb-4">
        <div class="col-md">
            <div class="card">
              <img  src="img/thumbs/J4.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum, non laudantium.</p>
              </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
              <img  src="img/thumbs/K2.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, quis. Repudiandae!</p>
              </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
              <img  src="img/thumbs/P4.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, deleniti iste?</p>
              </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md">
            <div class="card">
              <img  src="img/thumbs/P3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, delectus, a.</p>
              </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
              <img  src="img/thumbs/lk.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, repudiandae nisi?</p>
              </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
              <img  src="img/thumbs/H.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste autem, nihil dolor.</p>
              </div>
            </div>
        </div>
    </div>
</div>
</section>


<!-- Tulisan kontak kami -->
<section id="contact" class="contact bg-light mb-5">
    <div class="container">
        <div class="row pt-4 mb-4">
            <div class="col text-center">
                <h2>Kontak Kami</h2>
            </div>
        </div>
        <!-- Kartu kontak -->
        <div class="row justify-content-center">
            <div class="col lg-4 text-center">
              <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                 <h5 class="card-title">Hubungi Kami</h5>
                 <p class="card-text">Silahkan hubungi kami melalui kontak yang tercantum dibawah ini.</p>
            </div>
        </div>  <!-- Kolom kontak -->
           <ul class="list-group" style>
              <li class="list-group-item">Lokasi</li>
              <li class="list-group-item">My Addres</li>
              <li class="list-group-item">Jl. Koma' Indah No. 19, Probolinggo</li>
              <li class="list-group-item">frmdhan14@gmailcom</li>
              <li class="list-group-item">Jawa Timur, Indonesia</li>
            </ul>
        </div>
     <!-- Form grup untuk untuk diisi user -->
        <div class="col-lg-6">
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="telp">No Telp</label>
                <input type="text" class="form-control" id="telp">
              </div>
              <div class="form-group">
                <label for="pesan">Kritik & Saran</label>
                <textarea type="pesan" id="pesan" class="form-control"></textarea>
              </div>
              <div class="form-group">
                  <button type="button" class="btn btn-primary">Kirim Pesan</button>
              </div>
            </form>
         </div>
        </div>

    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white">
    <div class="container">
        <div class="row pt-3">
            <div class="col text-center">
                <p>Copyright 2021 Fajar Ramadhan</p>
            </div>
        </div>
    </div>
</footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- subscribe button -->
    <script src="https://apis.google.com/js/platform.js"></script>

  </body>
</html>