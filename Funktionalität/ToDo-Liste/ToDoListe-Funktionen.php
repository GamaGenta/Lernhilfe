<?php
require_once("ToDo.php");

$todoListe = todoListeErstellen();

if(isset($_POST["delete"])) {
    todoLöschen($todoListe, $_POST["delete"]);

    //Seiteninhalt (neu) Laden
    //header("Refresh:0");
    todoListeAnzeigen($todoListe);
} else if(isset($_GET["add"])) {
    //Formular zum Anlegen eines ToDo laden
    addToDoFormAnzeigen();
    if(isset($_POST["titel"])) {
        todoAnlegen($_POST["titel"], $_POST["deadline"], $_POST["zeitspanne"], $_POST["info"]);
    } else {
        //Fehlermeldung anzeigen

    }
} else {
    todoListeAnzeigen($todoListe);
}



function todoListeAnzeigen($todoListe) {
    //Liste mit HTML komponenten anzeigen

}

function addToDoFormAnzeigen( /* $titel = null, $deadline = null, $zeitspanne = null, $info = null */ ) {
    //(POST) Formular mit HTML komponenten anzeigen

}


function todoListeErstellen() {
    //Array mit ToDo objekten füllen (schrittweise mit einer Schleife)
    //ToDo's werden mit ToDo Nutzer Daten aus der DB grfüllt (mit einer Schleife

    //DB abfrage:
    //DB giebt 2D assoziatives Array (Map) zurück
    //Beispiel Array, welches aus einer Datenbankabrage herforgeht:
    $bspToDoDB_Daten = array(
        array("tID"=> 1,"titel"=>"Staubsaugen", "deadline"=>null, "zeitspanne"=>array("h"=>0,"min"=>30), "info"=>"die Treppen sollen auch gesaugt werden"),
        array("tID"=> 2, "titel"=>"Mathe lernen", "deadline"=>(time() + (7 * 24 * 60 * 60)), "zeitspanne"=>null, "info"=>"Kurvendiskusion: Ableitungen und Integrale")
    );

    $todoListe = array(
        //new ToDo($tID, $title, $deadline, $zeitspanne, $info);
        //...
    );

    foreach($bspToDoDB_Daten as $bspDatensatz){
        $todoListe[] = new ToDo($bspDatensatz->getTID(), $bspDatensatz->getTitel(), $bspDatensatz->getDeadline(), $bspDatensatz->getZeitspanne(), $bspDatensatz->getInfo());
    }

    return $todoListe;
}

function todoAnlegen($title, $deadline = null, $zeitspanne = null, $info = null) {
    //Datenbankaufruf mit den Variablen füllen (aus Post Formular)

}

function todoLöschen($todoListe, $todoNr){
    //$todoNr ist er Index des gewählten ToDo's aus dem Array $todoListe
    //Datenbank aufruf: $todoListe[$todoNr] wird aus der DB gelöscht (über die ID: $todoListe[$todotNr]->getTID )

}

?>