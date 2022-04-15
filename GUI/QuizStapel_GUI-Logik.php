<?php
require_once("../Logik/Karteikarten/Quizstapel_Logik.php");

$stapelListe = kartenstapelListeErstellen();


//GUI Funktionen
if(isset($_POST["stapel-detail"])){
    if(isset($_POST["back"])) {
        unset($_POST["stapel-detail"], $_POST["back"]);
    } else {
        //Details (alle Karten eises Stapels) anzeigen
        StapelInhaltAnzeigen($stapelListe[$_POST["stapel-detail"]]->getSID(), $stapelListe[$_POST["stapel-detail"]]->getTitel());
    }
} else {
    //KarteikartenStapelListe wird angezeigt
    stapelListeAnzeigen($stapelListe);
}

function stapelListeAnzeigen($stapelListe) {
    //Liste mit HTML Komponenten anzeigen
    //(PHP Datei: PHP in HTML eingebettet)
    //PHP Komponenten mit Schleife erzeugen
    //Bsp. Abruf der Titel in einer Schleife: $titel = $stapelListe[$i]->getTitel();
}

function StapelInhaltAnzeigen($sID, $stapelTitel) {
    // Aufruf der Karteikarten (GUI) Funktionen (Karteikarten GUI ruft funktionale Kateikarten Funktionen auf)
    // (abrufen und Darstellung der Karteikarten das Stapels)
    require_once("Quiz_GUI/QuizKarten_GUI-Logik.php" /* GUI der Karteikarten anzeigen */);
}
