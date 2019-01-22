<!-- Funkcja zwraca tabelkę z danymi o wybranej części z bazy danych -->

function showPart(str) {
    var xhttp;
    if (str === "") {
        document.getElementById("podpowiedź").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("podpowiedź").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "sync.php?q="+str, true);
    xhttp.send();
}