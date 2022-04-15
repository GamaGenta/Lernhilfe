<?php
require_once("../../Logik/Karteikarten/Quizkarten_Logik.php");


$kartenListe = kartenListeErstellen($sID);


//GUI Funktionen
if($_POST["detail"]) {
    if(isset($_POST["prüfen"])){
        if(isset($_POST["back"])) {
            unset($_POST["prüfen"], $_POST["detail"], $_POST["back"]);
        } else if(isset($_POST["next"])) {
            //nächste Karte in der Liste anzeigen:
            $_POST["detail"] +=1;
            unset($_POST["next"], $_POST["prüfen"]);
        } else {
            //Antwort prüfen
            $antwort = ergebnissPrüfen($kartenListe["detail"]->getAntwort()["richtig"], $_POST["antwort"]);
            //Antortstatus setzen
            kartnStatusSetzen($kartenListe["detail"], $antwort);
            //Antwort ergebniss einblenden (richtig/falsch)
            ergebnissAnzeigen($kartenListe["detail"], $antwort);
        }
    } else if($_POST["back"]) {
        unset($_POST["detail"], $_POST["back"]);
    } else {
        kartenInhaltAnzeigen($kartenListe[$_POST["detail"]]);
    }
}  else {
    //Liste der Karten des Stapels der Stapel ID (sID)
    kartenListeAnzeigen($kartenListe, $stapelTitel);
}

function kartenListeAnzeigen($kartenList, $staplTitel) {
    //Liste mit HTML Komponenten anzeigen
    //(PHP Datei: PHP in HTML eingebettet)
}

function kartenInhaltAnzeigen($karte) {
    //Karten Daten werden mit HTML Komponenten angezeigt
    //(PHP Datei: PHP in HTML eingebettet)
}

function ergebnissAnzeigen($karte, $antwort) {
    //Karten Daten werden mit HTML Komponenten angezeigt
    //Antwort Ergebniss wird angezeigt (in Form einer HTML komponente)
    //(PHP Datei: PHP in HTML eingebettet)#
    //(Button ">" unten rechts wird von SubmitButton post value für "prüfen" zu SubmitButton value: "next"
}
