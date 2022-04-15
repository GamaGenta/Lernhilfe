<?php
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Anlegen - Lernhilfe</title>
    <link rel="stylesheet" href="style_todo_Anlegen.css">
</head>
<header>
    <a href="todo_Ubersicht_Page.php"><i class="leftArrow"><</i></a>
    <h1>Neues ToDo</h1>
    <a href="" id="plusButton"><i class="plusButton">+</i></a>
</header>
<body>
<hr>
<form method="POST">

    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel">
    <hr>
    <br>
    <label for="dauer">Dauer:</label>
    <input type="time" id="dauer" name="dauer">
    <hr>
    <br>
    <label for="deadline">Deadline:</label>
    <input type="date" id="deadline" name="deadline">
    <hr>
    <br>
    <label for="info">Info:</label>
    <input type="text" id="info" name="info">
    <hr>
    <br>
    <input type='submit' id='submit' value='ToDo anlegen' style='float: left'>
    <br><br>

    <?php
    error_reporting(0);
    date_default_timezone_set("Europe/Berlin");
    $timestamp = time();

    if (!isset($_REQUEST['submit'])) {
        if ($_REQUEST ['titel'] == "" || $_REQUEST ['dauer'] == "" || $_REQUEST ['deadline'] == "" || $_REQUEST ['info'] == "") {

            print "Bitte alle Felder ausfüllen";

        } elseif (strtotime($_REQUEST['deadline']) < $timestamp) {

            print "Die Deadline darf nicht in der Vergangenheit liegen";

        } else {

            echo strtotime($_REQUEST['deadline']);
            echo "<br>";
            echo $timestamp;

            $titel = $_REQUEST ['titel'];
            $inhalt = $_REQUEST ['info'];
            $dauer = $_REQUEST ['dauer'];
            $deadline = $_REQUEST ['deadline'];
            $sqlInsert = "INSERT INTO mib14test.todoeintrag (`Titel`, `Inhalt`, `Dauer`, `Deadline`) VALUES ('$titel','$inhalt','$dauer','$deadline');";
            $result = mysqli_query($conn, $sqlInsert);
            header("Location: todo_Ubersicht_Page.php");

        }
    }
    ?>


</form>
</body>
<footer>
</footer>
</html>
