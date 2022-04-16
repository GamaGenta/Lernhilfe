<?php
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartenstapel Übersicht - Lernhilfe</title>
    <link rel="stylesheet" href="style_kartenstapel_Ubersicht_Page.css">
</head>
<header>
    <a href=""><i class="leftArrow"><</i></a>
    <h1>Kartenstapel</h1>
    <a href="kartenstapel_anlegen.php"><i class="plusButton">+</i></a>
</header>
<body>
<form action='' method='POST'>

    <hr>
    <div class='eintragKartenstapel'>
        Alle Stapel
        <br>
        </label>
        <a href="" class="rightArrow">></a>
    </div>

    <?php
    //beispiel-IDs in der Abfrage
    $sqlSelect = "SELECT Titel FROM karteikartenstapel WHERE idKarteikartenStapel='1' AND idMitglied='1';";
    $result = mysqli_query($conn, $sqlSelect);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<hr>";
            echo "<div class='eintragKartenstapel'>";
            echo '<label for="checkboxOfKartenstapel">';
            echo $row['Titel'] . "<br>";
            echo "</label>";
            echo '<a href="karteikarte_Ubersicht_Page.php" class="rightArrow">></a>';
            echo "</div>";
        }
    }
    echo "<hr>";
    error_reporting(0);
    ?>
</form>
</body>
<footer>
</footer>
</html>