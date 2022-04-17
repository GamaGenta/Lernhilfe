<?php
require_once("ToDo.php");

//ToDo Logik Funktionen:
function todoListeErstellen() {
    //Array mit ToDo objekten füllen (schrittweise mit einer Schleife)
    //ToDo werden mit ToDo Nutzer Daten aus der DB grfüllt (mit einer Schleife

    //DB abfrage: mit über die NutzerID (uid) über Session["user"]->getUID;
    //DB giebt 2D assoziatives Array (Map) zurück

    // Zugangsdaten zur Datenbank
    $DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort


    $OPTION = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    //$result = null;
    try {
        // Verbindung zur Datenbank aufbauen
        //$db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_BENUTZER, $DB_PASSWORT, $OPTION);
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION["user"]->getUid();
        $sqlSelect = "Call toDoAuslesen('$user');";
        $result = mysqli_query($conn, $sqlSelect);
        //$resultCheck = mysqli_num_rows($result);
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }



    //Beispiel Array, welches aus einer Datenbankabrage herforgeht:
    /*$bspToDoDB_Daten = array(
        array("tID"=> 1,"titel"=>"Staubsaugen", "deadline"=>null, "zeitspanne"=>1.5, "info"=>"die Treppen sollen auch gesaugt werden"),
        array("tID"=> 2, "titel"=>"Mathe lernen", "deadline"=>(time() + (7 * 24 * 60 * 60)), "zeitspanne"=>null, "info"=>"Kurvendiskusion: Ableitungen und Integrale")
    );*/

    $todoListe = array(
        //new ToDo($tID, $title, $deadline, $zeitspanne, $info);
        //...
    );

    /*foreach($bspToDoDB_Daten as $bspDatensatz){
        $todoListe[] = new ToDo($bspDatensatz["tID"], $bspDatensatz["titel"], $bspDatensatz["deadline"], $bspDatensatz["zeitspanne"], $bspDatensatz["info"]);
    }*/

    while($row = $result->fetch_row()) {
        $todoListe[] = new ToDo($row[0], $row[1], $row[2], $row[3], $row[4]);
        //print_r($row);
    }



    return $todoListe;
    //return quicksort($todoListe);
}

function quicksort($array) {
    if (count($array) < 2) {
        return $array;
    }
    $left = $right = array();
    reset($array);
    $pivot_key = key($array);
    $pivot = array_shift($array);
    foreach ($array as $k => $v) {
        if ($v->getDeadline() <= $pivot->getDeadline()) {
            $left[$k] = $v;
        } else {
            $right[$k] = $v;
        }
    }
    return array_merge(quicksort($left), array($pivot_key => $pivot), quicksort($right));
}


function todoAnlegen($title, $deadline = null, $zeitspanne = null, $info = null) {
    //Datenbankaufruf mit den Variablen füllen (aus Post Formular)

    // Zugangsdaten zur Datenbank
    $DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort


    $OPTION = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];


    try {
        // Verbindung zur Datenbank aufbauen
        //$db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_BENUTZER, $DB_PASSWORT, $OPTION);
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION["user"]->getUid();
        $sqlSelect = "Call MAXToDo('$user');";
        $result = mysqli_query($conn, $sqlSelect);
        //$resultCheck = mysqli_num_rows($result);


    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }

    $maxToDo = $result->fetch_row()[0];
    if($maxToDo < 20 ) {
        $_SESSION["toMuchToDo"] = false;

        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION["user"]->getUid();
        $sqlInsert = "Call InsertIntoToDo('$user', '$title', '$deadline', '$zeitspanne', '$info');";
        $result = mysqli_query($conn, $sqlInsert);

        $_SESSION["TEST"] = $result;
    } else {
        $_SESSION["toMuchToDo"] = true;
    }

}

function todoLöschen($tIDs){

    // Zugangsdaten zur Datenbank
    $DB_HOST = "localhost"; // Host-Adresse
    $DB_NAME = "lernhilfe"; // Datenbankname
    $DB_BENUTZER = "root"; // Benutzername
    $DB_PASSWORT = ""; // Passwort


    $OPTION = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $_SESSION["TEST"] = $tIDs;

    try {
        // Verbindung zur Datenbank aufbauen
        //$db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_BENUTZER, $DB_PASSWORT, $OPTION);
        $conn = mysqli_connect($DB_HOST, $DB_BENUTZER, $DB_PASSWORT, $DB_NAME);
        $user = $_SESSION["user"]->getUid();

        foreach ($tIDs as $tID) {

            //Datenbank aufruf: $todo wird aus der DB gelöscht (über die ID: tID )
            //include_once 'dbconn.php';
            //$sqlDelete = "DELETE FROM todoeintrag WHERE idtodo IN ('$val');";
            //mysqli_query($conn, $sqlDelete);

            $sqlSelect = "Call DeleteToDo('$user', '$tID');";
            $result = mysqli_query($conn, $sqlSelect);
            //$resultCheck = mysqli_num_rows($result);
        }
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }

}

?>