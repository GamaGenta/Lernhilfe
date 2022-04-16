<?php
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karteikartenstapel Übersicht - Lernhilfe</title>
    <link rel="stylesheet" href="style_karteikarte_Ubersicht_Page.css">
</head>

<?php
//beispiel-IDs in der Abfrage
$sqlSelectKks = "SELECT Titel FROM karteikartenstapel WHERE idKarteikartenStapel='1' AND idMitglied='1';";
$resultKks = mysqli_query($conn, $sqlSelectKks);
$row = mysqli_fetch_assoc($resultKks);
?>

<header>
    <a href="kartenstapel_Ubersicht_Page.php"><i class="leftArrow"><</i></a>
    <h1><?php echo $row['Titel'] ?></h1>
    <a href="karteikarte_anlegen.php"><i class="plusButton">+</i></a>
</header>
<body>
<form action='' method='POST'>

    <hr>
    <div class='eintragKarteikarte'>
        <label for="checkboxOfKartenstapel">
            Alle Stapel
            <br>
        </label>
        <a href="" class="rightArrow">></a>
    </div>

    <?php
    //beispiel-IDs in der Abfrage
    $sqlSelectKk = "SELECT Titel FROM karteikarten WHERE idKarteikartenstapel='1' AND idMitglied='1';";
    $resultKk = mysqli_query($conn, $sqlSelectKk);
    $resultCheck = mysqli_num_rows($resultKk);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($resultKk)) {

            echo "<hr>";
            echo "<div class='eintragKarteikarte'>";
            echo '<label for="checkboxOfKarteikarte">';
            echo $row['Titel'] . "<br>";
            echo "</label>";
            echo '<a href="" class="rightArrow">></a>';
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
