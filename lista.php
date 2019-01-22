<!-- Plik wyświetla się w postaci formularza na stronie konfiguratora z listą wyboru oraz przyciskiem typu submit -->

<?php

//Zmienna sesyjna 's' określa wartość kroku (1-7) dla instrukcji warunkowych switch i zwiększa się po każdym kliknięciu
//przycisku "Dalej" lub zmniejsza się po każdym klinknięciu przycisku "Wstecz"

/*if (isset($_SESSION['s'])) {
    if ($_SESSION['s'] > 1) {
        function(){
            if ($_POST['Wstecz'] == true){
                $_SESSION['s']--;
            }
        }
    } else {
        $_SESSION['s'] = 1;
    }
}*/
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <script src="tabelka.js"></script>
    <script src="błąd.js"></script>
    <script src="powrót.js"></script>
</head>
<body>
    <?php

        include "connect.php";

        //Wyciszenie kodu błędu (włączyć w razie poprawności całej aplikacji!)
        //mysqli_report(MYSQLI_REPORT_STRICT);

        //Instrukcja try/catch łapiąca wszystkie wyjątki powstałe podczas działania aplikacji

        try {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno != 0) {
                throw new Exception(mysqli_connect_errno());
            } else {

                mysqli_select_db($polaczenie, "ajax_demo");

                //Przywołanie zmiennej sesyjnej przyjmującej wartość obecnego kroku
                //Instrukcja switch warunkuje odpowiednie deklaracje zmiennych używanych
                //dla listy wyboru w formularzu, dzięki czemu wszystkie strony konfiguratora
                //korzystają z jednego pliku do wyświetlania listy

                switch ($_SESSION['s']){
                    case 1:
                        //Rodzaje nadwozia

                        $_SESSION['nazwatab'] = "rodzaje_nadwozia";
                        $_SESSION['nazwapodpowiedz'] = "rodzaj nadwozia";
                        break;
                    case 2:
                        //Podwozie

                        $_SESSION['nazwatab'] = "podwozia";
                        $_SESSION['nazwapodpowiedz'] = "podwozie";
                        break;
                    case 3:
                        //Silniki

                        $_SESSION['nazwatab'] = "silniki";
                        $_SESSION['nazwapodpowiedz'] = "silnik";
                        break;
                    case 4:
                        //Skrzynie biegów

                        $_SESSION['nazwatab'] = "skrzynie_biegow";
                        $_SESSION['nazwapodpowiedz'] = "skrzynię biegów";
                        break;
                    case 5:
                        //Wnętrza

                        $_SESSION['nazwatab'] = "wnetrza";
                        $_SESSION['nazwapodpowiedz'] = "rodzaj wnętrza";
                        break;
                    case 6:
                        //Karoserie

                        $_SESSION['nazwatab'] = "karoserie";
                        $_SESSION['nazwapodpowiedz'] = "karoserię";
                        break;
                    case 7:
                        //Koła

                        $_SESSION['nazwatab'] = "kola";
                        $_SESSION['nazwapodpowiedz'] = "rodzaj kół";
                        break;
                }
                $_SESSION['n'] = 1;
                if ($_SESSION['s']>1) {
                    $rezultat = $polaczenie->query("SELECT * FROM `cookies` WHERE `id` = 1");
                    if ($rezultat->num_rows!=0) {
                    } else {
                        unset($_SESSION['n']);
                    }
                }
                if (isset ($_SESSION['n'])) {

                //Deklaracje zmiennych tymczasowych dla uproszczenia zapisu w zapytaniach do bazy danych

                $nazwatab = $_SESSION['nazwatab'];
                $nazwapodpowiedz = $_SESSION['nazwapodpowiedz'];

                //Formularz z listą select- pętla for generuje kolejne opcje wyboru
                //na podstawie wyników zapytań z bazy danych

                echo "<form action = 'dataupdate.php' method = 'post'>";
                echo "<select id = 'pole' name = 'pole_wyboru' onchange = 'showPart(this.value)'>";
                echo "<option value = '0' selected>" . "Wybierz $nazwapodpowiedz" . "</option>";

                //Zmienna rezultat zwraca wszystkie kolumny i wartości z tabeli określonej zmienną nazwatab
                //w warunku pętli for funkcja num_rows zwraca liczbę wierszy z wcześniej określonej tabeli
                //w pętli for zmienna wiersz zwraca pojedynczy wiersz o id równym wartości zmiennej i- indeksy
                //tego wiersza licząc od 0 to kolejne kolumny, dzięki czemu można uzyskać konkretne pola

                $rezultat = $polaczenie->query("SELECT * FROM $nazwatab");
                if (!$rezultat) throw new Exception($polaczenie->error);

                if ($nazwatab == "karoserie") {
                    $_SESSION['nazw'] = $polaczenie->query("SELECT * FROM `cookies` WHERE `id` = 1");
                    $_SESSION['nazw'] = $_SESSION['nazw']->fetch_row();

                    for ($i=1;$i<=$rezultat->num_rows;$i++){

                            if ($_SESSION['nazw'][1] == "Coupe"){
                                $rezultat = $polaczenie->query("SELECT * FROM $nazwatab WHERE `id` = 1");
                                if (!$rezultat) throw new Exception($polaczenie->error);

                                $wiersz = $rezultat->fetch_row();
                                echo "<option value = ".$i.">"."$wiersz[1]"."</option>";
                            } else {
                                $rezultat = $polaczenie->query("SELECT * FROM $nazwatab WHERE `id` = 2");
                                if (!$rezultat) throw new Exception($polaczenie->error);

                                $wiersz = $rezultat->fetch_row();
                                echo "<option value = ".$i.">"."$wiersz[1]"."</option>";
                            }
                    }
                }else {
                        for ($i=1;$i<=$rezultat->num_rows + 1;$i++){
                            $rezultat = $polaczenie->query("SELECT * FROM $nazwatab WHERE `id` = '$i'");
                            if (!$rezultat) throw new Exception($polaczenie->error);

                            $wiersz = $rezultat->fetch_row();
                            echo "<option value = ".$i.">"."$wiersz[1]"."</option>";
                        }
                }

                echo "</select>";
                echo "<br />";
                //Podpowiedź dla użytkownika wyświetlająca się w momencie braku wyboru pozycji z listy (wartość 0)

                echo "<div id = 'podpowiedź'>" . "<h2>" . "Wybierz $nazwapodpowiedz, aby wyświetlić informacje: " . "</h2>" . "</div>";

                //Przycisk input z funkcją sprawdzającą (błąd.js), czy obecny wybór listy nie ma wartości 0 (brak wyboru)
                //w razie innej wartości przycisk przesyła dane do bazy danych za pomocą pliku dataupdate.php

                echo "<input type = 'submit' value = 'Dalej' onclick = 'sprawdz()' />";
                echo "</form>";

                $rezultat->close();
                mysqli_close($polaczenie);
                } else {
                    echo '<span style="color: red;">Błąd: Nie wybrano rodzaju nadwozia!</span>';
                }
            }
        } catch(Exception $e){
            echo '<span style="color: red;">Błąd serwera.  Przepraszamy za utrudnienia.</span>';
            echo '<br />Informacja deweloperska: '.$e;
        }
    ?>
</body>
</html>