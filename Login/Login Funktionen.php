<?php

function sucheRolle ($uid, $password) {

    $rolle = null;

    //im LDAP die Rolle des Users (userClass) suchen, um sie der Session zu übergeben
    $rolle = getUserClassFromLDAP($uid, $password);

    return $rolle;
}

function setSessionVars ($uid, $rolle) {
    $_SESSION["uid"] = $uid;
    $_SESSION["rolle"] = $rolle;
}

function getUserClassFromLDAP($uid, $password){
    //mit Autentifizierung zum LDAP verbinden und das private Attribut "Rolle" der Person bzw. des Users ermitteln und zurückgeben
    return "Student";
}