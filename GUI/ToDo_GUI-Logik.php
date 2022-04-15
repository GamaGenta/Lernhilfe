<?php
require_once("../Logik/ToDo/ToDo_Logik.php");

$todoListe = todoListeErstellen();


//GUI Funktionen:
if(isset($_POST["delete"])) {
    todoLöschen($todoListe[$_POST["delete"]]->getTID());
    //ToDo Liste anzeigen:
    unset($_POST["delete"]);
} else if(isset($_POST["add"])) {
    //Formular zum Anlegen eines ToDo laden
    addToDoFormAnzeigen();
    if(isset($_POST["titel"])) {
        todoAnlegen($_POST["titel"], $_POST["deadline"], $_POST["zeitspanne"], $_POST["info"]);
        //Seiteninhalt (neu) Laden, z.B. unset($_POST["add"])
        unset($_POST["add"]/*wird eventuell nicht benötigt, $_POST["titel"], $_POST["deadline"], $_POST["zeitspanne"], $_POST["info"]*/);
    } else if(isset($_POST["back"])) {
        unset($_POST["add"], $_POST["back"]/*wird eventuell nicht benötigt, $_POST["titel"], $_POST["deadline"], $_POST["zeitspanne"], $_POST["info"]*/);
    } else if(isset($_POST["deadline"]) or isset($_POST["zeitspanne"]) or isset($_POST["info"])) {
        //Fehlermeldung anzeigen
        //Tritt auf falls der User keinen Tietel definiert hat, doch das abgeschickt Formular einen oder mehrere andere Parameter enthält
        //echo "setze einen Titel!";
    }
} else if(isset($_POST["detail"])){
    //Details (alle parameter eines ToDo, außer der tID) anzeigen
    ToDoInhaltAnzeigen($_POST["detail"]);
    if(isset($_POST["back"])) {
        unset($_POST["detail"], $_POST["back"]);
    } /* // falls das ToDo in der Detailansicht gelöscht werden soll:
        else if(isset($_POST["delete"])) {
        todoLöschen($todoListe[$_POST["delete"]]->getTID());
        //ToDo Liste anzeigen:
        unset($_POST["delete"], $_POST["detail"]);
        }*/
} else {
    todoListeAnzeigen($todoListe);
}


function todoListeAnzeigen($todoListe) {
    //Liste mit HTML Komponenten anzeigen
    //(PHP Datei: PHP in HTML eingebettet)
}

function addToDoFormAnzeigen( /* falls Feature ein ToDo bearbeiten implementiert werden soll: $titel = null, $deadline = null, $zeitspanne = null, $info = null */ ) {
    //(POST) Formular mit HTML komponenten anzeigen
    // <form method="post"> </form>
}

function ToDoInhaltAnzeigen($todo) {

    //ToDo Parameter (titel, deadline, zeitspanne, info) anzeigen in Form von HTML Komponenten
    //muss Link zur ToDo loste beinhalten (<a href="?ToDo"> </a>)
}
