<?php
require_once("ToDo.php");

$todoListe = todoListeErstellen();


//GUI Funktionen:
if(isset($_POST["delete"])) {
    todoLöschen($todoListe[$_POST["delete"]]);

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
    //Liste mit HTML Komponenten anzeigen

}

function addToDoFormAnzeigen( /* falls Feature ein ToDo bearbeiten implementiert werden soll: $titel = null, $deadline = null, $zeitspanne = null, $info = null */ ) {
    //(POST) Formular mit HTML komponenten anzeigen

}

function showToDoInhalt($todo) {

    //ToDo Parameter (titel, deadline, zeitspanne, info) anzeigen in Form von HTML Komponenten
}


//ToDo Funktionalität Funktionen:
function todoListeErstellen() {
    //Array mit ToDo objekten füllen (schrittweise mit einer Schleife)
    //ToDo's werden mit ToDo Nutzer Daten aus der DB grfüllt (mit einer Schleife

    //DB abfrage: mit über die NutzerID (uid) über Session["user"]->getUID;
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

function todoLöschen($todo){
    //Datenbank aufruf: $todo wird aus der DB gelöscht (über die ID: $todo->getTID )

}

?>