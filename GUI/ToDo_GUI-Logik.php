<?php
require_once("../Logik/ToDo/ToDo_Logik.php");

$todoListe = todoListeErstellen();


//GUI Funktionen:
if(isset($_POST["delete"])) {
    //todoLöschen($todoListe[$_POST["delete"]]->getTID());
    //ToDo Liste anzeigen:
    //unset($_POST["delete"]);
    //header('Location:./?ToDo'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link */
    //return;
} else if(isset($_POST["add"])) {
    $_SESSION["add"] = true;
} else if(isset($_POST["detail"])){
    $_SESSION["detail"] = $todoListe[$_POST["detail"]];
} /* else if(isset($_POST["delete"])) {
    if (empty($_POST['tID'])) {
        $_POST["delete"] = false;
    } else {
        $_POST["delete"] = true;
    }
}
 */


if(isset($_SESSION["add"])) {
    if(isset($_POST["titel"])) {
        if(empty($_POST["titel"])) {
            $_SESSION["add"] = false;
            header('Location:./?ToDo'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link */
            return;
        } else {
            todoAnlegen($_POST["titel"], $_POST["deadline"], $_POST["zeitspanne"], $_POST["info"]);
            //Seiteninhalt (neu) Laden, z.B. unset($_POST["add"])

                unset($_SESSION["add"]/*wird eventuell nicht benötigt, $_POST["titel"], $_POST["deadline"], $_POST["zeitspanne"], $_POST["info"]*/);
                header('Location:./?ToDo'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link */
                return;
        }
    } else if(isset($_POST["back"])) {
        unset($_SESSION["add"], $_POST["add"], $_POST["back"]);
        header('Location:./?ToDo'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link */
        return;
    } else {
        if($_SESSION["add"]) {
            addToDoFormAnzeigen();
            if($_SESSION["toMuchToDo"]) {
                echo "Fehler: du hast zu viele ToDo's";
            }
        } else {
            //Fehlermerldung anzeigen im HTML
            //Fehlermeldung anzeigen
            //Tritt auf falls der User keinen Tietel definiert hat, doch das abgeschickt Formular einen oder mehrere andere Parameter enthält
            //echo "setze einen Titel!";
            // und das Formular weiterhin anzeigen bzw. Formular mit Fehlermeldung anzeigen:
            addToDoFormAnzeigen();
            echo "Fehler: Trage einen Titel ein!";
        }
    }
} else if(isset($_SESSION["detail"])) {
    if(isset($_POST["back"])) {
        unset($_POST["detail"], $_POST["back"], $_SESSION["detail"]);
        header('Location:./?ToDo');
        return;
    } else {
        //Details (alle parameter eines ToDo, außer der tID) anzeigen
        ToDoInhaltAnzeigen($_SESSION["detail"]);

        //unset($_POST["detail"], $_POST["back"], $_SESSION["detail"]);
        //header('Location:./?ToDo');
        //return;
    }
    /* falls das ToDo in der Detailansicht gelöscht werden soll:
    else if(isset($_POST["delete"])) {
    todoLöschen($todoListe[$_POST["delete"]]->getTID());
    ToDo Liste anzeigen:
    unset($_POST["delete"], $_POST["detail"]);
    }*/
} /*else if(isset($_POST["delete"])) {
    if ($_POST["delete"]) {

        //foreach ($_POST['tID'] as $tID) {

        todoLöschen($_POST['tID']);
        //}

        //header('Location:./?ToDo'); /*aktuelle seite wird geladen mit "ToDo" als GET Parameter im Link
        unset($_POST["delete"]);
        header('Location:./?ToDo');
        return;

    } else {

        todoListeAnzeigen($todoListe);
        print "Es wurde kein ToDo ausgewählt";

    }
    //todoLöschen($todoListe[$_POST["delete"]]->getTID());
    //ToDo Liste anzeigen:
    unset($_POST["delete"]);
} */ else {
    todoListeAnzeigen($todoListe);
    if(isset($_SESSION["TEST"])) {
        var_dump($_SESSION["TEST"]);
    }
}




function todoListeAnzeigen($todoListe) {
    //Liste mit HTML Komponenten anzeigen
    //(PHP Datei: PHP in HTML eingebettet)
    require_once("ToDo_GUI/todo_Uebersicht_Page.php");
}

function addToDoFormAnzeigen( /* falls Feature ein ToDo bearbeiten implementiert werden soll: $titel = null, $deadline = null, $zeitspanne = null, $info = null */ ) {
    //(POST) Formular mit HTML komponenten anzeigen
    // <form method="post"> </form>
    require_once("ToDo_GUI/todo_Anlegen.php");
}

function ToDoInhaltAnzeigen($todo) {
    //ToDo Parameter (titel, deadline, zeitspanne, info) anzeigen in Form von HTML Komponenten
    //muss Link zur ToDo loste beinhalten (<a href="?ToDo"> </a>)
    include_once("ToDo_GUI/todo_Detailsicht.php");
}
