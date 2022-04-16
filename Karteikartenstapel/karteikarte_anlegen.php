<?php
include_once '../dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karteikarte Anlegen - Lernhilfe</title>
    <link rel="stylesheet" href="style_karteikarte_Anlegen.css">
</head>
<header>
    <a href="karteikarte_Ubersicht_Page.php"><i class="leftArrow"><</i></a>
    <h1>Neue Karteikarte</h1>
    <a href="" id="plusButton"><i class="plusButton">+</i></a>
</header>
<body>
<hr>
<form method="POST">

    <label for="stapel">Stapel:</label>
    <div class='stapel'>
        <?php
        //beispiel-IDs in der Abfrage
        $sqlSelectKks = "SELECT Titel FROM karteikartenstapel WHERE idKarteikartenStapel='1' AND idMitglied='1';";
        $resultKks = mysqli_query($conn, $sqlSelectKks);
        $row = mysqli_fetch_assoc($resultKks);
        echo $row['Titel'];
        ?>
    </div>
    <hr>
    <br>
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel" maxlength="30">
    <hr>
    <br>
    <label for="frage">Frage:</label>
    <input type="text" id="frage" name="frage" maxlength="255">
    <hr>
    <br>
    <input type='submit' id='submit' value='Kartenstapel anlegen' style='float: left'>
    <br><br>

    <?php
    error_reporting(0);
    if (!isset($_REQUEST['submit'])) {
        if ($_REQUEST ['titel'] == "" || $_REQUEST ['frage'] == "") {

            print "Bitte alle Felder ausfüllen";

        } else {

            echo "<br>";
            $titel = $_REQUEST ['titel'];
            $modul = $_REQUEST ['frage'];
            //idKarteikartenstapel, idKarteikarte und idMitglied müssen in der Abfrage mitübergeben werden
            $sqlInsert = "INSERT INTO karteikarten (`Titel`, `Frage`) VALUES ('$titel','$modul');";
            $result = mysqli_query($conn, $sqlInsert);
            header("Location: karteikarte_Ubersicht_Page.php");

        }
    }
    ?>
</form>
</body>
<footer>
</footer>
</html>
