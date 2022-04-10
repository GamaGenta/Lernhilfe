<?php
require_once("StudentenKarte.php");

$kartenListe = kartenListeErstellen($sID);



//GUI Funktionen
if(isset($_POST["add"])) {
    if(isset($_POST["titel"], $_POST["frage"], $_POST["antwort"])) {
        karteAnlegen($_POST["titel"], $_POST["frage"], $_POST["antwort"], $_POST["antwortart"], $_POST["richtigeAntworten"], $_POST["bild"]);
        unset($_POST["add"], $_POST["titel"], $_POST["frage"], $_POST["antwort"], $_POST["antwortart"], $_POST["richtigeAntworten"], $_POST["bild"]);
    } else if($_POST["back"]){
        unset($_POST["add"], $_POST["back"]);
    } else if(!isset($_POST["titel"]) or !isset($_POST["frage"]) or !isset($_POST["antwort"])){
        addKarteFormAnzeigen();
        //Fehlermeldung: Formular nicht richtig bzw. vollständig ausgefüllt
    } else {
        addKarteFormAnzeigen();
    }
} else if($_POST["detail"]) {
    kartenInhaltAnzeigen($kartenListe[$_POST["detail"]]);
    if($_POST["edit"]) {
        if($_POST["edit"] == true) {
            karteBearbeiten($kartenListe[$_POST["detail"]]->getKID(), $_POST["titel"], $_POST["frage"], $_POST["richtigeAntworten"], $_POST["falscheAntworten"], $_POST["antwortArt"], $_POST["richtigeAntwortenAnzahl"], $_POST["bild"]);
            unset($_POST["titel"], $_POST["frage"], $_POST["richtigeAntworten"], $_POST["falscheAntworten"], $_POST["antwortArt"], $_POST["richtigeAntwortenAnzahl"], $_POST["bild"], $_POST["edit"]);
        } else if($_POST["back"]) {
            unset($_POST["edit"], $_POST["back"]);
        } else {
            editKarteFormAnzeigen($kartenListe[$_POST["detail"]]);
        }
    } else if($_POST["delete"]) {
        karteLöschen($kartenListe[$_POST["detail"]]->getKID());
        unset($_POST["detail"], $_POST["delete"]);
    } else if($_POST["back"]) {
        unset($_POST["detail"], $_POST["back"]);
    } else {
        kartenInhaltAnzeigen($kartenListe[$_POST["detail"]]);
    }
}  else {
    //Liste der Karten des Stapels der Stapel ID (sID)
    kartenListeAnzeigen($kartenListe);
}

function kartenListeAnzeigen($kartenList) {
    //Liste mit HTML Komponenten anzeigen
    //(PHP Datei: PHP in HTML eingebettet)
}

function addKarteFormAnzeigen() {
    //(POST) Formular mit HTML komponenten anzeigen
    // <form method="post"> </form>
}

function kartenInhaltAnzeigen($karte) {
    //Karten Daten werden mit HTML Komponenten angezeigt
    //(PHP Datei: PHP in HTML eingebettet)
}

function editKarteFormAnzeigen($karte) {
    //Editier Formular anzeigen
    //Formular ist mit Übergebenen Daten vorausgefüllt
}



//Karteikarten Funktionalität Funktionen:
function kartenListeErstellen($sID) {
    //Array mit Karteikarte (Studentenkarte) objekten füllen (schrittweise mit einer Schleife)
    //Karten werden mit Nutzer Karten Daten aus der DB grfüllt (mit einer Schleife)

    //DB abfrage: mit über die NutzerID (uid) über Session["user"]->getUID; und die StapelID (sID) in dem sich die Karten befinden
    //DB giebt 2D assoziatives Array (Map) zurück
    //Beispiel Array, welches aus einer Datenbankabrage herforgeht:
    $bspKartenDB_Daten = array(
        array("kID"=> 1,"titel"=>"Suchbäume", "frage"=>"bsp. Text?", "antwort"=>"bsp. Antwort-Text!", "richtige Antworten"=>1, "Antwortart"=>"Text", "Antwortstatus"=>null, "Bild"=>null),
        array("kID"=> 2,"titel"=>"Datenstruktur", "frage"=>"bsp. Text?", "antwort"=>array("bsp. Text!1", "bsp. Text!2", "bsp. Text!3", "bsp. Text!4", "bsp. Text!5"), "richtige Antworten"=>"2", "antwortArt"=>"multiple choice", "Antwortstatus"=>1, "Bild"=>"url zur Bilddatei oder Bilddatai")
    );

    $kartenListe = array(
        //new StudentenKarte($titel, $frage, $antwort, $antwortArt, $antwortStatus, $bild);
        //...
    );

    foreach($bspKartenDB_Daten as $bspDatensatz){
        $antwort = null;
        $antwortenAnzahl = count($bspDatensatz["antwort"]);

        for($i = 0; $i < $antwortenAnzahl; $i++){
            if($i < $bspDatensatz["richtige Antworten"]){
                $antwort["richtige"][$i] = $bspDatensatz["antwort"][$i];
            } else {
                $antwort["falsche"][$i] = $bspDatensatz["antwort"][$i];
            }
        }

        $kartenListe[] = new StudentenKarte($bspDatensatz["kID"], $bspDatensatz["titel"], $bspDatensatz["frage"], $antwort, $bspDatensatz["Antwortart"], $bspDatensatz["Antwortstatus"], $bspDatensatz["Bild"]);
    }

    return $kartenListe;
}

function karteAnlegen($titel, $frage, $antwort, $antwortart, $richtigeAntworten, $bild) {
    //Datenbankaufruf: Datensatz mit den Variablen füllen (aus Post Formular)
}

function karteLöschen($kid) {
    //Datenbank aufruf: Karteikarte (von Stapel) wird gelöscht (über die ID: $kID )
}

function karteBearbeiten($kID, $titel, $frage, $richtigeAntworten, $falscheAntwort, $antwortart, $richtigeAntwortenAntzahl, $bild) {
    //richtige Antworten Anzahl setzen
    $richtigeAntwortenAnzahl = count($richtigeAntworten);
    $antwort = array_merge($richtigeAntworten, $falscheAntwort);
    //Daten aus dem Abgeschickten (POST-) Formular für den Datenbankbefehl verwenden
    //Datenbankaufruf: Datenstz Daten der Karte (titel, frage, antwort, antwortart, richtige Antworten, bild) aktualisieren

}
?>
