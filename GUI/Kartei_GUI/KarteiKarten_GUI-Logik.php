<?php
require_once("../../Logik/Karteikarten/Karteikarten_Logik.php");

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
    kartenListeAnzeigen($kartenListe, $stapelTitel);
}

function kartenListeAnzeigen($kartenList, $staplTitel) {
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

