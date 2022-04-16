<?php
//include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo Anlegen - Lernhilfe</title>
    <!-- Absoluten Link für das Stylesheet je nach Umgebung (VM) setzen -->
    <link rel="stylesheet" href="/GUI-Test/Lernhilfe-Logik-und-GUI-getrennt/GUI/ToDo_GUI/style_todo_Anlegen.css">
</head>
<body>
<header>
    <form method="post" action="">
        <button type="submit" name="back" class="leftArrow"><</button>
    </form>
    <!-- <a href="todo_Uebersicht_Page.php"><i class="leftArrow"><</i></a> -->
    <h1>Neues ToDo</h1>
    <form method="POST" action="">
    <button type="submit" class="plusButton">+</button>
    <!-- <a href=""><i class="plusButton">+</i></a> -->
</header>
<hr  id="headline">
<div id="addForm">
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel" maxlength="30">
    <hr>
    <br>
    <label for="dauer">Dauer (in h):</label>
    <input type="number" id="dauer" name="dauer" step="any">
    <hr>
    <br>
    <label for="deadline">Deadline:</label>
    <input type="datetime-local" id="deadline" name="deadline">
    <hr>
    <br>
    <label for="info">Info:</label>
    <input type="text" id="info" name="info" maxlength="300">
    <hr>
    <br>
    <!-- <input type='submit' id='submit' value='ToDo anlegen' style='float: left'> -->
    <br><br>

    <?php
    /*
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

            $titel = $_REQUEST ['titel'];
            $inhalt = $_REQUEST ['info'];
            $dauer = $_REQUEST ['dauer'];
            $deadline = $_REQUEST ['deadline'];
            $sqlInsert = "INSERT INTO mib14test.todoeintrag (`Titel`, `Inhalt`, `Dauer`, `Deadline`, `Von`) VALUES ('$titel','$inhalt','$dauer','$deadline','$timestamp');";
            $result = mysqli_query($conn, $sqlInsert);
            header("Location: todo_Uebersicht_Page.php");

        }
    }
    */
    ?>

</div>
</form>
</body>
<footer>
</footer>
</html>
