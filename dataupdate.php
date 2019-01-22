<!-- Plik przekierowuje na tą samą stronę lub przesyła odpowiednie wartości do kolumn w -->
<!-- tabeli 'cookies' w razie kliknięcia przycisku "Dalej" w zależności od wartości pola wybranego z listy -->

<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
        include "connect.php";

        //Wyciszenie kodu błędu (włączyć w razie poprawności całej aplikacji!)
        //mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if($polaczenie->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            } else {

                mysqli_select_db($polaczenie, "ajax_demo");
                $rezultat = $polaczenie->query('SELECT * FROM `cookies`');
                if (!$rezultat) throw new Exception($polaczenie->error);

                //Przywołanie zmiennej sesyjnej przyjmującej wartość opcji z listy

                $k = $_SESSION['s'];
                $p = $_POST['pole_wyboru'];
                switch ($k) {

                    //krok 1: rodzaje_nadwozia

                    case 1:

                        //Lista w kroku 1

                        switch ($p) {

                            case 0:
                                header('Location: conf.php');
                                exit();
                                break;

                            case 1:
                                $nazwaczesci = "Coupe";
                                break;

                            case 2:
                                $nazwaczesci = "Sedan";
                                break;
                        }
                        break;

                    //krok 2: podwozia

                    case 2:

                        //Lista w kroku 2

                        switch ($p) {

                            case 0:
                                $nazwaczesci = "";
                                header('Location: conf2.php');
                                exit();
                                break;

                            case 1:
                                $nazwaczesci = "BMW series 3";
                                break;

                            case 2:
                                $nazwaczesci = "Audi S4";
                                break;
                        }
                        break;

                    //krok 3: silniki

                    case 3:

                        //Lista w kroku 3

                        switch ($p) {

                            case 0:
                                $nazwaczesci = "";
                                header('Location: conf3.php');
                                exit();
                                break;

                            case 1:
                                $nazwaczesci = "BMWS60";
                                break;

                            case 2:
                                $nazwaczesci = "Audi V8";
                                break;
                        }
                        break;

                    //krok 4: skrzynie_biegow

                    case 4:

                        //Lista w kroku 4

                        switch ($p) {

                            case 0:
                                $nazwaczesci = "";
                                header('Location: conf4.php');
                                exit();
                                break;

                            case 1:
                                $nazwaczesci = "Tiptronic C60";
                                break;

                            case 2:
                                $nazwaczesci = "6-biegowa ręczna";
                                break;
                        }
                        break;

                    //krok 5: wnetrza

                    case 5:

                        //Lista w kroku 5

                        switch ($p) {

                            case 0:
                                $nazwaczesci = "";
                                header('Location: conf5.php');
                                exit();
                                break;

                            case 1:
                                $nazwaczesci = "Alcantara brązowa";
                                break;

                            case 2:
                                $nazwaczesci = "Alcantara biała";
                                break;
                        }
                        break;

                    //krok 6: karoserie

                    case 6:

                        //Lista w kroku 6

                        switch ($p) {

                            case 0:
                                $nazwaczesci = "";
                                header('Location: conf6.php');
                                exit();
                                break;

                            case 1:
                                if ($_SESSION['car'] == "Coupe"){
                                    $nazwaczesci = "Coupe1";
                                } else {
                                    $nazwaczesci = "Sedan1";
                                }
                                break;

                        }
                        break;

                    //krok 7: kola

                    case 7:

                        //Lista w kroku 7

                        switch ($p) {

                            case 0:
                                $nazwaczesci = "";
                                header('Location: conf7.php');
                                exit();
                                break;

                            case 1:
                                $nazwaczesci = "Koła1";
                                break;

                            case 2:
                                $nazwaczesci = "Koła2";
                                break;
                        }
                        break;
                }

                //Przywołanie zmiennej sesyjnej przyjmującej wartość obecnego pola wybranego w formularzu
                //na stronie


                            //Wyjęcie rekordu o id równym wartości danego kroku z tabeli cookies

                            $sql = $polaczenie->query("SELECT * FROM `cookies` WHERE `id` = '$k'");
                            if ($sql) {
                                if($sql->num_rows == 0){
                                    $polaczenie->query("INSERT INTO `cookies` (`id`, `wybrane_czesci`)  VALUES ('$k', '$nazwaczesci')");
                                } else {
                                    $polaczenie->query("UPDATE `cookies` SET `wybrane_czesci` = '$nazwaczesci' WHERE `cookies`.`ID` = '$k'");
                                }

                                if ($_SESSION['s'] == 1){
                                    $_SESSION['car'] = $nazwaczesci;
                                }

                                switch ($k){
                                    case 1:
                                        header('Location: conf2.php');
                                        break;
                                    case 2:
                                        header('Location: conf3.php');
                                        break;
                                    case 3:
                                        header('Location: conf4.php');
                                        break;
                                    case 4:
                                        header('Location: conf5.php');
                                        break;
                                    case 5:
                                        header('Location: conf6.php');
                                        break;
                                    case 6:
                                        header('Location: conf7.php');
                                        break;
                                    case 7:
                                        header('Location: sum.php');
                                        break;
                                }

                            } else {
                                throw new Exception($polaczenie->error);
                            }
                }
                $rezultat->close();
                mysqli_close($polaczenie);
        }

        catch(Exception $e){
            echo '<span style="color: red;">Błąd serwera.  Przepraszamy za utrudnienia.</span>';
            echo '<br />Informacja deweloperska: '.$e;
        }
?>
</body>
</html>