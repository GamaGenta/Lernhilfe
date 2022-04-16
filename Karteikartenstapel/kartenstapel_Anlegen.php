<?php
include_once '../dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartenstapel Anlegen - Lernhilfe</title>
    <link rel="stylesheet" href="style_kartenstapel_Anlegen.css">
</head>
<header>
    <a href="kartenstapel_Ubersicht_Page.php"><i class="leftArrow"><</i></a>
    <h1>Neuer Kartenstapel</h1>
    <a href="" id="plusButton"><i class="plusButton">+</i></a>
</header>
<body>
<hr>
<form method="POST">

    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel" maxlength="30">
    <hr>
    <br>
    <label for="modul">Modul:</label>
    <input type="text" id="modul" name="modul" maxlength="255">
    <hr>
    <br>
    <input type='submit' id='submit' value='Kartenstapel anlegen' style='float: left'>
    <br><br>

    <?php
    error_reporting(0);
    if (!isset($_REQUEST['submit'])) {
        if ($_REQUEST ['titel'] == "" || $_REQUEST ['modul'] == "") {

            print "Bitte alle Felder ausfüllen";

        } else {

            echo "<br>";
            $titel = $_REQUEST ['titel'];
            $modul = $_REQUEST ['modul'];
            //idKarteikartenstapel und idMitglied müssen in der Abfrage mitübergeben werden
            $sqlInsert = "INSERT INTO karteikartenstapel (`Titel`, `Modul`) VALUES ('$titel','$modul');";
            $result = mysqli_query($conn, $sqlInsert);
            header("Location: kartenstapel_Ubersicht_Page.php");

        }
    }
    ?>
</form>
</body>
<footer>
</footer>
</html>
