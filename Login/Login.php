<?php

require_once("Login Funktionen.php");
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

