<!-- Funkcja zwraca informację o błędzie, jeśli nie wybrano żadnej opcji (wartość 0) -->

function sprawdz() {
    var wartosc = document.getElementById("pole").value;
    if (wartosc === "0"){
        document.getElementById("blad").innerHTML = "<div id=\"blad\" class=\"alert alert-danger\">Błąd: Nie wybrano żadnej części!</div>";
    }
}