<?php
require_once("../Login/Login_Logik.php");

if (isset($_SESSION["user"])) {
    if(isset($_GET["ToDo"])) {
        require_once("ToDo_GUI/ToDo_GUI.php");
    } else if(isset($_GET["Kartei"])) {
        require_once("Kartei_GUI/Kartei_GUI.php");
    } else if(isset($_GET["Quiz"])) {
        require_once("Quiz_GUI/Quiz_GUI.php");
    } else {
        //Die Landingpage (PHP mit HTML framework) laden
        require_once("Landing_GUI.php");
    }
} else {
    //Login HTML Seite (PHP mit HTML framework) mit PostFoumular laden:
    // Bsp.
    require_once("Login_GUI.php");
}

?>
