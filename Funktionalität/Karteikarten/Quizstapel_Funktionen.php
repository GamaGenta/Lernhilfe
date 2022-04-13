<?php
require_once("KarteikartenStapel.php");

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
    require_once("Quizkart_Funktionen.php" /* GUI der Karteikarten anzeigen */);
}


//Quizkartenstapel Funktionalität Funktionen:
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
