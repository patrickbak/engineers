<!-- Funkcja pyta użytkownika po kliknięciu przycisku wróć czy chce, aby wprowadzone zmiany zostały zapisane -->
<!-- (po kliknięciu tak czyści tabelkę cookies) -->

function wroc() {

    var xml = new XMLHttpRequest();
    if (confirm("Zamierzasz wrócić do strony głównej. Czy na pewno chcesz to zrobić? (Wprowadzone dane będą wyczyszczone!)") === true) {
        xml.open("GET", "resetcookies.php");
        xml.send();
        window.location.replace("index.html");
    }
}