<?php
require_once("KarteikartenStapel.php");


//Quizkartenstapel Logik Funktionen:
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
