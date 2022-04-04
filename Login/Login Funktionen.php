<?php

function sucheRolle ($uid, $password) {

    $rolle = null;

    //im LDAP die Rolle des Users (userClass) suchen, um sie der Session zu übergeben

    return $rolle;
}

function setSessionVars ($uid, $rolle) {
    $_SESSION["uid"] = $uid;
    $_SESSION["rolle"] = $rolle;
}
