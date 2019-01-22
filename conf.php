<?php
  session_start();
  $_SESSION['s'] = 1;
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
  <title>Car-conf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href = "style1.css">

    <script src="powrót.js"></script>
    <script src="podsumowanie.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html" target="_blank"><img src="media/icons/car_conf.png" class="img-responsive" style="height: 50px; width:50px; margin-top:-15px" alt="Menu"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-center">
        <li><a href="#">Konfigurator</a></li>
        <li><a href="o_aplikacji.html" target="_blank">O aplikacji</a></li>
        <li><a href="kontakt.html" target="_blank">Kontakt</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center row">
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-1">
    </div>
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1 ">
        <button class="btn-info" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="#"><img src="media/icons/car%20choose%20icon.png" style="height: 100%; width: 100%"></a></button>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
        <button class="btn-default" style="height: 50%; width: 50%; margin-bottom: 10px"><img src="media/icons/chassis%202.png" style="height: 100%; width: 100%"></button>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
        <button class="btn-default" style="height: 50%; width: 50%; margin-bottom: 10px"><img src="media/icons/engine.png" style="height: 100%; width: 100%"></button>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
        <button class="btn-default" style="height: 50%; width: 50%; margin-bottom: 10px"><img src="media/icons/gearbox.png" style="height: 100%; width: 100%"></button>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
        <button class="btn-default" style="height: 50%; width: 50%; margin-bottom: 10px"><img src="media/icons/chassis.png" style="height: 100%; width: 100%"></button>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
        <button class="btn-default" style="height: 50%; width: 50%; margin-bottom: 10px"><img src="media/icons/car%20body.png" style="height: 100%; width: 100%"></button>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
        <button class="btn-default" style="height: 50%; width: 50%; margin-bottom: 10px"><img src="media/icons/tires.png" style="height: 100%; width: 100%"></button>
    </div>
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-1">
    </div>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
        <img src="media/icons/car%20choose%20icon.png" id="podglad" class="margin" style="display:inline"  width="600" height="255"/>
    </div>
    <div class="col-xs-12 col-sm-10 col-md-3 col-lg-4">

        <?php
            include "lista.php";
        ?>
        <div id="blad"></div>
    </div>

  </div>
  <div class="col-xs-0 col-sm-0 col-md-1 col-lg-2">
  </div>
</div>
<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button type="submit" onclick="wroc()">Wróć do strony głównej</button></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button type="submit" onclick="sum()">Przejdź do podsumowania</button></div>
    </div>
</div>
<br /><br />

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright&copy by Patryk Bąk 2017-2018. Wszelkie prawa zastrzeżone.</p>
</footer>

</body>
</html>
