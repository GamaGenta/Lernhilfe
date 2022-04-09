<?php
require_once("StudentenKarte.php");

$kartenliste = kartenListeErstellen();

if(isset($_POST)) {

}


//GUI Funktionen



//Karteikarten Funktionalität Funktionen:
function kartenListeErstellen() {
    //Array mit Karteikarte (Studentenkarte) objekten füllen (schrittweise mit einer Schleife)
    //Karten werden mit Nutzer Karten Daten aus der DB grfüllt (mit einer Schleife)

    //DB abfrage: mit über die NutzerID (uid) über Session["user"]->getUID;
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

?>