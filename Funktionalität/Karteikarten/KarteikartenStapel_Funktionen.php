<?php
require_once("KarteikartenStapel.php");

$stapelListe = kartenstapelListeErstellen();



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
} else if(isset($_POST["stapel-detail"])){
    if(isset($_POST["back"])) {
        unset($_POST["stapel-detail"], $_POST["back"]);
    } else if(isset($_POST["delete"])) {
        stapelLöschen($stapelListe[$_POST["stapel-detail"]]->getSID());
        //KarteikartenStapelListe wird wieder angezeigt (= default/else Fall)f:
        unset($_POST["detail"], $_POST["delete"]);
    } else if(isset($_POST["edit"])){
        //bearbeiten Formular anzeigen
        editStapelFormAnzeigen($stapelListe[$_POST["stapel-detail"]]);
        if(isset($_POST["back"])) {
            unset($_POST["edit"], $_POST["back"]);
        } else if($_POST["edit"] == true) {
            stapelBearbeiten($stapelListe[$_POST["stapel-detail"]]->getSID(), $_POST["titel"], $_POST["modul"]);
            unset($_POST["titel"], $_POST["modul"], $_POST["edit"]);
        } else {
            //Details (alle Karten eises Stapels) anzeigen
            StapelInhaltAnzeigen($stapelListe[$_POST["stapel-detail"]]->getSID(), $stapelListe[$_POST["stapel-detail"]]->getTitel());
        }
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

function addStapelFormAnzeigen() {
    //(POST) Formular mit HTML komponenten anzeigen
    // <form method="post"> </form>
}

function StapelInhaltAnzeigen($sID, $stapelTitel) {
    // Aufruf der Karteikarten (GUI) Funktionen (Karteikarten GUI ruft funktionale Kateikarten Funktionen auf)
    // (abrufen und Darstellung der Karteikarten das Stapels)
    require_once("Karteikarten_Funktionen.php" /* GUI der Karteikarten anzeigen */);
}

function editStapelFormAnzeigen($stapel) {
    //Editier Formular anzeigen
    //Formular ist mit Übergebenen Daten vorausgefüllt
}


//Karteikartenstapel Funktionalität Funktionen:
function kartenstapelListeErstellen() {
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
    //Datenbankaufruf: Datensatz mit den Variablen füllen (aus Post Formular)
}

function stapelLöschen($sID) {
    //Datenbank aufruf: Karten im Stapel erfragen und löschen
    //Datenbank aufruf: Stapel wird aus der DB gelöscht (über die ID: $sID )

}

function stapelBearbeiten($sID, $titel, $modul) {
    //Datenbankaufruf: Daten des Stapels (titel und modul) aktualisieren über die Stapel ID (  sID: mit $stapel->getSID();  )
}
?>