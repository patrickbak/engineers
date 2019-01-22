<!-- Plik wysyła zapytania do bazy danych i zwraca tabelkę cookies na stronę -->

<?php
session_start();
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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: center;}
    </style>
    <script type="text/javascript" src="scripts/stimulsoft.reports.js"></script>
    <script src="powrót.js"></script>
    <script src="zapisz.js"></script>
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
                <button class="btn-success" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="conf.php"><img src="media/icons/car%20choose%20icon.png" style="height: 100%; width: 100%"> </a></button>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                <button class="btn-success" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="conf2.php"><img src="media/icons/chassis%202.png" style="height: 100%; width: 100%"></a></button>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                <button class="btn-success" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="conf3.php"><img src="media/icons/engine.png" style="height: 100%; width: 100%"></a></button>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                <button class="btn-success" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="conf4.php"><img src="media/icons/gearbox.png" style="height: 100%; width: 100%"></a></button>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                <button class="btn-success" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="conf5.php"><img src="media/icons/chassis.png" style="height: 100%; width: 100%"></a></button>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                <button class="btn-success" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="conf6.php"><img src="media/icons/car%20body.png" style="height: 100%; width: 100%"></a></button>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                <button class="btn-success" style="height: 50%; width: 50%; margin-bottom: 10px"><a href="conf7.php"><img src="media/icons/tires.png" style="height: 100%; width: 100%"></a></button>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-0 col-lg-1">
            </div>
        </div>

        <!-- Third Container (Grid) -->
        <div class="container-fluid bg-3 text-center">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
                    <?php
                        if (isset($_SESSION['car'])){
                            if ($_SESSION['car'] == "Coupe") {
                                echo '<img src = "media/coupe.jpg" class="margin" style="display:inline" alt="Car" width="600" height="405">';
                            }
                            if ($_SESSION['car'] == "Sedan") {
                                echo '<img src = "media/sedan.jpg" class="margin" style="display:inline" alt="Car" width="600" height="400">';
                            }
                        } else {
                            echo '<img src = "media/step6.png" class="margin" style="display:inline" alt="Car" width="600" height="362">';
                        }
                    ?>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-3 col-lg-4">

                    <?php

                    include "connect.php";

                    //Wyciszenie kodu błędu (włączyć w razie poprawności całej aplikacji!)
                    //mysqli_report(MYSQLI_REPORT_STRICT);

                    try {
                        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                        if ($polaczenie->connect_errno != 0) {
                            throw new Exception(mysqli_connect_errno());
                        } else {
                            mysqli_select_db($polaczenie, "ajax_demo");

                            $rezultat = $polaczenie->query("SELECT * FROM `cookies`");

                            //Tworzenie tabeli

                            echo "<table id='podsumowanie'>
                                <tr>
                                <th>ID Elementu:</th>
                                <th>Nazwa elementu:</th>
                                </tr>";

                            //Tworzenie tabeli na podstawie wyniku zapytania z bazy danych ($q = obecne id)

                            while ($rzad = mysqli_fetch_array($rezultat)) {

                                echo "<tr>";
                                echo "<td>" . $rzad['ID'] . "</td>";
                                echo "<td>" . $rzad['Wybrane_czesci'] . "</td>";
                                echo "</tr>";

                            }
                            echo "</table>";
                            $rezultat->close();
                            mysqli_close($polaczenie);
                        }
                    }
                    catch(Exception $e){
                        echo '<span style="color: red;">Błąd serwera.  Przepraszamy za utrudnienia.</span>';
                        echo '<br />Informacja deweloperska: '.$e;
                    }
                    ?>
                    <!-- Zapisywanie danych i czyszczenie tabeli cookies -->

                    <input type="submit" value="Zapisz" onclick="zapisz()" />

                    <!-- Powrót do strony głównej - komunikat o niezapisaniu danych przez użytkownika -->
                    <!-- i informacja o wyczyszczeniu tabeli cookies w razie przejścia do strony głównej -->

                    <input type="submit" value="Wróć do strony głownej" onclick="wroc()"/>
                </div>

            </div>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-2">
            </div>
        </div>

        <!-- Footer -->
        <footer class="container-fluid bg-4 text-center">
            <p>Copyright&copy by Patryk Bąk 2017-2018. Wszelkie prawa zastrzeżone.</p>
        </footer>

</body>
</html>
