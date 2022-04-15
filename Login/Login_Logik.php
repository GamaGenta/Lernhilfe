<?php

require_once("THM_Mitglied.php");

session_start();


if (isset($_POST["logout"])) {
    unset($_SESSION["user"]); //user aus der Session entnehmen
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

    //im LDAP die Rolle des Users (userClass) suchen, um sie der Session zu übergeben
    $rolle = getUserClassFrom($uid, $password);

    return $rolle;
}

function setSessionVars ($uid, $rolle) {
    $_SESSION["uid"] = $uid;
    $_SESSION["rolle"] = $rolle;
}

function getUserClassFrom($uid, $password){
    //mit Autentifizierung zum LDAP verbinden und das private Attribut "Rolle" der Person bzw. des Users ermitteln und zurückgeben
    return "Student";
}

