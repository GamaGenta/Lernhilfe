<?php

require_once("THM_Mitglied.php");

session_start();


if (isset($_POST["logout"])) {
    unset($_SESSION["user"]); //Session löschen
}

if (isset($_POST["uid"]) && isset($_POST["password"])) {
    $uid = $_POST["uid"]; // eingegebene User ID wird gesetzt
    $password = $_POST["password"]; // eingegebenes Passwort wird gesetzt

    $rolle = sucheRolle($uid, $password); // Rolle des User wird, mit hilfe des Passworts und der uid, gesucht (da die User Rolle bzw. userClass ein privates attribut ist);

    if($rolle != null){
        $_SESSION["user"] = new THM_Mitglied($uid, $rolle); //rolle und uid in dem Objekt $user kapseln und Objekt der Session übergeben
    }

}


//Login Funktionen:
function sucheRolle ($uid, $password) {

    $rolle = null;

    // die Rolle des Users suchen, um sie der Session zu übergeben
    $rolle = getUserClassFrom($uid, $password);

    return $rolle;
}

/*
function setSessionVars ($uid, $rolle) {
    $_SESSION["uid"] = $uid;
    $_SESSION["rolle"] = $rolle;
}
*/

function getUserClassFrom($uid, $password){
    //Authentifizierung der User daten: gibt User Rolle zur Validierung zurück
    // PHP Fehlermeldungen anzeigen
    //error_reporting(E_ALL);
    //ini_set('display_errors', true);

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
        $sqlSelect = "SELECT Rolle FROM thmmitglied WHERE Username = '$uid' and Passwort = '$password';";
        $result = mysqli_query($conn, $sqlSelect);
        //$resultCheck = mysqli_num_rows($result);
    }
    catch (PDOException $e) {
        // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
        exit("Verbindung fehlgeschlagen! " . $e->getMessage());
    }
/*
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "mib14test";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
*/
    error_reporting(0);
    return $result->fetch_row()[0];
    //return "Student";
}

