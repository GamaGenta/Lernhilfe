<?php
require_once("KarteikartenStapel.php");

$stapelListe = kartenstapelErstellen();



//GUI Funktionen
if(isset($_POST["add"])) {
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
} else if(isset($_POST["detail"])){
    //Details (alle Karten eises Stapels) anzeigen
    StapelInhaltAnzeigen($stapelListe[$_POST["detail"]]);
    if(isset($_POST["back"])) {
        unset($_POST["detail"], $_POST["back"]);
    } else if(isset($_POST["delete"])) {
        stapelLöschen($stapelListe[$_POST["detail"]]->getSID());

        //KarteikartenStapelListe wird angezeigt (= default/else Fall)
        unset($_POST["detail"], $_POST["delete"]);
    } else if(isset($_POST["edit"])){
        //bearbeiten Formular anzeigen
        editStapelFormAnzeigen($stapelListe[$_POST["detail"]]);
        if(isset($_POST["back"])) {
            unset($_POST["edit"], $_POST["back"]);
        } else if($_POST["edit"] == true) {
            stapelBearbeiten($stapelListe[$_POST["detail"]]);
        }
    }
} else {
    //KarteikartenStapelListe wird angezeigt
    stapelListeAnzeigen($stapelListe);
}

function stapelListeAnzeigen($stapelListe) {
    //Liste mit HTML Komponenten anzeigen
    //(PHP Datei: PHP in HTML eingebettet)
}

function addStapelFormAnzeigen() {
    //(POST) Formular mit HTML komponenten anzeigen
    // <form method="post"> </form>
}

function StapelInhaltAnzeigen($stapel) {
    $titel = $stapel->getTitel();
    // Aufruf der Karteikarten Funktionen
    // (abrufen und Darstellung der Karteikarten das Stapels)
    require_once("Karteikarten_Funktionen.php");
}

function editStapelFormAnzeigen($stapel) {
    //Editier Formular anzeigen
}


//Karteikartenstapel Funktionalität Funktionen:
function kartenstapelErstellen() {
    //Array mit KarteikartenStapel objekten füllen (schrittweise mit einer Schleife)
    //Kartenstapel werden mit Nutzer Kartenstapel Daten aus der DB grfüllt (mit einer Schleife)

    //DB abfrage: mit über die NutzerID (uid) über Session["user"]->getUID;
    //DB giebt 2D assoziatives Array (Map) zurück
    //Beispiel Array, welches aus einer Datenbankabrage herforgeht:
    $bspStapelDB_Daten = array(
        array("sID"=> 1,"titel"=>"SW-Spezifikation", "modul"=>"SWEP", "karteikartenAnzahl"=>6),
        array("sID"=> 2,"titel"=>"Such-Algorithmen", "modul"=>"TIUA", "karteikartenAnzahl"=>7)
    );

    $stapelListe = array(
        //new KarteikartenStapel($sID, $title, $modul, $karteikartenAnzahl);
        //...
    );

    foreach($bspStapelDB_Daten as $bspDatensatz){
        $stapelListe[] = new KarteikartenStapel($bspDatensatz["sID"], $bspDatensatz["titel"], $bspDatensatz["modul"], $bspDatensatz["karteikartenAnzahl"]);
    }

    return $stapelListe;
}

function stapelAnlegen($titel, $modul) {
    //Datenbankaufruf mit den Variablen füllen (aus Post Formular)
}

function stapelLöschen($sID) {
    //Datenbank aufruf: Karteikarten von Stapel werden gelöscht und Stapel wird aus der DB gelöscht (über die ID: $sID )
}

function stapelBearbeiten($stapel) {
    //Datenbankaufruf: Daten des Stapels (titel und modul) aktualisieren
}
?>