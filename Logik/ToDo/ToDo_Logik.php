<?php
require_once("ToDo.php");

//ToDo Logik Funktionen:
function todoListeErstellen() {
    //Array mit ToDo objekten füllen (schrittweise mit einer Schleife)
    //ToDo werden mit ToDo Nutzer Daten aus der DB grfüllt (mit einer Schleife

    //DB abfrage: mit über die NutzerID (uid) über Session["user"]->getUID;
    //DB giebt 2D assoziatives Array (Map) zurück
    /*
    $sqlSelect = "SELECT idtodo, titel, inhalt FROM todoeintrag;";
    $result = mysqli_query($conn, $sqlSelect);
    $resultCheck = mysqli_num_rows($result);
    */
    //Beispiel Array, welches aus einer Datenbankabrage herforgeht:


    $bspToDoDB_Daten = array(
        array("tID"=> 1,"titel"=>"Staubsaugen", "deadline"=>null, "zeitspanne"=>1.5, "info"=>"die Treppen sollen auch gesaugt werden"),
        array("tID"=> 2, "titel"=>"Mathe lernen", "deadline"=>(time() + (7 * 24 * 60 * 60)), "zeitspanne"=>null, "info"=>"Kurvendiskusion: Ableitungen und Integrale")
    );

    $todoListe = array(
        //new ToDo($tID, $title, $deadline, $zeitspanne, $info);
        //...
    );

    foreach($bspToDoDB_Daten as $bspDatensatz){
        $todoListe[] = new ToDo($bspDatensatz["tID"], $bspDatensatz["titel"], $bspDatensatz["deadline"], $bspDatensatz["zeitspanne"], $bspDatensatz["info"]);
    }

    return $todoListe;
}

function todoAnlegen($title, $deadline = null, $zeitspanne = null, $info = null) {
    //Datenbankaufruf mit den Variablen füllen (aus Post Formular)

}

function todoLöschen($tID){
    //Datenbank aufruf: $todo wird aus der DB gelöscht (über die ID: tID )
    //include_once 'dbconn.php';
    //$sqlDelete = "DELETE FROM todoeintrag WHERE idtodo IN ('$val');";
    //mysqli_query($conn, $sqlDelete);
}

?>