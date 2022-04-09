<?php
require_once("../Login/Login.php");

if (isset($_SESSION["user"])) {
    if(isset($_GET["ToDo"])) {
        require_once("ToDo's.php");
    } else if(isset($_GET["Kartei"])) {
        require_once("Kartei.php");
    } else if(isset($_GET["Quiz"])) {
        require_once("Quiz.php");
    } else {
        //Die Landingpage (PHP mit HTML framework) laden
        require_once("Landing.php");
    }
} else {
    //Login HTML Seite (PHP mit HTML framework) mit PostFoumular laden:
    // Bsp.
    require_once("Login.php");
}

?>
