<?php
require_once("../Logik/Karteikarten/KarteikartenStapel_Logik.php");

$stapelListe = kartenstapelListeErstellen();


//GUI Funktionen
if(isset($_POST["add"])) {
    $_SESSION["add"] = true;
    //Formular zum Anlegen eines Stapels laden
    addStapelFormAnzeigen();
    if(isset($_POST["titel"])) {
        stapelAnlegen($_POST["titel"], $_POST["modul"]);
        //Seiteninhalt (neu) Laden, z.B.:
        unset($_POST["add"], $_POST["titel"], $_POST["modul"]);
    } else if(isset($_POST["back"])) {
        unset($_POST["add"], $_POST["back"]/*wird eventuell nicht benötigt, $_POST["titel"], $_POST["modul"]*/);
    } else if(isset($_POST["modul"])) {
        //Fehlermeldung anzeigen
        //Tritt auf falls der User keinen Tietel definiert hat, jedoch das abgeschickte Formular einen oder mehrere andere Parameter enthäl
        // echo "setze bitte einen Tietel";
    }
} else if(isset($_POST["stapel-detail"])){
    if(isset($_POST["back"])) {
        unset($_POST["stapel-detail"], $_POST["back"]);
    } else if(isset($_POST["edit"])){
        if(isset($_POST["back"])) {
            unset($_POST["edit"], $_POST["back"]);
        } else if($_POST["edit"] == true) {
            if(isset($_POST["titel"])) {
                stapelBearbeiten($stapelListe[$_POST["stapel-detail"]]->getSID(), $_POST["titel"], $_POST["modul"]);
                unset($_POST["titel"], $_POST["modul"], $_POST["edit"]);
            } else {
                //Fehlermeldung
            }
        } else if(isset($_POST["delete"])) {
            stapelLöschen($stapelListe[$_POST["stapel-detail"]]->getSID());
            //KarteikartenStapelListe wird wieder angezeigt (= default/else Fall)f:
            unset($_POST["stapel-detail"], $_POST["stapel-detail"], $_POST["delete"]);
        } else {
            //bearbeiten Formular anzeigen
            editStapelFormAnzeigen($stapelListe[$_POST["stapel-detail"]]);
        }
    } else {
        //Details (alle Karten eises Stapels) anzeigen
        StapelInhaltAnzeigen($stapelListe[$_POST["stapel-detail"]]->getSID(), $stapelListe[$_POST["stapel-detail"]]->getTitel());
    }
} else {
    //KarteikartenStapelListe wird angezeigt
    stapelListeAnzeigen($stapelListe);
}

if(isset($_SESSION["add"])) {
    //Formular zum Anlegen eines Stapels laden
    addStapelFormAnzeigen();
    if(isset($_POST["titel"])) {
        if(empty($_POST["titel"])) {
            stapelAnlegen($_POST["titel"], $_POST["modul"]);
            echo "Fehler: Gib einen Titel ein";
        } else {
            stapelAnlegen($_POST["titel"], $_POST["modul"]);
            unset($_SESSION["add"]);
            header('Location:./?Kartei'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link */
            return;
        }
    } else if() {

    } else if(isset($_POST["back"])) {
        unset($_POST["add"], $_POST["back"]/*wird eventuell nicht benötigt, $_POST["titel"], $_POST["modul"]*/);
    }
}

function stapelListeAnzeigen($stapelListe) {
    //Liste mit HTML Komponenten anzeigen
    //(PHP Datei: PHP in HTML eingebettet)
    //PHP Komponenten mit Schleife erzeugen
    //Bsp. Abruf der Titel in einer Schleife: $titel = $stapelListe[$i]->getTitel();
}

function addStapelFormAnzeigen() {
    //(POST) Formular mit HTML komponenten anzeigen
    // <form method="post"> </form>
}

function StapelInhaltAnzeigen($sID, $stapelTitel) {
    // Aufruf der Karteikarten (GUI) Funktionen (Karteikarten GUI ruft funktionale Kateikarten Funktionen auf)
    // (abrufen und Darstellung der Karteikarten das Stapels)
    require_once("Kartei_GUI/KarteiKarten_GUI-Logik.php" /* GUI der Karteikarten anzeigen */);
}

function editStapelFormAnzeigen($stapel) {
    //Editier Formular anzeigen
    //Formular ist mit Übergebenen Daten vorausgefüllt
}
