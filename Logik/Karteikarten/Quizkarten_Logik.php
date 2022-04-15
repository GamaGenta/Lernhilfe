<?php
require_once("StudentenKarte.php");

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



//Quizkarten Logik Funktionen:
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

function kartnStatusSetzen($karte, $antwort = false) {
    if($antwort) {
        switch ($karte->getgetAntwortStatus()) {
            case $karte["nicht"]:
            case $karte["vorherFalsch"]:
                $karte->setAntwortStatusRichtig();
                //Datenbank aufruf: Status in der aktuellen Karte Setzen ($satus $karte->getgetAntwortStatus())
                break;
            case $karte["falsch"]:
                $karte->setAntwortStatusVorherFalsch();
                //Datenbank aufruf: Status in der aktuellen Karte Setzen ($satus $karte->getgetAntwortStatus())
                break;
            case $karte["richtig"]:
                break;
        }
    } else {
        switch ($karte->getgetAntwortStatus()) {
            case $karte["nicht"]:
            case $karte["vorherFalsch"]:
            case $karte["richtig"]:
                $karte->setAntwortStatusFalsch();
                //Datenbank aufruf: Status in der aktuellen Karte Setzen ($satus $karte->getgetAntwortStatus())
                break;
            case $karte["falsch"]:
                break;
        }
    }

}

function ergebnissPrüfen($richtigeAntwort, $antwort){
    //die beiden arrays (falls es arrays sind) müssen eventuell erst sortiert werden.
    if($richtigeAntwort == $antwort){
        return true;
    } else {
        return false;
    }
}
?>