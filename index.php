<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Cuaca</title>
  </head>
  <body><center>
    <div class="jumbotron" style="background-image: url('background.png'); background-position: center center; background-size: 100%; background-repeat: no-repeat;">
        <div class="container">
            <h1 class="display-1"><b>Cek Cuaca Kotamu !</b></h1>
            <p class="lead">Ayo cari tau cuaca di kotamu</p>
                <hr class="my-4">
            <p class="lead">
            <form class="form" method="POST">
                <div class="form-group">
                    <input type="text" name="kota" class="form-control" placeholder="Nama Kotamu" style="text-align: center; width:60%">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Cari</button>
            </form>
            </p>
        </div>
    </div>
<div class="container">
<?php 
error_reporting(0);
ini_set('display_errors', 0);
  if(isset($_POST['submit'])){
    $kota = $_POST['kota'];
    $api = '50a7aa80fa492fa92e874d23ad061374';
    $api_url = "https://api.openweathermap.org/data/2.5/weather?q=".$kota."&appid=50a7aa80fa492fa92e874d23ad061374";
    // $weather_data = json_decode(file_get_contents($api_url), true);  
    try {
      $weather_data = json_decode(file_get_contents($api_url), true, $depth=512, JSON_THROW_ON_ERROR); 

      ?>
<div class="card" style="width: 70%;">
        <div class="card-body">
            
            <img class="card-img-top" src="http://openweathermap.org/img/wn/<?php echo $weather_data['weather'][0]['icon'];?>@4x.png" style="height:80px; width:80px" alt="Card image cap">
            <p><?php echo $weather_data['weather'][0]['description'];?></p>
            <h1><?=$_POST['kota']?></h1>
            <p><?php echo "Lat :".$weather_data['coord']['lat']." Lang :".$weather_data['coord']['lon'];?></p>
                <h5 class="card-title"><?php echo "Temp :".$weather_data['main']['temp'];?></h5>
                <h5 class="card-title"><?php echo "Wind :".$weather_data['wind']['speed'];?></h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="https://maps.google.com/?q=<?=$weather_data['coord']['lat'];?>,<?=$weather_data['coord']['lon'];?>" target="_blank" class="btn btn-primary">Go!</a>
        </div>
      <?php
  } catch (Exception $e) {
    ?>
      <div class="card" style="width: 70%;">
        <div class="card-body">
        <h1>Data Tidak Ditemukan</h1>
        </div>
      </div>
    <?php
  }
    ?>      
    
    <?php
    }
    ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
  
</html>