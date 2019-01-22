<!-- Czyszczenie tabelki cookies -->

<?php
    session_start();
    include "connect.php";

    //Wyciszenie kodu błędu (włączyć w razie poprawności całej aplikacji!)
    //mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {

            mysqli_select_db($polaczenie, "ajax_demo");
            $sql = $polaczenie->query('SELECT * FROM `cookies`');
            if ($sql){
                $polaczenie->query("DELETE FROM `cookies` WHERE `cookies`.ID < 10");
                $_SESSION['car'] = NULL;
                mysqli_close($polaczenie);
            } else {
                throw new Exception($polaczenie->error);
            }
        }
    }
    catch(Exception $e){
        echo '<span style="color: red;">Błąd serwera.  Przepraszamy za utrudnienia.</span>';
        echo '<br />Informacja deweloperska: '.$e;
    }