<!-- Plik wysyła zapytania do bazy danych i zwraca tabelkę z danymi części na stronę -->

<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
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
</head>
    <body>
        <?php

        include "connect.php";

        //Wyciszenie kodu błędu (włączyć w razie poprawności całej aplikacji!)
        //mysqli_report(MYSQLI_REPORT_STRICT);

        try {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno != 0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                $q = intval($_GET['q']);
                mysqli_select_db($polaczenie, "ajax_demo");
                switch ($_SESSION['s']) {
                    case 1:
                        //Rodzaje nadwozia

                        $nazwakol = "Nazwa_nadwozia";
                        $nazwaelem = "Typ nadwozia: ";
                        $nazwapodpowiedz = "rodzaj nadwozia";
                        break;
                    case 2:
                        //Podwozie

                        $nazwakol = "Nazwa_podwozia";
                        $nazwaelem = "Typ podwozia: ";
                        $nazwapodpowiedz = "podwozie";
                        break;
                    case 3:
                        //Silniki

                        $nazwakol = "Nazwa_silnika";
                        $nazwaelem = "Nazwa silnika: ";
                        $nazwapodpowiedz = "silnik";
                        break;
                    case 4:
                        //Skrzynie biegow

                        $nazwakol = "Nazwa_skrzyni";
                        $nazwaelem = "Typ skrzyni: ";
                        $nazwapodpowiedz = "skrzynię biegów";
                        break;
                    case 5:
                        //Wnetrza

                        $nazwakol = "Rodzaje_wnetrz";
                        $nazwaelem = "Typ wnętrza: ";
                        $nazwapodpowiedz = "rodzaj wnętrza";
                        break;
                    case 6:
                        //Karoserie

                        $nazwakol = "Nazwa_karoserii";
                        $nazwaelem = "Typ karoserii: ";
                        $nazwapodpowiedz = "karoserię";
                        break;
                    case 7:
                        //Kola

                        $nazwakol = "Nazwa_kol";
                        $nazwaelem = "Rodzaj kół: ";
                        $nazwapodpowiedz = "rodzaj kół";
                        break;

                }
                /*
                var_dump($nazwatab);
                echo "<br />";
                var_dump($nazwakol);
                echo "<br />";
                var_dump($nazwaelem);
                echo "<br />";
                */

                $nazwatab = $_SESSION['nazwatab'];

                if ($_SESSION['s'] == 6) {
                    if ($_SESSION['nazw'][1] == "Coupe"){
                        $sql = "SELECT * FROM $nazwatab WHERE `id` = 1";
                    } else {
                        $sql = "SELECT * FROM $nazwatab WHERE `id` = 2";
                    }
                } else {
                    $sql = "SELECT * FROM $nazwatab WHERE `id` = '" . $q . "'";
                }
                $rezultat = mysqli_query($polaczenie, $sql);

                if (".$q." <> 0) {

                    $wiersz = $rezultat->fetch_row();
                    echo "<table>";
                        echo "<tr>";
                        echo "<td>" . "ID Elementu:" . "</td>" . "<td>" . $wiersz[0] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . $nazwaelem . "</td>" . "<td>" . $wiersz[1] . "</td>";
                        echo "</tr>";
                    echo "</table>";
                    echo "<br /><br />";
                    echo "<img src = \"media/".$wiersz[2]."\" class=\"margin\" style=\"display:inline\" alt=\"Car\" width=\"300\" height=\"181\">";
                } else {
                    echo "<h2>Wybierz $nazwapodpowiedz, aby wyświetlić informacje: </h2>";
                }
                $rezultat->close();
                mysqli_close($polaczenie);
            }
        }

        catch(Exception $e){
            echo '<span style="color: red;">Błąd serwera.  Przepraszamy za utrudnienia.</span>';
            echo '<br />Informacja deweloperska: '.$e;
        }
        ?>
    </body>
</html>
